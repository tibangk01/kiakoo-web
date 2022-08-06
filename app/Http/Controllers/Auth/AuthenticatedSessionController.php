<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Validator;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($validator->fails()) {

            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        $user = User::where(function ($q) use($request){
            $q->where('email', $request->email)
                ->where('user_type', 2);
        })->first();

        if (!$user) {

            return response()->json(['status' => 1, 'error' => 'Adresse mail non valide']);
        }

        if (is_null($user->email_verified_at)) {

            return response()->json(['status' => 2,'error' => "Adresse mail non vérifiée"]);
        }

        if(!Hash::check($request->password, $user->password))
        {
            return response()->json(['status' => 3,'error' => "Mot de passe incorrect"]);
        }

        Auth::login($user);

        return response()->json(['status' => 4, 'success' => URL::previous()]);
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json(['status' => 0, 'success' => route('home')]);
    }
}
