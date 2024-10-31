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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="icon" type="image/x-icon" href="Imgs/company-logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <style>
        * {
            overflow: hidden;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        *:not(input) {
            caret-color: transparent;
        }

        body {

            /* Ensure the container takes up the full height of the viewport */
            margin: 0;
            padding: 0;
            overflow: hidden;
            font-family: "Raleway", sans-serif;
            background-image: url("Imgs/profile.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }

        /* Your existing CSS styles */

        .overlay {
            width: 100%;
            height: calc(100vh - 40px);
            background-color: rgb(0 0 0 / 60%);

        }


        footer {
            background-color: rgb(90 95 109 / 96%);
            color: #ffffffeb;
            width: 100%;
            font-size: 14px;
            text-align: center;
            padding: 10px 0;
            height: 40px;
            /* Set a fixed height for the footer */
            /* Push the footer to the bottom of the container */
        }

        header {
            width: 100%;
            gap: 80%;
            color: #ffffffeb;
            padding: 3px 0;
            position: fixed;
            display: flex;
            align-items: center;
        }


        header h1 {
            margin-left: 55px;
            font-size: 17px;
        }

        header img {
            width: 40px;
            position: absolute;
            left: 10px;
            margin: 0;
        }


        .main {
            position: relative;
            margin: 100px auto;
            width: 35%;
        }

        .main h2 {
            font-size: 40px;
            text-transform: uppercase;
            margin-bottom: 10px;
            color: #ffffffeb;
            font-weight: normal;
            letter-spacing: 2px;
        }
        .main .card {
            background-color: #8995a7f0;
            border-radius: 18px;
            box-shadow: 1px 1px 8px 0 #122633;
            height: auto;
            margin-bottom: 20px;
            padding: 20px 0 20px 50px;
        }

        .main .card table {
            border: none;
            font-size: 17px;
            height: 270px;
            width: 80%;
        }

        tr :nth-child(1) {
            letter-spacing: 2px;
            width: 100px;
            color: #122633;
            font-weight: 550;
            font-size: 18.5px;
        }

        tr :nth-child(2) {
            font-size: 20px;
            color: #122633;
            font-weight: bold;
        }

        tr :nth-child(3) {
            font-style: italic;
            letter-spacing: 2px;
            color: #ffffffeb;
            font-weight: bold;

        }

        input[type=text] {
            appearance: none;
            border: none;
            width: 200px;
            outline: none;
            font-size: 17px;
            font-weight: normal;
            letter-spacing: 2px;
            background-color: #b5cad7f2;
            border-radius: .2em .2em 0 0;
            padding: .4em;
            caret-color: #122633;
            color: #122633;
            transition: 0.8s ease;
        }
        input:focus{
          box-shadow: 0 0 5px #122633;
        }

        .edit {
            position: absolute;
            color: #ffffffeb;
            right: 14%;
        }

        .buttons {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        #save {
            display: none;
            border: none;
            padding: 10px;
            width: 100px;
            font-size: 19px;
            background-color: #43a1d6;
            color: #ffffffeb;
            letter-spacing: 2px;
            border-radius: 5px;
            margin-right: 20px;
            cursor: pointer;
            transition: 0.8s ease;
            font-weight: normal;
            text-transform: uppercase;

        }

        #cancel {
            display: none;
            border: none;
            padding: 10px;
            width: 115px;
            font-size: 19px;
            background-color: #826f6a;
            color: #ffffffeb;
            letter-spacing: 2px;
            border-radius: 5px;
            margin-right: 20px;
            cursor: pointer;
            transition: 0.8s ease;
            font-weight: normal;
            text-transform: uppercase;
        }

        #cancel:hover {
            background-color: #ba261b;
            transform: scale(1.1);

        }
        #save:hover {
            transform: scale(1.1);

            background-color: #3b8cbb;
        }

        .fa-pen:before {
            display: inline-block;
            content: "\f304";
            background-color: #122633;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .fa-sign-out-alt:before {
            content: "\f2f5";
            color: white;
        }

        i {
            transition: 0.8s ease;
        }

        i:hover {
            transform: scale(1.05);

        }

        /* End */
    </style>
</head>

<body>
    <div class="overlay">
        <header>
            <img src="Imgs/company-logo.png" alt="Company Logo">
            <h1>CloudCruise</h1>
            <a href="#sign-out">
                <i class="fa fa-sign-out-alt fa-2x"></i>
            </a>
        </header>

        <!-- Main -->
        <div class="main">
            <h2>PASSENGER DATA</h2>
            <div class="card">
                <div class="card-body">
                    <i class="fa fa-pen fa-xs edit"></i>
                    <table>
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <td> <?php echo $passenger["name"];?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td> <?php echo $passenger["email"];?></td>
                            </tr>
                            <!-- <tr>
                                <td>Address</td>
                                <td>:</td>
                                <td></td>
                            </tr> -->
                            <tr>
                                <td>Password</td>
                                <td>:</td>
                                <td> <?php echo $passenger["password"];?></td>
                            </tr>
                            <tr>
                                <td>Telephone</td>
                                <td>:</td>
                                <td> <?php echo $passenger["telephone"];?></td>
                            </tr>
                            <tr>
                                <td>Account</td>
                                <td>:</td>
                                <td><?php echo $passenger["account"];?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="buttons">
                        <button id="save">Save</button><button id="cancel">Cancel</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <footer>
        &copy;CloudCriuse
    </footer>
    <!-- End -->
    <script src="Passenger-profile.js"></script>
</body>

</html>