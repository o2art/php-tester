<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css"/>
    <title>top questions</title>
</head>
<body>
    <?php
    session_start();
    $serv = "localhost";
    $user = "root";
    $pass = "";
    $db = "tester";
    $conn = new mysqli($serv, $user, $pass, $db);
    $sql =
      "SELECT question, corrects, wrongs FROM questions ORDER BY wrongs DESC LIMIT 10";
    $res = $conn->query($sql);
    $tab1 = array();
    $tab2 = array();
    $tab3 = array();
    if ($res->num_rows > 0) {
      while ($row = $res->fetch_array()) {
        array_push($tab1, $row["question"]);
        array_push($tab2, $row["corrects"]);
        array_push($tab3, $row["wrongs"]);
      }
    }
    ?>
    <div id="main">
        <header>
            <p>tester: e14 tests</p>
        </header>
        <div id="center">
            <div class="quests">
                <h1 style="margin-top: 1%">top 10 questions</h1>
                <?php for ($x = 0; $x < count($tab1); $x++) {
                  echo "<div class='stats'><span><b> " .
                    $tab1[$x] .
                    " </b></span><br/><span> corrects: <b> " .
                    $tab2[$x] .
                    " </b></span><br/><span> wrongs: <b> " .
                    $tab3[$x] .
                    " </b></span></div>";
                } ?>
            </div>
            <a href="../index.php"> back to main page </a>
        </div>
        <footer>
            <p>author: Lenart</p>
        </footer>
    </div>
</body>
</html>