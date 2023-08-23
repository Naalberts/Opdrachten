<?php
session_start();
include "../includes/header.php";

$sql = "SELECT * FROM `houses` WHERE `id`=" . $_GET['id'];
$result = mysqli_query($conn, $sql);




if (!empty($_SESSION['name'])) {
    $usrsql = "SELECT `id` FROM `users` WHERE `name` = '" . $_SESSION['name'] . "'";
    $usrResult = mysqli_query($conn, $usrsql);
    $usr = mysqli_fetch_assoc($usrResult);

    if (isset($_POST['rent'])) {
        $sql = "UPDATE `houses` SET `user_rented_id` = " . $usr['id'] . ", `rented` = 1 WHERE `id` =" . $_GET['id'];
        $result = mysqli_query($conn, $sql);
        header("Location: search.php");
    }
}

if (isset($_POST['rent'])) {
    if (empty($_SESSION)) {
        echo "<script type='text/javascript'>alert('Je moet ingelogt zijn om een huis te kunnen huren');</script>";
        session_destroy();
        header("Location: ../login/login.php");
    }
}

?>

<div class="container">
    <div class="row mt-3">
        <div class="col"></div>
        <div class="col">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="card mb-5" style="width: 50rem;">';
                echo '  <img src="' . $row['img_url'] .  '" class="card-img-top img fluid" height="500" alt="...">';
                echo '  <div class="card-body">';
                echo '      <h5 class="card-title">€' . $row['price'] . ' per nacht</h5>';
                echo '      <p class="card-text">' . $row['description'] . '</p>';
                echo '      <p class="card-text">van ' . $row['stay_begin'] . ' tot ' . $row['stay_end'] . '</p>';
                echo '      <div class="container">';
                echo '          <div class="row">';
                echo '              <div class="col text-center"><form method="post"><button class="btn btn-primary" type="submit" name="rent">Huren</button></form></div>';
                echo '              <div class="col"></div>';
                echo '              <div class="col text center"><a href="search.php" class="btn btn-danger">Terug</a></div>';
                echo '          </div>';
                echo '      </div>';
                echo '  </div>';
                echo '  <div class="card-footer">';
                echo '      <p class="card-text">' . $row['time_post'] . ' geplaatst door: ' . $row['name_poster'] . '</p>';
                echo '  </div>';
                echo '</div>';
            }
            ?>
        </div>
        <div class="col"></div>
    </div>

    <div class="row text-center">
        <h1>Reviews</h1>
    </div>
    <div class="row">
        <div class="col"></div>
        <div class="col center-text pe-5">
            <?php
            $sql = "SELECT * FROM `reviews` WHERE house_id = " . $_GET['id'];
            $result = mysqli_query($conn, $sql);

          

            while ($row = mysqli_fetch_assoc($result)) {
                $usersql = "SELECT * FROM `users` WHERE `id`= " . $row['user_id'];
                $reviewerResult = mysqli_query($conn, $usersql);
    
                $review = mysqli_fetch_assoc($reviewerResult);
                $reviewPoster = $review['name'];

                echo '<div class="card ms-5" style="width: 30rem;">';
                echo '   <div class="card-body">';
                echo '       <h5 class="card-title">' . str_repeat("★", $row['amount_stars']) . '</h5>';
                echo '       <h6 class="card-subtitle mb-2 text-body-secondary">' . $reviewPoster . '</h6>';
                echo '       <h5 class="card-text">' . $row['review_text'] . '</h5>';
                echo '       <p class="card-text">' . $row['time_posted'] . '</p>';
                echo   '</div>';
                echo '</div>';
            }

            ?>
        </div>
        <div class="col"></div>
    </div>
</div>