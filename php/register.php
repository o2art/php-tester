<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../css/style.css"/>
        <title>register</title>
    </head>
    <body>
        <?php
        session_start();
        if (isset($_SESSION["login"])) {
          echo "
                <script type='text/javascript'>
                    alert('to create new account log out!');
                    window.location.href = '../index.php';
                </script>
            ";
        } else {
          if (isset($_POST["name"])) {
            $serv = "localhost";
            $user = "root";
            $pass = "";
            $db = "tester";
            if ($_POST["pass1"] == $_POST["pass2"]) {
              $conn = new mysqli($serv, $user, $pass, $db);
              $sql =
                "SELECT name from users WHERE name='" . $_POST["name"] . "'";
              $res = $conn->query($sql);
              if ($res->num_rows > 0) { ?>
                                <script type='text/javascript'>
                                    alert('user exists!');
                                </script>
                                <?php
                                $page = $_SERVER['PHP_SELF'];
                                echo '<meta http-equiv="Refresh" content="0;' .
                                  $page .
                                  '">';
                                ?>
                            <?php } else {
                $sql =
                  "INSERT INTO users (id, name, pass, correct, wrong, score) 
                                    VALUES (NULL, '" .
                  $_POST["name"] .
                  "', '" .
                  base64_encode($_POST["pass1"]) .
                  "', '0', '0', '0')";
                $conn->query($sql);
                echo "
                                <script type='text/javascript'>
                                    alert('user registered!');
                                    window.location.href = 'login.php';
                                </script>
                                ";
                ?>
                            <?php }
            } else {
               ?>
                        <script type='text/javascript'>
                            alert('confirm pass is not correct');
                        </script>
                        <?php
                        $page = $_SERVER['PHP_SELF'];
                        echo '<meta http-equiv="Refresh" content="0;' .
                          $page .
                          '">';
                        ?>
                        <?php
            }
          } else {
             ?>
                        <div id="main">
                            <header>
                                <p>tester: e14 tests</p>
                            </header>
                            <div id="center">
                                <img src="../img/e14-logo.png" alt="e14"/>
                                <div id="forms">
                                    <form method="POST">
                                        <label for="name"> name: </label>
                                        <input type="text" name="name" minlength="6" maxlength="20" required id="namex"/><br/>
                                        <label for="pass1"> pass: </label>
                                        <input type="password" name="pass1" minlength="6" maxlength="20" required/><br/>
                                        <label for="pass2"> confirm pass: </label>
                                        <input type="password" name="pass2" minlength="6" maxlength="20" required/><br/>
                                        <button type="submit"> register </button>
                                    </form>
                                    <p> already have an account? </p>
                                    <button onclick='window.location.href="./login.php"'> log in </button>
                                    <a href="../index.php">back to main page</a>
                                </div>
                            </div>
                            <footer>
                                <p>author: Lenart</p>
                            </footer>
                        </div>
                    <?php
          }
        }
        ?>
    </body>
</html>