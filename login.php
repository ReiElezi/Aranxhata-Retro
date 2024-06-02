<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "arenxhata";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Prepare and execute query using prepared statement
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "s", $email);

    // Execute statement
    mysqli_stmt_execute($stmt);

    // Get result
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Verify password
        if (password_verify($password, $row['password'])) {
            // Password verified, set session variables
            $_SESSION['email'] = $email;
            $_SESSION['firstName'] = $row['firstName']; // Assuming you have firstName in your users table
            $_SESSION['lastName'] = $row['lastName']; // Assuming you have lastName in your users table

            // Redirect to dashboard page (replace rei.php with your actual dashboard page)
            header('Location: rei.php');
            exit;
        } else {
            // Incorrect password
            echo "Incorrect password!";
        }
    } else {
        // User not found
        echo "User not found!";
    }

    // Close statement
    mysqli_stmt_close($stmt);
} else {
    // Handle case where form wasn't submitted
    header('Location: login.html');
}

// Close connection
mysqli_close($conn);
