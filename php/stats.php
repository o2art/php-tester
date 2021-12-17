<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css"/>
    <title>stats</title>
</head>
<body>
    <?php
    session_start();
    $serv = "localhost";
    $user = "root";
    $pass = "";
    $db = "tester";
    $conn = new mysqli($serv, $user, $pass, $db);
    $sql = "SELECT * FROM users WHERE name='" . $_SESSION["login"] . "'";
    $res = $conn->query($sql);
    if ($res->num_rows > 0) {
      while ($row = $res->fetch_array()) {
        $correct = $row["correct"];
        $wrong = $row["wrong"];
        if($correct == 0 && $wrong == 0) $score = 0;
        else $score = $row["score"];
      }
    }
    ?>
    <div id="main">
        <header>
            <p>tester: e14 tests</p>
        </header>
        <div id="center">
            <div class="stats"><p>user: <?php echo $_SESSION[
              "login"
            ]; ?></p></div>
            <div class="stats"><p>correct: <?php echo $correct; ?></p></div>
            <div class="stats"><p>wrong: <?php echo $wrong; ?></p></div>
            <div class="stats"><p>score: <?php echo $score; ?>%</p></div>
            <a href="../index.php"> back to main page </a>
        </div>
        <footer>
            <p>author: Lenart</p>
        </footer>
    </div>
</body>
</html>