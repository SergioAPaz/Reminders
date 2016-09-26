<?php
session_start();
//COMPRUEBA QUE EL USUARIO ESTA AUTENTICADO Y ES UN USUARIO ADMINISTRADOR
if ($_SESSION["username"] != "SI" or  $_SESSION["RolCuenta"] != "Administrador")
{
    header("Location: ../login.php");
    exit();
}
?>