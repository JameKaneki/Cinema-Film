 <div class="row">
    <div class="row fromtitle">
        <h1>Danh sách phòng chiếu</h1>
    </div>
    <div class="row fromcontent">
<div class="row mb10 fromlist" style="overflow-y: scroll">
    <table>
        <tr>
            <th></th>
            <th>Mã phòng chiếu</th>
            <th>Tên Phòng Chiếu</th>
            <th>Tên Rạp Chiếu</th>
            <th>Danh Sách Ghế</th>
            <th></th>
        </tr>
        <?php
            $listRoom = selectAll_room();
            foreach ( $listRoom as $list){
                extract($list);
                $deleteRoom= "index.php?act=room-delete&idRoom=".$idRoom;
                $updateRoom= "index.php?act=room-edit&idRoom=".$idRoom;
                echo '<tr>
                <td><input type="checkbox"></td>
                <td>'.$idRoom.'</td>
                <td>'.$nameRoom.'</td>
                <td>'.$nameCinema.'</td>
                <td>'.$seatList.'</td>
                <td>
                <a href="'.$updateRoom.'"><input type="button" value="Sửa"></a>
                <a href="'.$deleteRoom.'"> <input type="button" value="xóa"></a></td>
            </tr>';
             
            }
        ?>
        
    </table>
</div>
<div class="row mb10 ">
    <input type="button" id='select-all' value="Chọn tất cả">
    <input type="button" id='deselect-all' value="Bỏ chọn tất cả">
    <a href="index.php?act=room-delete"><input type="button" value="Xóa các mục đã chọn"></a>
    <a href="index.php?act=room-add"><input type="button" value="Nhập thêm"></a>
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