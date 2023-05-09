<?php

include_once 'database.php';

    $db = new Database();
    $con = $db->conectar();

if (isset($_GET['id'])) {
    $id_nota = $_GET['id'];

    $sql = $con->prepare("DELETE FROM notas WHERE id_nota = :id_nota");
    $sql->bindParam(':id_nota', $id_nota, PDO::PARAM_INT);
    $sql->execute();

    header ("Location: ../index.php");
    exit();
} else {
    header ("Location: ../index.php");
    exit();
}
?>
