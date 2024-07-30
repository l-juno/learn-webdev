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
//             function checkUsernameAndPassword(){
//                 const username = $("#username").val();
//                 const password = $("#password").val();
//                 const passwordCheck = $("#passwordCheck").val();
//                 if(username in accounts){
//                     alert("Username exists, change username");
//                     return;
//                 }
//                 if(passwordCheck != password){
//                     alert("Password does not match");
//                     return;
//                 }
//                 creatAccount(username, password);
//             }
//
//             function createAccount(username, password){
//                 accounts[username] = password;
//             }


            function checkUsernameAndPassword() {

                $.ajax({
                    url: './accounts.php',
                    type: 'post',
                    cache: false,
                    data: $('#signupForm').serialize(),
                    dataType: 'json',
                    beforeSend: function() {
                        console.log("before");
//                         event.preventDefault();
//                         const password = $("#password").val();
//                         const passwordCheck = $("#passwordCheck").val();
//                         if(password != passwordCheck){
//                             alert("password does not match");
//                         }
                    },
                    complete: function() {
                        console.log("complete");
                    },
                    success	: function(json) {
                        if (json.result) {
                            console.log("success");
                            document.location.href = "./login.php";
                        } else {
                            console.log("Error: " + json.message);
                        }
                    },
                    error: function () {
                        console.log("error: "); //when does this error run?
                    }
                });
            }


        </script>

        <form id="signupForm" method="post" action="">
            Create Username:
            <input type="text" name="username" id="username" autocomplete="username">
            <br>
            Enter Password:
            <input type="text" name="password" id="password" autocomplete="new-password">
            <br>
            Enter Password Again:
            <input type="text" name="passwordCheck" id="passwordCheck" autocomplete="new-password">
            <br>
            <button type="button" onclick="checkUsernameAndPassword()">Create Account</button>
        </form>


    </body>

</html>