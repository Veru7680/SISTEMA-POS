<?php
require_once "conexion.php";

class ModeloUsuario {
    /*
    acceso al sistema
    */

    static public function mldAccesoUsuario($usuario) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE login_usuario = :usuario");
        $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch();
        $stmt = null; // Cerrar la conexión
    }

    static public function mdlInfoUsuarios() { // Corrigiendo el nombre del método
        $stmt = Conexion::conectar()->prepare("SELECT * FROM usuario");
        $stmt->execute();

        return $stmt->fetchAll(); // Cambié fetch() a fetchAll() para obtener todos los registros
        $stmt -> close();
        $stmt -> null; // Cerrar la conexión
    }
    static public function mdlRegUsuario($data) { 
        $loginUsuario=$data["loginUsuario"];
        $password=$data["password"];
        $perfil=$data["perfil"];
        $stmt=Conexion::conectar()->prepare("insert into usuario(login_usuario, password, perfil)
        values('$loginUsuario', '$password','$perfil')");

        if($stmt->execute()){
            return "ok";}
        else{ return "error"; }

        $stmt->close();
        $stmt->null();


    } 
    
    /*static public function mdlInfoUsuario() { }  agregar eso ver en el video y git*/
    
    static public function mdlInfoUsuario($id) { // Corrigiendo el nombre del método
        $stmt = Conexion::conectar()->prepare("SELECT * FROM usuario where id_usuario=$id");
        $stmt->execute();

        return $stmt->fetch(); // Cambié fetch() a fetchAll() para obtener todos los registros
        $stmt -> close();
        $stmt -> null; // Cerrar la conexión
    }
    static public function mdlEditUsuario($data){
        //var_dump($data);

        $password=$data["password"];
        $perfil=$data["perfil"];
        $estado=$data["estado"];
        $id=$data["id"];

        $stmt=Conexion::conectar()->prepare("update usuario set password='$password', perfil='$perfil', estado='$estado' 
        where id_usuario=$id");

        if($stmt->execute()){
            return "ok";}
        else{ return "error"; }

        $stmt->close();
        $stmt->null();


    }


    static public function mdlElitUsuario($id){
        $stmt=Conexion::conectar()->prepare("delete from usuario where id_usuario=$id");

        if($stmt->execute()){
            return "ok";}
        else{ return "error"; }

        $stmt->close();
        $stmt->null();


    }


}
