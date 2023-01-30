<?php

use App\Exceptions\ValidationException;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\SessionController;
use App\Http\Middleware\ContohMiddleware;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/hw", function () {
    return "Hello World";
});

Route::redirect("/youtube", "/hw");

Route::fallback(function () {
    return "404 - Halaman tidak ditemukan";
});

Route::view("/hello1", "hello", ["name" => "Rifki 1"]);

Route::get("/hello2", function () {
    return view("hello", ["name" => "Rifki 2"]);
});

Route::get("/hello-world", function () {
    return view("hello.world", ["name" => "Hello"]);
});

Route::get("/products/{id}", function ($productId) {
    return "Product $productId";
})->name("product.detail");

Route::get("/products/{product}/items/{item}", function ($productId, $itemId) {
    return "Product $productId, Item $itemId";
})->name("product.item.detail");

Route::get("/categories/{id}", function ($categoryId) {
    return "Category $categoryId";
})->where("id", "[0-9]+")->name("category.detail"); // ->where("id2", "[0-9]+") bisa lebih dari satu

Route::get("/users/{id?}", function ($userId = "404") {
    return "User $userId";
})->name("user.detail");

// jika route ini di bawah /conflict/{name} maka akan conflict atau yg ini akan diabaikan
Route::get("/conflict/frontend", function () {
    return "Conflict frontend developer";
});

Route::get("/conflict/{name}", function ($name) {
    return "Conflict $name";
});

Route::get("/produk/{id}", function ($id) {
    $link = route("product.detail", ["id" => $id]);
    return "Link $link";
});

Route::get("/produk-redirect/{id}", function ($id) {
    // return redirect("/");
    return redirect()->route("product.detail", ["id" => $id]);
});

Route::get("/controller/hello/request", [HelloController::class, "request"]);
Route::get("/controller/hello/{name}", [HelloController::class, "hello"]);

Route::get("/input/hello", [InputController::class, "hello"]);
Route::post("/input/hello", [InputController::class, "hello"]);
Route::post("/input/hello/first", [InputController::class, "helloFirstName"]);
Route::post("/input/hello/input", [InputController::class, "helloInput"]);
Route::post("/input/hello/array", [InputController::class, "helloArray"]);
Route::post("/input/type", [InputController::class, "inputType"]);
Route::post("/input/filter/only", [InputController::class, "filterOnly"]);
Route::post("/input/filter/except", [InputController::class, "filterExcept"]);
Route::post("/input/filter/merge", [InputController::class, "filterMerge"]);

Route::post("/file/upload", [FileController::class, "upload"])
->withoutMiddleware([VerifyCsrfToken::class]); // meng exclude middleware

Route::get("/response/hello", [ResponseController::class, "response"]);
Route::get("/response/header", [ResponseController::class, "header"]);

// Route Group prefix
Route::prefix("/response/type")->group(function () {
    Route::get("/view", [ResponseController::class, "responseView"]);
    Route::get("/json", [ResponseController::class, "responseJson"]);
    Route::get("/file", [ResponseController::class, "responseFile"]);
    Route::get("/download", [ResponseController::class, "responseDownload"]);
});

// Route Group Controller
Route::controller(CookieController::class)->group(function () {
    Route::get("/cookie/set", "createCookie");
    Route::get("/cookie/get", "getCookie");
    Route::get("/cookie/clear", "clearCookie");
});

Route::get("/redirect/from", [RedirectController::class, "redirectFrom"]);
Route::get("/redirect/to", [RedirectController::class, "redirectTo"]);
Route::get("/redirect/user", [RedirectController::class, "redirectName"]);
Route::get("/redirect/user/{name}", [RedirectController::class, "redirectHello"])
        ->name("redirect-hello");

Route::get("/redirect/named", function () {
    // return route("redirect-hello", ["name" => "Rifki"]); // helper functiion
    // return url()->route("redirect-hello", ["name" => "Rifki"]); url function
    return URL::route("redirect-hello", ["name" => "Rifki"]); // facades
});

Route::get("/redirect/action", [RedirectController::class, "redirectAction"]);
Route::get("/redirect/away", [RedirectController::class, "redirectAway"]);

// // route middleware untuk membuat alias 
// // bisa juga tanpa registrasi di Kernal.php tapi tidak ada alias
// Route::get("/middleware/api", function () {
//     return "OK";
// })->middleware(["contoh:PZN,401"]); // ["alias:param1,param2"]

// // group middleware
// Route::get("/middleware/group", function () {
//     return "GROUP";
// })->middleware(["pzn"]);


// // Route Group Middleware
// Route::middleware(["contoh:PZN,401"])->group(function () {
//     Route::get("/middleware/api", function () {
//         return "OK";
//     });
    
//     Route::get("/middleware/group", function () {
//         return "GROUP";
//     });
// });

// Multiple Group middleware, prefix, controller
Route::middleware(["contoh:PZN,401"])->prefix("/middleware")->group(function () {
    Route::get("/api", function () {
        return "OK";
    });
    
    Route::get("/group", function () {
        return "GROUP";
    });
});

Route::get("/url/action", function () {
    // paramnya bisa dikosongkan ataupun tidak diisi
    return action([FormController::class, "form"], []);
    return url()->action([FormController::class, "form"], []);
    return URL::action([FormController::class, "form"]);

});

Route::get("/form", [FormController::class, "form"]);
Route::post("/form", [FormController::class, "submitForm"]);

Route::get("/url/current", function () {
    // url()->current();

    return URL::full();
});

Route::get("/session/create", [SessionController::class, "createSession"]);

Route::get("/session/get", [SessionController::class, "getSession"]);

Route::get("/error/sample", function () {
    throw new Exception("Sample Error");
});

Route::get("/error/manual", function () {
    report(new Exception("Sample Error"));
    return "OK";
});

Route::get("/error/validation", function () {
    throw new ValidationException("Validation Error");
});

// jika ingin halamannya berbeda buat template di view/erros/statuscode.blade.php
Route::get("/abort/400", function () {
    // mencari template 400.blade.php dahulu jika tidak ada kemudian yang 4xx dan jika tidak ada maka akan memakai yang defaultbya yaitu error page handler
    abort(400, "Validation Error"); // param1 = status code | param2 = message
});

Route::get("/abort/401", function () {
    abort(401);
});

Route::get("/abort/500", function () {
    abort(500);
});