<?php
session_start();

if (isset($_SESSION["passenger_id"])) {
    $passengerId = $_SESSION["passenger_id"];
    $connection_string = mysqli_connect("localhost", "root", "23622362", "bookings");

    $query = mysqli_query($connection_string, "SELECT * FROM passenger WHERE ID = $passengerId");
    $passengerData = mysqli_fetch_assoc($query);

    mysqli_close($connection_string);

    echo json_encode(["data" => $passengerData]);
} else {
    echo json_encode(["error" => "User not logged in"]);
}
?>