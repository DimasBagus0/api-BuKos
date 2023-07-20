<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Mendapatkan pengguna yang terotentikasi
        $user = $request->user();

        // Memeriksa apakah pengguna memiliki salah satu peran yang diperlukan
        if (!$user || !$user->hasRole($roles)) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized. Anda tidak memiliki izin untuk melakukan tindakan ini.',
                'data' => null,
            ], 403); // Kode status 403 menunjukkan akses ditolak
        }

        return $next($request);
    }
}
