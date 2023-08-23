<?php
session_start();
include "../includes/header.php";

if (empty($_SESSION['name'])) {
    session_destroy();
    header("Location: ../index.php");
}

if ($_POST['submit']) {
    $sql = "INSERT INTO `reviews`(`id`, `review_text`, `amount_stars`, `time_posted`, `user_id`, `house_id`) VALUES (NULL,'" . $_POST['text'] . "','" . $_POST['stars'] . "','" . date("F j Y") . "','" . $_GET['id'] . "','" . $_GET['houseid'] . "')";
    $result = mysqli_query($conn, $sql);
    header("Location: overview.php?id=" . $_GET['id']);
}

?>
<div class="container">
    <div class="row mt-5"></div>
    <div class="row mt-5">
        <div class="col"></div>
        <div class="col text-center">
            <h1>Review plaatsen</h1>
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
                            <label class="form-label" for="adress">Aantal sterren</label>
                            <input class="form-control" type="number" name="stars" placeholder="bijv. 5" max="5">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="adress">comment</label>
                            <input class="form-control" type="text" name="text" placeholder="bijv. Heel mooi huisje">
                        </div>
                        <div class="container mx-auto">
                            <div class="row">
                                <?php echo '<div class="col text-center"><a class="btn btn-danger" href="../userportal/userportal.php">Terug</a></div>'?>
                                <div class="col"></div>
                                <div class="col text-center"><input class="btn btn-primary" type="submit" value="Plaats" name="submit"></div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="col"></div>
    </div>
</div>