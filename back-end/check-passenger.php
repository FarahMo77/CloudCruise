<?php

session_start();
echo "in check.php";
$email = $_POST["email"];
$password = $_POST["pswd"]; 
if(isset($_POST["sign-up-btn"])){ //if the login button was pressed
    //echo" submit button is set";
    $connection_string=mysqli_connect("localhost","root","23622362","bookings"); //server,username,password
    //echo "\n email = ". $email;
    $q = mysqli_query($connection_string,"select * from passenger where email='$email' and password='$password'");
    $num_of_rows = mysqli_num_rows($q);
    echo "\n number of rows = ". $num_of_rows;
    if ($num_of_rows == 1){
        echo $_SESSION["passenger_id"] ;
        echo "passenger found";
        $row = mysqli_fetch_array($q);
        $_SESSION["passenger_id"]=$row["ID"];
        header("Location: passenger-home-page.php");
        
    }
    else{
        echo "wrong user name or password";
        header("Location: login-alert.html");
    }
    
    mysqli_close($connection_string);
    
}
// else {
//     $response["success"] = 0;
//     $response["message"] = "Login parameter not set";
// }

// header('Content-Type: application/json');
// echo json_encode($response);

//header("Location: Passenger-profile.html");
?>