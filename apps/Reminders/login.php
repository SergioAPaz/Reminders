<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <img class="img-circle img-thumbnail" style="background-color: #3F51B5;border: 2px solid #3F51B5" src="img/r.jpg" alt="">
                            <br><br><br>
                        </div>

                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="login-form-link">Iniciar sesión</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" id="register-form-link">Registrate</a>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <!--PESTAÑA DE LOGIN-->
                                <form id="login-form" action="backend/verificar.php" method="post" role="form" style="display: block;">
                                    <div class="form-group">
                                        <input type="text" name="txtUserName" id="txtusername" tabindex="1" class="form-control" placeholder="Usuario" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="txtpassword" id="txtpassword" tabindex="2" class="form-control" placeholder="Contraseña">
                                    </div>
                                    <br>
                                    <div class="row" style="text-align: center">
                                        <div class="g-recaptcha" style="display: inline-block;" data-sitekey="6LcLvwcUAAAAAIOteZTbpwX3TZHVzarl0Wpr93ox"></div>

                                    </div>

                                    <br>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Ingresar">
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <!--PESTAÑA DE REGISTRO-->
                                <form id="register-form" action="backend/SaveUser.php" method="post" role="form" style="display: none;">
                                    <div class="form-group">
                                        <input type="text" name="txtname" id="name" tabindex="1" class="form-control" placeholder="Nombre" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="txtemail" id="email" tabindex="1" class="form-control" placeholder="Email" value="">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <input type="text" name="txtUserName" id="UserName" tabindex="1" class="form-control" placeholder="Nombre de usuario" value="">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="txtpassword" id="password" tabindex="2" class="form-control" placeholder="Contraseña">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirmar contraseña">
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Registrar Ahora">
                                                </div>
                                            </div>
                                        </div>
                                </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../../vendor/jquery/jquery.min.js"></script>
        <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</body>

</html>