<?php include "../includes/conn.php"; ?>
<?php include "../includes/header.php"; ?>

<nav class="navbar navbar-expand-lg bg-body-secondary">
    <div class="container-md">
        <div class="d-flex">
            <img class="logo" src="../logo.png">
        </div>
    </div>
</nav>
<div class="container mt-5">
    <div class="d-flex justify-content-evenly align-items-center h-100">
        <div class="card mt-5 w-75 mx-auto bg-body-secondary">
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Naam</label><br>
                        <input class="form-control" type="text" name="name">
                    </div>

                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Medewerker</label>
                        <select name="employee" class="form-select" id="inputGroupSelect01">
                            <option selected value="">Kies...</option>
                            <option value="1">Kees de Boer</option>
                            <option value="2">Klaas Boerse</option>
                            <option value="5">Jan den Boer</option>
                            <option value="6">Piet van den Boer</option>
                            <option value="7">Pieter Boersema</option>
                            <option value="8">Hendrik van de Boer</option>
                            <option value="9">Klaasientje Boer</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Beschrijving van waarom u hier bent</label><br>
                        <input class="form-control" type="text" name="description">
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="akkoord">
                        <label for="" class="form-label">Ik ga akkoord met de algemene voorwaarden</label>
                    </div>

                    <div class="mb-3">
                        <input class="btn btn-primary" type="submit" value="Submit" name="submit">
                </form>
            </div>
            <a href="../index.php"><button class="btn btn-danger">Terug</button></a>
        </div>
    </div>
</div>


<?php
if (isset($_POST['submit'])) {
    if (empty(isset($_POST['name']))) {
        echo "Vul een naam in";
    } else {
        $name = $_POST['name'];
    }

    if (empty(isset($_POST['employee']))) {
        echo "Vul een medewerker in";
    } else {
        $visiting = $_POST['employee'];
    }

    if (empty(isset($_POST['description']))) {
        echo "Vul een beschrijving in";
    } else {
        $description = $_POST['description'];
    }

    if (empty(isset($_POST['akkoord']))) {
        echo "Vink de algemene voorwaarden aan";
    } else {
        $akkoord = $_POST['akkoord'];
    }

    $time_arrival = date("H:i:s");
    
    if (!empty($name) && !empty($visiting) && !empty($description) && !empty($akkoord)) {
        $sql = "INSERT INTO `guest`(`id`, `name`, `employee_id`, `description`, `time_arrival`, `time_departure`) VALUES (NULL,'$name','$visiting','$description', '$time_arrival', '00:00:00')";
        $result = mysqli_query($conn, $sql);
        header("Location: ../index.php");
    }
}
?>