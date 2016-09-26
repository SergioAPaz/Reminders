<?php
include("conexion.php");
/*Validamos que esten todos los campos requeridos del formulario*/
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (    (empty($_POST["txtname"])) || (empty($_POST["txtemail"])) || (empty($_POST["txtUserName"])) || (empty($_POST["txtpassword"]))   )
    {
            echo "<!DOCTYPE html>";
            echo "<html>";
            echo "<body style='background-color: #212121;color: #FAFAFA'>";
            echo "<b style='color: #F44336'>ERROR: </b>Favor de llenar todos los campos.";
            echo "</body>";
            echo "</html>";
    }
    else
    {
        /*Valida que las variables de los campos se transformen en entidades HTML*/
        $txtname = $_POST['txtname'];
        $txtemail = $_POST['txtemail'];
        $txtUserName = $_POST['txtUserName'];
        $txtpassword = $_POST['txtpassword'];
        /*Validacion con expresiones reulares*/
    if (    (preg_match("/^[a-zA-Z,._ñÑ ]*$/",$txtname))&&(preg_match("/^[a-zA-Z0-9@._ñÑ ]*$/",$txtemail))&&(preg_match("/^[a-zA-Z,._ñÑ ]*$/",$txtUserName))&&
        (preg_match("/^[a-zA-Z0-9,._ñÑ ]*$/",$txtpassword))    )
        {
            $insert = <<<SQL
INSERT INTO reminders_users SET Name='$txtname',Email='$txtemail',Username='$txtUserName',password='$txtpassword'
SQL;
            mysqli_query($conexiondb, $insert) or die ("Error al registrar usuario o usuario ya existente.");
            /*mysqli_query($conexiondb,$insert) or die ("Error al registrar usuario o usuario ya existente.".mysqli_error());*/
            header("Location:../login.php");
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