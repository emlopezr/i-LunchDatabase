<?php
$paginaActiva = 0;
include "../includes/header.php";
?>

<div class="mt-5">
    <div class="row">
        <!-- Separación. No es la forma más ortodoxa, pero sirve -->
        <div class="col-1 px2" style="width: 4.166666665%; flex: 0 0 4.166666665%; max-width: 4.166666665%;"></div>

        <!-- Recibir los datos e insertarlos en la BD-->
        <div class="col-3 px-2">
            <!-- Contenedor -->
            <div class="card">
                <!-- Título del contenedor -->
                <div class="card-header">
                    <b>Datos necesarios</b>
                </div>

                <!-- Cuerpo del contenedor -->
                <div class="card-body">
                    <!-- Formulario de inserción de datos -->
                    <form action="buscar2.php" class="form-group" method="post">

                        <!-- Campos necesarios -->
                        <div class="form-group">
                            <label for="n1">N1</label>
                            <input type="number" name="n1" id="n1" class="form-control" min="0" max="999999999" required>
                        </div>

                        <div class="form-group">
                            <label for="n2">N2</label>
                            <input type="number" name="n2" id="n2" class="form-control" min="0" max="9999999999" required>
                        </div>


                            </select>
                        </div>

                        <!-- Botón de envío -->
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Consultar">
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