<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookieController extends Controller
{
    public function createCookie(Request $request): Response {
        return response("Hello Cookie")
        ->cookie("user-id", "rifki", 1000, "/")
        ->cookie("is-member", "true", 1000, "/");
    }

    public function getCookie(Request $request): JsonResponse {
        return response()
        ->json([
            "UserId" => $request->cookie("user-id", "guest"),
            "IsMember" => $request->cookie("is-member", "false")
        ]);
    }

    public function clearCookie(Request $request): Response {
        return response("Clear Cookie")
        ->withoutCookie("user-id")
        ->withoutCookie("is-member");
    }
}
