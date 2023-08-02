 <div class="wrapper">
            <h1>Ticket List</h1>
    <div style="display: flex;">
        <table style="min-width: 1500px;">
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
                    <div class="btn btn-red"<a href="'.$deleteTicket.'">Remove</a></div>
                    </td>
                </tr>';
                // <a href="'.$updateTicket.'"><input type="button" value="Sửa"></a> 
                }
            ?>
            <tr>
                <td> <input type="button" id='select-all' value="Chọn tất cả"></td>
                <td> <input type="button" id='deselect-all' value="Bỏ chọn tất cả"></td>
                <td> <a href="index.php?act=ticket-delete"><input type="button" value="Xóa các mục đã chọn"></a></td>
            </tr>
            
        </table>
    </div>
        <!-- <a href="index.php?act=ticket-add"><input type="button" value="Nhập thêm"></a> -->
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
     :root{
        --red--color : rgb(223,69,45);
        --blue-color : rgb(65,99,232);
    }
    a,li{
    text-decoration: none;
    list-style-type: none;
    }
    .wd{
        width: 120px;
    }
    .wrapper{
        width: 85%;
        margin: 0px auto;
        float: right;
        margin-right: 50px;
    }
    h1{
        margin-left: 700px;
        margin-top: 50px;
    }
    table{
        margin: 10px auto;
        padding: 12px;
        box-shadow: 1px 1px 1px 1px #999;
        border-radius: 6px;
        max-width: 100%;
        /* width: 90%; */
        
    }
    td,th{
        padding: 8px 4px;
        text-align: start;
        /* min-width: 120px; */
        max-width: 300px;
        overflow-x: hidden;
        
    }
    th{
        background-color: rgb(158, 105, 105);
        color: white;
        text-shadow: 1px 1px 1px gray;
        font-size: 18px;
    }

    td{
        font-size: 16px;
        font-weight: bold;
    }
    /* tr{
        border: none;

    } */
    table tr:nth-child(odd){
        background-color: rgb(228, 234, 241);
    }
    td.bigCol{
        width: 500px;
    }
    .showTime{
        display: flex;
        justify-content: start; 
        flex-wrap: wrap;
    }
    .showTime-box{
        margin: 2px 4px;
        border: 2px solid ;
        padding: 4px 8px;
        border-radius: 3px;
        background-color: #666;
    }
    .action-box{
        display: flex;
        height: 100%;
    }
    .btn{
        padding: 6px 16px;
        margin: 10px 4px;
        border-radius: 3px;
        cursor: pointer;
        border: none;
    }
    .btn a {
        color:white;
    }
    .btn-red{
        color: white;
        background-color: var(--red--color);
    }
    .btn-blue{
        color: white;
        background-color: var(--blue-color);
    }
</style>