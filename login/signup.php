<?php
require_once "../header.php";
?>

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
<div class="container mx-auto pt-5">
<form id="signupForm" method="post" action="" onsubmit="checkInputs(); return false" class="row g-3">
    <div class="col-6">
    <label for="user_name" class="form-label">Enter Name:</label>
    <input type="text" name="user_name" id="user_name" class="form-control" required/>
    </div>
    <div class="col-6">
    <label for="user_email" class="form-label">Enter Email:</label>
    <input type="text" name="user_email" id="user_email" class="form-control" required/>
    </div>
    <div class="col-12">
    <label for="user_id" class="form-label">Create Username:</label>
    <input type="text" name="user_id" id="user_id" class="form-control" required>
    </div>
    <div class="col-12">
    <label for="user_pw" class="form-label">Enter Password:</label>
    <input type="password" name="user_pw" id="user_pw" class="form-control" required>
    </div>
    <div class="col-12">
    <label for="passwordCheck" class="form-label">Enter Password Again:</label>
    <input type="password" name="passwordCheck" id="passwordCheck" class="form-control" required>
    </div>
    <div class="col-12">
    <input type="submit" value="Create Account" class="btn btn-primary"/>
    </div>
</form>
</div>
<?php
require_once "../footer.php";
?>