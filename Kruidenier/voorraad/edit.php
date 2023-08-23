<?php include '../includes/head.php'?>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="position-relative mt-5">
                <img src="../logol.png" alt="" class="position-absolute top-0 start-50 translate-middle ">
            </div>
        </div>
    </div>
    <?php
        $sql = "SELECT * FROM products WHERE id = " . $_GET['id'];
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $naam = $row['name'];
            $barcode = $row['barcode'];
            $aantal = $row['stock'];
            $beschrijving = $row['description'];
            $groep = $row['class'];
        }

        if (isset($_POST['Aanpassen'])) {
            $naam = $_POST['naam'];
            $barcode = $_POST['Barcode'];
            $aantal = $_POST['Aantal'];
            $beschrijving = $_POST['Beschrijving'];
            $groep = $_POST['groep'];

            $sql = "UPDATE `products` SET `name`='$naam',`barcode`='$barcode',`stock`='$aantal',`description`='$beschrijving',`class`='$groep' WHERE id = " . $_GET['id'];
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location: voorraad.php");
            } else {
                echo "Er is iets fout gegaan";
            }
        } elseif (isset($_POST['Verwijderen'])) {
            $sql = "DELETE FROM `products` WHERE id = " . $_GET['id'];
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location: voorraad.php");
            } else {
                echo "Er is iets fout gegaan";
            }
        }
    ?>
    <div class="row">
        <div class="col">
            <div class="card w-50 mx-auto mt-5">
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Naam</label>
                            <input type="text" name="naam" class="form-control" value="<?php echo $naam?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Barcode</label>
                            <input type="text" name="Barcode" class="form-control" value="<?php echo $barcode?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Aantal</label>
                            <input type="text" name="Aantal" class="form-control" value="<?php echo $aantal?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Beschrijving</label>
                            <input type="text" name="Beschrijving" class="form-control" value="<?php echo $beschrijving?>">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Groep</label>
                            <select name="groep" class="form-select" id="inputGroupSelect01">
                                <option selected><?php echo $groep?></option>
                                <option value="zuivel">zuivel</option>
                                <option value="groente">groente</option>
                                <option value="vleeswaren">vleeswaren</option>
                                <option value="non-food">non-food</option>
                                <option value="medisch">medisch</option>
                                <option value="specerijen">specerijen</option>
                                <option value="overig">overig</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="Aanpassen" value="Aanpassen" class="btn btn-primary">
                            <input class="btn btn-danger" name="Verwijderen" type="submit" value="Verwijderen">
                            
                        </div>
                        <a href="voorraad.php" class="btn btn-warning">Terug</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

</html>