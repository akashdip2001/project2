<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="icon" href="https://raw.githubusercontent.com/akashdip2001/website-2/main/images/favicon.jpg?token=GHSAT0AAAAAACMGYPVOP4ZUPUDP4Q2FKSEWZNNHMWA">

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
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            margin: 10px;
            cursor: pointer;
            border-radius: 5px;
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

         .login {
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
    </style>
</head>
<body>
    <div class="button-container">
        <h1>direct login page</h1><br>
        
        <a href="http://freecadapp2.000.pe/app-web/freecad-videos/home.html" class="button">Home Page</a>
        <a href="https://freecadapp2.000.pe/app-web/freecad-videos/freecad.html" class="button">FreeCAD Page</a>
        <a href="http://freecadapp2.000.pe/login/login.php" class="login">login with pass</a>
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
