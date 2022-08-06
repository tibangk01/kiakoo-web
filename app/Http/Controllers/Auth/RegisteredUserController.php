<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Human;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Services\AvatarService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => ['required', 'string', 'max:255'],
            'phone_number' => ['nullable', 'string', 'max:25', 'unique:customers,phone_number'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($validator->fails()) {

            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        $customerExists = (new UserRepository)->customerExists($request->email);

        if ($customerExists) {

            return response()->json(['status' => 1, 'error' => 'Email dejà pourvu.']);
        }

        DB::beginTransaction();

        try {

            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_type' => 2,
            ]);

            $human = Human::create([
                'last_name' => $request->fullname, // save full name as last name, then set first name as nullable ...
            ]);

            Customer::create([
                'user_id' => $user->id,
                'human_id' => $human->id,
                'phone_number' => $request->phone_number,
            ]);

            (new AvatarService)->createDefault($user);

            event(new Registered($user));

            DB::commit();

            return response()->json(['status' => 2, 'success' => "Inscpription réussi ! Un email d'activation vous a été envoyé au : " . $user->email]);
        } catch (\Throwable $e) {

            DB::rollBack();

            return response()->json(['status' => 3, 'error' => "Une erreur s'est produite."]);
        }
    }
}
