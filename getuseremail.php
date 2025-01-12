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
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate username and password (you may want to add more robust validation)
    if (empty($username) || empty($password)) {
        die("Please enter both username and password.");
    }

    // Sanitize user input and use prepared statements to prevent SQL injection
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    // Hash the password before querying the database
    $hashedPassword = hash('sha256', $password);

    // Fetch user's email based on the provided username and password
    $sql = "SELECT email FROM user WHERE username = '$username' AND password = '$hashedPassword'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userEmail = $row['email'];

        echo $userEmail; // Return the user's email
    } else {
        echo ""; // Return an empty string if no matching user is found
    }
}

$conn->close();
?>
