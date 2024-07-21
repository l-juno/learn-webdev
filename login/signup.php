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
            const accounts = {};
            function checkUsernameAndPassword(){
                const username = $("#username").val();
                const password = $("#password").val();
                const passwordCheck = $("#passwordCheck").val();
                if(username in accounts){
                    alert("Username exists, change username");
                    return;
                }
                if(passwordCheck != password){
                    alert("Password does not match");
                    return;
                }
                creatAccount(username, password);
            }

            function createAccount(username, password){
                accounts[username] = password;
            }
        </script>

        <form method="post" action="">
            Create Username:
            <input type="text" name="username" id="username">
            <br>
            Enter Password:
            <input type="text" name="password" id="password">
            <br>
            Enter Password Again:
            <input type="text" name="passwordCheck" id="password">
            <br>
            <button onclick="checkUsernameAndPassword()">Create Account</button>
        </form>


    </body>

</html>