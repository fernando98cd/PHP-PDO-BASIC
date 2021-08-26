<?php
require_once "Conexion.php";

class ModeloFormularios {

    #REGISTROSSS

    static public function mdlRegistro($tabla,$datos){
        #stmt = statement = declaracion
        $stmt = Conexion::Conectar()->prepare("INSERT INTO $tabla(token, nombre, email, password) VALUES (:token,:nombre,:email,:password)");

        #bindParam-> vincula una variable php a un parametro
        $stmt->bindParam(":token",$datos["token"],PDO::PARAM_STR);
        $stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
        $stmt->bindParam(":email",$datos["email"],PDO::PARAM_STR);
        $stmt->bindParam(":password",$datos["password"],PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            print_r(Conexion::Conectar()->errorInfo());
        }

        $stmt ->Close();

        $stmt = null;
    }

    #LEER REGISTROS
    static public function mdlSeleccionarRegistros($tabla,$item,$valor){

        if($item == null && $valor == null){

            $stmt = Conexion::conectar()->prepare("SELECT * ,DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla ORDER BY ID DESC");

            $stmt->execute();

            return $stmt -> fetchAll();
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * ,DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla WHERE $item = :$item ORDER BY ID DESC");
            $stmt->bindParam(":".$item,$valor,PDO::PARAM_STR);
            $stmt->execute();

            return $stmt -> fetch();
        }

        $stmt ->Close();

        $stmt = null;
    }

    #ACTUALIZAR REGISTRO

    static public function mdlActulizarRegistro($tabla,$datos){
        #stmt = statement = declaracion
        $stmt = Conexion::Conectar()->prepare("UPDATE $tabla SET token = :token, nombre= :nombre,email=:email,password= :password WHERE id = :id");

        #bindParam-> vincula una variable php a un parametro

        $stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
        $stmt->bindParam(":email",$datos["email"],PDO::PARAM_STR);
        $stmt->bindParam(":password",$datos["password"],PDO::PARAM_STR);
        $stmt->bindParam(":token",$datos["token"],PDO::PARAM_STR);
        $stmt->bindParam(":id",$datos["id"],PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            print_r(Conexion::Conectar()->errorInfo());
        }

        $stmt ->Close();

        $stmt = null;
    }

    static public function mdlEliminarRegistro($tabla,$valor){

        $stmt = Conexion::Conectar()->prepare("DELETE FROM $tabla WHERE token = :token");

        #bindParam-> vincula una variable php a un parametro

        $stmt->bindParam(":token",$valor,PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            print_r(Conexion::Conectar()->errorInfo());
        }

        $stmt ->Close();

        $stmt = null;
    }
}