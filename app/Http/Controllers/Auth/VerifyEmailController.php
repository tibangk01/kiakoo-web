<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\EmailVerified;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Providers\RouteServiceProvider;

class VerifyEmailController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = User::where('id', $request->route('id'))->firstOrFail();

        if ($user->email_verified_at) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        if (!hash_equals((string) $request->route('hash'), sha1($user->email))) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        $user->update(['email_verified_at' => now()]);

        Mail::to($user)->send(new EmailVerified($user));

        return redirect()->route('variation.index', ['verified' => 1]);
    }
}
