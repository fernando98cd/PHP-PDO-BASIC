<?php

class Conexion{
    static public function Conectar(){

        #PDO ("NOMBRE DEL SERVIDOR","NOMBRE DE LA BASE DE DATOS","USUARIO","CONTRASEÑA")
        $usuario = "root";
        $pass="";
        $link = new PDO('mysql:host=localhost;dbname=curso-php',$usuario,$pass);

        $link->exec("set names utf8");

        return $link;
    }
}