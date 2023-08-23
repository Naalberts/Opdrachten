<?php include "includes/header.php" ?>
<link rel="stylesheet" href="style.css">
<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">DreamGetaways</span>
        <a class="d-flex btn btn-primary" href="login/login.php">Inloggen</a>
    </div>
</nav>
<div class="container">

    <div class="row">
        <div class="col mb-5"></div>
    </div>
    <div class="row">
        <div class="col mb-5"></div>
    </div>
    <div class="row">
        <div class="col mb-5"></div>
    </div>

    <div class="row">
        <div class="col"></div>
        <div class="col">
            <div class="card bg-body-tertiary">
                <div class="card-body text-center">
                    <a class="btn btn-primary" href="search/search.php">Zoek naar huizen</a>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>

    <div class="row">
        <div class="col mb-5"></div>
    </div>
    <div class="row">
        <div class="col mb-5">

        </div>
    </div>
    <div class="row">
        <?php
        $sql = "SELECT * FROM `houses` ORDER BY rand() LIMIT 3";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="col">';
            echo '<div class="card mb-5" style="width: 25rem;">';
            echo '  <img src="' . substr($row['img_url'], 3) .  '" class="card-img-top img fluid" height="250" alt="...">';
            echo '  <div class="card-body">';
            echo '      <h5 class="card-title">€' . $row['price'] . ' per nacht</h5>';
            echo '      <p class="card-text">' . $row['description'] . '</p>';
            echo '      <p class="card-text">van ' . $row['stay_begin'] . ' tot ' . $row['stay_end'] . '</p>';
            echo '      <a href="house.php?id=' . $row['id'] . '" class="btn btn-primary">bekijk</a>';
            echo '  </div>';
            echo '  <div class="card-footer">';
            echo '      <p class="card-text">' . $row['time_post'] . ' ' . $row['location'] . '</p>';
            echo '  </div>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</div>