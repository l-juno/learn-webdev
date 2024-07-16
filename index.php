<?
error_reporting(E_ERROR | E_WARNING);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <style>
            .my_class1 {font-size:14px; color:red}
            .my_class2 {font-size:14px; color:blue}
        </style>
        <script src="/assets/jquery-3.7.1.min.js" type="text/javascript"></script>
        <script>
            function mySubmit() {

                $.ajax({
                    url: '/ajax_calculator.php',
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


        </form>
        <div>Result is :</div>
        <div id="myResult">333</div>








        <script>
            function updateScale(){
                const scaleInput = document.getElementById("scaleInput").value;
                document.getElementById("scaleVal").textContent = scaleInput;
                document.getElementById('whyQuestion').style.display = 'block';
            }
        </script>


        <form method="post" action="">
                <br>
                <br>
                What is your name?
                <input type="text" name="name">
                <br><br>
                Select date:
                <input type="date" name="date">
                <br><br>
                How would you rate your day on a scale of 1 to 10?
                <input type="range" id="scaleInput" name="scale" min="0" max="10" oninput="updateScale()">
                <br>
                <p id="whyQuestion" style="display: none;">
                    Why was your day a <span id="scaleVal"> 0?</span>
                </p>
                <input type="text" name="journal">
                <br>
        </form>
        <?php
            $name = $_POST["name"];
            $date = $_POST["date"];
            $scaleVal = $_POST["scale"];
            $journal = $_POST["journal"];
        ?>

    </body>

</html>




