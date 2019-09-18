<?php
require 'conexion.php';

try {
    $sql = $conexion->prepare ("INSERT INTO evalingles (ing1,ing2,ing3,ing4,ing5,ing6,ing7,ing8,ing9,ing10)
        VALUES ('" . $_POST['ing1'] . "' , 
        '" . $_POST['ing2'] . "' ,
         '" . $_POST['ing3'] . "' , 
        '" . $_POST['ing4'] . "' , 
        '" . $_POST['ing5'] . "' , 
        '" . $_POST['ing6'] . "' , 
        '" . $_POST['ing7'] . "',
        '" . $_POST['ing8'] . "',
        '" . $_POST['ing9'] . "',
        '" . $_POST['ing10'] . "')");
    echo $sql->execute();
    
} catch (Exception $e) {
    echo '!Error al guardar: ', $e->getMessage(), "\n";
    die();
}
    
?>