<?php
session_start();

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Function to sanitize input data
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if OTP is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize the entered OTP
    $enteredOTP = sanitizeInput($_POST['otp']);
    echo "Entered OTP: " . $enteredOTP . "<br>";

    // Check if the entered OTP matches the OTP stored in the session
    if (isset($_SESSION['otp']) && strval($_SESSION['otp']) === strval($enteredOTP)) {
        // OTP is correct, set a variable to true
        $otp_matched = true;
    } else {
        // OTP is incorrect, set a variable to false
        $otp_matched = false;
        echo "Invalid OTP!";
    }
} else {
    // If OTP is not submitted via POST request, set the variable to false
    $otp_matched = false;
    echo "OTP not submitted!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome Page</title>
    <style>
        /* CSS styles for the welcome button */
        body {
            margin: auto;
            font-family: -apple-system, BlinkMacSystemFont, sans-serif;
            overflow: auto;
            background: linear-gradient(315deg, rgba(101,0,94,1) 3%, rgba(60,132,206,1) 38%, rgba(48,238,226,1) 68%, rgba(255,25,25,1) 98%);
            animation: gradient 15s ease infinite;
            background-size: 400% 400%;
            background-attachment: fixed;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 0%;
            }
            50% {
                background-position: 100% 100%;
            }
            100% {
                background-position: 0% 0%;
            }
        }

        .wave {
            background: rgb(255 255 255 / 25%);
            border-radius: 1000% 1000% 0 0;
            position: fixed;
            width: 200%;
            height: 12em;
            animation: wave 10s -3s linear infinite;
            transform: translate3d(0, 0, 0);
            opacity: 0.8;
            bottom: 0;
            left: 0;
            z-index: -1;
        }

        .wave:nth-of-type(2) {
            bottom: -1.25em;
            animation: wave 18s linear reverse infinite;
            opacity: 0.8;
        }

        .wave:nth-of-type(3) {
            bottom: -2.5em;
            animation: wave 20s -1s reverse infinite;
            opacity: 0.9;
        }

        @keyframes wave {
            2% {
                transform: translateX(1);
            }

            25% {
                transform: translateX(-25%);
            }

            50% {
                transform: translateX(-50%);
            }

            75% {
                transform: translateX(-25%);
            }

            100% {
                transform: translateX(1);
            }
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.5); /* Adjust the opacity as needed */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

       /* h1 {
            font-size: 35px;
            font-weight: 300;
            background-image: #fefcff;
            color: transparent;
            background-clip: text;
            -webkit-background-clip: text;
            text-align: center;
        } */

        p {
            font-size: 20px;
            font-weight: 100;
            color: #fff;
            text-align: center;
        }

        #welcome-btn {
            background: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(255, 255, 254, 0.3), rgba(255, 255, 254, 0.5), rgba(0, 0, 0, 0)); /* Gradient effect */
            color: #522973;
            border: none;
            padding: 10px 15px;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
            margin-top: 20px; /* Added margin to separate from form */
            position: relative; /* Required for positioning the pseudo-element */
            text-align: center;
            display: <?php echo ($otp_matched ? 'block' : 'none'); ?>; /* Show button if OTP matched */
        }

        #welcome-btn::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.5); /* Transparent white color */
            border-radius: 3px;
            z-index: -1; /* Ensure the pseudo-element is behind the text */
        }

.profile-pic-container {
    display: flex;
    align-items: center;
    justify-content: center; /* horizontally center the content */
}

.profile-pic-container img {
    width: 200px; /* Adjust the size of the profile picture */
    height: 200px;
    border-radius: 50%; /* Makes the image round */
}

    </style>
</head>
<body>
<div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>

    <form>
    <div class="profile-pic-container">
        <img src="img/akashdipMahapatra1.jpeg" alt="akashdipmahapatra2024">
    </div>
        <p>If you do not see any button - Close the app & Try again</p>
    </form>

    <a href="home.php" id="welcome-btn">Click to Next</a>
    <br>
    <form>
        <p>In the Next page, one more password is needed to enter</p>
        <p>and someTime need UserName & Passward to Login - So don't forget it</p>
    </form>
</div>
</body>
</html>