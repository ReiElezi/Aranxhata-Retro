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

// Fetch user data from the database
$select_users = "SELECT id, firstName, lastName, email FROM users"; // Removed the extra comma
$users = mysqli_query($conn, $select_users);

if (!$users) {
    die("Error: " . mysqli_error($conn));
}

// Fetch points data from the database
$select_points = "SELECT id, name, piket FROM points";
$points = mysqli_query($conn, $select_points);

if (!$points) {
    die("Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-eoI6ipmBxpk+H6at3Bz8nsg+jjgY5bAsx9+5BxJ+44TftBQ8q4v+dyFLN8txI6MK" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
            </div>
            <div class="col-md-4 text-right padding-top-5">
                <h2 class="mb-4  "><a id="button" class='btn btn-outline-danger' href="logout.php">Logout</a></h2>
            </div>
        </div>
        <hr>

        <h3 class="text-center">All Users</h3>
        <!-- Display user data in a table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($users)) : ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['firstName']; ?></td>
                        <td><?php echo $row['lastName']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><a class="material-symbols-outlined" href="delete_users.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this user?')">
                                <?php include('/laragon/www/atc_project/components/trash.php'); ?></a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <h3 class="text-center">Tabela e Shperblimeve</h3>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Renditja</th>
                    <th>Emri</th>
                    <th>Piket</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($points)) : ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['piket']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>

<?php
// Close the database connection
mysqli_close($conn);
?>