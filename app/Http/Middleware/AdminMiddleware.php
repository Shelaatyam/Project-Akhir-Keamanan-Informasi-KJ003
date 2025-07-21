<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Memeriksa apakah pengguna yang sedang login adalah admin
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);  // Lanjutkan ke route berikutnya jika role adalah admin
        }

        // Jika bukan admin, arahkan ke halaman beranda
        return redirect('/');
    }
}
