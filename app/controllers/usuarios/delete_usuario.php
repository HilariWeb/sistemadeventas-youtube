<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 20/1/2023
 * Time: 10:19
 */

include ('../../config.php');

    $id_usuario = $_POST['id_usuario'];

    $sentencia = $pdo->prepare("DELETE FROM tb_usuarios WHERE id_usuario=:id_usuario ");

    $sentencia->bindParam('id_usuario',$id_usuario);
    $sentencia->execute();
    session_start();
    $_SESSION['mensaje'] = "Se elimino al usuario de la manera correcta";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'/usuarios/');

