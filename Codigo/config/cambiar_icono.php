<?php

include_once 'database.php';

    $db = new Database();
    $con = $db->conectar();

if (isset($_GET['id']) && isset($_GET['id_icono'])) {
    $id_nota = $_GET['id'];
    $id_icono = $_GET['id_icono'];

    $sql = $con->prepare("UPDATE notas SET id_icono = :id_icono WHERE id_nota = :id_nota");
    $sql->bindParam(':id_icono', $id_icono, PDO::PARAM_INT);
    $sql->bindParam(':id_nota', $id_nota, PDO::PARAM_INT);
    $sql->execute();

    header ('Location: ../index.php' . '?id_nota=' . $id_nota);
    exit();
} else {
    header ('Location: ../index.php');
    exit();
}
?>
