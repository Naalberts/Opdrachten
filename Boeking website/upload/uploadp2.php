<?php
include "../includes/header.php";
session_start();

if (empty($_SESSION['name'])) {
    session_destroy();
    header("Location: ../index.php");
}

$sql = "SELECT `id` FROM `users` WHERE `name`= '" . $_SESSION['name'] . "'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if (isset($_POST['submit'])) {
    if (isset($_FILES['image'])) {
        $tempFile = $_FILES['image']['tmp_name'];
        $targetDir = '../images/'; 

       
        $targetFile = $targetDir . uniqid() . '_' . $_FILES['image']['name'];

       
        if (move_uploaded_file($tempFile, $targetFile)) {
            $sql = "
            INSERT INTO `houses`(
                `id`,
                `name_poster`,
                `location`,
                `description`,
                `price`,
                `total_people`,
                `stay_begin`,
                `stay_end`,
                `time_post`,
                `user_id`,
                `rented`,
                `user_rented_id`,
                `img_url`
            )
            VALUES(
                NULL,
                '" . $_SESSION['name'] . "',
                '" . $_SESSION['location'] ."',
                '" . $_POST['description'] . "',
                '" . $_SESSION['price'] ."',
                '" . $_SESSION['number'] ."',
                '" . $_SESSION['dateBegin'] ."',
                '" . $_SESSION['dateEnd'] ."',
                '" . date("F j Y") ."',
                '" . $row['id'] ."',
                0,
                NULL,
                '" . $targetFile ."'
            )
            ";
            mysqli_query($conn, $sql);
            header("Location: ../userportal/userportal.php");
        } 
    } else {
        echo 'Er is een fout opgetreden bij het uploaden van de afbeelding.';
    }

}


?>

<div class="container">
    <div class="row mt-5"></div>
    <div class="row mt-5">
        <div class="col"></div>
        <div class="col text-center">
            <h1>Huis uploaden <br> pagina 1 van 2</h1>
        </div>
        <div class="col"></div>
    </div>
    <div class="row mt-5">
        <div class="col"></div>

        <div class="col">
            <div class="card mx-auto" style="width: 40rem;">
                <div class="card-body mt-4">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label" for=""></label>
                            <input class="form-control" type="file" name="image" id="" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label class="forn-label" for="">Beschijving</label>
                            <input class="form-control" type="text" name="description">
                        </div>
                        <div class="container mx-auto">
                            <div class="row">
                                <div class="col text-center"><a class="btn btn-danger" href="uploadp1.php">Terug</a></div>
                                <div class="col"></div>
                                <div class="col text-center"><input class="btn btn-primary" type="submit" value="Upload" name="submit"></div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="col"></div>
    </div>
</div>