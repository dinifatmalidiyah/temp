<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->level == 'Admin') {
            return $next($request);
        }

        // Tampilkan pesan kesalahan jika bukan admin.
        session()->flash('error', 'Tidak ada akses');

        // Lanjutkan ke pemrosesan berikutnya tanpa melakukan redirect.
        return $next($request);
    }
}
