<?php 
	namespace certificado;
	use Illuminate\Database\Eloquent\Model;
	
	class Participante extends Model{

		protected $table = 'participante';
		public $timestamps = false;
		protected $fillable = ['matricula','nome','cpf','email'];

	}
 ?>

