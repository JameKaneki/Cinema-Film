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
                <th>Giá vé</th>
                <th>Người mua</th>
                <th>Giờ chiếu</th>
                <th>Số ghế</th>
                <th></th>
            </tr>
            <?php
                $listTicket = selectAll_ticket();
                foreach ( $listTicket as $list){
                    extract($list);
                    $updateTicket= "index.php?act=ticket-edit&idTicket=".$idTicket;
                    $deleteTicket= "index.php?act=ticket-delete&idTicket=".$idTicket;
                    echo '<tr>
                    <td><input type="checkbox"></td>
                    <td>'.$idTicket.'</td>
                    <td>'.$price.' $</td>
                    <td>'.$name.'</td>
                    <td>'.$time.'</td>
                    <td>'.$seat.'</td>
                    <td><a href="'.$updateTicket.'"><input type="button" value="Sửa"></a> <a href="'.$deleteTicket.'"> <input type="button" value="xóa"></a></td>
                </tr>';
                }
            ?>
            
        </table>
    </div>
    <div class="row mb10 ">
        <input type="button" value="Chọn tất cả">
        <input type="button" value="Bỏ chọn tất cả">
        <input type="button" value="Xóa các mục đã chọn">
        <a href="index.php?act=ticket-add"><input type="button" value="Nhập thêm"></a>
    </div>
    </div>

</div>