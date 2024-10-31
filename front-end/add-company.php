<?php
session_start();

$username = $_POST["txt"];
$email = $_POST["email"];
$password = $_POST["pswd"];
$phoneNumber = $_POST["number"];
if (isset($_POST["signup-btn"])) {

    $connection_string = mysqli_connect("localhost", "root", "23622362", "bookings");
    //checking if the mail is exist or not
    $emailCheckQuery = mysqli_query($connection_string, "SELECT * FROM company WHERE email='$email'");
    $emailRows = mysqli_num_rows($emailCheckQuery);

    if ($emailRows >= 1) {
        header("Location: login-alert.html");
    } else {
        // Insert new user into the database
        $insertQuery = mysqli_query($connection_string, "INSERT INTO company (username, email, password, telephone) 
                                                         VALUES ('$username', '$email', '$password', '$phoneNumber')");
        if ($insertQuery) {
            $q = mysqli_query($connection_string,"select * from company where email='$email'");
            $row = mysqli_fetch_array($q);
            $_SESSION["company_id"]=$row["ID"];
            header("Location: CompanyProfile.php");
        } else {
            header("Location: login-alert.html");
        }
    }
    mysqli_close($connection_string);
}
?>