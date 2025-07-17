<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('registration_form');
    }

    public function register(RegisterUserRequest $request)
    {
        $user = User::create($request->validated());
        $link = $user->generateInitialMagicLink();
        return redirect()->route('link.page', $link->uuid);
    }
}
