<?php include 'includes/head.php' ?>
<?php session_start()?>

<?php
if ($_POST) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `users` WHERE `name` = '{$login}' AND `password` = '{$password}'";

    $result = mysqli_query($conn, $sql);

    if (!empty($_POST['login'] && !empty($_POST['password']))) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $_SESSION['name'] = $row['name'];
            header("Location: Main/main.php");
        } else {
            echo "verkeerde naam/wachtwoord";
        }
    }
}

?>



<div class="container mt-5">
    <div class="row">
        <div class="collum marpic">
            <img src="logol.png" alt="">
        </div>
    </div>
    <div class="row">
        <div class="collum">

            <div class="card w-75 mx-auto">
                <div class="card-body card-color">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Inlognaam</label>
                            <input type="text" name="login" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Wachtwoord</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Inloggen" class="btn btn-green">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

</body>

</html>