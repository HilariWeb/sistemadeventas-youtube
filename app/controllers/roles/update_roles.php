<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 23/1/2023
 * Time: 20:04
 */

$id_rol_get = $_GET['id'];

$sql_roles = "SELECT * FROM tb_roles where id_rol = '$id_rol_get' ";
$query_roles = $pdo->prepare($sql_roles);
$query_roles->execute();
$roles_datos = $query_roles->fetchAll(PDO::FETCH_ASSOC);

foreach ($roles_datos as $roles_dato){
    $rol = $roles_dato['rol'];
}