<?php

include("conexion.php");

if (isset($_POST['register'])){


if (strlen($_POST['Id_proveedor']) >=1 &&
    strlen($_POST['Nom_proveedor']) >=1 &&
    strlen($_POST['Tel_proveedor']) >=1 &&
    strlen($_POST['Email_proveedor']) >=1 &&
    strlen($_POST['Direccion_Proveedor']) >=1 &&
    strlen($_POST['date_add']) >=1 &&
    strlen($_POST['usuario_id']) >=1 &&
    strlen($_POST['estatus']) >=1 ) {

     

        $id_proveedor = trim ($_POST['Id_proveedor']) ;
        $nombre = trim($_POST['Nom_proveedor']);
        $telefono = trim( $_POST['Tel_proveedor']);
        $email = trim($_POST['Email_proveedor']) ;
        $direccion = trim($_POST['Direccion_Proveedor']);
        $date_add = date("d/m/y");
        $usuario_prov = trim($_POST['usuario_id']);
        $estado = trim($_POST['estatus']) ;
        $consulta = "INSERT INTO proveedor(Id_proveedor, Nom_proveedor, Tel_proveedor, Email_proveedor, Direccion_Proveedor, date_add, usuario_id, estatus) VALUES ('$id_proveedor','$nombre','$telefono','$email','$direccion','$date_add','$usuario_prov','$estado')";

        $resultado = mysqli_query($conex, $consulta);
        if ($resultado){
            ?>
        <h3 class="">Proveedor registrado correctamente</h3>
            <?php
        } else{

            ?>
            <h3 class="bad">Error al registrar</h3>
            <?php

        }
    } else {
        ?>
        <h3 class="bad">Por favor complete todos los campos</h3>
        <?php

    }
}
?>