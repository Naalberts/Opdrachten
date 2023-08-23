<?php
include "../includes/header.php";
session_start();

    if (empty($_SESSION['name'])) {
        session_destroy();
        header("Location: ../index.php");
    }

    if (isset($_POST['submit'])) {
        $_SESSION['location'] = $_POST['location'];
        $_SESSION['price'] = $_POST['price'];
        $_SESSION['number'] = $_POST['number'];
        $_SESSION['dateBegin'] = $_POST['dateBegin'];
        $_SESSION['dateEnd'] = $_POST['dateEnd'];
        header("Location: uploadp2.php");
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
                    <form action="" method="post">
                        <div class="mb-3">
                            <label class="form-label" for="adress">Locatie: </label>
                            <input class="form-control" type="text" name="location" id="location" placeholder="bijv. Nederland">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="adress">Prijs per nacht </label>
                            <input class="form-control" type="text" name="price" id="adress" placeholder="bijv. 100">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="adress">Totaal aantal personen </label>
                            <input class="form-control" type="number" name="number" id="adress" placeholder="bijv. 4">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="adress">Begin datum </label>
                            <?php
                            echo '<input class="form-control" type="date" name="dateBegin" id="adress" min="' . date("Y-m-d") . '">';
                            ?>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="adress">Eind datum </label>
                            <input class="form-control" type="date" name="dateEnd" id="adress">
                        </div>
                        <div class="container mx-auto">
                            <div class="row">
                                <div class="col text-center"><a class="btn btn-danger" href="../userportal/userportal.php">Terug</a></div>
                                <div class="col"></div>
                                <div class="col text-center"><input class="btn btn-primary" type="submit" value="volgende" name="submit"></div>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>

        <div class="col"></div>
    </div>
</div>