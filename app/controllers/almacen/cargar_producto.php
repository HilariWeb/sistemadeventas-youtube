<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 30/1/2023
 * Time: 18:08
 */


$id_producto_get = $_GET['id'];

$sql_productos = "SELECT *, cat.nombre_categoria as categoria, u.email as email, u.id_usuario as id_usuario
                  FROM tb_almacen as a INNER JOIN tb_categorias as cat ON a.id_categoria = cat.id_categoria 
                  INNER JOIN tb_usuarios as u ON u.id_usuario = a.id_usuario WHERE id_producto = '$id_producto_get'";
$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();
$productos_datos = $query_productos->fetchAll(PDO::FETCH_ASSOC);

foreach ($productos_datos as $productos_dato){
    $codigo = $productos_dato['codigo'];
    $nombre_categoria = $productos_dato['nombre_categoria'];
    $nombre = $productos_dato['nombre'];
    $email = $productos_dato['email'];
    $id_usuario = $productos_dato['id_usuario'];
    $descripcion = $productos_dato['descripcion'];
    $stock = $productos_dato['stock'];
    $stock_minimo = $productos_dato['stock_minimo'];
    $stock_maximo = $productos_dato['stock_maximo'];
    $precio_compra = $productos_dato['precio_compra'];
    $precio_venta = $productos_dato['precio_venta'];
    $fecha_ingreso = $productos_dato['fecha_ingreso'];
    $imagen = $productos_dato['imagen'];
}