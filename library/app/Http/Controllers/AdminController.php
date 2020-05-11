<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

use App\User;
use App\Mail\VerifiedMail;
use App\Mail\UnverifiedMail;



class AdminController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin() {
        return view('admin.home');
    }


    public function verify(Request $request) {
        $id = $request->input('id');
        //$user = User::where('id', $id)->update(['verified' => 1]);

        $confirmation_code = Str::random(60);
        User::where('id', $id)->update(['confirmation_code' => $confirmation_code]);
        $user = User::where('id', $id)->firstOrfail();
        $url =  URL::to('register/verify/'. $user->id .'/' .$confirmation_code);
        //Mail::to('trial.soh5797@gmail.com')->send(new VerifiedMail($user, $confirmation_code, $url));
        Mail::to($user->email)->send(new VerifiedMail($user, $confirmation_code, $url));
        return redirect()->back();
    }


    public function pending() {
        $users = User::where('verified',0)->where('confirmation_code',null)->get();
        if (count($users) == 0) {
            return view('admin.pending_users_empty');
        } else {
                return view('admin.pending', [
                    'users' => $users
                ]);
        }
    }


    public function unverify(Request $request) {
        $id = $request->input('id');
        $url =  URL::to('register');
        $user =  User::where('id', $id)->firstOrfail();
        Mail::to('trial.soh5797@gmail.com')->send(new UnverifiedMail($user, $url));
        //Mail::to($user->email)->send(new VerifiedMail($user, $confirmation_code, $url));
        //TODO : send emails to user
        $user->delete();
        return redirect()->back();
    }
}
