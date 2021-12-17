<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css"/>
    <title>top users</title>
</head>
<body>
    <?php
    session_start();
    $serv = "localhost";
    $user = "root";
    $pass = "";
    $db = "tester";
    $conn = new mysqli($serv, $user, $pass, $db);
    $sql = "SELECT name, score FROM users ORDER BY score DESC LIMIT 10";
    $res = $conn->query($sql);
    $tab1 = array();
    $tab2 = array();
    if ($res->num_rows > 0) {
      while ($row = $res->fetch_array()) {
        array_push($tab1, $row["name"]);
        array_push($tab2, $row["score"]);
      }
    }
    ?>
    <div id="main">
        <header>
            <p>tester: e14 tests</p>
        </header>
        <div id="center">
            <h1 style="margin-top: 1%">top users</h1>
            <?php for ($x = 0; $x < count($tab1); $x++) {
              echo "<div class='stats'><span><b> " .
                $tab1[$x] .
                " </b></span><span> - <b> " .
                $tab2[$x] .
                "% </b></span></div>";
            } ?>
            <a href="../index.php"> back to main page </a>
        </div>
        <footer>
            <p>author: Lenart</p>
        </footer>
    </div>
</body>
</html>