<?php

class Conexion {

    private $local = 'localhost';
    private $usu = 'root';
    private $pas = '';
    private $base = 'bdventas';
    private $port = '3306';
        
    public function getCon(){
        $con =  new PDO("mysql:host=".$this->local.
                        ";dbname=".$this->base."",
                        $this->usu,
                        $this->pas,
                        array(PDO::MYSQL_ATTR_INIT_COMMAND=> 'SET NAMES \'UTF8\'' ));
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $con;
    }
}

?>