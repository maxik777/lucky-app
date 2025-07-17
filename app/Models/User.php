<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class User extends Model
{
    use HasFactory;
    protected $fillable = ['username', 'phone'];

    public function magicLinks()
    {
        return $this->hasMany(MagicLink::class);
    }
    public function luckyResults()
    {
        return $this->hasMany(LuckyResult::class);
    }

    public function generateInitialMagicLink(): MagicLink
    {
        return $this->magicLinks()->create([
            'uuid' => Str::uuid(),
            'expires_at' => now()->addDays(7),
        ]);
    }

    public function playLuckyGame(): array
    {
        $number = rand(1, 1000);
        $isWin = $number % 2 === 0;
        $prize = 0;

        if ($isWin) {
            $tier = match (true) {
                $number > 900 => 0.7,
                $number > 600 => 0.5,
                $number > 300 => 0.3,
                default        => 0.1,
            };

            $prize = (int)($number * $tier);
        }

        return compact('number', 'isWin', 'prize');
    }
}
