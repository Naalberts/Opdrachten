<?php include '../includes/head.php' ?>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="position-relative mt-5">
                <img src="../logol.png" alt="" class="position-absolute top-0 start-50 translate-middle ">
            </div>
        </div>
    </div>

    <?php
    if ($_POST) {
        $naam = $_POST['naam'];
        $barcode = $_POST['Barcode'];
        $aantal = $_POST['Aantal'];
        $beschrijving = $_POST['Beschrijving'];
        $groep = $_POST['groep'];

        $sql = "INSERT INTO `products`(`id`, `name`, `barcode`, `stock`, `description`, `class`) VALUES ( NULL,'$naam','$barcode','$aantal','$beschrijving','$groep')";
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
                            <input type="text" name="naam" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Barcode</label>
                            <input type="text" name="Barcode" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Aantal</label>
                            <input type="text" name="Aantal" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Beschrijving</label>
                            <input type="text" name="Beschrijving" class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Groep</label>
                            <select name="groep" class="form-select" id="inputGroupSelect01">
                                <option selected>Kies...</option>
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
                            <input type="submit" value="Toevoegen" class="btn btn-primary">
                            <a href="../voorraad/voorraad.php">
                                <button class="btn btn-danger">Terug</button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

</html>