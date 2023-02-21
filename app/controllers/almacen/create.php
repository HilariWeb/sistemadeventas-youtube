<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 29/1/2023
 * Time: 22:50
 */


include ('../../config.php');


$codigo = $_POST['codigo'];
$id_categoria = $_POST['id_categoria'];
$nombre = $_POST['nombre'];
$id_usuario = $_POST['id_usuario'];
$descripcion = $_POST['descripcion'];
$stock = $_POST['stock'];
$stock_minimo = $_POST['stock_minimo'];
$stock_maximo = $_POST['stock_maximo'];
$precio_compra = $_POST['precio_compra'];
$precio_venta = $_POST['precio_venta'];
$fecha_ingreso = $_POST['fecha_ingreso'];


$image = $_POST['image'];

$nombreDelArchivo = date("Y-m-d-h-i-s");
$filename = $nombreDelArchivo."__".$_FILES['image']['name'];
$location = "../../../almacen/img_productos/".$filename;

move_uploaded_file($_FILES['image']['tmp_name'],$location);


$sentencia = $pdo->prepare("INSERT INTO tb_almacen
       ( codigo, nombre, descripcion, stock, stock_minimo, stock_maximo, precio_compra, precio_venta, fecha_ingreso, imagen, id_usuario, id_categoria, fyh_creacion) 
VALUES (:codigo,:nombre,:descripcion,:stock,:stock_minimo,:stock_maximo,:precio_compra,:precio_venta,:fecha_ingreso,:imagen,:id_usuario,:id_categoria,:fyh_creacion)");

$sentencia->bindParam('codigo',$codigo);
$sentencia->bindParam('nombre',$nombre);
$sentencia->bindParam('descripcion',$descripcion);
$sentencia->bindParam('stock',$stock);
$sentencia->bindParam('stock_minimo',$stock_minimo);
$sentencia->bindParam('stock_maximo',$stock_maximo);
$sentencia->bindParam('precio_compra',$precio_compra);
$sentencia->bindParam('precio_venta',$precio_venta);
$sentencia->bindParam('fecha_ingreso',$fecha_ingreso);
$sentencia->bindParam('imagen',$filename);
$sentencia->bindParam('id_usuario',$id_usuario);
$sentencia->bindParam('id_categoria',$id_categoria);
$sentencia->bindParam('fyh_creacion',$fechaHora);

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se registro el producto de la manera correcta";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'/almacen/');
}else{
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/almacen/create.php');
}




