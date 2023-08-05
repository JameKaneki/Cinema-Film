<div class="wrapper">
    <h1>Seat List</h1>
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
                            <div class="btn btn-red"><a href="' . $deleteSeat . '">Remove</a></div>
                            <div class="btn btn-blue"><a href="' . $editSeat . '">Edit</a></div>       
                            </td>
                          </tr>';
            }
            ?>
            <tr>
                <td><a href="index.php?act=seat_add"><input type="button" value="Nhập thêm"></a></td>
            </tr>
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