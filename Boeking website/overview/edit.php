<?php
include "../includes/header.php";
session_start();
if (empty($_SESSION['name'])) {
    session_destroy();
    header("Location: ../index.php");
}

$sql = "SELECT * FROM `houses` WHERE name_poster = '" . $_SESSION['name'] . "'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $sql = "
    UPDATE houses
          SET
              location = '" . $_POST['location'] . "',
              description = '" . $_POST['description'] . "',
              price = '" . $_POST['price'] . "',
              total_people = '" . $_POST['number'] . "',
              stay_begin = '" . $_POST['dateBegin'] . "',
              stay_end = '" . $_POST['dateEnd'] . "'
          WHERE
              id = " . $_GET['id'] . "";
    $result = mysqli_query($conn, $sql);
    header("Location: overview.php?id=" . $_GET['userid']);
}

echo '
<div class="container">
    <div class="row mt-5"></div>
    <div class="row mt-5"></div>
    <div class="row mt-5">
        <div class="col"></div>

        <div class="col">
            <div class="card mx-auto" style="width: 40rem;">
                <div class="card-body mt-4">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label class="form-label" for="adress">Locatie: </label>
                            <input class="form-control" type="text" name="location" id="location" value="' . $row["location"] .'">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="adress">Prijs per nacht </label>
                            <input class="form-control" type="text" name="price" id="adress" value="' . $row['price'] . '">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="adress">Totaal aantal personen </label>
                            <input class="form-control" type="number" name="number" id="adress" value="' . $row['total_people'] .'">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="adress">Begin datum </label>
                            <input class="form-control" type="date" name="dateBegin" id="adress" value="' . $row['stay_begin'] . '">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="adress">Eind datum </label>
                            <input class="form-control" type="date" name="dateEnd" id="adress" value="' . $row['stay_end'] . '">
                        </div>
                        <div class="mb-3">
                            <lavel class="form-label">Beschrijving</label>
                            <input class="form-control" type="text" name="description" value="' . $row['description'] . '">
                        </div>
                        <div class="container mx-auto">
                            <div class="row">
                                <div class="col text-center"><a class="btn btn-danger" href="../userportal/userportal.php">Terug</a></div>
                                <div class="col"></div>
                                <div class="col text-center"><input class="btn btn-primary" type="submit" value="Aanpassen" name="submit"></div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="col"></div>
    </div>
</div>
';
