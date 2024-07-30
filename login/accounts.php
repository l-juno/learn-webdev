<?php
    require_once './accounts_data.php';

    $response = array();

    try{
        $username = $_POST["username"];
        $password = $_POST["password"];
        $passwordCheck = $_POST["passwordCheck"];

        if($passwordCheck != $password){
            throw new Exception("Password does not match");
        } else if(array_key_exists($username, $accounts)){
            throw new Exception('Username exists');
        } else {
            $accounts[$username] = $password;
        }

        $response["result"] = true;
        echo json_encode($response);

    } catch (Exception $e) {
          $response['result'] = false;
          $response['message'] = $e->getMessage();
          echo json_encode($response);
    }


?>
