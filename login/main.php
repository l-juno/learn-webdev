<?php
require "login_check.php";

echo "Main page for ".$_COOKIE["user_name"];

?>
<br><br>
<button onclick="window.location.href = './user_list.php';">User list</button>








