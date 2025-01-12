<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="icon" href="https://raw.githubusercontent.com/akashdip2001/website-2/main/images/favicon.jpg?token=GHSAT0AAAAAACMGYPVOP4ZUPUDP4Q2FKSEWZNNHMWA">
    <link rel="stylesheet" href="leaf-animations.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            text-align: center;
        }

        h1 {
            color: #333;
            font-size: 24px; /* Adjusted font size for better visibility on mobile */
            padding: 0 20px; /* Added padding to ensure text doesn't overflow */
        }

        .button-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .button {
            /* background-color: #4CAF50; */
            background-image: linear-gradient(-180deg, #00D775, #00BD68);
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            margin: 10px;
            cursor: pointer;
            border-radius: 5px;
            box-shadow: rgba(44, 187, 99, .2) 0 -25px 18px -14px inset,rgba(44, 187, 99, .15) 0 1px 2px,rgba(44, 187, 99, .15) 0 2px 4px,rgba(44, 187, 99, .15) 0 4px 8px,rgba(44, 187, 99, .15) 0 8px 16px,rgba(44, 187, 99, .15) 0 16px 32px;
        }

        .button:hover {
            background-color: #45a049;
        }

        .image-container {
            display: none; /* Initially hide the image container */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9); /* Semi-transparent black background */
            z-index: 999; /* Ensure it appears on top of other elements */
            overflow: auto;
        }

        .image-container img {
            display: block;
            margin: auto;
            max-width: 90%; /* Adjust the maximum width of images */
            max-height: 90%; /* Adjust the maximum height of images */
            padding: 20px; /* Add padding around the images */
        }

         .policy {
            background-color: transparent; /* Transparent background */
            color: #089938; /* Button text color */
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


        /* Center-align <p> tags within .button-container */
    .button-container p {
        text-align: center;
    }

    </style>
</head>
<body>
<div id="leaves">
  <i></i>
  <i></i>
  <i></i>
  <i></i>
  <i></i>
  <i></i>
  <i></i>
  <i></i>
  <i></i>
  <i></i>
  <i></i>
  <i></i>
  <i></i>
  <i></i>
  <i></i> 

    <div class="button-container">
        <h1>Welcome to my app</h1><br>
        <p> Akashdip Mahapatra 3rd year<br>Mechanical Engineering<br>it's my 2nd app 27/01/2024</p><br>
        <p>National Award from India president<br>Pranab Mukherjee 2012<br>Delhi - Vigyan Bhavan</p><br>
        <button onclick="showImages()" class="button">Show Images</button>
        <div class="image-container" id="imageContainer">
            <span onclick="hideImages()" style="color: white; position: absolute; top: 20px; right: 20px; cursor: pointer;">&times;</span>
            <img src="https://akashdipmahapatra.netlify.app/wp-content/uploads/2022/06/Screenshot_20220625-012147_Photos.jpg" alt="Image 1">
            <img src="https://akashdipmahapatra.netlify.app/wp-content/uploads/2022/06/Screenshot_20220625-011521_Photos.jpg" alt="Image 2">
            <img src="https://akashdipmahapatra.netlify.app/wp-content/uploads/2022/06/FKitsPTakAAQf83.jpeg" alt="Image 3">
            <img src="https://akashdipmahapatra.netlify.app/wp-content/uploads/2022/06/FKitrVcakAEVAfK.jpeg" alt="Image 4">
        </div>
        <a href="signup.php" class="button">Sign Up</a>
        <a href="login-email.php" class="button">Login</a>
        <a href="policy.html" class="policy">Terms of Service</a>
    </div>

</div>
    <script>
        function showImages() {
            document.getElementById("imageContainer").style.display = "block";
        }

        function hideImages() {
            document.getElementById("imageContainer").style.display = "none";
        }
    </script>
</body>
</html>
