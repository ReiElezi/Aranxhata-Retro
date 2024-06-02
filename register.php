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
    // Escape user inputs for security
    $fname = mysqli_real_escape_string($conn, $_POST['signupFirstName']);
    $lname = mysqli_real_escape_string($conn, $_POST['signupLastName']);
    $email = mysqli_real_escape_string($conn, $_POST['signupEmail']);
    $password = password_hash($_POST['signupPassword'], PASSWORD_DEFAULT);

    // Check if the email already exists
    $check_sql = "SELECT * FROM users WHERE email = ?";
    $check_stmt = mysqli_prepare($conn, $check_sql);
    mysqli_stmt_bind_param($check_stmt, "s", $email);
    mysqli_stmt_execute($check_stmt);
    mysqli_stmt_store_result($check_stmt);

    if (mysqli_stmt_num_rows($check_stmt) > 0) {
        // Email already exists, handle accordingly (e.g., show error message)
        $_SESSION['error'] = "Email already exists!";
        header('Location: register.php');
        exit;
    } else {
        // Insert into users table using prepared statement
        $sql = "INSERT INTO users (firstName, lastName, email, password) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            // Bind parameters and execute the statement
            mysqli_stmt_bind_param($stmt, "ssss", $fname, $lname, $email, $password);

            if (mysqli_stmt_execute($stmt)) {
                // Registration successful, redirect to login page
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
                header('Location: login.php'); // Redirect to login.php after successful registration
                exit;
            } else {
                // Error handling for execution failure
                $_SESSION['error'] = "Registration failed. Please try again later.";
                header('Location: register.php');
                exit;
            }
        } else {
            // Error handling for prepare statement failure
            $_SESSION['error'] = "Database error. Please try again later.";
            header('Location: register.php');
            exit;
        }
    }

    mysqli_stmt_close($check_stmt);
} else {
    // Handle case where form wasn't submitted
    header('Location: login.php');
    exit;
}

mysqli_close($conn);
