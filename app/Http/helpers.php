<?php
/**
 * Created by PhpStorm.
 * User: grodrigues
 * Date: 19/04/16
 * Time: 01:56
 */

    namespace certificado\Http;
    use DateTime;

    class Helpers{

        public  static function getList($list,$campo = 'nome'){
            $listas = [];
            foreach ($list as $value){

                $listas[$value->id] = $value->$campo;

            }
            return $listas;

        }

        public static function toDate($str){
            $date = DateTime::createFromFormat('d/m/Y', $str);
            return $date->format('Y-m-d');
        }

        public static function fromDate($str){
            $date = DateTime::createFromFormat('Y-m-d', $str);
            return $date->format('d/m/Y');
        }


    }




?>