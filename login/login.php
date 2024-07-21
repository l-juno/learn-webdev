<?
error_reporting(E_ERROR | E_WARNING);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <a href="/index.php">
            <button>Home</button>
        </a>
    </head>

    <body>
        <script src="/assets/jquery-3.7.1.min.js" type="text/javascript"></script>
        <script>
            function login(){
                alert("login was pressed");
            }
        </script>

        <form method="post" action="">
            Username:
            <input type="text" name="username" id="username">
            <br>
            Password:
            <input type="text" name="password" id="password">
            <br>
            <button onclick="login()">Login</button>
        </form>

        <a href="./signup.php">
            <button>Sign up</button>
        </a>

    </body>

</html>