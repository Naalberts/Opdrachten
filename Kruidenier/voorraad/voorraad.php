<?php include '../includes/head.php' ?>

<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <img class="imgMar" src="../logol.png" alt="">
        <form class="d-flex position-absolute top-0 start-50 translate-middle mt-4" method="post">
            <input class="form-control me-2 searchMar" type="text" placeholder="Search" aria-label="Search" name="search">
            <input type="submit" name="Aanpassen" class="btn btn-outline-success searchMar">
        </form>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card w-25 mt-3 mx-auto">
                <div class="card-body">
                    <a href="toevoegen.php"><button class="btn btn-primary">Toevoegen</button></a>
                    <a href="../Main/main.php"><button class="btn btn-danger">Terug</button></a>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col">
            <table class="table table-success table-striped mt-4">
                <tr>
                    <th>Naam</th>
                    <th>Barcode</th>
                    <th>Aantal</th>
                    <th>beschrijving</th>
                    <th>Aanpassen</th>
                    <th>Groep</th>
                </tr>
                <tr>
                    <?php
                    
                    if ($_POST) {
                        $name = $_POST['search'];
                        
                        $sql = "SELECT * FROM products WHERE `name` = '$name'";
                    } elseif (empty($_POST)) {
                        $sql = "SELECT * FROM products";
                    }
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['barcode'] . "</td>";
                        echo "<td>" . $row['stock'] . "</td>";
                        echo "<td>" . $row['description'] . "</td>";
                        echo "<td>" . $row['class'] . "</td>";
                        echo '<td>' . '<a href="edit.php?id=' . $row['id'] . ' "><button class="btn btn-primary">Aanpassen</button></a>' . '<td>';
                        echo "<tr>";
                    }
                    ?>
                </tr>
            </table>
        </div>
    </div>
</div>

</body>

</html>