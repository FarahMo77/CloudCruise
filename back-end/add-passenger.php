<?php
session_start();

$username = $_POST["txt"];
$email = $_POST["email"];
$password = $_POST["pswd"];
$phoneNumber = $_POST["number"];
echo"in add passenger.php";
echo $email;
if (isset($_POST["sign-up-btn"])) {

    $connection_string = mysqli_connect("localhost", "root", "23622362", "bookings");
    //checking if the mail is exist or not
    $emailCheckQuery = mysqli_query($connection_string, "select * from passenger where email='$email'");
    $emailRows = mysqli_num_rows($emailCheckQuery);
    echo $emailRows;
    if ($emailRows >= 1) {
        //header("Location: login-alert.html");
        echo "<script>alert('mail is used before');</script>";
    } else {
        // Insert new user into the database
        $insertQuery = mysqli_query($connection_string, "insert into passenger (name, email, password, telephone) 
                                                        VALUES ('$username', '$email', '$password', '$phoneNumber')");
        if ($insertQuery) {
            //$data = mysqli_fetch_array($insertQuery);
            header("Location: passenger-home-page.php");
        } else {
            //echo 'Error:' . mysql_error($connection_string);
            echo "<script>alert('there is error in sign up please try agein later');</script>";
        }
    }
    mysqli_close($connection_string);
}
?>