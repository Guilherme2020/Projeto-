<?php
/**
 * Created by PhpStorm.
 * User: grodrigues
 * Date: 19/04/16
 * Time: 01:21
 */

namespace certificado\Http\Controllers;


use certificado\Evento;
use certificado\Participante;
use certificado\User;
use certificado\Inscricao;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use certificado\Http\helpers;
use Auth;
class EventoController extends Controller
{

    public function adicionar()
    {

        return view('evento.add')->with('usuario', User::where('tipo', '=', 'C')->get());


    }

    public function save()
    {
        $user = new Evento();

        // Pegando os dados do formulario

        $nome = Request::input('nome');
        $user->nome = $nome;

        $status = Request::input('status');
        $user->status = $status;

        $data_evento = Helpers::toDate(Request::input('data_evento'));
        $user->data_evento = $data_evento;

        $user_id = Request::input('user_id');
        $user->user_id = $user_id;

        $user->slug = str_slug($user->nome);

        // salvar no banco
        $user->save();

        return redirect('dashboard');
    }

    public function lista()
    {
        $id = Auth::user()->id;
        return view('evento.lista')->with('eventos', Evento::where('user_id', '=', $id)->get());

    }


    public function cadastrar($slug){
        $evento = Evento::where('slug','=', $slug)->first();

        if($evento['status'] == 'F')
            return view("evento.error")->with("mensagem", "O evento solicitado não se encontra disponivel");

        return view("evento.cadastro")->with("evento", $evento);
    }

    public function inserirInscricao($slug)
    {
        // Pegar os dados do formulario
        $evento = Evento::where('slug', '=', $slug)->first();

        $evento_id = $evento->id;
        $data = date('Y-d-m');
        $status = 'P';


        $matricula = Request::input('matricula');
        $participante = Participante::where('matricula', '=', $matricula)->first();
        $participante_id = 0;

        if ($participante) {
            //
            $participante->nome = Request::input('nome');
            $participante->cpf = Request::input('cpf');
            $participante->email = Request::input('email');
            $participante_id = $participante->id;
            $participante->save();

            $participante_id = $participante['id'];

        } else {
            //$participante = new Participante();

            $matricula = Request::input('matricula');
            $nome = Request::input('nome');
            $cpf = Request::input('cpf');
            $email = Request::input('email');
            $participante_id = Participante::create(array(

                'matricula' => $matricula,
                'nome' => $nome,
                'cpf' => $cpf,
                'email' => $email
            ))['id'];
        }

        // = $participante->id;


        Inscricao::create(array(
            'status' => $status,
            'data' => $data,
            'evento_id' => $evento_id,
            'participante_id' => $participante_id));


        /*$nome = Request::input('nome');
        $inscricao->nome = $nome;

        $cpf = Request::input('cpf');
        $inscricao->cpf = $cpf;

        $email = Request::input('email');
        $inscricao->email = $email;
        */
        return redirect('dashboard');

    }


    public function edit($id){
        //DB::update('UPDATE participante SET matricula=?,nome=?,cpf=?,email=? WHERE id = ? ',
        //        array($matricula,$nome,$cpf,$email,$id));

        $evento = Evento::findOrFail($id);
        $data = Helpers::fromDate($evento->data_evento);
        $status = ['A' => 'Aberto', 'F' => 'Fechado'];
        return view("evento.edit", compact('evento', 'data', 'status'));

    }

    public function update()
    {
        $id = Request::route('id');

        $user = Evento::find($id);

        // Pegando os dados do formulario
        $nome = Request::input('nome');
        $user->nome = $nome;

        $status = Request::input('status');
        $user->status = $status;

        $data_evento = Helpers::toDate(Request::input('data_evento'));
        $user->data_evento = $data_evento;

        $user->slug = str_slug($user->nome);

        // salvar no banco
        $user->save();

        return redirect('dashboard');

    }

    public function delete($id){
        Evento::find($id)->delete();
        return redirect("/dashboard");
    }

    public function ver($id){
        $header = Auth::user()['tipo'] == 'C' ? 'layout.header_coordenador' : 'layout.header_admin';

        $participantes = DB::select('SELECT DISTINCT p.* FROM participante AS p,inscricao AS i,evento AS e
       		WHERE i.participante_id = p.id AND i.evento_id = e.id AND e.user_id = ?	AND e.id = ?', [Auth::user()->id, $id]);
        #return $participantes;
        return view('evento.participante', compact('participantes', 'header'));
    }



}