<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload(Request $request): string {
        // $pictures = $request->allFiles();
        $picture = $request->file("picture"); // seperti input tapi hanya untuk file upload saja

        $picture->storePubliclyAs("pictures", $picture->getClientOriginalName(), "public");

        return "OK : " . $picture->getClientOriginalName();
    }
}
