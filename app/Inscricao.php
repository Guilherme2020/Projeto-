<?php
/**
 * Created by PhpStorm.
 * User: grodrigues
 * Date: 26/04/16
 * Time: 09:52
 */

namespace certificado;
    use Illuminate\Database\Eloquent\Model;



class Inscricao extends Model {

    protected $table = 'inscricao';
    public $timestamps = false;
    protected $fillable = ['status','data','evento_id','participante_id'];




}