<?php include "../includes/header.php"; ?>
<?php include "../includes/conn.php"; ?>

<nav class="navbar navbar-expand-lg bg-body-secondary">
    <div class="container-md">
        <div class="d-flex">
            <img class="logo" src="../logo.png">
        </div>
        <div class="d-flex">
            <a href="../index.php"><button class="btn btn-danger">Terug</button></a>
        </div>
    </div>
</nav>
<form>
<table class="table mx-auto">
    <tr>
        <th>Naam</th>
        <th>bezoek aan</th>
        <th>Tijd aankomst</th>
        <th>Afmelden</th>
    </tr>
    <tr>
        <?php

        $sql = "SELECT * FROM `guest`";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['visiting'] . "</td>";
            echo "<td>" . $row['time_arrival'] . "</td>";
            echo "<td>" . '<a class="btn btn-primary" href="../logout/logout.php?id=' . $row['id'] . ' ">Afmelden</a>' . "</td>";
            echo "<tr>";
        }
        ?>
    </tr>
</table>

</form>