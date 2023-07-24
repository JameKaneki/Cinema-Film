 <div class="row">
        <div class="row fromtitle">
            <h1>Danh sách vé</h1>
        </div>
        <div class="row fromcontent">
    <div class="row mb10 fromlist">
        <table>
            <tr>
                <th></th>
                <th>Mã Vé</th>
                <th>Tên Phim</th>
                <th>Giá vé</th>
                <th>Người mua</th>
                <th>Giờ chiếu</th>
                <th>Số ghế</th>
                <th>Tên Phòng</th>
                <th>Tên Rạp Phim</th>
                <th></th>
            </tr>
            <?php
                $listTicket = selectAll_ticket();
                foreach ($listTicket as $list){
                    extract($list);
                    //$updateTicket= "index.php?act=ticket-edit&idTicket=".$idTicket;
                    $deleteTicket= "index.php?act=ticket-delete&idTicket=".$idTicket;
                    echo '<tr>
                    <td><input type="checkbox"></td>
                    <td>'.$idTicket.'</td>
                    <td>'.$nameFilm.'</td>
                    <td>'.$price.' $</td>
                    <td>'.$name.'</td>
                    <td>'.$time.' '.$date.'</td>
                    <td>'.$seat_key.'</td>
                    <td>'.$nameRoom.'</td>
                    <td>'.$nameCinema.'</td>
                    <td>
                    <a href="'.$deleteTicket.'"> <input type="button" value="xóa"></a></td>
                </tr>';
                // <a href="'.$updateTicket.'"><input type="button" value="Sửa"></a> 
                }
            ?>
            
        </table>
    </div>
    <div class="row mb10 ">
        <input type="button" id='select-all' value="Chọn tất cả">
        <input type="button" id='deselect-all' value="Bỏ chọn tất cả">
        <a href="index.php?act=ticket-delete"><input type="button" value="Xóa các mục đã chọn"></a>
        <!-- <a href="index.php?act=ticket-add"><input type="button" value="Nhập thêm"></a> -->
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