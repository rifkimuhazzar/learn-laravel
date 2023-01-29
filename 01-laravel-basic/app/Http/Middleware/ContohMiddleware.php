<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ContohMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $key, int $status)
    {
        // secara default middleware tidak dijalankan oleh laravel
        // untuk menjalankan ada 2 cara global dan spesifik
        // untuk global tambahkan di file Kernel.php pada attribute $middleware
        // untuk satu-satu tambahkan di file Kernel.php pada attribute $routeMiddleware
        // untuk group tambahkan di file Kernel.php pada attribute $middlewareGroups

        // atau bisa langsung di Route nya di middleware() menggunakan nama classnya

        // parameter handle() nya bisa lebih dari 2 karena class middleware tidak extend dari class lain
        $apiKey = $request->header("X-API-KEY");
        if ($apiKey == $key) {
            return $next($request);
        } else {
            return response("Access Denied", $status);
        }
    }
}
