<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "i-lunch";

$conn = new mysqli($host, $user, $pass, $db) or die("Error al conectar a la DB " . mysqli_error($link));