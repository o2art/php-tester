<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css"/>
    <title>users</title>
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
      $sql = "DELETE FROM users WHERE id='" . $_POST["delete"] . "'";
      $res = $conn->query($sql);
        ?>
          <script type='text/javascript'>
              alert('deleted!');
          </script>
        <?php
    }
    $sql = "SELECT * FROM users";
    $res = $conn->query($sql);
    $tab1 = array();
    $tab2 = array();
    $tab3 = array();
    $tab4 = array();
    $tab5 = array();
    if ($res->num_rows > 0) {
      while ($row = $res->fetch_array()) {
        array_push($tab1, $row["id"]);
        array_push($tab2, $row["name"]);
        array_push($tab3, $row["correct"]);
        array_push($tab4, $row["wrong"]);
        array_push($tab5, $row["score"]);
      }
    }
    ?>
    <div id="main">
        <header>
            <p>tester: e14 tests</p>
        </header>
        <div id="center">
            <?php for ($x = 1; $x < count($tab1); $x++) { ?>
                        <div class='user'>
                            <form method='POST'>
                                <span> user: <b><?php echo $tab2[
                                  $x
                                ]; ?></b></span>
                                <span> correct: <b><?php echo $tab3[
                                  $x
                                ]; ?></b></span>
                                <span> wrong: <b><?php echo $tab4[
                                  $x
                                ]; ?></b></span>
                                <span> score: <b><?php echo $tab5[
                                  $x
                                ]; ?></b></span>
                                <button value='<?php echo $tab1[
                                  $x
                                ]; ?>' name='delete'>delete</button>
                            </form>
                        </div>
                    <?php } ?>
            <a href="../index.php"> back to main page </a>
        </div>
        <footer>
            <p>author: Lenart</p>
        </footer>
    </div>
</body>
</html>