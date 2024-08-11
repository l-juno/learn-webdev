<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>

<body>
<style>
    table, th, td {
        border: 1px solid black;
    }
</style>
<script src="/assets/jquery-3.7.1.min.js" type="text/javascript"></script>

<script>
    $(document).ready(function() {
       //alert('ready!');
        $("#filter_param").change(function() {
            displayCondition();
        });

        displayCondition();
        loadTable();


    });

    function loadTable(){
        let filterParam = $('#filter_param').val();
        let filterBy = $('#filter_by').val();
        let from = $('#from').val();

        let requestData = {
            'filter_param': filterParam,
            'filter_by': filterBy
        };

        if ((typeof filterBy === 'undefined' || filterBy === "") && typeof from === "undefined"){
            requestData['cmd'] = "get_list";
        } else {
            requestData['cmd'] = "filter";
            if (filterParam === "rt" || filterParam === "last_login_date") {
                let from = $('#from').val();
                let to = $('#to').val();
                requestData['from'] = from;
                requestData['to'] = to;
            }
        }

        $.ajax({
            url: './user_list_cmd.php',
            type: 'post',
            dataType: 'json',
            data: requestData,
            beforeSend: function() {
                console.log("before");
                console.log(requestData);
            },
            complete: function() {
                console.log("complete");
            },
            success: function(json) {
                $('#userTable tr:gt(0)').remove();
                let userRows = '';
                $.each(json, function(key, value) {
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
            error: function(xhr, status, error) {
                if (xhr.responseText.indexOf('<!DOCTYPE') !== -1) {
                    window.location.href = './login.php';
                } else {
                    console.error('AJAX Error:', status, error);
                }
            }
        });
    }

    function displayCondition(){
        let filterParam = document.getElementById('filter_param').value;
        let whatToDisplay = document.getElementById('whatToDisplay');
        whatToDisplay.innerHTML = "";

        if (filterParam === "user_no" || filterParam === "user_id" || filterParam === "user_email" || filterParam === "user_name") {
            whatToDisplay.innerHTML = "<input type='text' id='filter_by' placeholder='Enter value'>";
        }
        else if (filterParam === "rt" || filterParam === "last_login_date") {
            whatToDisplay.innerHTML = `
                From:
                <input type='date' id='from'>
                To:
                <input type='date' id='to'>`;
        }
    }

    </script>


<form id='filterUserForm' onSubmit="return false">
    <select id="filter_param">
        <option value="user_no">user_no</option>
        <option value="user_id">user_id</option>
        <option value="user_name">user_name</option>
        <option value="user_email">user_email</option>
        <option value="rt">rt</option>
        <option value="last_login_date">last_login_date</option>
    </select>

    <span id="whatToDisplay"></span>
    <button onclick="loadTable();">Confirm</button>
</form>




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
