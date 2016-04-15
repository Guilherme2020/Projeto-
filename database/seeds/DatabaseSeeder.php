<?php
namespace certificado\database\seeds;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
    	Model::unguard();
    	$this->call(ParticipanteTableSeeder::class);
    	

    }
}

class ParticipanteTableSeeder extends Seeder{
	public function run(){
		DB::insert('insert into participante(matricula,nome,cpf,email)values(?,?,?,?)',array('20151ads0552','Guilherme Rodrigues Simeão','06007517322','guilherme@ifpi.edu'));
		DB::insert('insert into participante(matricula,nome,cpf,email)values(?,?,?,?)',array('20151ads0129','Daniel Farias','021021201','daniel@ifpi.edu'));

	}


}