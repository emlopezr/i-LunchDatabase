<?php
$paginaActiva = 0;
include "includes/header.php";
?>

<div class="mt-5">
    <!-- Información del trabajo -->
    <div class="row">
        <div class="col-1 px2"></div>

        <div class="col-6 px2">
            <img src="images/Logo.png" alt="Logo i-Lunch" class="img-fluid">
        </div>

        <div class="col-4 px2">
            <h1>Trabajo final de Bases de Datos I</h1>

            <!-- Integrantes -->
            <div class="mt-3">
                <h3>Integrantes</h3>
                <ul>
                    <li>Andrés Felipe Aparicio Mestre - <a href="mailto:anapariciom@unal.edu.co">anapariciom@unal.edu.co</a></li>
                    <li>David Esteban Toro Arango - <a href="mailto:datoro@unal.edu.co">datoro@unal.edu.co</a></li>
                    <li>Emmanuel López Rodríguez - <a href="mailto:emlopezr@unal.edu.co">emlopezr@unal.edu.co</a></li>
                </ul>
            </div>

            <!-- Informacion materia -->
            <div class="mt-3">
                <h3>Información</h3>
                <ul>
                    <li><b>Materia:</b> Bases de Datos I</li>
                    <li><b>Profesor: </b>Francisco Javier Moreno Arboleda</li>
                    <li><b>Institución:</b> Universidad Nacional de Colombia sede Medellín</li>
                    <li><b>Semestre:</b> 2022-1</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Consultas -->
    <div class="row mt-5">
        <div class="col-1 px2"></div>

        <div class="col-10 px2">
            <h2>Consultas</h2>

            <!-- Análogo a consulta 1 -->
            <!-- CostoTotal suma costo de todos los restaurantes asociados a una franquicia -->
            <!-- Mostrar NIT y nombre de las franquicias -->
            <!-- CostoTotal > 500 -->
            <!-- Franquicia es dueña de más de 2 restaurantes -->
            <!-- El administrador que gestiona la franquicia no gestiona ningún restaurante -->

            <form action="consultas/consulta_1.php" class="form-group mt-3" method="post">
                <!-- ! Falta una breve decoración/explicación de esta consulta -->
                
                <!-- Botón de consulta -->
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Consulta 1">
                </div>
            </form>
            
            <!-- Análogo a consulta 2 -->
            <!-- Mostrar NIT y valoración comercial de los restaurantes -->
            <!-- Valoración comercial restaurante > Valoración comercial de la franquicia -->
            <!-- Administrador que gestiona el restaurante es el adminsitrador de la franquicia dueña  -->
            
            <form action="consultas/consulta_2.php" class="form-group mt-3" method="post">
                <!-- ! Falta una breve decoración/explicación de esta consulta -->
                
                <!-- Botón de consulta -->
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Consulta 2">
                </div>
            </form>
        </div>
    </div>

    <!-- Búsquedas -->
    <div class="row mt-5">
        <div class="col-1 px2"></div>

        <div class="col-10 px2">
            <h2>Búsquedas</h2>
        </div>
    </div>


</div>

<?php
include "includes/footer.php";
?>