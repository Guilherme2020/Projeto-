<?php 
	
	namespace certificado\Http\Controllers;

	use Illuminate\Support\Facades\Auth;

	class HomeController extends Controller{

		public function __construct(){
			$this->middleware('auth');
		}

		public function index(){
			return view('certificado.home');
		}

		public function saida(){
			return view('certificado.saida');
		}
	}
?>