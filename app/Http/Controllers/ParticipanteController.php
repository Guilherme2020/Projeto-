<?php 

namespace certificado\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use certificado\Participante;
use Illuminate\Support\Facades\DB;
use Request;

	class ParticipanteController extends Controller{

		public function index(){

			$header = Auth::user()['tipo'] == 'C' ? 'layout.header_coordenador' : 'layout.header_admin';
			$participantes = DB::select('SELECT DISTINCT p.* FROM participante as p,inscricao as i,evento as e
       		WHERE i.participante_id = p.id and i.evento_id = e.id and e.user_id = ?	',[Auth::user()->id]);
			#return $participantes;
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

		public function edit($id){
			$participante = Participante::find($id);

			return view("participante.form_edit")->with('participante',$participante);
		}

		public function update($id){
			$id = Request::route('id');
			$participante = Participante::find($id);


			// peGANDO OS DADOS DO FORMULARIO

			$matricula = Request::input('matricula');
			$participante->matricula = $matricula;

			$nome = Request::input('nome');
			$participante->nome= $nome;

			$cpf= Request::input('cpf');
			$participante->cpf = $cpf;

			$email = Request::input('email');
			$participante->email = $email;
			// salvar no banco
			$participante->save();

			return redirect("dashboard");

		}

		public function delete($id){
			Participante::find($id)->delete();
			return redirect("dashboard");
		}

	}
 ?>