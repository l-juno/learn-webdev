login successful

<?php
if (!isset($_COOKIE['user_id'])) {
    redirect("./login.php");
    return;
}
echo "hi~ ". $_COOKIE['user_name'];



