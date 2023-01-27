<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ResponseController extends Controller
{
    public function response(Request $request): Response {
        return response("This is response");
    }

    public function header(Request $request): Response {
        $body = [
            "firstName" => "Rifki",
            "lastName" => "Muhazzar"
        ];
        // headernya bisa setelah status 200 juga dengan menggunakan array
        return response(json_encode($body), 200)
        ->header("content-type", "application/json")
        ->withHeaders([
            "Author" => "Rifki",
            "App" => "Learn Laravel"
        ]);
    }

    public function responseView(Request $request): Response {
        return response()->view("hello", ["name" => "this is view"]);
    }

    public function responseJson(Request $request): JsonResponse {
        $body = [
            "firstName" => "Rifki",
            "lastName" => "Muhazzar"
        ];
        // json() secara otomatis akan membuat header "content-type", "application/json"
        return response()->json($body); 
    }

    public function responseFile(Request $request): BinaryFileResponse {
        // response atau merender file
        return response()->file(storage_path("app/public/pictures/ss.jpg"));
    }

    public function responseDownload(Request $request): BinaryFileResponse {
        // response untuk memaksa download
        return response()->download(storage_path("app/public/pictures/ss.jpg"));
    }
}
