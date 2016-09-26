<?php
include("BloqueDeSeguridadNewUser.php");
include("conexion.php");
/*Validamos que esten todos los campos requeridos del formulario*/
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if ((empty($_POST["txtnombre"])) || (empty($_POST["txtapellido"])) || (empty($_POST["txtusuario"])) || (empty($_POST["txtcontrasena"])) || (empty($_POST["txtrol"])))
    {
        {
            echo "<!DOCTYPE html>";
            echo  "<html>";
            echo  "<body style='background-color: #212121;color: #FAFAFA'>";
            echo "<b style='color: #F44336'>ERROR: </b>Favor de llenar todos los campos.";
            echo "</body>";
            echo "</html>";
        }
    }
    else
    {
        /*Valida que las variables de los campos se transformen en entidades HTML*/
        $txtnombre = $_POST['txtnombre'];
        $txtapellido = $_POST['txtapellido'];
        $txtusuario = $_POST['txtusuario'];
        $txtcontrasena = $_POST['txtcontrasena'];
        $txtrol = $_POST['txtrol'];
        /*Validacion con expresiones reulares*/
        if (    (preg_match("/^[a-zA-Z0-9,._ñÑ ]*$/", $txtnombre))  &&     (preg_match("/^[a-zA-Z0-9,._ñÑ ]*$/", $txtapellido))   &&  (preg_match("/^[a-zA-Z0-9,._ñÑ ]*$/", $txtusuario))     &&
             (preg_match("/^[a-zA-Z0-9,._ñÑ ]*$/", $txtcontrasena))    &&  (preg_match("/^[a-zA-Z0-9,._ñÑ ]*$/", $txtrol)))
        {
            $insert = <<<SQL
INSERT INTO users SET Nombre='$txtnombre',Apellido='$txtapellido',USER='$txtusuario',PW='$txtcontrasena',Rol='$txtrol'
SQL;
            mysqli_query($conexiondb, $insert) or die ("Error al registrar usuario o usuario ya existente.");
            /*mysqli_query($conexiondb,$insert) or die ("Error al registrar usuario o usuario ya existente.".mysqli_error());*/
            header("Location:../NuevosUsuarios.php");
        }
        else
        {
            echo "<!DOCTYPE html>";
            echo  "<html>";
            echo  "<body style='background-color: #212121;color: #FAFAFA'>";
            echo "<b style='color: #F44336'>ERROR: </b>Los campos solo pueden contener letras, numeros y _ , .";
            echo "</body>";
            echo "</html>";
        }
    }
}
?>