<?php
    session_start();
    if(isset( $_SESSION["company_id"])){
        //echo"\n in session";
        $connection_string=mysqli_connect("localhost","root","23622362","bookings"); 
        $q = mysqli_query($connection_string,"select * from company where ID='$_SESSION[company_id]'");
        $company = mysqli_fetch_array($q);
    }else{
        echo" you have to register to access this";
        //header("Location: Register.html");  
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CloudCruise | About Us</title>
  <link rel="icon" type="image/x-icon" href="Imgs/company-logo.png" />
  <style>
    * {
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
      caret-color: transparent;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      min-height: 100vh;
      /* Ensure the container takes up the full height of the viewport */
      display: flex;
      flex-direction: column;
      margin: 0 auto;
      padding: 0;
      overflow-x: hidden;
      font-family: "Raleway", sans-serif;
      background-image: url("Imgs/background.jpg");
      background-size: cover;
      background-repeat: no-repeat;
    }

    /* Your existing CSS styles */

    .overlay {
      flex: 1;
      /* Fill the remaining space in the container */
      background-color: rgb(0 0 0 / 60%);
      display: flex;
      flex-direction: column;
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


    h1 {
      text-align: center;
      margin-bottom: 20px;
    }

    p {
      letter-spacing: 1px;
    }

    .flights-cards {
      width: fit-content;
      padding: 15px;
      margin: 0 auto;
      display: flex;
      flex-direction: row;
      flex-wrap: wrap;
      justify-content: center;
    }

    @media (max-width:1029px) {
      .flights-cards {
        width: fit-content;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
      }

    }

    .card {
      margin: 15px;
      background-color: #b5cad7f2;
      border-radius: 5px;
      transition: 0.5s ease-in-out;
      cursor: pointer;
    }

    .card .info {
      color: #122633;
      padding: 15px;
      text-align: left;
      caret-color: transparent;
    }

    .card .info p {
      font-weight: normal;
    }


    .card img {
      caret-color: transparent;
      width: 300px;
      height: 200px;
      border-radius: 5px;
      object-fit: cover;
    }

    .card:hover {
      background-color: #a1b6c3f2;
      transform: scale(0.95);
    }

    .about-section {
      margin: 100px 0;
      padding: 50px 0;
      text-align: center;
      background-color: #8995a7a8;
      color: #ffffffeb;
    }

    .about-section h1 {
      font-weight: normal;
    }

    .about-section p {
      line-height: 1.8;
      font-weight: normal;
    }

    .contact {
      background-color: #8995a7a8;
      height: fit-content;
      text-align: center;
      padding: 50px 0;
      margin: 100px 0;
    }

    .contact h1 {
      color: #ffffffeb;
      font-weight: normal;
      font-size: 40px;
      margin: 0 0 15px 0;
    }

    .contact p {
      padding: 0;
      font-size: 16px;
      color: #ffffffeb;
      margin: 0 0 5px 0;
    }

    .contact button {
      margin: 5px 0;
      border: none;
      outline: 0;
      border-radius: 3px;
      display: inline-block;
      padding: 8px;
      font-weight: normal;
      letter-spacing: 2px;
      color: #ffffffeb;
      background-color: #43a1d6;
      text-align: center;
      cursor: pointer;
      width: 150px;
      transition: 0.8s ease;
    }

    .contact button:hover {
      background-color: #43a1d6;
      transform: scale(1.1);
    }

    #flights-title {
      font-size: 26px;
      color: #ffffffeb;
      font-weight: normal;
      letter-spacing: 1px;
      text-transform: uppercase;
      width: fit-content;
      text-align: center;
      margin: 0 auto;
      white-space: nowrap;
    }
  </style>
</head>

<body>
  <div class="overlay">
    <header>
      <img src="Imgs/company-logo.png" alt="Company Logo" />
      <h1>CloudCruise</h1>
    </header>

    <main>
      <div class="about-section">
        <h1>ABOUT US</h1>
        <p>
          Embark on a journey with CloudCruise, where every flight is a chapter in
          your adventure, and every destination is a story waiting to unfold.<br>Your
          dream voyage begins here.
        </p>
      </div>
      <h2 id="flights-title">
        Explore our top-flight options for your next journey
      </h2>
      <div class="flights-cards">
        <div class="card">
          <img src="Imgs/cairo-guide.jpg" alt="country image" />
          <div class="info">
            <h2>Country, City</h2>
            <p>Flight Number : <span></span></p>
            <p>Airline : </p>
          </div>
        </div>

        <div class="card">
          <img src="Imgs/newyork_square.jpg" alt="country image" />
          <div class="info">
            <h2>Country, City</h2>
            <p>Flight Number : <span></span></p>
            <p>Airline : </p>
          </div>
        </div>

        <div class="card">
          <img src="Imgs/paris_guide.jpg" alt="country image" />
          <div class="info">
            <h2>Country, City</h2>
            <p>Flight Number : <span></span></p>
            <p>Airline : </p>
          </div>
        </div>

      </div>

      <section class="contact">
        <h1>CONTACT US</h1>
        <p><?php echo $company["name"];?></p>
        <p><?php echo $company["address"]." .  ";
         echo $company["location"];
        ?></p>
        <p><?php echo $company["email"];?></p>
        <button id="button">Message Us</button>
      </section>

    </main>

    <footer>
      &copy;CloudCruise
    </footer>
  </div>
  <script src="About.js"></script>
</body>

</html>