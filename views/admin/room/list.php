 <div class="wrapper">
        <h1>Room list</h1>
    <div style="display: flex;">
    <table>
        <tr>
            <th></th>
            <th>Mã phòng chiếu</th>
            <th>Tên Phòng Chiếu</th>
            <th>Tên Rạp Chiếu</th>
            <th style="">Danh Sách Ghế</th>
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
                <td class="action-box">
                <div class="btn btn-red"><a href="'.$deleteRoom.'" >Remove</a></div>
                <div class="btn btn-blue"><a href="'.$updateRoom.'" >Edit</a></div>
                </td>
            </tr>';
             
            }
        ?>
        <tr>
            <td><input type="button" id='select-all' value="Chọn tất cả"></td>
            <td><input type="button" id='deselect-all' value="Bỏ chọn tất cả"></td>
            <td><a href="index.php?act=room-delete"><input type="button" value="Xóa các mục đã chọn"></a></td>
            <td><a href="index.php?act=room-add"><input type="button" value="Nhập thêm"></a></td>
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