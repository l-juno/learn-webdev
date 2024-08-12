<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
</head>
<style>
    table, th, td {
        border: 1px solid black;
    }
</style>
<body>
<script src="/assets/jquery-3.7.1.min.js" type="text/javascript"></script>
<script>

    function loadTable() {
        $.ajax({
            url: './user_list_cmd.php',
            type: 'post',
            dataType: 'json',
            data: $("#filterUserForm").serialize(),
            beforeSend: function () {
                console.log("before");
            },
            complete: function () {
                console.log("complete");
            },
            success: function (json) {
                console.log("success");
                $('#userTable tr:gt(0)').remove();
                let userRows = '';
                $.each(json, function (key, value) {
                    userRows += '<tr>';
                    userRows += '<td>' + value.user_no + '</td>';
                    userRows += '<td>' + value.user_id + '</td>';
                    userRows += '<td>' + value.user_name + '</td>';
                    userRows += '<td>' + value.user_email + '</td>';
                    userRows += '<td>' + value.rt + '</td>';
                    userRows += '<td>' + value.last_login_date + '</td>';
                    userRows += '</tr>';
                });
                $('#userTable').append(userRows);
            },
            error: function (xhr, status, error) {
                if (xhr.responseText.indexOf('<!DOCTYPE') !== -1) {
                    window.location.href = './login.php';
                } else {
                    console.error('AJAX Error:', status, error);
                }
            }
        });
    }

    $(document).ready(function () {
        loadTable();
    });

    function clearInput(){
        document.getElementById("user_no").value = "";
        document.getElementById("user_id").value = "";
        document.getElementById("user_name").value = "";
        document.getElementById("user_email").value = "";
        document.getElementById("rt_from").value = "";
        document.getElementById("rt_to").value = "";
        document.getElementById("last_logged_in_from").value = "";
        document.getElementById("last_logged_in_to").value = "";
    }


    </script>

    <form id='filterUserForm' onSubmit="return false">
        user number
        <input type='text' id='user_no' name="user_no" placeholder='Enter value'/>
        user id
        <input type='text' id='user_id'  name="user_id" placeholder='Enter value'/>
        username
        <input type='text' id='user_name' name="user_name" placeholder='Enter value'/>
        user email
        <input type='text' id='user_email' name="user_email" placeholder='Enter value'/>
        <br/>
        register date
        <br/>
        From:
        <input type='date' id='rt_from' name='rt_from'/>
        To:
        <input type='date' id='rt_to' name='rt_to'/>
        <br/>
        last login date <br/>
        From:
        <input type='date' id='last_logged_in_from' name='last_logged_in_from'/>
        To:
        <input type='date' id='last_logged_in_to' name='last_logged_in_to'/>
        <br/>
        <button onclick="loadTable();">Confirm</button>
    </form>

    <button onclick="clearInput();">Clear</button>




    <table id="userTable">
        <tr>
            <th>user_no</th>
            <th>user_id</th>
            <th>user_name</th>
            <th>user_email</th>
            <th>rt</th>
            <th>last_login_date</th>
        </tr>
    </table>


    </body>
    </html>
