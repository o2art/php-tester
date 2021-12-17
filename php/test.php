<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css"/>
    <title>test</title>
</head>
<body>
    <?php
    session_start();
    $serv = "localhost";
    $user = "root";
    $pass = "";
    $db = "tester";
    $conn = new mysqli($serv, $user, $pass, $db);
    if (isset($_POST["send"])) {
      $cs = 0;
      $ws = 0;
      foreach ($_POST as $key => $value) {
        if ($key == "send") {
          break;
        }
        $id = substr($key, -2);
        if ((int) $id < 10) {
          $id = substr($key, -1);
        }
        $sql = "SELECT * FROM questions WHERE id='" . $id . "'";
        $res = $conn->query($sql);
        if ($res->num_rows > 0) {
          while ($row = $res->fetch_array()) {
            $C = $row["correct"];
            $c = $row["corrects"];
            $w = $row["wrongs"];
            if ($value == $C) {
              $c++;
              $cs++;
            } else {
              $w++;
              $ws++;
            }
            $s = ($c / ($c + $w)) * 100;
            $sql =
              "UPDATE `questions` SET `corrects`='" .
              $c .
              "',`wrongs`='" .
              $w .
              "',`score`='" .
              $s .
              "' WHERE id='" .
              $id .
              "'";
            $conn->query($sql);
          }
        }
      }
      $sql2 = "SELECT * FROM `users` WHERE name='" . $_SESSION['login'] . "'";
      $res = $conn->query($sql2);
      if ($res->num_rows > 0) {
        while ($row = $res->fetch_array()) {
          $c = $row["correct"];
          $w = $row["wrong"];
          $c += $cs;
          $w += $ws;
          $s = ($c / ($c + $w)) * 100;
          $s = number_format($s, 0, ".", "");
          $sql3 =
            "UPDATE users SET correct='$c', wrong='$w', score='$s' WHERE name='" .
            $_SESSION['login'] .
            "'";
          $res = $conn->query($sql3);
          echo "
                <script type='text/javascript'>
                    alert('your score is: $cs/10');
                    window.location.href = '../index.php';
                </script>
              ";
        }
      }
    } else {

      $tabId = array();
      $tabQ = array();
      $tabCo = array();
      $tabA = array();
      $tabB = array();
      $tabC = array();
      $tabD = array();
      $sql = "SELECT * FROM questions ORDER BY RAND() LIMIT 10";
      $res = $conn->query($sql);
      if ($res->num_rows > 0) {
        while ($row = $res->fetch_array()) {
          array_push($tabId, $row["id"]);
          array_push($tabQ, $row["question"]);
          array_push($tabA, $row["answerA"]);
          array_push($tabB, $row["answerB"]);
          array_push($tabC, $row["answerC"]);
          array_push($tabD, $row["answerD"]);
          array_push($tabCo, $row["correct"]);
        }
      }
      ?>
    <div id="main">
        <header>
            <p>tester: e14 tests</p>
        </header>
        <div id="center">
        <form method="POST">
            <table border="1">
                <tr>
                    <th>Question</th><th>Answer A</th><th>Answer B</th><th>Answer C</th><th>Answer D</th><th>Your answer</th>
                </tr>
                <?php for ($x = 0; $x < count($tabId); $x++) { ?>
                            <tr>
                                <td><?php echo $tabQ[$x]; ?></td>
                                <td><?php echo $tabA[$x]; ?></td>
                                <td><?php echo $tabB[$x]; ?></td>
                                <td><?php echo $tabC[$x]; ?></td>
                                <td><?php echo $tabD[$x]; ?></td>
                                <td>
                                    <select name="answer<?php echo $tabId[
                                      $x
                                    ]; ?>">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                    </select>
                                </td>
                            </tr>
                        <?php } ?>
            </table>
        <button name="send">check answers</button>
        </form>
            <a href="../index.php"> back to main page </a>
        </div>
        <footer>
            <p>author: Lenart</p>
        </footer>
    </div>
</body>
</html>
<?php
    }


?>
