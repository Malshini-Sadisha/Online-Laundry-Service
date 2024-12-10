<?php
include_once 'conn.php';

if (isset($_GET['id'])) {
    $ID = $_GET['id'];

    $query = "SELECT * FROM `products` WHERE id=$ID";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);

    mysqli_free_result($result);
}
