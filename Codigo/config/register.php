<?php

    require 'database.php';
    $db = new Database();
    $con = $db->conectar();

    $sql = "SELECT * FROM notas";

    $titulo = $_POST['reg_titulo'];
    $fecha = $_POST['reg_fecha'];
    $id_nota = rand(1, 99999);
    $texto = "";
    $id_icono = 1;

    $insert = $con->prepare("INSERT INTO notas(id_nota, titulo, fecha, texto, id_icono) VALUES (:id_nota, :titulo, :fecha, :texto, :id_icono)");

    $insert->bindParam(':id_nota', $id_nota);
    $insert->bindParam(':titulo', $titulo);
    $insert->bindParam(':fecha', $fecha);
    $insert->bindParam(':texto', $texto);
    $insert->bindParam(':id_icono', $id_icono);

    if ($insert->execute()) {
        echo "datos guardos perfectamente";
    } else {
        echo "error al guardar datos";
    }

    header ("Location: http://localhost/FCT/index.php");
    exit();

?>
