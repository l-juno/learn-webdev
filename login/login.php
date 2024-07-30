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
            function checkFilled(){
                const username = $("#username").val();
                const password = $("#password").val();
                if(username == "" || password == ""){
                    alert("Fill all fields");
                    return false;
                }
                return true;
            }


            function login(){
                if(!checkFilled()){
                    return false;
                }
                $.ajax({
                    url: './auth.php',
                    type: 'post',
                    cache: false,
                    data: $('#formLogin').serialize(),
                    dataType: 'json',
                    beforeSend: function() {
                        console.log("before");
                    },
                    complete: function() {
                        console.log("complete");
                    },
                    success	: function(json) {

                        if (json.result == 'SUCCESS') {
                            console.log("success");

                            let expireDate = new Date();
                            expireDate.setTime(expireDate.getTime() + (30 * 1000));
                            document.cookie = `usernameInJS=${json.username}; expires=${expireDate.toUTCString()}; path=/`;

                            document.location.href = "./main.php";
                        } else {
                            console.log("Error: " + json.message);
                            alert("invalid username or password");
                        }
                    },
                    error: function () {
                        console.log("error: "); //when does this error run?
                    }
                });
            }
        </script>

        <form method="post" action="" onsubmit="return false" id="formLogin">
            Username:
            <input type="text" name="username" id="username" autocomplete="username">
            <br>
            Password:
            <input type="text" name="password" id="password">
            <br>
            <button onclick="login();">Login</button>
        </form>

        <a href="./signup.php">
            <button>Sign up</button>
        </a>

    </body>

</html>