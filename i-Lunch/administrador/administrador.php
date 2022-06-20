<?php
$paginaActiva = 1;
include "../includes/header.php"
?>

<div class="container mt-3">
    <div class="row">
        <div class="col-6 px-2">
            <!-- Recibir los datos e insertarlos en la BD-->
            <div class="card">
                  <!-- Título del contenedor -->
                <div class="card-header">
                    <b>Crear un administrador</b>
                </div>

                <!-- Cuerpo del contenedor -->
                <div class="card-body">
                    <!-- Formulario de inserción de datos -->
                    <form action="insert_admin.php" class="form-group" method="post">

                    <!-- Campos necesarios -->
                        <div name="taskOption" class="form-group">
                            <label for="tipo_id">Tipo de documento</label>
                            <select class="form-control" onchange="" name="tipo id" id="tipo_id">
                                <option value="CC">CC</option>
                                <option value="CE">CE</option>
                                <option value="PS">PS</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="numero_id">Número de documento</label>
                            <input type="number" name="numero id" id="numero_id" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nombres">Nombre(s)</label>
                            <input type="text" name="nombres" id="nombres" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Apellidos</label>
                            <input type="text" name="apellidos" id="apellidos" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input type="email" name="correo" id="correo" class="form-control">
                        </div>

                        <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="number" name="telefono" id="correo" class="form-control">
                            </div>
                        
                        <!--librerias para usar jquery-->
                        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
                        <!--controlador de los tipo radio-->

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Insertar">
                            <a href="administrador.php" class="btn btn-success">Reiniciar</a>
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