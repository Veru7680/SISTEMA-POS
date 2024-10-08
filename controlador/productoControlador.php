<?php
$ruta = parse_url($_SERVER["REQUEST_URI"]);

if (isset($ruta["query"])) {
  if (
    $ruta["query"] == "ctrRegProducto" ||
    $ruta["query"] == "ctrEditProducto" ||
    $ruta["query"] == "ctrBusProducto" ||
    $ruta["query"] == "ctrEliProducto"
  ) {
    $metodo = $ruta["query"];
    $producto = new ControladorProducto();
    $producto->$metodo();
  }
}

class ControladorProducto
{

  static public function ctrInfoproductos(){
    $respuesta = ModeloProducto::mdlInfoProductos();
    return $respuesta;
  }

  static public function ctrRegProducto(){
    require "../modelo/productoModelo.php";
$imagen = $_FILES["imgProducto"];
$imgNombre = $imagen["name"];
$imgTmpNombre = $imagen["tmp_name"];
$destino = "../assest/dist/img/productos/" . $imgNombre;

move_uploaded_file($imgTmpNombre, $destino);
//move_uploaded_file($imgTmp,"../assets/dist/img/productos/".$imgNombre);


    $data = array(
      "cod_producto" => $_POST["cod_producto"],
      "cod_producto_sin" => $_POST["cod_producto_sin"],
      "nombre_producto" => $_POST["nombre_producto"],
      "precio_producto" => $_POST["precio_producto"],
      "unidad_medida" => $_POST["unidad_medida"],
      "unidad_medida_sin" => $_POST["unidad_medida_sin"],
      "imagen_producto" => $imgNombre,
      "disponible" => $_POST["disponible"]
  );

    $respuesta = ModeloProducto::mdlRegproducto($data);

    echo $respuesta;
  }

  static public function ctrInfoProducto($id){
    $respuesta = ModeloProducto::mdlInfoProducto($id);
    return $respuesta;
  }

  static function ctrEditProducto(){
      require "../modelo/productoModelo.php";
      
      $imagen = $_FILES["imgProducto"];
      $imgNombre = $_POST["imgActual"]; // Por defecto usa la imagen actual
      
      if ($imagen["name"] != "") { // Si se subió una nueva imagen
          $imgNombre = $imagen["name"];
          $imgTmpNombre = $imagen["tmp_name"];
          move_uploaded_file($imgTmpNombre, "../assets/dist/img/productos/" . $imgNombre);
      }
  
      $data = array(
        "cod_producto" => $_POST["cod_producto"],
          "cod_producto_sin" => $_POST["cod_producto_sin"],
          "nombre_producto" => $_POST["nombre_producto"],
          "precio_producto" => $_POST["precio_producto"],
          "unidad_medida" => $_POST["unidad_medida"],
          "unidad_medida_sin" => $_POST["unidad_medida_sin"],
          "imagen_producto" => $imgNombre,
          "disponible" => $_POST["disponible"],
          "id_producto" => $_POST["id_producto"]
      );

      
  
      $respuesta = ModeloProducto::mdlEditProducto($data);
      echo $respuesta;
  }
  

  static function ctrEliProducto(){
    require "../modelo/productoModelo.php";
    $id = $_POST["id"];

    $respuesta = Modeloproducto::mdlEliProducto($id);
    echo $respuesta;
  }

  static function ctrBusProducto(){
    require "../modelo/productoModelo.php";
    $codProducto=$_POST["codProducto"];
    $respuesta = ModeloProducto::mdlBusProducto($codProducto);
    echo json_encode($respuesta);
  }

}