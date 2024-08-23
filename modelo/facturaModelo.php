<?php
require_once "conexion.php";

class ModeloFactura{

 
  static public function mdlInfoFacturas(){
    $stmt=Conexion::conectar()->prepare("select * from Factura");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegFactura($data){
    $codigo_factura = $data["codigo_factura"];
    $id_cliente = $data["id_cliente"];
    $detalle = $data["detalle"];
    $neto = $data["neto"];
    $descuento = $data["descuento"];
    $total = $data["total"];
    $fecha_emision = $data["fecha_emision"];
    $cufd = $data["cufd"];
    $cuf = $data["cuf"];
    $xml = $data["xml"];
    $id_punto_venta = $data["id_punto_venta"];
    $id_usuario = $data["id_usuario"];
    $usuario = $data["usuario"];
    $leyenda = $data["leyenda"];

    $stmt = Conexion::conectar()->prepare("INSERT INTO Factura (codigo_factura, id_cliente, detalle, 
      neto, descuento, total, fecha_emision, cufd, cuf, xml, id_punto_venta, id_usuario, usuario, leyenda
  ) VALUES (
      '$codigo_factura', 
      '$id_cliente', 
      '$detalle', 
      '$neto', 
      '$descuento', 
      '$total', 
      '$fecha_emision', 
      '$cufd', 
      '$cuf', 
      '$xml', 
      '$id_punto_venta', 
      '$id_usuario', 
      '$usuario', 
      '$leyenda'
  )");
  

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null();
  }

  

  static public function mdlInfoFactura($id){
    $stmt=Conexion::conectar()->prepare("select * from Factura where id_Factura=$id");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }
  
  static public function mdlEditFactura($data){

    $codigo_factura = $data["codigo_factura"];
    $id_cliente = $data["id_cliente"];
    $detalle = $data["detalle"];
    $neto = $data["neto"];
    $descuento = $data["descuento"];
    $total = $data["total"];
    $fecha_emision = $data["fecha_emision"];
    $cufd = $data["cufd"];
    $cuf = $data["cuf"];
    $xml = $data["xml"];
    $id_punto_venta = $data["id_punto_venta"];
    $id_usuario = $data["id_usuario"];
    $usuario = $data["usuario"];
    $leyenda = $data["leyenda"];
    $id_factura = $data["id_factura"];

    $stmt = Conexion::conectar()->prepare("UPDATE factura 
    SET codigo_factura = '$codigo_factura', 
        id_cliente = $id_cliente, 
        detalle = '$detalle', 
        neto = $neto, 
        descuento = $descuento, 
        total = $total, 
        fecha_emision = '$fecha_emision', 
        cufd = '$cufd', 
        cuf = '$cuf', 
        xml = '$xml', 
        id_punto_venta = $id_punto_venta, 
        id_usuario = $id_usuario, 
        usuario = '$usuario', 
        leyenda = '$leyenda' 
    WHERE id_factura = $id_factura");


    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null();
  }
  
  static public function mdlEliFactura($id){
    $stmt=Conexion::conectar()->prepare("delete from factura where id_factura=$id");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null();
  }
}