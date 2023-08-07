<div class="wrapper" style="margin-left: 20px;margin-top: 50px;">
    <h1 style="text-align: center;">Seat List</h1>
    <div style="display: flex;">
        <table style="min-width: 1400px;">
            <tr>
                <th>Id seat</th>
                <th>Seat Key</th>
                <th>ID Room</th>
                <th></th>
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
                            <td class="action-box">
                            <a href="' . $editSeat . '"><input style="background-color:blue" type="button" value="Update"></a> <a href="' . $deleteSeat . '">
                            <input type="button" onclick="return confirm(`Do you want delete?`);" value="Delete"></a></td>   
                            
                          </tr>';
            }
            ?>
            <tr>
                <td><a href="index.php?act=seat_add"><input type="button" value="ADD"></a></td>
            </tr>
        </table>
    </div>
</div>