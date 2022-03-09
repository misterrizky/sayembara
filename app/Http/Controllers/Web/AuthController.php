<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Notifications\RegistrationNotification;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:web')->except('do_logout');
    }
    public function index()
    {
        return view('page.web.auth.main');
    }
    public function do_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_pengguna' => 'required',
            'kata_sandi' => 'required',
            'captchal' => 'required|captcha'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('id_pengguna')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('id_pengguna'),
                ]);
            }elseif($errors->has('kata_sandi')){
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('kata_sandi'),
                ]);
            }elseif($errors->has('captcha')){
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('captcha'),
                ]);
            }
        }
        if(Auth::guard('web')->attempt(['username' => $request->id_pengguna, 'password' => $request->kata_sandi, 'st' => 'a'], $request->remember))
        {
            return response()->json([
                'alert' => 'success',
                'message' => 'Selamat datang '. Auth::guard('web')->user()->name,
                'callback' => 'reload',
            ]);
        }else{
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, silakan coba lagi.',
            ]);
        }
    }
    public function do_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'no_handphone' => 'required|unique:users,phone',
            'email' => 'required|email|unique:users',
            'captchar' => 'required|captcha'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nama_lengkap')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama_lengkap'),
                ]);
            }elseif($errors->has('no_handphone')){
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('no_handphone'),
                ]);
            }elseif($errors->has('email')){
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            }elseif($errors->has('captcha')){
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('captcha'),
                ]);
            }
        }
        $data = new User();
        $data->username = Str::random(8);
        $pass = Str::random(8);
        $data->password = Hash::make($pass);
        $data->name = $request->nama_lengkap;
        $data->phone = $request->no_handphone;
        $data->email = $request->email;
        $data->save();
        $token = Str::random(64);

        UserVerify::create([
            'user_id' => $data->id,
            'token' => $token
        ]);
        Notification::send($data, new RegistrationNotification($data,$token,$pass));
        return response()->json([
            'alert' => 'success',
            'message' => 'Akun berhasil terdaftar, harap verifikasi email Anda',
            'callback' => 'page_login',
        ]);
    }
    public function do_verify($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();

        $message = 'Maaf email Anda tidak dapat diidentifikasi.';

        if (!is_null($verifyUser)) {
            $user = $verifyUser->user;

            if (!$user->email_verified_at) {
                $verifyUser->user->st = 'a';
                $verifyUser->user->email_verified_at = date("Y-m-d H:i:s");
                $verifyUser->user->save();
                $message = "Email Anda telah diverifikasi. Anda sekarang dapat masuk.";
            } else {
                $message = "Email Anda sudah diverifikasi. Anda sekarang dapat masuk.";
            }
        }
        // dd($token);
        return redirect()->route('web.auth.index')->with('message', $message);
    }
    public function verification()
    {
        return view('page.web.notice.main');
    }
    public function do_logout()
    {
        $user = Auth::guard('web')->user();
        Auth::logout($user);
        return redirect()->route('web.auth.index');
    }
}
