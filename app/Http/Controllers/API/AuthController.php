<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $validator = FacadesValidator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric|min:15|unique:users,phone',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'role' => 'sometimes|in:user,owner',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Ada kesalahan',
                'data' => $validator->errors()
            ]);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        // Menentukan role berdasarkan route yang sedang diakses
        if (\Illuminate\Support\Facades\Route::currentRouteName() === 'owner.register') {
            // Jika route 'owner.register', maka atur role sebagai 'owner'
            $input['role'] = 'owner';
        } else {
            // Jika route 'user.register' atau lainnya, maka atur role sebagai 'user' (default)
            $input['role'] = 'user';
        }

        $user = User::create($input);

        $success['token'] = $user->createToken('auth_token')->plainTextToken;
        $success['name'] = $user->name;
        $success['email'] = $user->email;
        $success['phone'] = $user->phone;
        $success['role'] = $user->role;

        return response()->json([
            'success' => true,
            'message' => 'Sukses register sebagai ' . $user->role,
            'data' => $success
        ]);
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $auth = Auth::user();
            $success['token'] = $auth->createToken('auth_token')->plainTextToken;
            $success['name'] = $auth->name;
            $success['email'] = $auth->email;
            $success['role'] = $auth->role;

            if ($auth->role === 'owner') {
                return response()->json([
                    'success' => true,
                    'message' => 'Login sukses sebagai owner',
                    'data' => $success
                ]);
            } else {
                return response()->json([
                    'success' => true,
                    'message' => 'Login sukses sebagai user',
                    'data' => $success
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Cek email dan password lagi',
                'data' => null
            ]);
        }
    }

    public function getOwnerDetail(Request $request)
{
    $user = $request->user();

    if ($user->role !== 'owner') {
        return response()->json([
            'success' => false,
            'message' => 'Anda tidak memiliki izin untuk mengakses detail pemilik.',
            'data' => null
        ], 403); // Kode status 403 menunjukkan akses ditolak
    }

    // Lakukan query atau proses lain untuk mendapatkan detail pemilik berdasarkan $user
    $ownerDetail = User::where('id', $user->id)->first();

    if (!$ownerDetail) {
        return response()->json([
            'success' => false,
            'message' => 'Detail pemilik tidak ditemukan.',
            'data' => null
        ], 404); // Kode status 404 menunjukkan data tidak ditemukan
    }

    return response()->json([
        'success' => true,
        'message' => 'Berhasil mendapatkan detail pemilik.',
        'data' => $ownerDetail
    ]);
}




    public function logoutUser(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logout sebagai pengguna berhasil'
        ]);
    }

    public function logoutOwner(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logout sebagai pemilik berhasil'
        ]);
    }
}
