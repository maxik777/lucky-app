<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;  // Don't forget to import Str
use App\Models\User;        // Import User model if needed

class MagicLink extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'uuid', 'is_active', 'expires_at'];

    protected $attributes = ['is_active' => true];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deactivate()
    {
        $this->update(['is_active' => false]);
    }

    public function isExpired(): bool
    {
        return $this->expires_at < now();
    }

    public static function createNewFor(User $user): MagicLink
    {
        return $user->magicLinks()->create([
            'uuid' => Str::uuid(),
            'expires_at' => now()->addDays(7),
        ]);
    }
}
