<?php

    session_start();
    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);
    //echo "session id = ". $_SESSION["passenger_id"];
    if(isset( $_SESSION["passenger_id"])){
        //echo"\n in session";
        $connection_string=mysqli_connect("localhost","root","23622362","bookings"); 
        $q = mysqli_query($connection_string,"select * from passenger where ID='$_SESSION[passenger_id]'");
        $passenger = mysqli_fetch_array($q);
    }else{
        echo" you have to register to access this";
        //header("Location: Register.html");  
    }




?>