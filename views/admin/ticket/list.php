 <div class="wrapper">
    <div class="row frmtitle mb-3" >
        <h1 style="text-align: center;" class="title">Ticket List</h1>
    </div>
     <div style="display: flex;">
         <table style="min-width: 1400px;">
         <thead>
             <tr>
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
             </thead>
             <tbody>
             <?php
                $listTicket = selectAll_ticket();
                foreach ($listTicket as $list) {
                    extract($list);
                    //$updateTicket= "index.php?act=ticket-edit&idTicket=".$idTicket;
                    $deleteTicket = "index.php?act=ticket-delete&idTicket=" . $idTicket;
                    echo '<tr>
                    <td>' . $idTicket . '</td>
                    <td>' . $nameFilm . '</td>
                    <td>' . $price . '</td>
                    <td>' . $name . '</td>
                    <td>' . $time . ' ' . $date . '</td>
                    <td>' . $seat_key . '</td>
                    <td>' . $nameRoom . '</td>
                    <td>' . $nameCinema . '</td>
                    <td>
                    <a href="' . $deleteTicket . '">
                    <input style="background-color:red" type="button" onclick="return confirm(`Do you want delete?`);" value="Delete"></a></td>   
                    </td>
                </tr>';
                }
                ?>
        </tbody>
         </table>
     </div>
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
        width: 75%;
        margin: 0px auto;
        float: right;
        margin-right: 50px;
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
        background-color: lightgreen;
        color: white;
        text-shadow: 1px 1px 1px gray;
        font-size: 18px;
    }

    td {
        font-size: 16px;
        font-weight: bold;
    }

    table tr:nth-child(odd) {
        background-color: rgb(228, 234, 241);
        color: black;
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
    table tbody tr:nth-child(odd) {
        background-color: rgb(228, 234, 241);
        color: black;
    }
 </style>