<?php
/* Conectar a una base de datos de MySQL invocando al controlador */
$dsn = 'mysql:dbname=sistematec;host=127.0.0.1;charset=utf8';
$usuario = 'root';
$password= '';

try {
    $conexion = new PDO ($dsn, $usuario, $password);
   } catch (PDOException $e) {
    echo 'Falló la conexión: ' . $e->getMessage();
}
