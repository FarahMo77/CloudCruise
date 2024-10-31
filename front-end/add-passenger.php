<?php
session_start();

$username = $_POST["txt"];
$email = $_POST["email"];
$password = $_POST["pswd"];
$phoneNumber = $_POST["number"];
if (isset($_POST["signup-btn"])) {

    $connection_string = mysqli_connect("localhost", "root", "23622362", "bookings");
    //checking if the mail is exist or not
    $emailCheckQuery = mysqli_query($connection_string, "SELECT * FROM passenger WHERE email='$email'");
    $emailRows = mysqli_num_rows($emailCheckQuery);

    if ($emailRows >= 1) {
       
        echo "<script>alert('mail is used before');</script>";
    } else {
        
        $insertQuery = mysqli_query($connection_string, "INSERT INTO passenger (name, email, password, telephone) 
                                                        VALUES ('$username', '$email', '$password', '$phoneNumber')");
        if ($insertQuery) {
            //$data = mysqli_fetch_array($insertQuery);
            $q = mysqli_query($connection_string,"select * from passenger where email='$email'");
            $row = mysqli_fetch_array($q);
            $_SESSION["passenger_id"]=$row["ID"];
            header("Location: Passenger.php");
        } else {
            //echo 'Error:' . mysql_error($connection_string);
            echo "<script>alert('there is error in sign up please try agein later');</script>";
        }
    }
    mysqli_close($connection_string);
}
?>