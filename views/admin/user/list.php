<div class="row">
    <div class="row fromtitle">
        <h1>USER LIST</h1>
    </div>
    <div class="row fromcontent">
        <div class="row mb10 fromlist">
            <table>
                <tr>
                    <th>User ID</th>
                    <th>UserName</th>
                    <th>Password</th>
                    <th>EMAIL</th>
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
                            <td>   <a href="' . $delete . '" class="delete"><input type="button" value="Xóa" onclick="'.$confilm.'"></td></a>
                          </tr>';
                }
                ?>

            </table>
        </div>

        <div class="row mb20">
            <input type="button" id="select-all" value="Chọn tất cả" >
            <input type="button" id="deselect-all" value="Bỏ chọn tất cả">
            <a href="index.php?act=user_signin"><input type="button" value="Đăng nhập trang admin"></a>


        </div>
        <script>
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            const selectAll = document.querySelector('#select-all');
            const deselectAll = document.querySelector('#deselect-all');

            selectAll.addEventListener('click', () => {
                checkboxes.forEach(checkbox => {
                    checkbox.checked = true;
                });
            });

            deselectAll.addEventListener('click', () => {
                checkboxes.forEach(checkbox => {
                    checkbox.checked = false;
                });
            });
        </script>
    </div>
</div>