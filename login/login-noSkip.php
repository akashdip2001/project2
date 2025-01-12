<?php
session_start();

$login_error = ''; // Initialize login error variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "sql209.byetcluster.com";
    $username = "if0_35853988"; // Replace with your MySQL username
    $password = "eFCjtRCxB8"; // Replace with your MySQL password
    $dbname = "if0_35853988_freecad_app_02_database"; // Replace with your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Prepare SQL statement to retrieve user data
    $sql = "SELECT * FROM user WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // User found, verify password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password is correct, set session variables
            $_SESSION['username'] = $username;
            // Redirect to home page
            header("Location: home.php");
            exit();
        } else {
            // Password is incorrect
            $login_error = "Invalid password";
        }
    } else {
        // User not found
        $login_error = "User not found";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="https://raw.githubusercontent.com/akashdip2001/website-2/main/images/favicon.jpg?token=GHSAT0AAAAAACMGYPVOP4ZUPUDP4Q2FKSEWZNNHMWA">

    <style>
        /* CSS styles */
        /* body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            text-align: center;
            position: relative; 
        } */

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

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.5); /* Adjust the opacity as needed */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            background-color: rgba(255, 255, 255, 0.6); /* Adjust the opacity as needed */
            border: none;
            outline: none;
            border-radius: 8px;
            box-shadow: rgba(0, 0, 0, 0.1) 0 2px 4px;
        }

        input[type="submit"] {
            background-color: transparent; /* Transparent background */
            color: #3498db; /* Button text color */
            padding: 10px 15px;
            border: 2px solid #3498db; /* Add border */
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s; /* Smooth transition effect */
            border-radius: 8px;
        }

        input[type="submit"]:hover {
            background-color: #3498db; /* Change background on hover */
            color: #fff; /* Change text color on hover */
        }

        .error {
            background: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(255, 255, 254, 0.3), rgba(255, 255, 254, 0.5), rgba(0, 0, 0, 0)); /* Gradient effect */
            color: white;
            text-align: center;
        }

        p {
            text-align: center;
        }

        .signup-button {
            background: transparent;
            color: #3498db; /* Button text color */
            border: none;
            padding: 10px 15px;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
            display: block;
            position: fixed; /* Positioning at bottom */
            bottom: 55px; /* Distance from bottom */
            left: 50%; /* Center horizontally */
            transform: translateX(-50%); /* Center horizontally */
            width: auto;
            transition: background-color 0.3s, color 0.3s; /* Smooth transition effect */
        }

        .policy {
            background: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(255, 255, 254, 0.3), rgba(255, 255, 254, 0.5), rgba(0, 0, 0, 0)); /* Gradient effect */
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

       
        /* Add a new style for the "Forgot Username" link */
        .forgot-username-link {
            background: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(255, 255, 254, 0.3), rgba(255, 255, 254, 0.5), rgba(0, 0, 0, 0)); /* Gradient effect */
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div>
     <div class="wave"></div>
     <div class="wave"></div>
     <div class="wave"></div>

    <h1>Login</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="text" name="username" placeholder="Username"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="submit" value="Login">
    </form>
     <!-- Display "Forget Username" link below the login button -->
    <p class="forgot-username-link" onclick="location.href='forgot_username.php';">Forgot Username?</p>

    <div class="error"><?php echo $login_error; ?></div>
    <a href="signup.php" class="signup-button">sign up</a>
    <a href="policy.html" class="policy">Terms of Service</a>

</div>
</body>
</html>
