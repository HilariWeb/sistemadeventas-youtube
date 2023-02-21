<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 20/1/2023
 * Time: 09:06
 */
if( (isset($_SESSION['mensaje'])) && (isset($_SESSION['icono'])) ){
    $respuesta = $_SESSION['mensaje'];
    $icono = $_SESSION['icono'];
    ?>
    <script>
        Swal.fire({
            position: 'top-end',
            icon: '<?php echo $icono; ?>',
            title: '<?php echo $respuesta;?>',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
    <?php
    unset($_SESSION['mensaje']);
    unset($_SESSION['icono']);
}
?>