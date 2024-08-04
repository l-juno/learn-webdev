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
            function checkInput(){
                const user_id = $("#user_id").val();
                const user_pw = $("#user_pw").val();
                if(user_id == "" || user_pw == ""){
                    alert("Fill all fields");
                    return false;
                }
                login();
            }


            function login(){
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
                        if (json.result == "success"){
                            document.location.href = "./main.php";
                            alert("login successful");
                        } else {
                            console.log("Error: " + json.message);
                            alert("Error: " + json.message);
                        }
                    },
                    error: function () {
                        console.log("error: ");
                    }
                });
            }
        </script>

        <form method="post" action="" onsubmit="return false" id="formLogin">
            Username:
            <input type="text" name="user_id" id="user_id">
            <br>
            Password:
            <input type="text" name="user_pw" id="user_pw">
            <br>
            <button onclick="checkInput();">Login</button>
        </form>

        <a href="./signup.php">
            <button>Sign up</button>
        </a>

    </body>

</html>