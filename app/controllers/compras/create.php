<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 15/2/2023
 * Time: 19:35
 */

include ('../../config.php');


$id_producto = $_GET['id_producto'];
$nro_compra = $_GET['nro_compra'];
$fecha_compra = $_GET['fecha_compra'];
$id_proveedor = $_GET['id_proveedor'];
$comprobante = $_GET['comprobante'];
$id_usuario = $_GET['id_usuario'];
$precio_compra = $_GET['precio_compra'];
$cantidad_compra = $_GET['cantidad_compra'];
$stock_total = $_GET['stock_total'];


$pdo->beginTransaction();

$sentencia = $pdo->prepare("INSERT INTO tb_compras
       ( id_producto, nro_compra, fecha_compra, id_proveedor, comprobante, id_usuario, precio_compra, cantidad, fyh_creacion) 
VALUES (:id_producto,:nro_compra,:fecha_compra,:id_proveedor,:comprobante,:id_usuario,:precio_compra,:cantidad,:fyh_creacion)");

$sentencia->bindParam('id_producto',$id_producto);
$sentencia->bindParam('nro_compra',$nro_compra);
$sentencia->bindParam('fecha_compra',$fecha_compra);
$sentencia->bindParam('id_proveedor',$id_proveedor);
$sentencia->bindParam('comprobante',$comprobante);
$sentencia->bindParam('id_usuario',$id_usuario);
$sentencia->bindParam('precio_compra',$precio_compra);
$sentencia->bindParam('cantidad',$cantidad_compra);
$sentencia->bindParam('fyh_creacion',$fechaHora);

if($sentencia->execute()){

    //actualiza el stock desde la compra
    $sentencia = $pdo->prepare("UPDATE tb_almacen SET stock=:stock WHERE id_producto = :id_producto ");
    $sentencia->bindParam('stock',$stock_total);
    $sentencia->bindParam('id_producto',$id_producto);
    $sentencia->execute();

    $pdo->commit();

    session_start();
    // echo "se registro correctamente";
    $_SESSION['mensaje'] = "Se registro la compra de la manera correcta";
    $_SESSION['icono'] = "success";
    // header('Location: '.$URL.'/categorias/');
    ?>
    <script>
        location.href = "<?php echo $URL;?>/compras";
    </script>
    <?php
}else{


    $pdo->rollBack();

    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";
    //  header('Location: '.$URL.'/categorias');
    ?>
    <script>
        location.href = "<?php echo $URL;?>/compras/create.php";
    </script>
    <?php
}






