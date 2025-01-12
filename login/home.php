<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <style>

@import url('https://fonts.googleapis.com/css?family=Exo:400,700');

*{
    margin: 0px;
    padding: 0px;
}

body{
    font-family: 'Exo', sans-serif;
}


        /* General CSS for styling 
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            margin-top: 50px;
        } */

.context {
    position: relative; /* Make sure the position is relative */
    max-width: 400px;
    margin: 0 auto;
    background-color: rgba(255, 255, 255, 0.4);
    padding: 20px;
    border-radius: 5px;
    /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
    text-align: center;
}

.context::after {
    content: '';
    position: absolute;
    bottom: 0; /* Position at the bottom */
    left: 0;
    width: 100%;
    height: 50px; /* Adjust height as needed */
    background: linear-gradient(to bottom, rgba(149, 152, 222, 0.4) 0%, rgba(149, 152, 222, 0) 60%, #4e54c8 100%); /* Gradient effect */
    pointer-events: none; /* Allow clicks to pass through */
    z-index: 0; /* Place behind the content */
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
}


        h1 {
            color: #333;
        }

        p {
            color: #666;
            margin-bottom: 20px; /* Added margin for better spacing */
        }

        /* Button CSS */
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-image: linear-gradient(-180deg, #00D775, #00BD68);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none; /* Remove default underline */
            margin: 10px; /* Added margin for spacing */
            box-shadow: rgba(44, 187, 99, .2) 0 -25px 18px -14px inset,rgba(44, 187, 99, .15) 0 1px 2px,rgba(44, 187, 99, .15) 0 2px 4px,rgba(44, 187, 99, .15) 0 4px 8px,rgba(44, 187, 99, .15) 0 8px 16px,rgba(44, 187, 99, .15) 0 16px 32px;
        
        }

        .button:hover {
            background-color: #45a049;
        }

        /* Additional styling for links */
        a {
            text-decoration: none;
            color: #fff; /* Set text color for links */
        }

        /* Styling for the paragraph containing the password */
        .password-info {
            background-color: #ddd;
            padding: 10px;
            border-radius: 5px;
            max-width: 400px; /* Limiting width for better readability */
            margin: 0 auto 20px; /* Centering the paragraph and adding margin */
            border: none;
            outline: none;
            border-radius: 8px;
            box-shadow: rgba(0, 0, 0, 0.1) 0 2px 4px;
        }

         .old-links {
            background-color: transparent; /* Transparent background */
            color: #fff; /* Button text color */
            border: none;
            padding: 10px 15px;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
            display: block;
            position: fixed; /* Positioning at bottom */
            bottom: 20px; /* Distance from bottom */
            left: 50%; /* Center horizontally */
            transform: translateX(-50%); /* Center horizontally */
            width: auto;
            transition: background-color 0.3s, color 0.3s; /* Smooth transition effect */
        }



        .app-update-link {
            background: linear-gradient(to right, rgba(242, 113, 33, 0), rgba(255, 255, 254, 0.8), rgba(255, 255, 254, 0.5), rgba(138, 35, 135, 0)); /* Gradient effect */
            color: #ba162f;
            border: none;
            padding: 10px 15px;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
            display: block;
            margin-top: 20px; /* Added margin to separate from form */
        }

        .watsapp-group {
            background: linear-gradient(to right, rgba(242, 113, 33, 0), rgba(255, 255, 254, 0.4), rgba(255, 255, 254, 0.8), rgba(138, 35, 135, 0)); /* Gradient effect */
            color: #0eb35e;
            border: none;
            padding: 10px 15px;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
            display: block;
            margin-top: 20px; /* Added margin to separate from form */
        }


.area{
    background: #4e54c8;  
    background: -webkit-linear-gradient(to left, #8f94fb, #4e54c8);  
    width: 100%;
    height:100vh;
    
   
}

.circles{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.circles li{
    position: absolute;
    display: block;
    list-style: none;
    width: 20px;
    height: 20px;
    background: rgba(255, 255, 255, 0.2);
    animation: animate 25s linear infinite;
    bottom: -150px;
    
}

.circles li:nth-child(1){
    left: 25%;
    width: 80px;
    height: 80px;
    animation-delay: 0s;
}


.circles li:nth-child(2){
    left: 10%;
    width: 20px;
    height: 20px;
    animation-delay: 2s;
    animation-duration: 12s;
}

.circles li:nth-child(3){
    left: 70%;
    width: 20px;
    height: 20px;
    animation-delay: 4s;
}

.circles li:nth-child(4){
    left: 40%;
    width: 60px;
    height: 60px;
    animation-delay: 0s;
    animation-duration: 18s;
}

.circles li:nth-child(5){
    left: 65%;
    width: 20px;
    height: 20px;
    animation-delay: 0s;
}

.circles li:nth-child(6){
    left: 75%;
    width: 110px;
    height: 110px;
    animation-delay: 3s;
}

.circles li:nth-child(7){
    left: 35%;
    width: 150px;
    height: 150px;
    animation-delay: 7s;
}

.circles li:nth-child(8){
    left: 50%;
    width: 25px;
    height: 25px;
    animation-delay: 15s;
    animation-duration: 45s;
}

.circles li:nth-child(9){
    left: 20%;
    width: 15px;
    height: 15px;
    animation-delay: 2s;
    animation-duration: 35s;
}

.circles li:nth-child(10){
    left: 85%;
    width: 150px;
    height: 150px;
    animation-delay: 0s;
    animation-duration: 11s;
}



@keyframes animate {

    0%{
        transform: translateY(0) rotate(0deg);
        opacity: 1;
        border-radius: 0;
    }

    100%{
        transform: translateY(-1000px) rotate(720deg);
        opacity: 0;
        border-radius: 50%;
    }

}

    </style>
</head>
<body>
<div class="area" >
            <ul class="circles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
            </ul>

<div class="context">
    <!-- Heading -->
    <br>
    <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
    <br>
    <!-- Paragraph -->
    <p class="password-info">Next pg password send in email.</p>
    
    <!-- Button -->
    <a href="../app-web/password-html/pRi3sEnT4tIoN7pAsS8wOrD.html" class="button">next</a> 
    <!-- <a href="https://tiny-hamster-b2a057.netlify.app/pri3sent4tion7pass8word" class="button">next</a> -->
    <a href="userdata.php" class="button">Private</a>
    <br>
    <p>This Private button is only for<br>Super-User Akashdip Mahapatra<br>if you are - login again<p>
     <a href="https://linktr.ee/AkashdipMahapatra" class="old-links">my old links</a>
     <a href="https://sites.google.com/view/freecadapp-downlod/home" class="app-update-link">app update available - 14/02/2024</a>
    <a href="http://freecadapp2.000.pe/Contact/Contact-form-to-email.html" class="watsapp-group">Contact me</a>
    <a href="https://freecadapp2.000.pe/deletedUserData/Contact-form-to-email.html?i=1" class="watsapp-group">request Delete my account</a>
</div>

</div >
</body>
</html>
