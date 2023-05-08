<?php

    require 'database.php';
    $db = new Database();
    $con = $db->conectar();

    $sql = "SELECT * FROM notas";

    $texto = $_POST['reg_texto'];
    $id_nota = $_POST['reg_id_nota'];

    $insert = $con->prepare("UPDATE notas SET texto = :texto WHERE id_nota = :id_nota");

    $insert->bindParam(':texto', $texto);
    $insert->bindParam(':id_nota', $id_nota);

    if ($insert->execute()) {
        echo "datos guardos perfectamente";
    } else {
        echo "error al guardar datos";
    }

    header ("Location: http://localhost/FCT/index.php" . "?id_nota=" . $id_nota);
    exit();

?>
