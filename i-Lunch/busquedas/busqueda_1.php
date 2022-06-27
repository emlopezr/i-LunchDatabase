<?php
$paginaActiva = 0;
include "../includes/header.php";
?>

<div class="mt-5">
    <div class="row">
        <div class="col-1 px2"></div>

        <div class="col-4 px-2">
            <h2>Busqueda 1</h2>
            <p class="text-justify">El usuario ingresa dos fechas F1 y F2 y un número entero N. Se cumple que F1 ≤ F2 y 0 ≤ N. Se muestran los nombres y el telefono de todos los administradores que son gestores de exactamente N restaurantes y dichos restaurantes han abierto el rango de fechas [F1, F2].</p>
            <a href="../index.php" class="btn btn-primary">Regresar a la pagina principal</a>
        </div>

        <!-- Recibir los datos e insertarlos en la BD-->
        <div class="col-6 px-2">
            <!-- Contenedor -->
            <div class="card">
                <!-- Titulo del contenedor -->
                <div class="card-header">
                    <b>Datos necesarios</b>
                </div>

                <!-- Cuerpo del contenedor -->
                <div class="card-body">
                    <!-- Formulario de insercion de datos -->
                    <form action="buscar_1.php" class="form-group" method="post">

                        <!-- Campos necesarios -->
                        <div class="form-group">
                            <label for="n1">F1</label>
                            <input type="date" name="f1" id="f1" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="n2">F2</label>
                            <input type="date" name="f2" id="f2" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="nr">N</label>
                            <input type="number" name="nr" id="nr" class="form-control" min="0" max="9999999999" required>
                        </div>

                        <!-- Boton de envio -->
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Consultar">
                        </div>
                </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>


<?php
include "../includes/footer.php"
?>