<?php
require_once "../header.php";
?>
<script src="/assets/jquery-3.7.1.min.js" type="text/javascript"></script>
<script>
    let active_page = 1;

    function loadTable() {
        console.log(active_page);
        var formData = $("#filterUserForm").serialize();
        formData += "&active_page=" + encodeURIComponent(active_page);
        $.ajax({
            url: './user_list_cmd.php',
            type: 'post',
            dataType: 'json',
            data: formData,
            beforeSend: function () {
                console.log("before");
            },
            complete: function () {
                console.log("complete");
            },
            success: function (json) {
                console.log("success");
                displayPagination(json.num_pages);

                $('#userTable tr:gt(0)').remove();
                let userRows = '';
                $.each(json, function (key, value) {
                    if (!isNaN(key)) {
                        userRows += '<tr>';
                        userRows += '<td>' + value.user_no + '</td>';
                        userRows += '<td>' + value.user_id + '</td>';
                        userRows += '<td>' + value.user_name + '</td>';
                        userRows += '<td>' + value.user_email + '</td>';
                        userRows += '<td>' + value.rt + '</td>';
                        userRows += '<td>' + value.last_login_date + '</td>';
                        userRows += '</tr>';
                    }
                });
                $('#userTable').append(userRows);
                showCurrentPage();
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

    function clearInput() {
        document.getElementById("user_no").value = "";
        document.getElementById("user_id").value = "";
        document.getElementById("user_name").value = "";
        document.getElementById("user_email").value = "";
        document.getElementById("rt_from").value = "";
        document.getElementById("rt_to").value = "";
        document.getElementById("last_logged_in_from").value = "";
        document.getElementById("last_logged_in_to").value = "";
    }

    function setPage(pageNumber) {
        active_page = pageNumber;
        loadTable();
    }

    function showCurrentPage() {
        let current_page = document.getElementById(active_page.toString());
        current_page.style = "background-color: aqua;";
    }

    function displayPagination(num_pages) {
        if (num_pages <= 0) {
            let paginationContainer = document.getElementById("pagination");
            if (paginationContainer) {
                paginationContainer.innerHTML = "";
            }
            return;
        } else {
            let paginationContainer = document.getElementById("pagination");
            if (!paginationContainer) {
                paginationContainer = document.createElement("div");
                paginationContainer.id = "pagination";
                document.body.appendChild(paginationContainer);
            }

            paginationContainer.innerHTML = "";

            let firstButton = document.createElement("button");
            firstButton.id = "first";
            firstButton.innerText = "First";
            firstButton.onclick = function () {
                setPage(1)
            };
            paginationContainer.appendChild(firstButton);

            for (let i = 1; i <= num_pages; i++) {
                let pageButton = document.createElement("button");
                pageButton.id = i.toString();
                pageButton.innerText = (i).toString();
                pageButton.onclick = function () {
                    setPage(i)
                };
                paginationContainer.appendChild(pageButton);
            }

            let lastButton = document.createElement("button");
            lastButton.id = "last";
            lastButton.innerText = "Last";
            lastButton.onclick = function () {
                setPage(num_pages)
            };
            paginationContainer.appendChild(lastButton);
        }
    }


    </script>

    <form id='filterUserForm' onSubmit="return false">
        user number
        <input type='text' id='user_no' name="user_no" placeholder='Enter value'/>
        user id
        <input type='text' id='user_id' name="user_id" placeholder='Enter value'/>
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
        <button onclick="setPage(1);">Confirm</button>
    </form>

    <button onclick="clearInput();">Clear</button>


    <table id="userTable" class="table table-striped table-bordered">
        <tr>
            <th>user_no</th>
            <th>user_id</th>
            <th>user_name</th>
            <th>user_email</th>
            <th>rt</th>
            <th>last_login_date</th>
        </tr>
    </table>


    <div id="pagintaion" class="justify-content-center"></div>







    <?php
    require_once "../footer.php";
    ?>
