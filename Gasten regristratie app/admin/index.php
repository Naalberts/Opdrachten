<?php include "../includes/conn.php"; ?>
<?php include "../includes/header.php"; ?>

<?php

if ($_POST) {

    $pass = hash('sha256', $_POST['password']);

    $sql = "SELECT * FROM `admin` where password = '$pass' and `name` = '$_POST[name]'";

    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $_SESSION['loggedIn'] = true;
        $_SESSION['user'] = $user['name'];
        header("Location: portal.php");

    }

    else {
        $msg = "Wrong username or password";
    }
}
?>

<nav class="navbar navbar-expand-lg bg-body-secondary">
    <div class="container-md">
        <div class="d-flex">
            <img class="logo" src="../logo.png">
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="d-flex justify-content-evenly align-items-center h-100">
        <div class="card mt-5 w-75 mx-auto">
            <div class="card-body bg-body-secondary">
                <form method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Naam:</label>
                        <input type="text" class="form-control" id="" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="" name="password">
                        <p class="text-danger"><?php if(isset($msg)){echo $msg;} ?></p>
                    </div>
                    <button type="submit" class="btn bg-primary text-white">Submit</button>
                </form>
                <a href="../index.php"><button class="btn btn-danger">Terug</button></a>
            </div>
        </div>
    </div>
</div>

