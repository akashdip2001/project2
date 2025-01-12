<?php
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

$signup_error = ''; // Initialize signup error variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile']; // New field for mobile number
    $signup_date = $_POST['signup_date']; // New field for signup date

    // Check if username already exists
    $check_username_sql = "SELECT * FROM user WHERE username = ?";
    $check_username_stmt = $conn->prepare($check_username_sql);
    $check_username_stmt->bind_param("s", $username);
    $check_username_stmt->execute();
    $existing_username = $check_username_stmt->get_result()->fetch_assoc();

    // Check if email already exists
    $check_email_sql = "SELECT * FROM user WHERE email = ?";
    $check_email_stmt = $conn->prepare($check_email_sql);
    $check_email_stmt->bind_param("s", $email);
    $check_email_stmt->execute();
    $existing_email = $check_email_stmt->get_result()->fetch_assoc();

    // Check if mobile number already exists
    $check_mobile_sql = "SELECT * FROM user WHERE mobile = ?";
    $check_mobile_stmt = $conn->prepare($check_mobile_sql);
    $check_mobile_stmt->bind_param("s", $mobile);
    $check_mobile_stmt->execute();
    $existing_mobile = $check_mobile_stmt->get_result()->fetch_assoc();

    if ($existing_username) {
        $signup_error = "Username already exists";
    } elseif ($existing_email) {
        $signup_error = "Email already exists,<br>any problam WatsApp 7076033011";
    } elseif ($existing_mobile) {
        $signup_error = "Mobile number already exists";
    } else {
        // Check if email ends with "edu.in"
        if (!preg_match("/@(.+)\.edu\.in$/", $email)) {
            $signup_error = "Must use college email";
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // SQL to insert data into table
            $sql = "INSERT INTO user (username, email, password, mobile, signup_date) 
                    VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $username, $email, $hashed_password, $mobile, $signup_date);
            if ($stmt->execute()) {
                // Redirect user after successful signup
                header("Location: login.php");
                exit();
            } else {
                $signup_error = "Error: " . $stmt->error;
            }
        }
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.5); /* Adjust the opacity as needed */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="date"],
        input[type="tel"] {
            width: calc(100% - 22px); /* Adjusted width for better alignment */
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            display: inline-block; /* Ensure inline display */
            background-color: rgba(255, 255, 255, 0.6); /* Adjust the opacity as needed */
            border: none;
            outline: none;
            border-radius: 8px;
            box-shadow: rgba(0, 0, 0, 0.1) 0 2px 4px;
        }

        input[type="submit"] {
            width: 100%; /* Full width submit button */
            background-color: transparent;
            color: #3498db;
            padding: 10px 15px;
            border: 2px solid #3498db;
            border-radius: 3px;
            cursor: pointer;
            border-radius: 8px;
        }

        .error {
            color: red;
            font-size: 15px;
            position: relative;
            top: -30px;
        }

         .login-button {
            background: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(255, 255, 254, 0.3), rgba(255, 255, 254, 0.5), rgba(0, 0, 0, 0)); /* Gradient effect */
            color: #3498db;
            border: none;
            padding: 10px 15px;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
            display: block;
            margin-top: 20px; /* Added margin to separate from form */
        }

         .policy {
            /* background-color: transparent;*/
            background: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(255, 255, 254, 0.3), rgba(255, 255, 254, 0.5), rgba(0, 0, 0, 0)); /* Gradient effect */
            color: #089938;
            border: none;
            padding: 10px 15px;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
            display: block;
            margin-top: 20px; /* Added margin to separate from form */
        }

        /* Make paragraphs slightly transparent and hidden by default */
        form p {
            opacity: 0.8;
            margin-top: 0; /* Remove top margin */
            display: none; /* Hide paragraphs by default */
        }

        /* Background effect styles */
        #bg-wrap {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        svg {
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>

<!-- Background effect -->
<div id="bg-wrap">
  <svg viewBox="0 0 100 100" preserveAspectRatio="xMidYMid slice">
    <defs>
      <radialGradient id="Gradient1" cx="50%" cy="50%" fx="0.441602%" fy="50%" r=".5"><animate attributeName="fx" dur="34s" values="0%;3%;0%" repeatCount="indefinite"></animate><stop offset="0%" stop-color="rgba(255, 0, 255, 1)"></stop><stop offset="100%" stop-color="rgba(255, 0, 255, 0)"></stop></radialGradient>
      <radialGradient id="Gradient2" cx="50%" cy="50%" fx="2.68147%" fy="50%" r=".5"><animate attributeName="fx" dur="23.5s" values="0%;3%;0%" repeatCount="indefinite"></animate><stop offset="0%" stop-color="rgba(255, 255, 0, 1)"></stop><stop offset="100%" stop-color="rgba(255, 255, 0, 0)"></stop></radialGradient>
      <radialGradient id="Gradient3" cx="50%" cy="50%" fx="0.836536%" fy="50%" r=".5"><animate attributeName="fx" dur="21.5s" values="0%;3%;0%" repeatCount="indefinite"></animate><stop offset="0%" stop-color="rgba(0, 255, 255, 1)"></stop><stop offset="100%" stop-color="rgba(0, 255, 255, 0)"></stop></radialGradient>
      <radialGradient id="Gradient4" cx="50%" cy="50%" fx="4.56417%" fy="50%" r=".5"><animate attributeName="fx" dur="23s" values="0%;5%;0%" repeatCount="indefinite"></animate><stop offset="0%" stop-color="rgba(0, 255, 0, 1)"></stop><stop offset="100%" stop-color="rgba(0, 255, 0, 0)"></stop></radialGradient>
      <radialGradient id="Gradient5" cx="50%" cy="50%" fx="2.65405%" fy="50%" r=".5"><animate attributeName="fx" dur="24.5s" values="0%;5%;0%" repeatCount="indefinite"></animate><stop offset="0%" stop-color="rgba(0,0,255, 1)"></stop><stop offset="100%" stop-color="rgba(0,0,255, 0)"></stop></radialGradient>
      <radialGradient id="Gradient6" cx="50%" cy="50%" fx="0.981338%" fy="50%" r=".5"><animate attributeName="fx" dur="25.5s" values="0%;5%;0%" repeatCount="indefinite"></animate><stop offset="0%" stop-color="rgba(255,0,0, 1)"></stop><stop offset="100%" stop-color="rgba(255,0,0, 0)"></stop></radialGradient>
    </defs>
    <rect x="13.744%" y="1.18473%" width="100%" height="100%" fill="url(#Gradient1)" transform="rotate(334.41 50 50)"><animate attributeName="x" dur="20s" values="25%;0%;25%" repeatCount="indefinite"></animate><animate attributeName="y" dur="21s" values="0%;25%;0%" repeatCount="indefinite"></animate><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="7s" repeatCount="indefinite"></animateTransform></rect>
    <rect x="-2.17916%" y="35.4267%" width="100%" height="100%" fill="url(#Gradient2)" transform="rotate(255.072 50 50)"><animate attributeName="x" dur="23s" values="-25%;0%;-25%" repeatCount="indefinite"></animate><animate attributeName="y" dur="24s" values="0%;50%;0%" repeatCount="indefinite"></animate><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="12s" repeatCount="indefinite"></animateTransform>
    </rect>
    <rect x="9.00483%" y="14.5733%" width="100%" height="100%" fill="url(#Gradient3)" transform="rotate(139.903 50 50)"><animate attributeName="x" dur="25s" values="0%;25%;0%" repeatCount="indefinite"></animate><animate attributeName="y" dur="12s" values="0%;25%;0%" repeatCount="indefinite"></animate><animateTransform attributeName="transform" type="rotate" from="360 50 50" to="0 50 50" dur="9s" repeatCount="indefinite"></animateTransform>
    </rect>
  </svg>
</div>

    <h1>Sign Up</h1>
    <form action="register.php" method="post">
        <input type="text" name="username" placeholder="Username"><br>
        <div class="error" id="usernameError"></div> <!-- Error message for username -->
        <input type="email" name="email" placeholder="Email"><br>
        <div class="error" id="emailError"></div> <!-- Error message for email -->
        <input type="tel" name="mobile" placeholder="Mobile Number"><br>
        <div class="error" id="mobileError"></div> <!-- Error message for mobile -->
        <input type="password" name="password" placeholder="Password"><br>
        <div class="error" id="passwordError"></div> <!-- Error message for password -->
        <input type="date" name="signup_date" id="signup_date" placeholder="Signup Date"><br>
        <div class="error" id="signupDateError"><?php echo $signup_error; ?></div> <!-- Error message for signup date -->
        <input type="submit" value="Sign Up">
    </form>
    <a href="login-email.php" class="login-button">already registered - login</a>
    <a href="policy.html" class="policy">Terms of Service</a>

    <!-- JavaScript to validate form fields -->
    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            const username = document.querySelector('input[name="username"]').value.trim();
            const email = document.querySelector('input[name="email"]').value.trim();
            const mobile = document.querySelector('input[name="mobile"]').value.trim();
            const password = document.querySelector('input[name="password"]').value.trim();
            const signupDate = document.querySelector('input[name="signup_date"]').value.trim();

            let isValid = true;

            // Validate username
            if (username === '') {
                document.getElementById('usernameError').innerText = 'Empty';
                isValid = false;
            } else {
                document.getElementById('usernameError').innerText = '';
            }

            // Validate email
            if (email === '') {
                document.getElementById('emailError').innerText = 'Empty';
                isValid = false;
            } else {
                document.getElementById('emailError').innerText = '';
            }

            // Validate mobile number
            if (mobile === '') {
                document.getElementById('mobileError').innerText = 'Empty';
                isValid = false;
            } else {
                document.getElementById('mobileError').innerText = '';
            }

            // Validate password
            if (password === '') {
                document.getElementById('passwordError').innerText = 'Empty';
                isValid = false;
            } else {
                document.getElementById('passwordError').innerText = '';
            }

            // Validate signup date
            if (signupDate === '') {
                document.getElementById('signupDateError').innerText = 'Empty';
                isValid = false;
            } else {
                document.getElementById('signupDateError').innerText = '';
            }

            if (!isValid) {
                e.preventDefault();
            }
        });
    </script>
</body>
</html>