<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class AuthenticationController extends Controller
{
    public function index()
    {
        return 'Login page';
    }

    public function register(): View
    {
        return view('auth/register');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'regex:/^[a-zA-Z ]{3,}$/i'],
            'email' => ['required', 'email:rfc,dns', 'unique:App\Models\User,email'],
            'password' => ['required', Password::min(8)],
        ]);

        $user = new User();

        $user->name = trim($validated['name']);
        $user->email = trim($validated['email']);
        $user->password = trim($validated['password']);

        $user->save();

        return redirect('/login');
    }
}
