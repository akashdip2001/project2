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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username and mobile number are provided
    if (isset($_POST['username']) && isset($_POST['mobile'])) {
        $username = $_POST['username'];
        $mobile = $_POST['mobile'];

        // Check if the user exists in the database
        $sql = "SELECT * FROM user WHERE username = ? AND mobile = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $mobile);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // User exists, show input box for new password
            echo '
            <form action="" method="post">
                <input type="password" name="new_password" placeholder="Enter your new password"><br>
                <input type="submit" value="Reset Password">
            </form>';
        } else {
            // No account found, prompt to sign up first
            echo "No account found - sign up first";
        }
    } elseif (isset($_POST['new_password'])) {
        // Password reset
        $new_password = $_POST['new_password'];
        // Update the password in the database for the user
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $update_sql = "UPDATE user SET password = ? WHERE username = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ss", $hashed_password, $username);

        if ($update_stmt->execute()) {
            echo "Your password has been reset successfully";
        } else {
            echo "Error resetting password";
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
    <title>Password Reset</title>
</head>
<body>
    <h2>Password Reset</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="text" name="username" placeholder="Enter username"><br>
        <input type="text" name="mobile" placeholder="Enter mobile number"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
