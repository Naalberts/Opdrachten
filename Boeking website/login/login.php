<?php include "../includes/header.php" ?>

<?php
session_start();
    if(isset($_POST['name']) && isset($_POST['password'])){
        $name = $_POST['name'];
        $password = hash("sha256", $_POST['password']);

        $sql = "SELECT * FROM users WHERE name='$name' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        if($count == 1){
            $_SESSION['name'] = $name;
            header("Location: ../userportal/userportal.php");
        } elseif ($count == 0){
            echo "naam of wachtwoord verkeerd";
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
                        <button type="submit" class="btn btn-primary">Login</button>
                        <a href="../index.php" class="btn btn-danger">Terug</a><br>
                        <p>nog geen account? <a href="../register/register.php">Regristreer hier!</a></p>
                    </form>
                </div>
            </div>
        </div>

        <div class="col"></div>
    </div>
</div>