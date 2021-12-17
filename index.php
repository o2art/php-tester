<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="./css/style.css"/>
        <title>e14 tests</title>
    </head>
    <body>
        <?php
        session_start();
        if (isset($_POST["logout"])) {
          session_unset(); ?>
                    <script type='text/javascript'>
                        alert('logged out!');
                    </script>
                    <?php
                    $page = $_SERVER['PHP_SELF'];
                    echo '<meta http-equiv="Refresh" content="0;' .
                      $page .
                      '">';
                    ?>
                <?php
        } else {
          if (isset($_SESSION["login"])) {
            if ($_SESSION["login"] == "admin") { ?>
                            <div id="main">
                                <header>
                                    <p>tester: e14 tests</p>
                                </header>
                                <div id="center">
                                    <img src="./img/e14-logo.png" alt="e14"/>
                                    <div id="forms">
                                        <button onclick="window.location.href='./php/test.php'">do a test</button>
                                        <button onclick="window.location.href='./php/stats.php'">show stats</button>
                                        <button onclick="window.location.href='./php/questions.php'">manage questions</button>
                                        <button onclick="window.location.href='./php/users.php'">manage users</button>
                                        <button onclick="window.location.href='./php/topQuestions.php'">show ranking of questions</button>
                                        <button onclick="window.location.href='./php/topUsers.php'">show ranking of users</button>
                                        <form method="POST">
                                            <button name="logout" value="true">log out</button>
                                        </form>                                    
                                    </div>
                                </div>
                                <footer>
                                    <p>author: Lenart</p>
                                </footer>
                            </div>
                        <?php } else { ?>
                            <div id="main">
                                <header>
                                    <p>tester: e14 tests</p>
                                </header>
                                <div id="center">
                                    <img src="./img/e14-logo.png" alt="e14"/>
                                    <div id="forms">
                                        <button onclick="window.location.href='./php/test.php'">do a test</button>
                                        <button onclick="window.location.href='./php/stats.php'">show stats</button>
                                        <button onclick="window.location.href='./php/topUsers.php'">show ranking of users</button>
                                        <form method="POST">
                                            <button name="logout">log out</button>
                                        </form>
                                    </div>
                                </div>
                                <footer>
                                    <p>author: Lenart</p>
                                </footer>
                            </div>
                        <?php }
          } else {
             ?>
                        <div id="main">
                            <header>
                                <p>tester: e14 tests</p>
                            </header>
                            <div id="left">
                                <div id="forms">
                                    <button onclick="window.location.href='./php/login.php'">login</button>
                                    <button onclick="window.location.href='./php/register.php'">register</button>
                                </div>
                            </div>
                            <div id="right">
                                <p> Programowanie i bazy danych (10 pytań). Sprawdź się w dokładnie takim samym trybie, jaki obowiązuje podczas prawie rzeczywistego egzaminu! Na rozwiązanie dziesięciu pytań w przedstawionej części pisemnej, otrzymujesz powodzenia! </p>
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