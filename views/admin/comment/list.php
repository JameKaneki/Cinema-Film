<div class="row">
        <div class="row fromtitle">
            <h1>Danh sách bình luận</h1>
        </div>
        <div class="row fromcontent">
    <div class="row mb10 fromlist">
        <table>
            <tr>
                <th></th>
                <th>Mã Comment</th>
                <th>Người bình luận</th>
                <th>Nội dung</th>
                <th>Thời gian</th>
                <th>Tên phim</th>
                <th></th>
            </tr>
            <?php
                $listComment = selectAll_comment();
                foreach ( $listComment as $list){
                    extract($list);
                    $deleteComment= "index.php?act=comment-delete&idComment=".$idComment;
                    echo '<tr>
                    <td><input type="checkbox"></td>
                    <td>'.$idComment.'</td>
                    <td>'.$name.'</td>
                    <td>'.$content.'</td>
                    <td>'.$timeComment.'</td>
                    <td>'.$nameFilm.'</td>
                    <td>
                    <a href="'.$deleteComment.'"> <input type="button" value="xóa"></a></td>
                </tr>';
                // <a href="'.$updateTicket.'"><input type="button" value="Sửa"></a> 
                }
            ?>
            
        </table>
    </div>
    <div class="row mb10 ">
        <input type="button" id='select-all' value="Chọn tất cả">
        <input type="button" id='deselect-all' value="Bỏ chọn tất cả">
        <a href="index.php?act=comment-delete"><input type="button" value="Xóa các mục đã chọn"></a>
        <a href="index.php?act=comment-add"><input type="button" value="Nhập thêm"></a>
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