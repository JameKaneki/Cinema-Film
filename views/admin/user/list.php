     <div class="container" style="margin-left: 20px;margin-top:50px">
    <div class="row frmtitle mb-3" >
        <h1 style="text-align: center;" class="title">USERS</h1>
    </div>
    <div class="row mt frmcontent">
        <div class="row mb10 mt frmdshanghoa text ">
            <table>
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
            </table>
        </div>
    </div>
</div>
<style>
    td a:nth-child(1) input{
        background-color: #F54748;
    }
</style>