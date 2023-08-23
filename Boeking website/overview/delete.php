<?php
    include "../includes/header.php";
    session_start();
    if (empty($_SESSION['name'])) {
        session_destroy();
        header("Location: ../index.php");
    }

    $sql = "DELETE FROM `houses` WHERE `id` = " . $_GET['id'];
    $result = mysqli_query($conn, $sql);
    header("Location: overview.php?id=" . $_GET['userid']);
?>