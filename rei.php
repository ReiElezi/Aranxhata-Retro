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
    <script src="https://kit.fontawesome.com/23ef4e5838.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
    <title>Aranxhata retro</title>
    <link rel="stylesheet" href="css.css/rei.css">

</head>


<body>
    <nav>
        <span class="logo"><span class="color-red">Ara</span><span class="color-green">nxh</span><span class="color-pink">ata</span> RETRO</span>
        <ul>
            <li><a href="#"><i class="fa-solid fa-house"></i> Home</a></li>
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


    <img class="arexhata-logo" src="css.css/wallpaper.png" alt="2" srcset="">

    <div class="main-content">
        <h2>Press the <span class="color-red"> button </span> to start playing the <span class="color-pink"> games!</span></h2>
        <div class="form-container">
            <span class='start-btn' onclick="changeText()">VENDOSNI KODIN:</span>
            <form>
                <input class="start-btn" placeholder="KTU VENDOSNI KODIN" type="text" id="code" name="username" pattern="[A-Za-z0-9]+" title="Only letters and numbers are allowed" maxlength="7" required>
            </form>

        </div>
    </div>

    <div class="logo-images">
        <div class="rrjeshta">
            <div class="card">
                <img src="css.css/space-invader.jpg" alt="Space Invader">
                <div class="lock-overlay"></div>
                <div class="card-title">Space Invader</div>
                <p class="lock-text">Venods 0/5 code qe te hapesh lojen</p>
            </div>
            <div class="card">
                <a class="video-link" href="video-1.html">
                    <img src="css.css/balloon-fight-logo.png" alt="Balloon Fight">
                    <div class="card-title">Balloon Fight</div>
                </a>
            </div>
        </div>
        <div class="rrjeshta">
            <div class="card">
                <a class="video-link" href="video-3.html">
                    <img src="css.css/ball-game.jpg" alt="Ball Game">
                    <div class="card-title">Ball Game</div>
                </a>
            </div>
            <div class="card">
                <img src="css.css/OIP.jpg" alt="OIP">
                <div class="lock-overlay"></div>
                <div class="card-title">Ping Pong</div>
                <p class="lock-text">Venods 4/7 code qe te hapesh lojen</p>
            </div>
        </div>
        <div class="rrjeshta">
            <div class="card">
                <a class="video-link" href="video-2.html">
                    <img src="css.css/stacktower.jpg" alt="Stack Tower">
                    <div class="card-title">Stack Tower</div>
                </a>
            </div>
            <div class="card-1">
                <img src="css.css/8ball.jpg" alt="8 Ball">
                <div class="lock-overlay-1"></div>
                <div class="card-title-1">8 Ball From <span class="color-red">AliExpres</span></div>
                <p class="lock-text-1">Venods 2/5 code qe te hapesh lojen</p>
            </div>
        </div>
    </div>
    <div class="all-container-footer">
        <div class="card-container">
            <img class="card-image" src="css.css/image-2.png" alt="Placeholder Image">
            <div class="card-content">
                <h2><span class="color-greeen">Arrexhanta Exotic</span></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum vestibulum. Cras venenatis euismod malesuada. Curabitur tincidunt, tortor nec auctor egestas, purus ligula scelerisque dui, ut vehicula risus sapien et sapien.</p>
            </div>
        </div>
        <div class="card-container">
            <img class="card-image" src="css.css/rose-removebg-preview.png" alt="Placeholder Image">
            <div class="card-content">
                <h2><span class="color-pink">Arrexhanta Rose</span></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum vestibulum. Cras venenatis euismod malesuada. Curabitur tincidunt, tortor nec auctor egestas, purus ligula scelerisque dui, ut vehicula risus sapien et sapien.</p>
            </div>
        </div>
        <div class="card-container">
            <img class="card-image" src="css.css/classic-removebg-preview.png" alt="Placeholder Image">
            <div class="card-content">
                <h2><span class="color-red">Arrexhanta Classic</span></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum vestibulum. Cras venenatis euismod malesuada. Curabitur tincidunt, tortor nec auctor egestas, purus ligula scelerisque dui, ut vehicula risus sapien et sapien.</p>
            </div>
        </div>
    </div>

    <footer id="footer">
        <img style="width: 12%;" src="css.css/logoarexhata.png" alt="" srcset="">
        <div class="social-links">
            <a href="https://www.facebook.com/aranxhataglina/" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/aranxhata_glina/" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.youtube.com/watch?v=KQxD_ptQQ1Y&t=1s" target="_blank"><i class="fab fa-youtube"></i></a>
            <a href="mailto:example@gmail.com"><i class="fas fa-envelope"></i></a>
        </div>
        <p>Aranxhata is a refreshing drink made from the finest oranges. Enjoy the sweet and tangy taste of freshly squeezed oranges in every sip. Perfect for any occasion, Aranxhata is your go-to drink for a burst of natural flavor and vitality.</p>
    </footer>
</body>

<script>
    function changeText() {
        var inputValue = document.getElementById('code').value;
        if (inputValue.length === 7) {
            // Kur shtypni një kod me 7 karaktere, ndryshoni tekstin në elementin me klasën lock-text-1
            document.querySelector('.lock-text-1').textContent = 'Venods 3/5 code qe te hapesh lojen'; // Teksti i ri pas futjes së kodit
        }
    }
</script>

</html>

<?php
// Close the database connection
mysqli_close($conn);
?>