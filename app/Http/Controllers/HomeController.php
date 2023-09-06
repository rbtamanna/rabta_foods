<?php

namespace App\Http\Controllers;

// use App\Http\Requests\LoginRequest;
use App\Http\Requests\PasswordChangeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function viewHome()
    {
        return view('dashboard');
    }
    public function index()
    {
        return view('auth.login');
    }
    // public function login(LoginRequest $request)
    // {
    //     dd($request->all());
    // }
     public function login(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if ($validator->fails()) 
        {
            return redirect('login')->withErrors($validator->errors());
        }
        // dd(Hash::make('welcome123'));
        $email = $request->email;
        $password=$request->password;
        // dd($email,$password);
        // $user=User::where('email',$email)->first();
        // // dd($user);
        // if(password_verify($password, $user->password))
        // {
        //     // dd('valid');
        //     return redirect('home');
        // }
        // else
        // {
        //     return redirect('login');
        // }

        if(Auth::attempt(['email'=>$email, 'password'=>$password]))
        {
            // dd(Auth::user());
            $user=User::where('email',$email)->first();
            return redirect('home');
        }
        else
        {
            return redirect('login');
        }
    }
    public function logout()
    {
        \request()->session()->flush();
        return redirect('login');
    }
    public function viewChangePassword()
    {
        return view('change_password');
    }

    public function changePassword(PasswordChangeRequest $request)
    {
        $data = $request->validated();
        $current_password = $data['current_password'];
        $confirm_password = $data['confirm_password'];
        $user = User::where('id', Auth::id())->first();
        if (password_verify($current_password, $user->password)) {
//            User::where('id', Auth::id())
//                ->update([
//                    'password' => Hash::make($confirm_password)
//                ]);
            DB::table('users')
                ->where('id', '=', Auth::id())
                ->update([
                    'password' => Hash::make($confirm_password)
                ]);
            return $this->logout();
        } else {
            return redirect()->back()->with('error', 'Password does not match!');
        }
    }
}
