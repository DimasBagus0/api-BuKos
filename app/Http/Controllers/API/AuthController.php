<?php

namespace App\Http\Controllers\API;

use Mail;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $validator = FacadesValidator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric|min:10|unique:users,phone|',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'role' => 'sometimes|in:user,owner,admin',
        ],[
            'email.unique' => 'Email sudah digunakan.',
            'phone.unique' => 'Nomor telepon sudah digunakan.',
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

            // Jika role "user" mencoba login ke halaman owner atau sebaliknya, tolak login
            if (
                ($auth->role === 'user' && \Illuminate\Support\Facades\Route::currentRouteName() === 'owner.login') ||
                ($auth->role === 'owner' && \Illuminate\Support\Facades\Route::currentRouteName() === 'user.login') ||
                ($auth->role === 'admin' && \Illuminate\Support\Facades\Route::currentRouteName() === 'user.login')
            ) {
                return response()->json([
                    'success' => false,
                    'message' => 'Anda tidak memiliki izin untuk login ke halaman ini.',
                    'data' => null
                ], 403); // Kode status 403 menunjukkan akses ditolak
            }

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
    public function loginAdmin(Request $request)
{
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        $auth = Auth::user();

        // Pastikan hanya admin yang dapat mengakses rute ini
        if ($auth->role === 'admin') {
            $success['token'] = $auth->createToken('auth_token')->plainTextToken;
            $success['name'] = $auth->name;
            $success['email'] = $auth->email;
            $success['role'] = $auth->role;

            return response()->json([
                'success' => true,
                'message' => 'Login sukses sebagai admin',
                'data' => $success
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Anda tidak memiliki izin untuk login sebagai admin.',
                'data' => null
            ], 403); // Kode status 403 menunjukkan akses ditolak
        }
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Cek email dan password lagi',
            'data' => null
        ]);
    }
}
    public function logoutAdmin(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout admin berhasil'
        ]);
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

public function getLoggedInUsers()
    {
        // Ambil semua pengguna yang login saat ini
        $loggedInUsers = User::whereNotNull('last_login_at')->get();

        return response()->json(['loggedInUsers' => $loggedInUsers]);
    }

    public function getApprovedProducts()
    {
        // Ambil semua produk yang telah diapprove (approved = true)
        $approvedProducts = Product::where('approved', true)->get();

        return response()->json(['approvedProducts' => $approvedProducts]);
    }

    public function getUnapprovedProducts()
    {
        // Ambil semua produk yang belum diapprove (approved = false)
        $unapprovedProducts = Product::where('approved', false)->get();

        return response()->json(['unapprovedProducts' => $unapprovedProducts]);
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

    public function sendVerifyMail($email)
    {
        if(auth()->user()){

            $user = User::where('email', $email)->get();
            if(count($user) > 0){

                $random = Str::random(40);
                $domain = URL::to('/');
                $url = $domain.'/verify-mail/'.$random;

                $data['url'] = $url;
                $data['email'] = $email;
                $data['title'] = "Verifikasi Email Anda - Tindakan Di Perlukan";
                $data['name'] ="Pengguna BuKos";
                $data['body'] = "Terima kasih telah mendaftar di platform kami. Untuk menyelesaikan pengaturan akun Anda dan memastikan keamanan informasi Anda, kami mohon Anda melakukan verifikasi alamat email Anda dengan mengikuti petunjuk di bawah ini:";

                Mail::send('verifyMail', ['data'=>$data], function($message) use($data){
                    $message->to($data['email'])->subject($data['title']);
                });

                $user = User::find($user[0]['id']);
                $user->remember_token = $random;
                $user->save();

                return response()->json([
                    'succes'=>true,
                    'message'=> 'Mail Berhasil di kirim'
                ]);


            }else{
                return response()->json([
                    'succes' => false,
                    'message' => 'User Not Found'
                ]);
            }

        }
        else{
            return response()->json([
                'succes' => false,
                'message' => 'Unauthenticated'
            ]);
        }

    }

    public function verificationMail($token)
    {
        $user = User::where('remember_token',$token)->get();
        if(count($user) > 0){

            $datetime = Carbon::now()->format('Y-m-d H:i:s');
            $user = User::find($user[0]['id']);
            $user->remember_token = '';
            $user->is_verified = 1;
            $user->email_verified_at = $datetime;
            $user->save();

            return view('succes');
        }else{
            return view('404');
        }
    }

    public function forgetPassword(Request $request)
    {
        try {

            $user = User::where('email', $request->email)->get();
            if(count($user) > 0){

                $token = Str::random(40);
                $domain = URL::to('/');
                $url = $domain.'/reset-password?token='.$token;

                $data['url'] = $url;
                $data['email'] = $request->email;
                $data['title'] = "Password Reset";
                $data['body'] = "Klik Disini Untuk mereset password anda";

                Mail::send('forgetPasswordMail', ['data'=>$data], function($message) use ($data){
                    $message->to($data['email'])->subject($data['title']);
                });

                $datetime = Carbon::now()->format('Y-m-d H:i:s');
                PasswordReset::UpdateOrCreate(
                    ['email' => $request->email],
                    [
                        'email' => $request->email,
                        'token' => $token,
                        'created_at' => $datetime
                    ]
                    );

                    return response()->json([
                        'succes' => true,
                        'message' => 'Please Check your email for reset password'
                    ]);
            }
            else{
                return response()->json([
                    'succes' => false,
                    'message' => 'User Not Found'
                ]);
            }

        } catch (\Exception $e) {
            return response()->json([
                'succes' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function resetPasswordLoad(Request $request)
    {
        $resetdata = PasswordReset::where('token',$request->token)->get();
        if(isset($request->token) && count($resetdata) > 0){

            $user = User::where('email', $resetdata[0]['email'])->get();
            return view('resetPassword', compact('user'));

        }
        else{
            return view('404');
        }
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password'=> 'required|string|min:8|confirmed'
        ]);

        $user = User::find($request->id);
        $user->password = Hash::make($request->password);
        $user->save();

        PasswordReset::where('email', $user->email)->delete();

        return "<h1>Password Kamu Berhasil Di Ganti<h1>";
    }
}
