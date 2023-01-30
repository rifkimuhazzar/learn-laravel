<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function createSession(Request $request): string {
        // session();
        // Session      // facedes
        $request->session()->put("userId", "Rifki");
        $request->session()->put("isMember", true);
        return "OK";
    }

    public function getSession(Request $request): string {
        $userId = $request->session()->get("userId", "Guest");
        $isMember = $request->session()->get("isMember", "false");

        return "User Id : $userId, Is Member : $isMember";
    }
}
