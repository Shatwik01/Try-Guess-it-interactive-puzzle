<?php

$username = $_POST['username'];
@$email = $_POST['email'];
$password = $_POST['password'];


// Database connection
$conn = new mysqli('localhost', 'id20634611_root', 'NHw[zD97Yg-RP]%i', 'id20634611_gameuser');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into registration(username, email, password) values(?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);
    $execval = $stmt->execute();
    echo $execval;
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/style.css" />
    <title>Guess it</title>
</head>

<body onload="init()">
    <video autoplay loop muted plays-inline class="background-clip">
        <source src="long trip.mp4" type="video/mp4">
    </video>
    <main>
        <div id="welcomeScreen">
            <h2>Guess The Random Number Between 1-100</h2>
            <img class="image" src="./images/game.svg" alt="logo" />

            <section class="eventSection">
                <p>Select The Difficulty</p>
                <div class="button-wrapper">
                    <button onclick="easyMode()">Easy: 10 attempts</button>
                    <button onclick="hardMode()">Hard: 5 attempts</button>
                </div>
            </section>
        </div>
        <!-- our acual game area  -->
        <div id="gameArea">
            <div id="newGameButton">
                <button onclick="newGameBegin()">New Game</button>
            </div>

            <section>
                <h3 id="textOutput">Your Guess</h3>
                <input type="number" id="inputBox" min="1" max="100" placeholder="Enter Your Number" onchange="compareGuess()" />
            </section>

            <section class="stats">
                <div class="info">
                    <p>Number of previous attempts</p>
                    <span id="attempts"> 0 </span>
                </div>
                <div class="info">
                    <p>Number of previous guesses</p>
                    <span id="guesses"> 0 </span>
                </div>
            </section>
        </div>
        <script src="./index.js"></script>
        <div class="copyright">
            Copyright <b>&copy; Shatwik Webmaster. All Right reserved.</b>
        </div>
    </main>
</body>

</html>