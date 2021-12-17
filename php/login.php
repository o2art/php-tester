<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css"/>
    <title>login</title>
</head>
<body>
    <?php
    session_start();
    if (isset($_SESSION["login"])) {
      echo "
                <script type='text/javascript'>
                    alert('you are already logged in!');
                    window.location.href = '../index.php';
                </script>
            ";
    } else {
      if (isset($_POST["name"]) && isset($_POST["pass"])) {
        $serv = "localhost";
        $user = "root";
        $pass = "";
        $db = "tester";
        $conn = new mysqli($serv, $user, $pass, $db);
        if ($_POST["pass"] == "admin") {
          $sql =
            "SELECT name FROM users WHERE name='" .
            $_POST["name"] .
            "' AND pass='" .
            $_POST["pass"] .
            "'";
        } else {
          $sql =
            "SELECT name FROM users WHERE name='" .
            $_POST["name"] .
            "' AND pass='" .
            base64_encode($_POST["pass"]) .
            "'";
        }
        $res = $conn->query($sql);
        if ($res->num_rows > 0) {

          $_SESSION["login"] = $_POST["name"];
          echo "
                        <script type='text/javascript'>
                            alert('logged in!');
                            window.location.href = '../index.php';
                        </script>
                    ";
          ?>
                    <?php
        } else {
           ?>
                    <script type='text/javascript'>
                        alert('pass or login is not correct!');
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
                                    <input type="text" name="name" maxlength="20" required id="namex"/><br/>
                                    <label for="pass"> pass: </label>
                                    <input type="password" name="pass" maxlength="20" required/><br/>
                                    <button type="submit"> log in </button>
                                </form>
                                <p> do not have an account yet? </p>
                                <button onclick="window.location.href='./register.php'"> register </button>
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