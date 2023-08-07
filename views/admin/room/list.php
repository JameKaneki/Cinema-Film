 <div class="wrapper" style="margin-left:20px;">
        <h1 style="text-align: center;">Room list</h1>
    <div style="display: flex;">
    <table style="min-width: 1500px;">
        <tr>
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
                
                <td>'.$idRoom.'</td>
                <td>'.$nameRoom.'</td>
                <td>'.$nameCinema.'</td>
                <td>'.$seatList.'</td>
                <td class="action-box">
                <a href="' . $updateRoom . '"><input style="background-color:blue" type="button" value="Update"></a> <a href="' . $deleteRoom . '">
                <input type="button" onclick="return confirm(`Do you want delete?`);" value="Delete"></a></td>   
                </td>
            </tr>';
             
            }
        ?>
        <tr>
            <td><a href="index.php?act=room-add"><input type="button" value="ADD"></a></td>
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
        width: 75%;
        margin: 0px auto;
        float: none !important;
    }
    h1{
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