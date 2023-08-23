<?php include "../includes/conn.php"; ?>

<?php
$sql = "SELECT * FROM `guest` WHERE `id` = " . $_GET['id'];
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$description = $row['description'];
$visiting = $row['visiting'];
$time_arrival = $row['time_arrival'];
$time_departure = date("H:i:s");

$sql =
    "INSERT INTO `loggedout`(
    `id`,
    `name`,
    `visiting`,
    `description`,
    `time_arrival`,
    `time_departure`
)
VALUES(
    NULL,
    '$name',
    '$visiting',
    '$description',
    '$time_arrival',
    '$time_departure'
)";
mysqli_query($conn, $sql);

$sql = "DELETE FROM `guest` WHERE `id` = " . $_GET['id'];
mysqli_query($conn, $sql);
header("Location: portal.php")
?>