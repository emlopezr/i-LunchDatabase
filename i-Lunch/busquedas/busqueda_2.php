<?php
$paginaActiva = 0;
include "../includes/header.php";
?>

<div class="mt-5">
    <div class="row">
        <div class="col-1 px2"></div>

        <div class="col-4 px-2">
            <h2>Busqueda 2</h2>
            <p class="text-justify">El usuario ingresa dos numeros enteros N1 y N2. Se cumple que 0 ≤ N1 < N2. Se muestra el NIT y el nombre de todas las franquicias que son dueñas de entre N1 y N2 restaurantes (Intervalo cerrado [N1, N2]).</p>
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
                    <form action="buscar_2.php" class="form-group" method="post">

                        <!-- Campos necesarios -->
                        <div class="form-group">
                            <label for="n1">N1</label>
                            <input type="number" name="n1" id="n1" class="form-control" min="0" max="999999999" required>
                        </div>

                        <div class="form-group">
                            <label for="n2">N2</label>
                            <input type="number" name="n2" id="n2" class="form-control" min="0" max="9999999999" required>
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