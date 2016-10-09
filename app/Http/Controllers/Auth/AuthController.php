<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Config;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Session;
use Validator;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
     */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function getLogin()
    {
        return view('authentication.login');
    }

    public function postLogin(Request $request)
    {
        try {
            $user = User::where('username', $request->get('username'))->first();
            if ($user) {
                $password = decrypt($user->password, Config::get('app.key'));
                if ($password == $request->get('password') && $user->active == 1) {
                    Auth::login($user);
                    return redirect('/');
                } else {
                    Session::flash('flash_message', 'Mật khẩu đăng nhập không đúng, vui lòng nhập lại!', 'Thông báo');
                    return redirect('auth/login');
                }
            } else if ($request->get('username') == '' || $request->get('password') == '') {
                Session::flash('flash_message', 'Vui lòng nhập đầy đủ thông tin!', 'Thông báo');
                return redirect('auth/login');
            } else {
                Session::flash('flash_message', 'Tài khoản không tồn tại, vui lòng nhập lại!', 'Thông báo');
                return redirect('auth/login');
            }
        } catch (Exception $ex) {
            Session::flash('flash_message', 'Quá trình đăng nhập bị lỗi, vui lòng đăng nhập lại!', 'Thông báo');

            return redirect('auth/login');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
