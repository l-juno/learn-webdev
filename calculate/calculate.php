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
        <style>
            .my_class1 {font-size:14px; color:red}
            .my_class2 {font-size:14px; color:blue}
        </style>
        <script src="/assets/jquery-3.7.1.min.js" type="text/javascript"></script>
        <script>
            function mySubmit() {

                $.ajax({
                    url: './ajax_calculator.php',
                    type: 'post',
                    cache: false,
                    data: $('#myForm1').serialize(),
                    dataType: 'json',
                    beforeSend: function() {

                    },
                    complete: function() {

                    },
                    success	: function(json) {
                        if (json.result) {
                            $("#myResult").text(json.result)
                        }

                    },
                    error: function () {

                    }
                });
            }
        </script>
    </head>

    <body>

        <form class="login-form" id="myForm1" method="post" action="" onSubmit="alert('ccc');">
            <div class="my_class1">Enter a number:</div>
            <input type="number" name="num1" id="myInput1">
            <br>
            <div class="my_class1">Enter another number:</div>
            <input type="number" name="num2" id="myInput2">
            <br>
            Choose operation:
            <input type="radio" name="operation" id="myOperationPlus" value="+"> +
            <input type="radio" name="operation" id="myOperationMinus" value="-"> -
            <input type="radio" name="operation" id="myOperationMultiply" value="*"> *
            <input type="radio" name="operation" id="myOperationDivide" value="/"> /
            <br>
            <input type="button" onclick="mySubmit();" value="Calculate">
            <!--  input type="submit" value="CAL"-->
            <br>
            <div>Result is :</div>
            <div id="myResult">333</div>

    </body>

</html>
