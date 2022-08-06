<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\PasswordReseted;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class NewPasswordController extends Controller
{
    public function create(Request $request)
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8'],
            'password_confirmation' => ['required', 'min:8', 'same:password'],
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();
            }
        );

        if ($status == 'passwords.token') {
            session()->flash('expired', true);

            return redirect()->back();
        }

        $user  = User::where(function ($q) use ($request) {
            $q->where('email',  $request->email)
                ->where('email_verified_at', '!=', null)
                ->where('user_type', 2);
        })->first();

        if ($status == 'passwords.reset') {
            Mail::to($user)->send(new PasswordReseted($user));
            session()->flash('success', true);

            return redirect()->back();
        }

        session()->flash('error', true);
        return redirect()->back();

    }
}
