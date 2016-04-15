<?php
namespace certificado;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model{

    protected $table = 'evento';
    public $timestamps = false;
    protected $fillable = ['nome','status','data_evento'];

}
?>

