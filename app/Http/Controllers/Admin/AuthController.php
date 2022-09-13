<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    protected $guardName = 'admin';
    protected $loginRoute;

    public function __construct()
    {
        $this->middleware('guest:admin')->except('postLogout');
        $this->loginRoute = route('admin.login');
    }

    public function getLogin()
    {
        return view('admin.login');
    }

    public function postLogout()
    {
        Auth::guard($this->guardName)->logout();
        Session::invalidate();
        Session::regenerateToken();
        return redirect()->guest($this->loginRoute);
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            $this->sendLockoutResponse($request);
        }

        $credential = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::guard($this->guardName)->attempt($credential)) {

            $request->session()->regenerate();
            $this->clearLoginAttempts($request);
            return redirect()->intended('admin/dashboard');
        } else {
            $this->incrementLoginAttempts($request);

            return redirect()->back()
                ->withInput($request->only('email'))
                ->withErrors([trans('success.wronglogin')]);
        }
    }
}
