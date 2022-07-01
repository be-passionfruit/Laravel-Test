<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Session;

class LoginController extends Controller
{
    //
    public function login(Request $r)
    {
        $user = User::where('email', $r->email)->first();

        if (!$user) {
            return [
                "status" => 401,
                "message" => "E-mail bestaat niet",
            ];
        }

        if (!Hash::check($r->password, $user->password)) {
            return [
                "status" => 401,
                "message" => "Paswoord is niet correct",
            ];
        }

        return $user;
    }
}
