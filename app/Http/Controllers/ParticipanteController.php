<?php 

namespace certificado\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use certificado\Participante;
use Request;

	class ParticipanteController extends Controller{

		public function index(){

			$header = Auth::user()['tipo'] == 'C' ? 'layout.header_coordenador' : 'layout.header_admin';
			$participantes = Participante::all();
			return view('participante.index',compact('participantes', 'header'));
		}

		public function adicionar(){
		    $user = new Participante();	 
			
			// Pegando os dados do formulario
			
			$matricula = Request::input('matricula');
            $user->matricula = $matricula;
            
            $nome = Request::input('nome');
            $user->nome= $nome;
            
            $cpf= Request::input('cpf');
            $user->cpf = $cpf;
            
            $email = Request::input('email');	
            $user->email = $email;
            // salvar no banco
			$user->save();

			return redirect('participante');
		}
		public function novo(){
			return view('participante.form_add');
		}
	}
 ?>