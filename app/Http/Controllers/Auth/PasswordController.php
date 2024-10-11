<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'mot_de_passe' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'mot_de_passe' => Hash::make($validated['mot_de_passe']),
        ]);

        return back()->with('status', 'password-updated');
    }
}
