<?
error_reporting(E_ERROR | E_WARNING);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>

    <body>
        <script src="/assets/jquery-3.7.1.min.js" type="text/javascript"></script>
        <script>

            function submitJournal() {

                $.ajax({
                    url: './ajax_journal.php',
                    type: 'post',
                    cache: false,
                    data: $('#formButton').serialize(),
                    dataType: 'json',
                    beforeSend: function() {
                        const name = $("#nameButton").val();
                        const date = $("#dateButton").val();
                        const scale = $("#scaleButton").val();
                        const journal = $("#journalButton").val();
                        if(!name || !date || !scale || !journal){
                            console.log("Fill all values");
                        }
                    },
                    complete: function() {
                        console.log("complete");
                    },
                    success	: function(response) {
                        summarizeDay(response);
                        console.log("success!");

                    },
                    error: function (xhr, status, error) {
                        console.log("AJAX error", status, error);
                    }
                });
            }


            function updateScale(){
                const scaleInput = document.getElementById("scaleSubmit").value;
                document.getElementById("scaleVal").textContent = scaleInput;
                document.getElementById('whyQuestion').style.display = 'block';
            }


            function updateScale1(){
                const scaleInput1 = document.getElementById("scaleButton").value;
                document.getElementById("scaleVal1").textContent = scaleInput1;
                document.getElementById('whyQuestion1').style.display = 'block';
            }


            function submitForm(event) {
                event.preventDefault();
                document.getElementById("submitResponse").textContent = "What a great day!";
            }

            function summarizeDay(json){
                console.log("json got");

                $("#summary").text("On " + json.date + ", " + json.name + " rated their day a " + json.scale + " out of 10 because "
                + json.journal);
            }
        </script>

        <br>
        <br>

        <form id="formSubmit" method="post" action="" onSubmit="submitForm(event)">
                What is your name?
                <input type="text" name="nameSubmit" id="nameSubmit">
                <br><br>
                Select date:
                <input type="date" name="dateSubmit" id="dateSubmit">
                <br><br>
                How would you rate your day on a scale of 1 to 10?
                <input type="range" id="scaleSubmit" name="scaleSubmit" min="0" max="10" oninput="updateScale()">
                <br>
                <p id="whyQuestion" style="display: none;">
                    Why was your day a <span id="scaleVal"> 0</span>?
                    <br>
                    <input type="text" name="journalSubmit" >
                    <br>
                    <input type="submit">
                </p>
        </form>
        <?php
            $name = $_POST["nameSubmit"];
            $date = $_POST["dateSubmit"];
            $scaleVal = $_POST["scaleSubmit"];
            $journal = $_POST["journalSubmit"];
        ?>
        <p id="submitResponse"></p>



        <form id="formButton" method="post" action="" onSubmit="alert('Submit button Pressed');">
            What is your name?
            <input type="text" name="nameButton" id="nameButton">
            <br><br>
            Select date:
            <input type="date" name="dateButton" id="dateButton">
            <br><br>
            How would you rate your day on a scale of 1 to 10?
            <input type="range" id="scaleButton" name="scaleButton" min="0" max="10" oninput="updateScale1()">
            <br>
            <p id="whyQuestion1" style="display: none;">
                Why was your day a <span id="scaleVal1"> 0</span>?
                <br>
                <input type="text" name="journalButton" id="journalButton">
                <br>
                <input type="button" onclick="submitJournal()" value="button">
            </p>
            <br>
        </form>

        <p id="summary"><p>
    </body>

</html>