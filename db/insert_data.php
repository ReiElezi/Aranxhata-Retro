<?php
session_start(); // Start the session only once

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

// Remove existing entries with the same IDs
$delete_sql = "DELETE FROM points WHERE id IN (1, 2, 3, 4, 5, 6, 7)";
mysqli_query($conn, $delete_sql);

// Insert sample data into the 'points' table
$sql = "INSERT INTO points (id, name, piket) VALUES (1, 'Rei', 95)";
if (mysqli_query($conn, $sql)) {
    echo "Record 1 inserted successfully<br>";
} else {
    echo "Error inserting record 1: " . mysqli_error($conn) . "<br>";
}

$sql = "INSERT INTO points (id, name, piket) VALUES (2, 'Endri', 88)";
if (mysqli_query($conn, $sql)) {
    echo "Record 2 inserted successfully<br>";
} else {
    echo "Error inserting record 2: " . mysqli_error($conn) . "<br>";
}

$sql = "INSERT INTO points (id, name, piket) VALUES (3, 'Amanda', 82)";
if (mysqli_query($conn, $sql)) {
    echo "Record 3 inserted successfully<br>";
} else {
    echo "Error inserting record 3: " . mysqli_error($conn) . "<br>";
}

$sql = "INSERT INTO points (id, name, piket) VALUES (4, 'Leo', 80)";
if (mysqli_query($conn, $sql)) {
    echo "Record 4 inserted successfully<br>";
} else {
    echo "Error inserting record 4: " . mysqli_error($conn) . "<br>";
}

$sql = "INSERT INTO points (id, name, piket) VALUES (5, 'Anxhela', 70)";
if (mysqli_query($conn, $sql)) {
    echo "Record 5 inserted successfully<br>";
} else {
    echo "Error inserting record 5: " . mysqli_error($conn) . "<br>";
}

$sql = "INSERT INTO points (id, name, piket) VALUES (6, 'Ester', 69)";
if (mysqli_query($conn, $sql)) {
    echo "Record 6 inserted successfully<br>";
} else {
    echo "Error inserting record 6: " . mysqli_error($conn) . "<br>";
}

$sql = "INSERT INTO points (id, name, piket) VALUES (7, 'Devis', 10)";
if (mysqli_query($conn, $sql)) {
    echo "Record 7 inserted successfully<br>";
} else {
    echo "Error inserting record 7: " . mysqli_error($conn) . "<br>";
}

mysqli_close($conn);
