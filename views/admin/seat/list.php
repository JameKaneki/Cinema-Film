<div class="row">
    <div class="row fromtitle mb">
        <h1>Seat List</h1>
    </div>
    <style>
        td,th{
            text-align: center;
        }
    </style>
    <form action="index.php?act=seat" method="post">
        <!-- <input type="text" name="kyw">
        <select name="id_dm" id="">
            <option value="0" selected>Tất Cả</option>
            <?php
            // foreach ($listdm as $dm) {
            //     extract($dm);
            //     echo "  <option value='.$id_dm.'>$name_dm</option>";
            // }
            // ?>
            <input type="submit" name="check" value="OK">
        </select> -->
    </form>
    <div class="row fromcontent">
        <div class="row mb10 fromlist">
            <table>
                <tr>
                    <th>Id seat</th>
                    <th>Seat Key</th>
                    <th>ID Room</th>
                    <th>Sửa/Xóa</th>
                </tr>
                <?php
                      $confirm = "return confirm('Bạn có chắc chắn muốn xóa')";
                      $Seat_edit = "return confirm('Bạn có chắc chắn muốn sửa')";
                foreach ($listseat as $seat) {
                    extract($seat);
                    $deleteSeat = "index.php?act=seat_delete&id_seat=" . $id_seat;
                    $editSeat = "index.php?act=seat_edit&id_seat=" . $id_seat;
                        
                    // $anh_sp = "../upload/" . $img;
                    // if (is_file($anh_sp)) {
                    //     $anh = "<img src='" . $anh_sp . "' height='80'>";
                    // } else {
                    //     $anh = "Không có hình ảnh ";
                    // }
                    echo '<tr >
                            <td >' . $id_seat . '</td>
                            <td >' . $seat_key . '</td>
                            <td >' . $nameRoom . '</td>
                            <td > <a href="' . $editSeat . '" class="edit"><input type="button" value="Sửa" onclick="'. $Seat_edit.'">
                            </a>  |  <a href="' . $deleteSeat . '" class="delete" ><input type="button" value="Xóa" onclick="'. $confirm.'"
                             ></td></a>
                          </tr> ';
                }
                ?>

            </table>
        </div>
        <div class="row mb20">
            <input type="button" id="select-all" value="Chọn tất cả">
            <input type="button" id="deselect-all" value="Bỏ chọn tất cả">
            <a href="index.php?act=seat_delete"> <input type="button" value="Xóa các mục chọn"></a>
            <a href="index.php?act=seat_add"><input type="button" value="Nhập thêm"></a>


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