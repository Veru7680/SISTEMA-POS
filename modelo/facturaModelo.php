<?php
require_once "conexion.php";

class ModeloFactura{
  static public function mdlInfoFacturas(){
    $stmt=Conexion::conectar()->prepare("SELECT id_factura, codigo_factura, razon_social_cliente, fecha_emision, total, estado_factura, cuf FROM factura JOIN cliente ON cliente.id_cliente=factura.id_cliente;");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegFactura($data){

  }

  static public function mdlInfoFactura($id){
    $stmt=Conexion::conectar()->prepare("SELECT * FROM factura 
JOIN cliente ON cliente.id_cliente=factura.id_cliente 
where id_factura=$id");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }
  
  static public function mdlAnularFactura($cuf){
    $stmt=Conexion::conectar()->prepare("update factura set estado_factura=0 where cuf='$cuf'");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null();
  }

  static public function mdlNumFactura(){
    $stmt=Conexion::conectar()->prepare("select max(id_factura) from factura");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlNuevoCufd($data){
    $cufd=$data["cufd"];
    $fechaVigCufd=$data["fechaVigCufd"];
    $codControlCufd=$data["codControlCufd"];

    $stmt=Conexion::conectar()->prepare("insert into cufd(codigo_cufd, codigo_control, fecha_vigencia) 
    values ('$cufd','$codControlCufd','$fechaVigCufd')");

    if($stmt->execute()){
        return "ok";
    }else{
        return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlUltimoCufd(){
    $stmt=Conexion::conectar()->prepare("SELECT * FROM `cufd` WHERE id_cufd=(select max(id_cufd) from cufd)"); 
    $stmt->execute();

    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlLeyenda(){
    $stmt=Conexion::conectar()->prepare("SELECT * FROM leyenda order by rand() limit 1"); 
    $stmt->execute();

    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegistrarFactura($data){

   
      $codigo_factura=$data["codFactura"];
      $idCliente=$data["idCliente"];
      $detalle=$data["detalle"];
      $neto=$data["neto"];
      $descAdicional=$data["descAdicional"];
      $total=$data["total"];
      $fechaEmision=$data["fechaEmision"];
      $cufd=$data["cufd"];
      $cuf=$data["cuf"];
      $xml=$data["xml"];
      $idUsuario=$data["idUsuario"];
      $usuario=$data["usuario"];
      $leyenda=$data["leyenda"];

      $stmt=Conexion::conectar()->prepare("insert into factura(codigo_factura, id_cliente, detalle, neto, descuento, total, fecha_emision, cufd, cuf, xml, id_usuario, usuario, leyenda) 
      values('$codigo_factura', '$idCliente', '$detalle', '$neto', '$descAdicional', '$total', '$fechaEmision', '$cufd', '$cuf', '$xml', '$idUsuario', '$usuario', '$leyenda')");

      if($stmt->execute()){
        return "ok";
      }else{
        return "error";
      }
  
      $stmt->close();
      $stmt->null();
 
  }
}