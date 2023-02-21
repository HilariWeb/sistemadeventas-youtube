<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 25/1/2023
 * Time: 14:32
 */

include ('../../config.php');

$nombre_categoria = $_GET['nombre_categoria'];

$sentencia = $pdo->prepare("INSERT INTO tb_categorias
       ( nombre_categoria, fyh_creacion) 
VALUES (:nombre_categoria,:fyh_creacion)");

$sentencia->bindParam('nombre_categoria',$nombre_categoria);
$sentencia->bindParam('fyh_creacion',$fechaHora);
if($sentencia->execute()){
    session_start();
   // echo "se registro correctamente";
    $_SESSION['mensaje'] = "Se registro la categoría de la manera correcta";
    $_SESSION['icono'] = "success";
   // header('Location: '.$URL.'/categorias/');
    ?>
    <script>
        location.href = "<?php echo $URL;?>/categorias";
    </script>
    <?php
}else{
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";
  //  header('Location: '.$URL.'/categorias');
    ?>
    <script>
        location.href = "<?php echo $URL;?>/categorias";
    </script>
    <?php
}
