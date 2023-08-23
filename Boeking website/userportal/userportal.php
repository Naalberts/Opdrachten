<?php include "../includes/header.php" ?>

<?php
session_start();
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: ../index.php");
}
if (empty($_SESSION['name'])) {
    session_destroy();
    header("Location: ../index.php");
}
$sql = "SELECT * FROM `users` WHERE `name`= '" . $_SESSION['name'] . "'";
$result = mysqli_query($conn, $sql);
$id = mysqli_fetch_assoc($result);
$_SESSION['id'] = $id['id'];
?>

<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">DreamGetaways</span>
        <form method="post"><input class="btn btn-danger" type="submit" value="Uitloggen" name="logout"></form>
    </div>
</nav>
<div class="container">
    <div class="row mt-5"></div>
    <div class="row mt-5"></div>

    <div class="row text-center">
        <div class="col"></div>
        <div class="col mx-auto">
            <h1>Welkom, <?php echo $_SESSION['name']; ?></h1>
        </div>
        <div class="col"></div>
    </div>

    <div class="row mt-5"></div>
    <div class="row mt-5"></div>

    <div class="row">
        <div class="col">
            <a href="../upload/uploadp1.php">
                <div class="card" style="width: 25rem; height: 30rem;">
                    <img src="../home_house_icon-icons.com_49851.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h1 class="card-text text-center">Huis uploaden</h1>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <?php echo "<a href='../overview/overview.php?id=" . $id['id']  . "'" ?>>
            <div class="card" style="width: 25rem; height: 30rem;">
                <img src="../thuis_318-42210.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h1 class="card-text text-center">Mijn huizen</h1>
                </div>
            </div>
            </a>
        </div>
        <div class="col">
            <a href="../search/search.php">
                <div class="card" style="width: 25rem; height: 30rem;">
                    <img src="../search-icon.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h1 class="card-text text-center">Huizen zoeken</h1>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>