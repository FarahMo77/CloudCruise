<?php
session_start();

$username = $_POST["txt"];
$email = $_POST["email"];
$password = $_POST["pswd"];
$phoneNumber = $_POST["number"];
if (isset($_POST["submit"])) {

    $connection_string = mysqli_connect("localhost", "root", "23622362", "bookings");
    //checking if the mail is exist or not
    $emailCheckQuery = mysqli_query($connection_string, "SELECT * FROM company WHERE email='$email'");
    $emailRows = mysqli_num_rows($emailCheckQuery);

    if ($emailRows >= 1) {
        header("Location: signup-alert-email.html");
    } else {
        // Insert new user into the database
        $insertQuery = mysqli_query($connection_string, "INSERT INTO company (username, email, password, telephone) 
                                                         VALUES ('$username', '$email', '$password', '$phoneNumber')");
        if ($insertQuery) {
            header("Location: Passenger.html");
        } else {
            header("Location: login-alert.html");
        }
    }
    mysqli_close($connection_string);
}
?>