<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "arenxhata";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Kontrollon lidhjen
if (!$conn) {
    die("Lidhja deshtoi: " . mysqli_connect_error());
}

$sql_create_table_users = "CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL UNIQUE
)";

if (mysqli_query($conn, $sql_create_table_users)) {
    echo "Tabela users u krijua me sukses";
} else {
    echo "Tabela users pati nje problem <br> " . mysqli_error($conn);
}

$sql_create_table_points = "CREATE TABLE IF NOT EXISTS points (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    piket DECIMAL(10, 2) NOT NULL
)";

if (mysqli_query($conn, $sql_create_table_points)) {
    echo "Tabela points u krijua me sukses";
} else {
    echo "Tabela points pati nje problem <br> " . mysqli_error($conn);
}

mysqli_close($conn);
