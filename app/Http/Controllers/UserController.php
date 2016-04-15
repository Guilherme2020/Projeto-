<?php

namespace certificado\Http\Controllers;
use certificado\User;
use Illuminate\Support\Facades\Auth;
use certificado\Http\Requests\UserRequest;

class UserController extends Controller{

    public function index(){
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function toDashboard(){
        if(Auth::user()){
            $saida = Auth::user()['tipo'] == "G" ? 'certificado.gerente' : 'certificado.coordenador';
            return view($saida);
        }
        return redirect('/');
    }

    public function getAdd(){
        //Simple ACL:
        if(Auth::user()['tipo'] == 'C')
            return redirect('dashboard');

        return view('users.add');
    }

    public function postAdd(UserRequest $request){
        //Gravando:
        User::create([
            'nome' => $request['nome'],
            'username'=> $request['username'],
            'rg' => $request['rg'],
            'cpf' => $request['cpf'],
            'matricula' => $request['matricula'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'tipo' => 'C',
        ]);

        //Simple ACL:
        return redirect('dashboard');
    }

    public function delete(){

    }

    public function view(){

    }

    public function update(){

    }
    //
}
?>