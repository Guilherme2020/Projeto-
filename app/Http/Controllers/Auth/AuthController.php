<?php

namespace certificado\Http\Controllers\Auth;

//use Request;
use certificado\Http\Requests\RegisterRequest;
use certificado\Http\Requests\LoginRequest;
use certificado\User;
use Validator;
use Session;
use certificado\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

use certificado\Http\Requests\Request;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller{
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
    protected $user;
    protected $auth;
    protected $redirectTo = '/home';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */

    public function __construct(Guard $auth, User $user){
        $this->user = $user;
        $this->auth = $auth;

        $this->middleware('guest', ['except' => ['getLogout']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data){
        return Validator::make($data, [
            'nome' => 'required|max:255',
            'username' => 'required|max:255',
            'rg'=> 'required|max:255',
            'cpf' => 'required|max:255',
            'matricula' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data){
        return User::create([
            'nome' => $data['nome'],
            'username'=> $data['username'],
            'rg' => $data['rg'],
            'cpf' => $data['cpf'],
            'matricula' => $data['matricula'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'tipo' => 'C',
        ]);
    }
    //Registro:
    public function getRegister(){
        return view('auth.register');
    }

    public function postRegister(RegisterRequest $request){
        $this->create($request->all());
        return redirect('/login');
    }
    //Fim Registro;

    public function getLogout(){
        $this->auth->logout();
        Session::flush();
        return redirect('/saida');
    }

    //Login:
    public function getLogin(){
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request){

        if ($this->auth->attempt($request->only('email', 'password'))){
            return redirect('/dashboard');
        }

        return redirect('/auth/login')->withErrors([
            'email' => 'Email ou senha errado tente novamente!',
        ]);
    }
    //Fim Login;
}
