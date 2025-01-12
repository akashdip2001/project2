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

$mobile_number = $_POST['mobile_number'] ?? '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && $mobile_number !== '') {
    // Prepare SQL statement to retrieve username and email based on mobile number
    $sql = "SELECT username, email FROM user WHERE mobile = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $mobile_number);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Mobile number found, fetch username and email
        $stmt->bind_result($username, $email);
        $stmt->fetch();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Forgot Username</title>
        </head>
        <body>
            <h1>Forgot Username</h1>
            <p>Username: <?php echo $username; ?></p>
            <p>Email: <?php echo $email; ?></p>
            <p>If you forget your password - contact 7076033011.</p>
            <div class="login-link">
        <a href="login.php">Log in</a>
    </div>
        </body>
        </html>
        <?php
    } else {
        // Mobile number not found
        echo "Mobile number not found in the database.";
    }

    $stmt->close();
} else {
    // Mobile number not provided
    echo "Please provide a mobile number.";
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Username</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        p {
            margin-top: 15px;
            color: green;
        }

         .login-link {
    margin-top: 20px;
    color: red;
    text-decoration: none; /* Remove underline */
    cursor: pointer;
}

    </style>
</head>
<body>
    <h1>Forgot Username</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="mobile_number">Enter Mobile Number:</label>
        <input type="text" id="mobile_number" name="mobile_number" required>
        <button type="submit">Submit</button>
    </form>
    <p>If you forget your password - contact 7076033011.</p>
</body>
</html>
