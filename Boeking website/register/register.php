<?php include "../includes/header.php"?>

<?php
    if (isset($_POST['name']) && isset($_POST['password'])) {
        
        $sql = "SELECT * FROM `users` WHERE name = '{$_POST['name']}'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            echo "deze naam bestaat al";
        } else {
            $sql = "INSERT INTO `users`(`id`, `name`, `password`, `role`) VALUES (NULL,'". $_POST['name'] . "','". hash("sha256", $_POST['password']) ."','gebruiker')";
            mysqli_query($conn, $sql);

            header("Location: ../index.php");
        }


    }
    
?>

<div class="container">
    <div class="row mt-5"></div>
    <div class="row mt-5"></div>
    <div class="row mt-5"></div>
    <div class="row mt-5">
        <div class="col"></div>

        <div class="col">
            <div class="card mx-auto" style="width: 40rem; height: 20rem;">
                <div class="card-body mt-4">
                    <form method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">naam: </label>
                            <input type="text" class="form-control" id="" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">wachtwoord: </label>
                            <input type="password" class="form-control" id="" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Regristreer</button>
                        <a href="../index.php" class="btn btn-danger">Terug</a><br>
                        <p>nog geen account? <a href="../register/register.php">Regristreer hier!</a></p>
                    </form>
                </div>
            </div>
        </div>

        <div class="col"></div>
    </div>
</div>