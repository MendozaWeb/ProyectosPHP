<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bienvenido a mi Pagina Web PHP</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="Vistas/Lib/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="Vistas/Lib/css/carga1.css">
        <link rel="stylesheet" type="text/css" href="Vistas/Lib/css/boton1.css">
        <link rel="stylesheet" type="text/css" href="Vistas/Lib/css/bootstrap-dialog.min.css">
        
        <script src="Vistas/Lib/js/jquery-1.10.1.min.js"></script>
        <script src="Vistas/Lib/js/jquery-3.2.1.min.js"></script>
        <script src="Vistas/Lib/js/jquery.min.js"></script>
        <script src="Vistas/Lib/js/bootstrap.min.js"></script>
        <script src="Vistas/Lib/js/bootstrap-dialog.min.js"></script>        
        <script src="Vistas/Lib/pjs/ajax_index.js"></script>
        
    </head>
    <body>
<!-------------------------------------Menu--------------------------------------------->
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="#">Logo</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Projects</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>

<!-------------------------------------Encabezado--------------------------------------------->
        <div class="jumbotron text-center">
            <h1>Bienvenido a mi Sistema</h1>
            <p>Mi sistema responsive php</p> 
        </div>

<!-------------------------------------Columnas--------------------------------------------->
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="row">
                        <h3><a href="#" onclick="getcargarURL('Vistas/VProducto.php?bus=Mostrar')" >Producto</a></h3>
                    </div>
                    <div class="row">
                        <h3><a href="#" onclick="getcargarURL('Vistas/VCategoria.php?bus=Mostrar')" >Categoria</a></h3>
                    </div>
                    <div class="row">
                        <h3><a href="#" onclick="getcargarURL('Vistas/VCliente.php?bus=Mostrar')" >Cliente</a></h3>
                    </div>
                     <div class="row">
                        <h3><a href="#" onclick="getcargarURL('Vistas/VMarca.php?bus=Mostrar')" >Marca</a></h3>
                    </div>
                    
                </div>
                
                <div id="tabla" class="col-sm-10">
                    <h3>Formularios</h3>
                    <p>Lista de proceso activos</p>
                </div>
            </div>
        </div>

<!-------------------------------------Cargador Invisible--------------------------------------------->
        <div id="warningGradientOuterBarG" style="display: none;">
            <div id="warningGradientFrontBarG" class="warningGradientAnimationG">
                <div class="warningGradientBarLineG"></div>
                <div class="warningGradientBarLineG"></div>
                <div class="warningGradientBarLineG"></div>
                <div class="warningGradientBarLineG"></div>
                <div class="warningGradientBarLineG"></div>
                <div class="warningGradientBarLineG"></div>
                <div class="warningGradientBarLineG"></div>
                <div class="warningGradientBarLineG"></div>
                <div class="warningGradientBarLineG"></div>
            </div>
        </div>

    </body>
</html>

