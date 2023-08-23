<?php

include "../includes/header.php";
session_start();

if (empty($_SESSION['name'])) {
    session_destroy();
    header("Location: ../index.php");
}

?>

<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">DreamGetaways</span>
        <a class="d-flex btn btn-primary" href="../userportal/userportal.php">Home</a>
    </div>
</nav>
<div class="container">
    <div class="row mb-5"></div>
    <div class="row mb-5"></div>
    <div class="row">
        <h1 class="text-center">Mijn huizen</h1>
    </div>
    <div class="row text-center">
        <table class="table table-striped mt-4">
            <tr>
                <td>Locatie</td>
                <td>Prijs</td>
                <td>Begin datum</td>
                <td>Eind datum</td>
                <td>Upload datum</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>

            <?php
            $sql = "SELECT * FROM `houses` WHERE `user_id`=" . $_GET['id'];
            $result = mysqli_query($conn, $sql);


            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['location'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['stay_begin'] . "</td>";
                echo "<td>" . $row['stay_end'] . "</td>";
                echo "<td>" . $row['time_post'] . "</td>";
                echo '<td>' . '<a href="edit.php?id=' . $row['id'] . "&userid=" . $_GET['id'] . ' "><button class="btn btn-primary">edit</button></a>' . '</td>';
                echo '<td>' . '<a href="delete.php?id=' . $row['id'] . "&userid=" . $_GET['id'] . ' "><button class="btn btn-danger">delete</button></a>' . '</td>';
                echo "<tr>";
            }
            echo "</table>";
            ?>
    </div>
    <div class="mb-5"></div>
    <div class="mb-5"></div>
    <div class="text-center">
        <h1>Gehuurde huisjes</h1>
    </div>
    <div class="row text-center">
        <table class="table table-striped mt-4">
            <tr>
                <td>Locatie</td>
                <td>Prijs</td>
                <td>Aantal personen</td>
                <td>Begin datum</td>
                <td>Eind datum</td>
                <td>Plaats review</td>
                <td>Cancel</td>
            </tr>

            <?php
            $sql = "SELECT * FROM `houses` WHERE `user_rented_id`=" . $_GET['id'];
            $result = mysqli_query($conn, $sql);

            if (isset($_POST['cancel'])) {
                echo 'post';
                $sql = "UPDATE `houses` SET `user_rented_id` = NULL, `rented` = 0";
                $result = mysqli_query($conn, $sql);
            }

            $amountResult = mysqli_query($conn, "SELECT COUNT(*) as total_rows FROM `houses` WHERE `user_rented_id`=" . $_GET['id']);
            $row = mysqli_fetch_assoc($amountResult);
            $totalRows = $row['total_rows'];

            if ($totalRows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['location'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>" . $row['total_people'] . "</td>";
                    echo "<td>" . $row['stay_begin'] . "</td>";
                    echo "<td>" . $row['stay_end'] . "</td>";
                    echo "<td><a class='btn btn-primary' href='review.php?id=" . $_GET['id'] . "&houseid=" . $row['id'] . "'>Plaats review</a></td>";
                    echo "<td><form method='post'><button type='submit' name='cancel' class='btn btn-danger'>Cancel</button></form></td>";
                    echo "<tr>";
                }
                echo "</table>";
            } else {
                echo "</table>";
           }

            ?>
    </div>
</div>