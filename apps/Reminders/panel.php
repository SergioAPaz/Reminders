<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/panel.css" rel="stylesheet">
    </head>

<body style="background-color: #424242">
    <header style="position: relative">
    <!-- Static navbar -->
        <nav class="navbar navbar-default navbar-static-top" style="position: fixed;min-width: 100%;box-shadow: 0px 7px 7px rgba(0,0,0,0.5);background-color: #222">
        <div class="container">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img class="navbar-brand" src="img/r.jpg" alt="">
            </div>
            <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Panel</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mi cuenta <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                </ul>
                </li>
                <li><a href="../navbar-fixed-top/">About</a></li>
            </ul>
            </div><!--/.nav-collapse -->
        </div>
        </nav>
    </header>

<br><br><br>

<!--FORMULARIO DE NUEVo recordatorio-->
<div class="container"  style="background-color: #EEEEEE;height: 100%;margin-top: -9px">
    <br/>
    <div class="panel panel-default">
        <div class="panel-body">
            <p class="alert fondo456" style="font-size: 20px;background-color: #3F51B5;color: #ffffff"><span class="newarticle">Nuevo recordatorio</span><span style="color: transparent">.</span>
            </p>
            <form role = "form" method="post" action="GuardRecord.php" >
                <div class = "form-group">
                    <input type='text' name='txtgaleria' id='txtgaleria' hidden>
                    <label class="text-muted" for = "name">Titulo del recordatorio:</label>
                    <input type="text" name="txttitulo" class="form-control" placeholder="Titulo..." maxlength="200"  pattern="^\s*[a-zA-Z0-9ñÑ-_.,\s]+\s*" required>
                    <br/>
                    <label class="text-muted" for = "name">Mensaje:</label>
                    <textarea rows="5"  class = "form-control" name="txtdesc" placeholder = "Descripcion..."  maxlength="500"        pattern="^\s*[a-zA-Z0-9ñÑ-_.,\s]+\s*" required></textarea>
                    <br/>
                </div>
                 <label class="text-muted" for = "name">Hora de recordatorio: (24hrs)</label>
                <div class="form-inline">
                    <div class="form-group">
            
                        <input type="number" name="txthora" class="form-control" id="exampleInputEmail3" placeholder="Hora">
                    </div>
                    <div class="form-group">
                        
                        <input type="number" name="txtminutos" class="form-control" id="exampleInputPassword3" placeholder="Minutos">
                    </div>
                    
                   </div>
                <hr>
                <button id="btnagregar" type = "submit" class = "btn btn-primary">Agregar</button>
                <button type = "reset" class = "btn btn-primary" onclick="deshabilitar()">Limpiar</button>
                 </form>
         </div>
    </div>

    <!--TABLA DE EXISTENCIAS-->
    <div class="panel panel-default">
        <div class="panel-body">
                <p class="alert fondo456" style="font-size: 20px;background-color: #3F51B5;color: #ffffff"><span>Mis recordatorios</span></p>
            <div class="table-responsive" style="border-radius: 10px;margin-top: 12px">
                <table class="table  table-bordered table-hover table-condensed tab" id="regTable"  style="background-color: #ffffff;text-align: center;vertical-align: middle;">
                    <thead>
                        <tr style="background-color: #F5F5F5">
                            <th style="font-size: 14px;color: #F57C00">Recordatorio</th>
                            <th style="font-size: 14px;color: #F57C00">Descripcion</th>
                            <th style="font-size: 14px;color: #F57C00">Hora</th>
                            <th style="font-size: 14px;color: #F57C00">Minutos</th>
                            <th style="font-size: 14px;color: #F57C00">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
<br><br><br><br><br>
<br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</div>

<footer class="">
  <div class="container-fluid largo">
      
  </div>
</footer>

 <script src="../../vendor/jquery/jquery.min.js"></script> 
    <!-- Bootstrap Core JavaScript -->
  <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
 <script src="assets/js/panel.js"></script>
    </body>
</html>