
<style>
    tr td:nth-child(11) {
        padding: 8px 4px;
        text-align: start;
        /* min-width: 120px; */
        max-width: 300px;
        overflow-x: hidden;
    }

    tr td:last-child {
        display: flex;
        text-align: center;
    }

    .fix {
        display: block !important;
    }
    table{
        margin-right: 10px;
    }
</style>
<div class="wrapper" style="margin-left: 280px;">
    <h1 style="text-align: center;">Film list</h1>
    <div style="display: flex; overflow-x: scroll;">
        <table>
            <tbody>
                <tr>
                    <th>IdFilm</th>
                    <th style='width: 150px; padding:0 100px;'>NameFilm</th>
                    <th>Director</th>
                    <th style='width: 500px; padding:0 150px;'>Performer</th>
                    <th style='width: 100px; padding:0 30px;'>Premiere</th>
                    <th>Duration</th>
                    <th style='width: 500px; padding:0 100px;'>Language</th>
                    <th style='width: 500px; padding:0 300px;'>Description</th>
                    <th>Category</th>
                    <th style="width: 100px;">Trailer</th>
                    <th>Poster</th>
                    <th>Rate</th>
                    <th>ACtion</th>
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
                            <td class="desc" style="width= 50px; padding:0 10px;">' . $poster . '</td>
                            <td class="rate" >' . $rate . '</td>
                            <td>
                            <a href="' . $editfilm . '"><input style="background-color:blue"  type="button" value="Update"></a> <a href="' . $deletefilm . '">
                            <input type="button" onclick="return confirm(`Do you want delete?`);" value="Delete"></a></td>                             
                             </td>
                          </tr> ';
                }
                ?>
            </tbody>
            <tr>
                <td> <a href="index.php?act=film_add"><input type="button" value="ADD"></a></td>    
            </tr>

    </div>
    </table>
</div>
</div>