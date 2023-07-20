    <div class="row">
        <div class="row fromtitle">
            <h1>Danh sách rạp phim</h1>
        </div>
        <div class="row fromcontent">
    <div class="row mb10 fromlist">
        <table>
            <tr>
                <th></th>
                <th>Mã Rạp</th>
                <th>Tên Tên Rạp</th>
                <th>Địa chỉ</th>
                <th></th>
            </tr>
            <?php
                $listCinema = selectAll_cinema();
                foreach ( $listCinema as $list){
                    extract($list);
                    $updateCinema= "index.php?act=cinema-edit&idCinema=".$idCinema;
                    $deleteCinema= "index.php?act=cinema-delete&idCinema=".$idCinema;
                    echo '<tr>
                    <td><input type="checkbox"></td>
                    <td>'.$idCinema.'</td>
                    <td>'.$nameCinema.'</td>
                    <td>'.$addressCinema.'</td>
                    <td><a href="'.$updateCinema.'"><input type="button" value="Sửa"></a> <a href="'.$deleteCinema.'"> <input type="button" value="xóa"></a></td>
                </tr>';
                }
            ?>
            
        </table>
    </div>
    <div class="row mb10 ">
        <input type="button" id='select-all' value="Chọn tất cả">
        <input type="button" id='deselect-all' value="Bỏ chọn tất cả">
        <a href="index.php?act=cinema-delete"><input type="button" value="Xóa các mục đã chọn"></a>
        <a href="index.php?act=cinema-add"><input type="button" value="Nhập thêm"></a>
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
