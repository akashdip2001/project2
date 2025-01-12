<?php
session_start();

// Check if the user is logged in and is Akashdip Mahapatra
if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'akashdip2001') {
    // If not logged in or not Akashdip Mahapatra, redirect to login page
    header("Location: login.php");
    exit();
}

// Check if the password is entered and correct
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['password'])) {
    $entered_password = $_POST['password'];
    // Check if entered password matches the correct password
    if ($entered_password === 'kali2001') {
        // Password is correct, continue to display user data
    } else {
        // Incorrect password, display error message and exit
        echo "Incorrect password!";
        exit();
    }
} else {
    // If password is not entered, display password popup
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Password Popup</title>
        <style>
            /* CSS for password popup */
            body {
                font-family: Arial, sans-serif;
                background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh; /* Full viewport height */
                margin: 0;
            }

            .password-popup {
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            }

            input[type="password"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
                box-sizing: border-box;
            }

            input[type="submit"] {
                background-color: #3498db;
                color: #fff;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <div class="password-popup">
            <h2>This page is only for Akashdip Mahapatra</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="password" name="password" placeholder="Enter Password">
                <br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </body>
    </html>
    <?php
    exit(); // Exit script after displaying password popup
}

// Include database connection
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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
    <style>
        /* CSS for table styling */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>User Data</h1>
    <table>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Mobile Number</th>
            <th>Signup Date</th>
        </tr>
        <?php
        // Fetch and display user data from the database
        $sql = "SELECT username, email, mobile, signup_date FROM user";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["mobile"] . "</td>";
                echo "<td>" . $row["signup_date"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No users found</td></tr>";
        }

        // Close database connection
        $conn->close();
        ?>
    </table>
</body>
</html>
