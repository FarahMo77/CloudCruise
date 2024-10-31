<?php
session_start();

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
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Passenger Home Page</title>
    <link rel="icon" type="image/x-icon" href="Imgs/company-logo.png">
    <style>
        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            font-family: "Raleway", sans-serif;
            background-image: url("Imgs/passenger-background.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }

        /* Your existing CSS styles */

        .overlay {
            width: 100%;
            /* Fill the remaining space in the container */
            background-color: rgb(0 0 0 / 60%);
        }

        footer {
            background-color: rgb(90 95 109 / 70%);
            color: #ffffffeb;
            width: 100%;
            font-size: 14px;
            text-align: center;
            padding: 10px 0;
            height: 40px;
            /* Set a fixed height for the footer */
            margin-top: auto;
            /* Push the footer to the bottom of the container */
        }


        header {
            width: 100%;
            color: #ffffffeb;
            padding: 3px 0;
            position: fixed;
            display: flex;
            align-items: center;
            text-align: left;
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


        h2 {
            margin: 15px 0;
            padding: 0;
            color: #ffffffeb;
            font-size: 40px;
            font-weight: normal;
            letter-spacing: 2px;
            text-transform: uppercase;
            text-align: center;
        }

        .profile p {
            font-weight: 500;
            letter-spacing: 2px;
            color: #ffffffeb;
        }

        .profile p .passenger-info {
            font-weight: bold;
            color: #122633;
            font-style: italic;
        }

        .profile,
        .completed-flights,
        .current-flights {
            box-shadow: 0 0 10px #122633;
            margin: 20px;
            width: 100%;
            padding: 10px;
            background-color: #8995a7f0;
            border-radius: 5px;
            text-align: center;

        }

        .profile img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            display: block;
            border: solid 2px #122633;
            background-color: #b5cad7f2;
            margin: 0 auto;
        }


        .flight-table {
            width: 100%;
            border: solid 2px #122633;
            border-collapse: collapse;
            border-radius: 5px;
            /* Remove space between table cells */
        }

        .flight-table th {
            background-color: #43a1d6;
            font-size: 18px;
            color: #122633;
            letter-spacing: 1px;
            border: solid 1px #122633;
            padding: 10px;
            text-align: center;
            font-size: 15px;
        }

        .flight-table td {
            background-color: #b5cad7f2;
            color: #122633;
            font-style: italic;
            font-weight: 550;
            border: solid 1px #122633;
            padding: 10px;
        }

        main {
            width: 700px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="overlay">


        <header>
            <img src="Imgs/company-logo.png" alt="Company Logo">
            <h1>CloudCruise</h1>
        </header>

        <main>

            <div class="profile">
                <h2>Your profile</h2>
                <img id="passenger-image" src="" alt="">
                <p>Email: <span class="passenger-info"><?php echo $passenger["email"];?></span> </p>
                <p>Phone Number: <span class="passenger-info"><?php echo $passenger["telephone"];?></span></p>
            </div>

            <div class="completed-flights">
                <h2>Completed Flights</h2>
                <table class="flight-table">
                    <thead>
                        <tr>

                        </tr>
                        <th>AIRLINE</th>
                        <th>NUMBER</th>
                        <th>ORIGIN</th>
                        <th>DESTINATION</th>
                        <th>DEPARTURE TIME</th>
                        <th>ARRIVAL TIME</th>
                    </thead>
                    <tbody class="flight-list">
                        <tr>
                            <td>----</td>
                            <td>----</td>
                            <td>----</td>
                            <td>----</td>
                            <td>----</td>
                            <td>----</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="current-flights">
                <h2>Current Flights</h2>
                <table class="flight-table">
                    <thead>
                        <tr>

                        </tr>
                        <th>AIRLINE</th>
                        <th>NUMBER</th>
                        <th>ORIGIN</th>
                        <th>DESTINATION</th>
                        <th>DEPARTURE TIME</th>
                        <th>ARRIVAL TIME</th>
                    </thead>
                    <tbody class="flight-list">
                        <tr>
                            <td>----</td>
                            <td>----</td>
                            <td>----</td>
                            <td>----</td>
                            <td>----</td>
                            <td>----</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </main>

        <footer>
            © CloudCruise
        </footer>
    </div>
    <script src="Passenger.js"></script>
</body>

</html>