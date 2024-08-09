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
        $.ajax({
            url: './user_list_cmd.php',
            type: 'get',
            dataType: 'json',
            data: {'cmd':'get_list'},
            beforeSend: function() {
                console.log("before");
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
    });

</script>


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
