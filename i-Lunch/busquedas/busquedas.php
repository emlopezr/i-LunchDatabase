<!-- En esta pagina puede encontrar mas informacion acerca de la estructura de un documento html 
    http://www.iuma.ulpgc.es/users/jmiranda/docencia/Tutorial_HTML/estruct.htm-->
<!DOCTYPE html>
<html lang="en">
<!--cabecera del html -->

<head>
    <!--configuraciones basicas del html-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--titrulo de la pagina-->
    <title>inicio</title>
    <!--CDN de boostraps: Libreria de estilos SCSS y CSS para darle unas buena apariencia a la aplicacion
        para mas informacion buscar documentacion de boostraps en: https://getbootstrap.com/docs/4.3/getting-started/introduction/ -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--CDN de forntawesome: Libreria de estilos SCSS y CSS incluir iconos y formas 
         para mas informacion : https://fontawesome.com/start-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    <!--Barra de navegacion-->
    <ul class="nav">
        <li class="nav nav-item">
            <a class="nav-link " href="../index.html">Inicio</a>
        </li>
        <li class="nav ">
            <a class="nav-link " href="../personas/personas.php">Personas</a>
        </li>
        <li class="nav">
            <a class="nav-link" href="../facturas/facturas.php">Facturas</a>
        </li>
        <li class="nav-item nav-pills">
            <a class="nav-link active" href="busquedas.php">Busquedas</a>
        </li>
    </ul>
    <div class="container">
        <div class="row my-2">
            <div class="col-6">
                <p>Para realizar una busqueda de facturas primero selecciona y llena los parametros de la busqueda.</p>
                <form action="buscar.php" target="_blank"  method="POST">
                    <div class="form-group">
                        <label for="">Parametros:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                value="comprador" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Identificacion del Comprador
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                                value="factura">
                            <label class="form-check-label" for="exampleRadios2">
                                Codigo de la Factura
                            </label>
                        </div>
                    </div>
                    <div class="input-group ">
                        <input type="text" name="identificacion" id="identificacion" class="form-control">
                        <button class="btn  btn-primary"  title="Buscar" type="submit">
                            <i class="fas fa-search-plus mx-0 my-0"> </i></button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>




</body>

</html>