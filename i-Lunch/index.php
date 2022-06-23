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

        <div class="col-5 px2">
            <h2>Consulta 1</h2>
            <p class="text-justify">Sea CostoTotal la suma de todos los costos de los restaurantes asociados a una franquicia. Se muestra el NIT y el nombre de las franquicias las cuales su CostoTotal es mayor a USD $500M, su franquicia dueña es dueña de 2 o más restaurantes y el administrador que gestiona la franquicia no gestiona ningún restaurante.</p>
            <a href="consultas/consulta_1.php" class="btn btn-primary">Realizar consulta</a>
        </div>

        <div class="col-5 px2">
            <h2>Consulta 2</h2>
            <p class="text-justify">Se muestra el NIT y la valoración comercial de los restaurantes los cuales su valoración comercial es mayor a la valoración comercial de su franquicia dueña y a su vez el administrador que gestiona el restaurante es el adminsitrador que gestiona la franquicia dueña.</p>
            <a href="consultas/consulta_2.php" class="btn btn-primary">Realizar consulta</a>
        </div>
    </div>

    <!-- Búsquedas -->
    <div class="row mt-5">
        <div class="col-1 px2"></div>

        <div class="col-5 px2">
            <h2>Búsqueda 1</h2>
        </div>

        <div class="col-5 px2">
            <h2>Búsqueda 2</h2>
            <p class="text-justify">El usuario ingresa dos números enteros n1 y n2, n1 ≥ 0, n2 > n1. Se muestra el nit y el nombre de todas las franquicias que son dueñas de entre n1 y n2 restaurantes (intervalo cerrado [n1, n2]).</p>
            <a href="busquedas/busqueda_2.php" class="btn btn-primary">Realizar busqueda</a>
        </div>
    </div>


</div>

<?php
include "includes/footer.php";
?>