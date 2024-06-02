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
    <title>Super Mario Leaderboard</title>
    <link rel="stylesheet" href="css.css/leader.css">
    <script src="https://kit.fontawesome.com/23ef4e5838.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
</head>

<body>

   
        <nav>
            <span class="logo"><span class="color-red">Ara</span><span class="color-green">nxh</span><span class="color-pink">ata</span> RETRO</span>
            <ul>
                <li><a href="rei.php"><i class="fa-solid fa-house"></i> Home</a></li>
                <li><a href="leader_board.php"><i class="fa-solid fa-chess-king"></i> LEADER BOARD</a></li>
                <li><a href="#footer"><i class="fa-solid fa-address-book"></i> Contact</a></li>
                <li class="dropdown">
                    <a href="#"><i class="fa-regular fa-address-card"></i> Profili <i class="fa-solid fa-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <li>Rei Elezi</li>
                        <li>Piket: 89 </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div class="container">
            <hr class="animated-hr">
        </div>

        <div class="leaderboard">
            <h1>Aranxhata Retro Leaderboard</h1>
            <table>
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Player</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody id="leaderboard-body">
                    <?php while ($row = mysqli_fetch_assoc($points)) : ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['piket']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <p style="color: red;">3 vendet e para marin shperblime!!</p>
        </div>

        <script>
            // hr animation
            document.addEventListener('DOMContentLoaded', () => {
                const hr = document.querySelector('.animated-hr');
                const loopCount = 100; // Number of loops
                const animationDuration = 1.5; // Duration of each animation loop in seconds

                hr.style.animationIterationCount = loopCount;

                setTimeout(() => {
                    hr.style.animation = 'none'; // Stop the animation
                    hr.style.width = '100%'; // Set width to 100%
                }, loopCount * animationDuration * 1000);
            });
        </script>
    </body>

</html>

<?php
// Close the database connection
mysqli_close($conn);
?>