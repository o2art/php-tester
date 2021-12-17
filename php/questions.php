<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css"/>
    <title>questions</title>
</head>
<body>
    <?php
    session_start();
    $serv = "localhost";
    $user = "root";
    $pass = "";
    $db = "tester";
    $conn = new mysqli($serv, $user, $pass, $db);
    if (isset($_POST["delete"])) {

      $sql = "DELETE FROM questions WHERE id='" . $_POST["delete"] . "'";
      $res = $conn->query($sql);
      ?>
                <script type='text/javascript'>
                    alert('deleted!');
                </script>
            <?php
    }
    if (isset($_POST["add"])) {
      if (strlen($_POST["question"]) != 0) {

        $sql =
          "INSERT INTO questions (`id`, `question`, `answerA`, `answerB`, `answerC`, `answerD`, `correct`, `corrects`, `wrongs`, `score`) 
                      VALUES (NULL, '" .
          $_POST["question"] .
          "', '" .
          $_POST["answerA"] .
          "', '" .
          $_POST["answerB"] .
          "', '" .
          $_POST["answerC"] .
          "', '" .
          $_POST["answerD"] .
          "', '" .
          $_POST["correct"] .
          "', '0', '0', '0')";
        $res = $conn->query($sql);
        ?>
                  <script type='text/javascript'>
                      alert('question added!');
                  </script>
              <?php
      }
    }
    if (isset($_POST["update"])) {
      if (strlen($_POST["question"]) != 0) {

        $sql =
          "UPDATE questions SET id='" .
          $_POST['update'] .
          "', question='" .
          $_POST['question'] .
          "', answerA='" .
          $_POST['answerA'] .
          "', answerB='" .
          $_POST['answerB'] .
          "',
                    answerC='" .
          $_POST['answerC'] .
          "', answerD='" .
          $_POST['answerD'] .
          "', correct='" .
          $_POST['correct'] .
          "', corrects='0', wrongs='0', score='0' WHERE id='" .
          $_POST['update'] .
          "'";
        $res = $conn->query($sql);
        ?>
                <script type='text/javascript'>
                    alert('question updated!');
                </script>
            <?php
      }
    }
    $sql = "SELECT * FROM questions";
    $res = $conn->query($sql);
    $tabId = array();
    $tabQ = array();
    $tabCo = array();
    $tabA = array();
    $tabB = array();
    $tabC = array();
    $tabD = array();
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
            <table border="1">
                <tr>
                    <th> ID </th><th> Question </th><th>Answer A</th><th>Answer B</th><th>Answer C</th><th>Answer D</th><th> Correct </th><th> Available functions</th>
                </tr>
                <?php for ($x = 0; $x < count($tabId); $x++) { ?>
                        <tr>
                            <form method="POST">
                                <td><?php echo $tabId[$x]; ?></td>
                                <td><input type="text" name="question" value='<?php echo $tabQ[
                                  $x
                                ]; ?>'/></td>
                                <td><input type="text" name="answerA" value='<?php echo $tabA[
                                  $x
                                ]; ?>'/></td>
                                <td><input type="text" name="answerB" value='<?php echo $tabB[
                                  $x
                                ]; ?>'/></td>
                                <td><input type="text" name="answerC" value='<?php echo $tabC[
                                  $x
                                ]; ?>'/></td>
                                <td><input type="text" name="answerD" value='<?php echo $tabD[
                                  $x
                                ]; ?>'/></td>
                                <td>
                                    <select name="correct">
                                        <?php
                                        $i = array("A", "B", "C", "D");
                                        for ($y = 0; $y < count($i); $y++) {
                                          if (
                                            $tabCo[$x] == $i[$y]
                                          ) { ?><option value='<?php echo $i[
  $y
]; ?>' selected><?php echo $i[
  $y
]; ?></option><?php } else { ?> <option value='<?php echo $i[
   $y
 ]; ?>'><?php echo $i[$y]; ?></option><?php }
                                        }
                                        ?>
                                    </select>     
                                </td>
                                <td>
                                        <button class="tableB" name="update" value=<?php echo $tabId[
                                          $x
                                        ]; ?>>update</button>
                                        <button class="tableB" name="delete" value=<?php echo $tabId[
                                          $x
                                        ]; ?>>delete</button>
                                </td>
                            </form>
                        </tr>
                    <?php } ?>
                <tr>
                    <form method="POST">
                        <td>ID</td>
                        <td><input type="text" name="question"/></td>
                        <td><input type="text" name="answerA"/></td>
                        <td><input type="text" name="answerB"/></td>
                        <td><input type="text" name="answerC"/></td>
                        <td><input type="text" name="answerD"/></td>
                        <td>
                            <select name="correct">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>    
                        </td>
                        <td><button name="add">add</button></td>
                    </form>
                </tr>
            </table>
            <a href="../index.php"> back to main page </a>
        </div>
        <footer>
            <p>author: Lenart</p>
        </footer>
    </div>
</body>
</html>