<?php
    $answer = "";
    $op = $_POST["operation"];
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    switch($op){
        case "+":
            $answer = $num1 + $num2;
            break;
        case "-":
            $answer = $num1 - $num2;
            break;
        case "*":
            $answer = $num1 * $num2;
            break;
        case "/":
            $answer = $num1 / $num2;
            break;

    }
    $results = [];
    $results['result'] = $answer; // {'result' : 24}
    echo json_encode($results);

?>