<?php
if(isset($_POST['g-recaptcha-response'])  &&  $_POST['g-recaptcha-response'])
{
    $secret = "6LcLvwcUAAAAAMPNQ5HI1-vX2mDAOyWAmYszfWSz";
    $ip = $_SERVER['REMOTE_ADDR'];
    $captcha = $_POST['g-recaptcha-response'];
    $rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip$ip");
    $arr = json_decode($rsp, TRUE);
    if ($arr['success'])
    {
        session_start();
        include("conexion.php");
        /*Validamos que esten todos los campos requeridos del formulario*/
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ((empty($_POST["txtUserName"])) || (empty($_POST["txtpassword"]))) {
                echo "<!DOCTYPE html>";
                echo "<html>";
                echo "<body style='background-color: #212121;color: #FAFAFA'>";
                echo "<b style='color: #F44336'>ERROR: </b>Favor de llenar todos los campos.";
                echo "</body>";
                echo "</html>";
            } else {
                $usr = $_POST['txtUserName'];
                $psw = $_POST['txtpassword'];
                /*Validacion con expresiones reulares*/
                if ((preg_match("/^[a-zA-Z0-9._ñÑ ]*$/", $usr)) && (preg_match("/^[a-zA-Z0-9._ñÑ ]*$/", $psw))) 
                {
                      
                    $con = mysqli_connect($host, $user, $pw) or die ("Problemas con el servidor de la base de datos.");
                    mysqli_select_db($con, $db);
                    $sqlCommand = "SELECT Username,password FROM reminders_users WHERE Username='$usr'";
                    $query = mysqli_query($con, $sqlCommand) or die(mysqli_error("Fallo en la consulta a la base de datos."));
                    $sesion = mysqli_fetch_array($query);
                    if ($psw == $sesion['password']) 
                    {
                        /*VARIABLE GLOBAL $_SESSION[]*/
                        $_SESSION['username'] = $_POST['user'];
                        $_SESSION["username"] = "SI";
                        $_SESSION['usuario'] = $_POST['user'];
                      
                        header("location:../index.php");
                    } else {
                        echo "<!DOCTYPE html>";
                        echo "<html>";
                        echo "<body style='background-color: #212121;color: #FAFAFA'>";
                        echo "<b style='color: #F44336'>ERROR: </b>El usuario o contraseña son incorrectos.";
                        echo "</body>";
                        echo "</html>";
                    }
                } else {
                    echo "<!DOCTYPE html>";
                    echo "<html>";
                    echo "<body style='background-color: #212121;color: #FAFAFA'>";
                    echo "<b style='color: #F44336'>ERROR: </b>Los campos solo pueden contener letras, numeros, '_' y '.' ";
                    echo "</body>";
                    echo "</html>";
                }
            }
        }
    }else{
        echo "FAIL.";
    }
}else{
    echo "<!DOCTYPE html>";
    echo "<html>";
    echo "<body style='background-color: #212121;color: #FAFAFA'>";
    echo "<b style='color: #F44336'>ERROR: </b>Favor de llenar Captcha.";
    echo "</body>";
    echo "</html>";
}
?>