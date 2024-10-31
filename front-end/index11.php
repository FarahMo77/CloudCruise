<?php
/// to start a session
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
// if(isset( $_SESSION["passenger_id"])){
//     echo"sesssssssssssssion"; 
// }else{
//     echo" you have to register to access this";
//     header("Location: Register.html");
// }


// to log out
// unset($_SESSION);
// session_destroy();


echo "test";
$connection_string=mysqli_connect("localhost","root","23622362","bookings"); //server,username,password

// mysqli_select_db("bookings");
$q = mysqli_query($connection_string,"select * from company");

echo "<table border=2 width=100%";
echo "before loop";
while($row = mysqli_fetch_array($q)){
    echo "<tr>";
    echo "<td>".$row["ID"];
    echo "<td>".$row["name"];
    echo "<td>".$row["bio"];
    echo "<td>".$row["address"];
    echo "<td>".$row["location"];
    echo "<td>".$row["username"];
    echo "<td>".$row["email"];
    echo "<td>".$row["password"];
    echo "<td>".$row["telephone"];
    echo "<td>".$row["logo_image"];
    echo "<td>".$row["account"];
    

    echo "</tr>";
}

echo "</table>";

$q = mysqli_query($connection_string,"select * from passenger");

echo "<table border=2 width=100%";
echo "before loop";
while($row = mysqli_fetch_array($q)){
    echo "<tr>";
    echo "<td>".$row["ID"];
    echo "<td>".$row["name"];
    echo "<td>".$row["email"];
    echo "<td>".$row["password"];
    echo "<td>".$row["telephone"];
    

    echo "</tr>";
}

echo "</table>";

mysqli_close($connection_string);
?>