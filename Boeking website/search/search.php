<?php
include "../includes/header.php";
session_start();

$id = 0;
if (!empty($_SESSION['name'])) {
    $sql = "SELECT `id` FROM `users` WHERE `name` = '" . $_SESSION['name'] . "'";
    $result = mysqli_query($conn, $sql);

    $usrid = mysqli_fetch_assoc($result);
    $id = $usrid['id'];
}


$location = $priceHigh = $priceLow = $totalPeople = $dateBegin = $dateEnd = '';
if (isset($_POST['zoeken'])) {
    $location = $_POST['location'];
    $priceLow = $_POST['priceLow'];
    $priceHigh = $_POST['priceHigh'];
    $totalPeople = $_POST['totalPeople'];
    $dateBegin = $_POST['dateBegin'];
    $dateEnd = $_POST['dateEnd'];

    $where = array();
    $sql = "SELECT * FROM `houses` ";

    if ($location) {
        $where[] = "location = '$location'";
    }
    if ($totalPeople) {
        $where[] = "total_people = '$totalPeople'";
    }
    if ($dateBegin) {
        $where[] = "stay_begin = '$dateBegin'";
    }
    if ($dateEnd) {
        $where[] = "stay_end = '$dateEnd'";
    }
    if ($priceLow && $priceHigh) {
        $where[] = "price BETWEEN $priceLow AND $priceHigh";
    }

    if (!empty($where)) {
        $whereClause = "WHERE rented = 0 AND user_id != $id AND " . implode(" AND ", $where);
        $sql .= " $whereClause";
        
    }
} else {
    $sql = "SELECT * FROM `houses` WHERE `rented` = 0 AND `user_id` !=" . $id;
}


$result = mysqli_query($conn, $sql);
?>

<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">DreamGetaways</span>
        <?php
        if (empty($_SESSION)) {
            echo ' <a class="d-flex btn btn-primary" href="../login/login.php">Login</a>';
        } else {
            echo '<a class="d-flex btn btn-primary" href="../userportal/userportal.php">Home</a>';
        }
        ?>
    </div>
</nav>

<div class="row ">
    <div class="col mb-5 mt-5 ps-5">
        <div class="card mx-auto ms-5 scroll-lock" style="width: 30rem; height: 52rem;">
            <div class="card-body mt-4s navbar-fixed-top">
                <div class="text-center">
                    <h1>Filters</h1>
                </div>
                <?php
                echo '<form action="" method="post">
                    <div class="mb-3">
                        <div class="text-center">
                            <label class="form-label" for="">Locatie</label>
                        </div>
                        <input class="form-control" type="text" name="location" value="' . $location . '" placeholder="bijv. Nederland">
                    </div>
                    <div class="mb-3 mt-3">
                        <div class="text-center">
                            <label class="form-label" for="">Prijs</label><br>
                        </div>
                        <label class="form-label">Van: </label>
                        <input class="form-control" type="number" name="priceLow" value="' . $priceLow . '" placeholder="bijv. 1">
                        <label class="form-label">tot</label>
                        <input class="form-control" type="number" name="priceHigh" value="' . $priceHigh . '" placeholder="bijv. 2">
                    </div>
                    <div class="mb-3">
                        <div class="text-center">
                            <label class="form-label" for="">Aantal mensen</label>
                        </div>
                        <input class="form-control" type="number" name="totalPeople" value="' . $totalPeople . '" placeholder="bijv. 4">
                    </div>
                    <div class="mb-3">
                        <div class="text-center">
                            <label class="form-label" for="">Begin datum</label>
                        </div>
                        <input class="form-control" type="date" name="dateBegin" value="' . $dateBegin . '" id="">
                    </div>
                    <div class="mb-3">
                        <div class="text-center"> Eind datum</div>
                    </div>
                        <input class="form-control" type="date" name="dateEnd" value="' . $dateEnd . '" id="">
                    <div class="mt-5 text-center">
                        <input class="btn btn-primary" type="submit" value="zoeken" name="zoeken">
                    </div>
                </form>'
                ?>
            </div>
        </div>
    </div>
    <div class="col mt-5 me-5 pe-5" style="margin-right: 100rem;">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {

            echo '<div class="card mb-5" style="width: 50rem;">';
            echo '  <img src="' . $row['img_url'] .  '" class="card-img-top img fluid" height="500" alt="...">';
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
        }
        ?>


    </div>
</div>