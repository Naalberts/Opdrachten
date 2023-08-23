<?php include '../includes/head.php' ?>

<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("Location: ../index.php");
}
?>

<div class="container  center-text">
    <div class="row center ">
        <div class="col">
            <div class="position-relative mt-4">
                <img src="../logol.png" alt="" class="position-absolute top-0 start-50 translate-middle mt-5">
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="position-relative">
                <div class="position-absolute top-25 start-50 translate-middle L">
                    <h1>Welkom, <?php echo $_SESSION['name'] ?></h1>
                </div>
            </div>
        </div>
    </div>
    <?php
    $sql = "SELECT * FROM `users` WHERE `name` = '" . $_SESSION['name'] . "'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $role = $row['role'];

    if ($role == "kassamedewerker") {
        header("Location: ../Kassa/kassa.php");
    }

    ?>
    <div class="row">
        <div class="col">
            <a href="../voorraad/voorraad.php">
                <div class="card mx-auto Mar">
                    <img class="card-img-top w-75" src="../004-boxes.png" alt="">
                    <div class="card-body center-text">
                        <p class="card-text">Voorraad</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="../Kassa/kassa.php">
                <div class="card mx-auto Mar">
                    <img class="card-img-top w-75" src="../962807.png" alt="">
                    <div class="card-body center text">
                        <p class="card-text">Kassa</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="position-relative mt-4">
                <a href="uitloggen.php">
                    <button type="submit" class="btn btn-danger position-absolute top-0 start-50 translate-middle mt-5">Uitloggen</button>
                </a>

            </div>
        </div>
    </div>
</div>







</body>

</html>