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

    function checkInputs() {
        let user_name = $("#user_name").val();
        let user_email = $("#user_email").val();
        let user_id = $("#user_id").val();
        let user_pw = $("#user_pw").val();
        let passwordCheck = $("#passwordCheck").val();
        if (user_name === "" || user_email === "" || user_id === "" || user_pw == "" || passwordCheck == "") {
            alert("Fill all fields");
            return false;
        } else if (user_pw != passwordCheck) {
            alert("Password does not match");
            return false;
        }
        createUser();
    }


    function createUser() {

        $.ajax({
            url: './accounts.php',
            type: 'post',
            cache: false,
            data: $('#signupForm').serialize(),
            dataType: 'json',
            beforeSend: function () {
                console.log("before");
            },
            complete: function () {
                console.log("complete");
            },
            success: function (json) {
                if (json.result === "success") {
                    console.log("success");
                    alert("Sign up was successful");
                    document.location.href = "./login.php";
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

<form id="signupForm" method="post" action="" onsubmit="checkInputs(); return false">
    Enter Name:
    <input type="text" name="user_name" id="user_name" required>
    <br>
    Enter Email:
    <input type="text" name="user_email" id="user_email" required>
    <br>
    Create Username:
    <input type="text" name="user_id" id="user_id" required>
    <br>
    Enter Password:
    <input type="text" name="user_pw" id="user_pw" required>
    <br>
    Enter Password Again:
    <input type="text" name="passwordCheck" id="passwordCheck" required>
    <br>
    <input type="submit" value="Create Account"/>
</form>


</body>

</html>