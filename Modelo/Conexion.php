<?php
/**
 * Created by PhpStorm.
 * User: CAMILO
 * Date: 22/11/2017
 * Time: 22:13
 */

class Conexion
{
    var $servidor,$usuario,$contrasena,$database;
    var $conec;

    function Conexion(){
        $this->conec =new mysqli("localhost","root","","db_biomedica");
        $this->conec->set_charset("utf8");
    }

    function conectarMysqlParameters($servi,$usua,$contra,$databa){
        $cad = mysqli_connect($servi,$usua,$contra,$databa);

        if ($cad){
        }else{
            echo ":(";
        }
        return $cad;
    }

    public function conectarMysql(){
        if ($this->conec->connect_error){
            return   false;
        }else{
            return $this->conec;
        }
    }


}