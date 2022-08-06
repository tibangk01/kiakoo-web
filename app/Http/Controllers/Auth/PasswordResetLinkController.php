<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class PasswordResetLinkController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
        ]);

        if ($validator->fails()) {

            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        $user  = User::where(function ($q) use ($request) {
            $q->where('email',  $request->email)
                ->where('email_verified_at', '!=', null)
                ->where('user_type', 2);
        })->first() ? true : false;

        if (!$user) {

            return response()->json(['status' => 1, 'error' => 'Adresse mail invalide']);
        }

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status != 'passwords.sent') {

            return response()->json(['status' => 2, 'error' => "Erreur interne, reéssayer plus tard"]);
        }

        return response()->json(['status' => 3, 'success' => "Un email de récupération vous a été envoyé"]);
    }
}
