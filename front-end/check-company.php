<?php

session_start();

$email = $_POST["email"];
$password = $_POST["pswd"]; 
if(isset($_POST["login-btn"])){ //if the login button was pressed
    //echo" submit button is set";
    $connection_string=mysqli_connect("localhost","root","23622362","bookings"); //server,username,password
    //echo "\n email = ". $email;
    $q = mysqli_query($connection_string,"select * from company where email='$email' and password='$password'");
    $num_of_rows = mysqli_num_rows($q);
    
     if ($num_of_rows == 1){
        
        $row = mysqli_fetch_array($q);
        $_SESSION["company_id"]=$row["ID"];
        header("Location: CompanyProfile.php");
        //echo $_SESSION["company_id"] ;
    }
    else{
        //alert("wrong user name or password");
        header("Location: login-alert.html");
    }
    
    mysqli_close($connection_string);
    
}

?>