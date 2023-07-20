<div class="row">
    <div class="row fromtitle mb">
        <h1>Danh sách film</h1>
    </div>
<style>

    td,th{
        
        overflow-x: hidden;
        text-align: start;
        min-width: 90px;
        max-width: 150px;
    }
    td.desc{
        min-width: 300px;
    }
    td.rate{
        text-align: center;
    }

</style>
    <form action="index.php?act=film" method="post">
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
                    <th>Id Film</th>
                    <th>Name Film</th>
                    <th>Director</th>
                    <th>Performer</th>
                    <th>premiere</th>
                    <th>duration</th>
                    <th>language</th>
                    <th class="desc">description</th>
                    <th>Category</th>
                    <th>Trailer</th>
                    <th>poster</th>
                    <th class="rate">rate</th>
                    <th>likeAmount</th>
                </tr>
                <?php
                      $confirm = "return confirm('Bạn có chắc chắn muốn xóa')";
                      $film_edit = "return confirm('Bạn có chắc chắn muốn sửa')";
                foreach ($listfilm as $films) {
                    extract($films);
                    $deletefilm = "index.php?act=film_delete&idFilm=" . $idFilm;
                    $editfilm = "index.php?act=film_edit&idFilm=" . $idFilm;
                        
                    // $anh_sp = "../upload/" . $img;
                    // if (is_file($anh_sp)) {
                    //     $anh = "<img src='" . $anh_sp . "' height='80'>";
                    // } else {
                    //     $anh = "Không có hình ảnh ";
                    // }
                    echo '<tr >
                            <td >' . $idFilm . '</td>
                            <td >' . $nameFilm . '</td>
                            <td >' . $director . '</td>
                            <td >' . $performer . '</td>
                            <td >' . $premiere . '</td>
                            <td >' . $duration . '</td>
                            <td >' . $language . '</td>
                            <td class="desc">' . $description . '</td>
                            <td >' . $category . '</td>
                            <td >' . $trailer . '</td>
                            <td >' . $poster . '</td>
                            <td class="rate" >' . $rate . '</td>
                            <td >' . $likeAmount . '</td>
                            <td > <a href="' . $editfilm . '" class="edit"><input type="button" value="Sửa" onclick="'. $film_edit.'">
                            </a>  |  <a href="' . $deletefilm . '" class="delete" ><input type="button" value="Xóa" onclick="'. $confirm.'"
                             ></td></a>
                          </tr> ';
                }
                ?>

            </table>
        </div>
        <div class="row mb20">
            <input type="button" id="select-all" value="Chọn tất cả">
            <input type="button" id="deselect-all" value="Bỏ chọn tất cả">
            <a href="index.php?act=film_delete"> <input type="button" value="Xóa các mục chọn"></a>
            <a href="index.php?act=film_add"><input type="button" value="Nhập thêm"></a>


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