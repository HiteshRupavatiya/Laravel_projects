<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use function PHPUnit\Framework\isNull;

class UserController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    public function register_view()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credintials = $request->only('email', 'password');

        if (Auth::attempt($credintials)) {
            return redirect('home')->withSuccess("Signed in...");
        }

        return redirect('login')->withError('Login creaditials are invalid...');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|alpha_num|max:30|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);

        $data = $request->all();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'remember_token' => Str::random(10),
            'email_verification_code' => Str::random(40)
        ]);

        $token = Str::random(64);

        dispatch(new SendEmail($token,));

        Mail::send('email.varifyAccount', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject("Verify Your Account");
        });

        if (Auth::attempt($request->only('email', 'password','email_verified_at'))) {
            return redirect('home');
        }

        return redirect('login')->withSuccess('You Are Signed In...');
    }

    public function home()
    {
        if (Auth::check()) {
            return view('home');
        }
        return redirect('login')->withError('You are not allowed to access');
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();
        return redirect('login');
    }

    public function showForgotPasswordForm()
    {
        return view('auth.forgot_password');
    }

    public function submitForgot_password(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users'
        ]);

        $token = Str::random(64);

        DB::table('users')->update([
            'reset_password_token' => $token,
        ]);

        Mail::send('email.forgetPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject("Reset Password");
        });

        return back()->with('success', "Password Reset Link Successfully Send To Your Mail");
    }

    public function showResetPasswordForm($token)
    {
        $user = User::where('reset_password_token',$token)->first();
        if($user){
            return view('auth.reset_password',compact('user'));
        }
        return back()->withError("Some Error Occured");
    }

    public function submitReset_password(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ]);

        $user = User::where('email',$request->email)->first();

        $updatePassword = $user->update([
            'password' => Hash::make($request->password)
        ]);

        if (!$updatePassword) {
            return back()->withInput()->withError("Invalid Token!");
        }

        return redirect('login')->withSuccess('Your Password Has Been Changed Successfully');
    }

    public function verifyUser($token)
    {

        $user = User::where('email_verification_code', $token)->first();

        if ($user) {
            if($user->email_verified_at){
                return redirect()->route('register')->with('error',"Already Verified");
            }
            else{
                $user->update([
                    'email_verified_at' => now()
                ]);
                return redirect('login')->with('error','Please Fill Login Details');
            }
            session()->flash('message', 'Invalid Login attempt');
            return redirect()->route('login');
        }
        else{
            return redirect('register')->with('error','Some Error');
        }
        return redirect()->route('login');
    }
}
