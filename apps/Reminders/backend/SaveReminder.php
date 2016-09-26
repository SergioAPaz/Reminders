<?php
include("conexion.php");

        /*Validamos que esten todos los campos requeridos del formulario*/
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if ((empty($_POST["txttitulo"])) || (empty($_POST["txtdesc"])) || (empty($_POST["txthora"])) || (empty($_POST["txtminutos"])) ) {
                {
                    echo "<!DOCTYPE html>";
                    echo "<html>";
                    echo "<body style='background-color: #212121;color: #FAFAFA'>";
                    echo "<b style='color: #F44336'>ERROR: </b>Favor de llenar todos los campos.";
                    echo "</body>";
                    echo "</html>";
                }
            } else {
                $inputtitulo = $_POST['txttitulo'];
                $inputdescripcion = $_POST['txtdesc'];
                $inputhora = $_POST['txthora'];
                $inputminutos = $_POST['txtminutos'];
                /*Validacion con expresiones reulares*/
                if ((preg_match("/^[a-zA-Z0-9._ñÑáéíóú ]*$/", $inputtitulo)) && (preg_match("/^[a-zA-Z0-9@._ñÑ ]*$/", $inputdescripcion)) && (preg_match("/^[\n\r0-9 ]+$/", $inputhora))&& (preg_match("/^[\n\r0-9 ]+$/", $inputminutos))) {
                    /*ENVIO DE EMAIL A ADMIN*/
                    require '../assets/php/PHPMailer/PHPMailerAutoload.php';
                    $consulta=<<<SQL
SELECT Email FROM emailadmins;
SQL;
                    $mail = new PHPMailer;
                    //$mail->SMTPDebug = 2;                               // Enable verbose debug output
                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'reminders.web@gmail.com';                 // SMTP username
                    $mail->Password = 'dsf64sdf651sd';                           // SMTP password
                    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 587;                                    // TCP port to connect to
                    $mail->setFrom('reminders.web@gmail.com', 'Reminders Admin');
                    $filas= mysqli_query($conexiondb,$consulta);
                    while($columna=mysqli_fetch_assoc($filas)) {
                        $mail->addAddress($columna['Email'], 'Administrador');     // Add a recipient
                    }
                    $mail->isHTML(false);                                  // Set email format to HTML
                    $mail->Subject = 'Nuevo recordatorio creado';
                    $mail->Body    = "<span style='font-size: 25px'><b>Tienes un nuevo recordatorio:</b></span><br><br>Titulo: <b>$inputtitulo</b> <br><br>Descripcion: <b>$inputdescripcion</b> <br><br> Hora: <b>$inputhora</b><br><br> 
                                <b>REMINDERS..<b>   ";
                    $mail->AltBody = "<span style='font-size: 25px'><b>Tienes un nuevo recordatorio:</b></span><br><br>Titulo: <b>$inputtitulo</b> <br><br>Descripcion: <b>$inputdescripcion</b> <br><br> Hora: <b>$inputhora</b><br><br> 
                                <b>REMINDERS..<b>   ";
                    if(!$mail->send()) {
                    } else {
                    }
                    /*FIN DE ENVIO DE NOTIFICACION POR EMAIL*/
                    $insert = <<<SQL
INSERT INTO recordatorios SET Titulo='$inputtitulo',Descripcion='$inputdescripcion',Hora='$inputhora',Minutos='$inputminutos'
SQL;
                    mysqli_query($conexiondb, $insert) or die ("Error al ingresar comentario");
                    header("Location: ../panel.php");
                } else {
                    echo "<!DOCTYPE html>";
                    echo "<html>";
                    echo "<body style='background-color: #212121;color: #FAFAFA'>";
                    echo "<b style='color: #F44336'>ERROR: </b>Los campos solo pueden contener letras, numeros y _ , .";
                    echo "</body>";
                    echo "</html>";
                }
            }
        }
   
   
?>