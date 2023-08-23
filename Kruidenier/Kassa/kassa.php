<?php include '../includes/head.php' ?>

<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <img class="imgMar" src="../logol.png" alt="">
        <form class="d-flex top-0" method="post">
            <input class="form-control me-2" type="number" placeholder="Search" aria-label="Search" name="search">
            <input type="submit" name="zoeken" class="btn btn-outline-success">
        </form>
        <a href="../Main/main.php">
            <button class="btn btn-danger">Terug</button>
        </a>
    </div>
</nav>

<div class="kassa">
    <div class="links ">
        <div class="informatie">
            <div class="card w-100 h-100">
                <div class="card-body">
                    <form action="" method="post">
                        <table class="table table-success table-striped">
                            <tr>
                                <th>Naam</th>
                                <th>Barcode</th>
                                <th>Aantal</th>
                                <th>beschrijving</th>
                                <th>Groep</th>
                                <th>Selecteren</th>
                            </tr>
                            <tr>
                                <?php
                                $sql = "SELECT * FROM products";

                                if (isset($_POST['zoeken'])) {
                                    $search = $_POST['search'];
                                    $sql = "SELECT * FROM products WHERE `barcode` = '$search'";
                                } 
                                                       
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['barcode'] . "</td>";
                                    echo "<td>" . $row['stock'] . "</td>";
                                    echo "<td>" . $row['description'] . "</td>";
                                    echo "<td>" . $row['class'] . "</td>";
                                    echo '<td>' . '<input type="checkbox" class="form-check-input" id="exampleCheck1" name="product[]" value="' . $row['id'] . '">' . '<td>';
                                    echo "<tr>";
                                }
                                ?>

                            </tr>
                        </table>
                        <input class="btn btn-primary" type="submit" value="Selecteren" name="select">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="rechts">
        <div class="totaalverkocht">
            <div class="card w-100 h-100">
                <div class="card-body">
                    <table class="table table-success table-striped">
                        <tr>
                            <th>Naam</th>
                            <th>Barcode</th>
                            <th>Aantal</th>
                            <th>Groep</th>
                        </tr>
                        <tr>
                            <?php
                            if (isset($_POST['select'])) {
                                $price = 0;
                                foreach ($_POST['product'] as $product) {
                                    $sql = "SELECT * FROM products WHERE id = $product";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['barcode'] . "</td>";
                                        echo "<td>" . $row['stock'] . "</td>";
                                        echo "<td>" . $row['class'] . "</td>";
                                        echo "<tr>";
                                        $price = intval($price) + intval($row['price']);
                                    }
                                }
                                $BTWprice = $price * 0.21 + $price;
                            }
                            ?>
                        </tr>
                    </table>
                    <form action="" method="post">
                        <input class="btn btn-primary" type="submit" value="Verkoop">
                    </form>

                </div>
            </div>
        </div>
        <div class="aantalkosten">
            <div class="card w-100 h-100">
                <div class="card-body">
                    <?php
                    if (empty($price) || empty($BTWprice)) {
                    } else {
                        echo "<p>Totaal prijs exclusief BTW: $price euro</p>";
                        echo "<p>Totaal prijs inclusief BTW: $BTWprice euro</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>


</div>

</body>

</html>