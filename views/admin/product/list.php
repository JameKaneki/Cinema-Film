<div class="wrapper">
    <h1>Film list</h1>
    <style>
        :root {
            --red--color: rgb(223, 69, 45);
            --blue-color: rgb(65, 99, 232);
        }

        a,
        li {
            text-decoration: none;
            list-style-type: none;
        }

        .wd {
            width: 120px;
        }

        .wrapper {
            width: 85%;
            margin: 0px auto;
            float: right;
            margin-right: 50px;
        }

        h1 {
            margin-left: 700px;
            margin-top: 50px;
        }

        table {
            margin: 10px auto;
            padding: 12px;
            box-shadow: 1px 1px 1px 1px #999;
            border-radius: 6px;
            max-width: 100%;
            /* width: 90%; */

        }

        td,
        th {
            padding: 8px 4px;
            text-align: start;
            /* min-width: 120px; */
            max-width: 300px;
            overflow-x: hidden;

        }

        th {
            background-color: rgb(158, 105, 105);
            color: white;
            text-shadow: 1px 1px 1px gray;
            font-size: 18px;
        }

        td {
            font-size: 16px;
            font-weight: bold;
        }

        /* tr{
        border: none;

    } */
        table tr:nth-child(odd) {
            background-color: rgb(228, 234, 241);
        }

        td.bigCol {
            width: 500px;
        }

        .showTime {
            display: flex;
            justify-content: start;
            flex-wrap: wrap;
        }

        .showTime-box {
            margin: 2px 4px;
            border: 2px solid;
            padding: 4px 8px;
            border-radius: 3px;
            background-color: #666;
        }

        .action-box {
            display: flex;
            height: 100%;
        }

        .btn {
            padding: 6px 16px;
            margin: 10px 4px;
            border-radius: 3px;
            cursor: pointer;
            border: none;
        }

        .btn a {
            color: white;
        }

        .btn-red {
            color: white;
            background-color: var(--red--color);
        }

        .btn-blue {
            color: white;
            background-color: var(--blue-color);
        }
    </style>
    <div style="display: flex; overflow-x: scroll; overflow-y: scroll;">
        <table>
            <thead>
                <tr>
                    <th>IdFilm</th>
                    <th style='width= 150px; padding:0 100px;'>NameFilm</th>
                    <th>Director</th>
                    <th style='width= 500px; padding:0 150px;'>Performer</th>
                    <th style='width= 100px; padding:0 30px;'>Premiere</th>
                    <th>Duration</th>
                    <th style='width= 500px; padding:0 100px;'>Language</th>
                    <th style='width= 500px; padding:0 300px;'>Description</th>
                    <th>Category</th>
                    <th style="width= 100px;">Trailer</th>
                    <th>Poster</th>
                    <th>Rate</th>
                    <th>LikeAmount</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
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
                            <td  style="width= 50px; padding:0 10px;">' . $poster . '</td>
                            <td class="rate" >' . $rate . '</td>
                            <td >' . $likeAmount . '</td>
                            <td> 
                            <div class="btn btn-red"> <a href="' . $deletefilm . '">Remove</a></div>
                            <div class="btn btn-blue"> <a href="' . $editfilm . '" >Edit</a></div>                               
                             </td>
                          </tr> ';
                }
                ?>
            </tbody>
            <tr>
                <td> <a href="index.php?act=film_add"><input type="button" value="Nhập thêm"></a></td>
            </tr>

    </div>
    </table>

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