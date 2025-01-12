<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include PHPMailer library
require 'Github-PHPMailer/src/Exception.php';
require 'Github-PHPMailer/src/PHPMailer.php';
require 'Github-PHPMailer/src/SMTP.php';

// Function to generate OTP
function generateOTP($length = 6) {
    return rand(pow(10, $length-1), pow(10, $length)-1);
}

// Database connection parameters
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

$error = '';
$otpSent = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Check if email exists in the database
    $check_email_sql = "SELECT * FROM user WHERE email = ?";
    $check_email_stmt = $conn->prepare($check_email_sql);
    $check_email_stmt->bind_param("s", $email);
    $check_email_stmt->execute();
    $result = $check_email_stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Email exists, generate OTP and send email
        $otp = generateOTP();
        $_SESSION['otp'] = $otp;
        $_SESSION['email'] = $email;
        
        // Send OTP via email
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Your SMTP host
        $mail->SMTPAuth = true;
        $mail->Username = 'mail.me.akashdip2001@gmail.com'; // Your SMTP username
        $mail->Password = 'jwswuewqvmthgylc'; // Your SMTP password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('mail.me.akashdip2001@gmail.com', 'AkashdipMahapatra'); // Sender's email and name
        $mail->addAddress($email); // Recipient's email
        $mail->isHTML(true);
        $mail->Subject = 'OTP Verification';
        $mail->Body = 'Your OTP is: ' . $otp . '\nAkashdip Mahapatra \nBtech 3rd Year \nMecanical Engiaring (passOut 2025) \nand the password - subscribe_akashdip';

        
        if ($mail->send()) {
            // OTP sent successfully
            $otpSent = true;
        } else {
            // Failed to send OTP
            $error = "Failed to send OTP. Please try again.";
        }
    } else {
        // Email does not exist
        $error = "User not found. Please sign up first.";
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Your CSS styles here */
         body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin-top: 50px;
        }

        h2 {
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

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input[type="email"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            background-color: rgba(255, 255, 255, 0.6); /* Adjust the opacity as needed */
            border: none;
            outline: none;
            border-radius: 8px;
            box-shadow: rgba(0, 0, 0, 0.1) 0 2px 4px;
        }

        input[type="email"]::placeholder {
    color: rgba(0, 0, 0, 0.5); /* Adjust the opacity as needed */
}

        button[type="submit"] {
    width: 100%;
    background-color: rgba(52, 152, 219, 0.8); /* Adjust the opacity and color as needed */
    color: #fff;
    font-weight: bold; /* Making the text bold */
    padding: 10px 15px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    border-radius: 8px;
    opacity: 0.8; /* Adjust the opacity as needed */
}

        

        .error {
            color: red;
            margin-top: 10px;
        }

        .otp-section {
            margin-top: 20px;
        }

        .otp-section input[type="text"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            background-color: rgba(255, 255, 255, 0.6); /* Adjust the opacity as needed */
            border: none;
            outline: none;
            border-radius: 8px;
            box-shadow: rgba(0, 0, 0, 0.1) 0 2px 4px;
        }

        .otp-section button {
            width: 100%; /* Full width submit button */
            background-color: transparent;
            color: #3498db;
            padding: 10px 15px;
            border: 2px solid #3498db;
            border-radius: 3px;
            cursor: pointer;
            border-radius: 8px;
            }

         .signup-button {
    background-color: transparent;
    color: #3498db;
    border: none;
    padding: 10px 15px;
    border-radius: 3px;
    cursor: pointer;
    text-decoration: none;
    display: block;
    margin-top: 20px; /* Added margin to separate from form */
    position: relative; /* Required for positioning the pseudo-element */
}

.signup-button::after {
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


        .direct-login {
            background-color: transparent;
            color: #3498db;
            border: none;
            top: 10px;
            padding: 10px 15px;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
            display: block;
            margin-top: 20px; /* Added margin to separate from form */
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

    <h2>verify to login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="enter your sign-up email" required>
        </div>
        <div class="error"><?php echo $error; ?></div>
        <button type="submit">Send OTP</button>
    </form>
    <a href="signup.php" class="signup-button">sign up</a>
    <a href="direct-login/direct-login.html" class="direct-login">.</a>

    <!-- OTP Verification Section -->
    <?php if ($otpSent): ?>
    <div class="otp-section">
        <h2>Enter OTP</h2>
        <form action="verify_otp.php" method="post">
            <div>
                <label for="otp">OTP:</label>
                <input type="text" id="otp" name="otp" placeholder="OTP send to the email" required>
            </div>
            <button type="submit">Verify</button>
        </form>
    </div>
    <?php endif; ?>

</body>
</html>
