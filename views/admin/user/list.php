     <div class="container">
    <div class="row frmtitle mb-3" >
        <h1 style="text-align: center;" class="title">USERS</h1>
    </div>
    <div class="row mt frmcontent">
        <div class="row mb10 mt frmdshanghoa text ">
            <table>
                <thead>
                <tr>
                <th>User ID</th>
                    <th>UserName</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>PhoneNumber</th>
                    <th>Address</th>
                    <th>Role</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $confilm = "return confirm('Bạn có chắc chắn muốn xóa')";
                foreach ($list_user as $user) {
                    extract($user);
                    $delete = "index.php?act=user_delete&idUser=" .$idUser;
                    echo '<tr>
                            <td>' . $idUser . '</td>
                            <td>' . $userName  . '</td>
                            <td>' . $password . '</td>
                            <td>' . $email . '</td>
                            <td>' . $name . '</td>
                            <td>' . $phoneNumber . '</td>
                            <td>' . $address . '</td>
                            <td>' . $role . '</td>
                            <td>  
                            <a href="' . $confilm . '">
                            <input type="button" onclick="return confirm(`Do you want delete?`);" value="Delete"></a></td>   
                            </td>
                          </tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<style>
    td a:nth-child(1) input{
        background-color: #F54748;
    }
    :root {
        --red--color: rgb(223, 69, 45);
        --blue-color: rgb(65, 99, 232);
    }

    a,
    li {
        text-decoration: none;
        list-style-type: none;
    }

    .wd {
        width: 120px;
    }

    .container {
        width: 75%;
        margin: 0px auto;
        float: right;
        margin-right: 200px;
        margin-top: 20px;
    }


    table {
        margin: 10px auto;
        padding: 12px;
        box-shadow: 1px 1px 1px 1px #999;
        border-radius: 6px;
        max-width: 100%;
        /* width: 90%; */

    }

    td,
    th {
        padding: 8px 4px;
        text-align: start;
        /* min-width: 120px; */
        max-width: 300px;
        overflow-x: hidden;

    }

    th {
        background-color: lightgreen;
        color: white;
        text-shadow: 1px 1px 1px gray;
        font-size: 18px;
    }

    td {
        font-size: 16px;
        font-weight: bold;
    }

    table tr:nth-child(odd) {
        background-color: rgb(228, 234, 241);
        color: black;
    }

    td.bigCol {
        width: 500px;
    }

    .showTime {
        display: flex;
        justify-content: start;
        flex-wrap: wrap;
    }

    .showTime-box {
        margin: 2px 4px;
        border: 2px solid;
        padding: 4px 8px;
        border-radius: 3px;
        background-color: #666;
    }

    .action-box {
        display: flex;
        height: 100%;
    }

    .btn {
        padding: 6px 16px;
        margin: 10px 4px;
        border-radius: 3px;
        cursor: pointer;
        border: none;
    }

    .btn a {
        color: white;
    }

    .btn-red {
        color: white;
        background-color: var(--red--color);
    }

    .btn-blue {
        color: white;
        background-color: var(--blue-color);
    }
</style>