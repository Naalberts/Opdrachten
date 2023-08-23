<?php include "../includes/conn.php"; ?>
<?php include "../includes/header.php"; ?>

<nav class="navbar navbar-expand-lg bg-body-secondary">
    <div class="container-md">
        <div class="d-flex">
            <img class="logo" src="../logo.png">
        </div>
        <a class="btn btn-danger" href="../index.php">Uitloggen</a>
    </div>
</nav>
<form method="get">
    <table class="table mx-auto">
        <tr>
            <th>Naam</th>
            <th>Bezoek aan</th>
            <th>Tijd aankomst</th>
            <th>Tijd vertrek</th>
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
                echo "<td>" . $row['time_departure'] . "</td>";
                echo "<td>" . '<a class="btn btn-primary" href="logout.php?id=' . $row['id'] . ' ">Afmelden</a>' . "</td>";
                echo "<tr>";
                
            }
            ?>

        </tr>
    </table>
    <table class="table">
        <tr>
            <th>Naam</th>
            <th>Bezoek aan</th>
            <th>Tijd aankomst</th>
            <th>Tijd vertrek</th>
        </tr>
        <tr>
            <?php

            $sql = "SELECT * FROM `loggedout`";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['visiting'] . "</td>";
                echo "<td>" . $row['time_arrival'] . "</td>";
                echo "<td>" . $row['time_departure'] . "</td>";
                echo "<td>";
                echo "</td><tr>";	              
            }
            ?>

        </tr>
    </table>
</form>