 <div class="wrapper" style="margin-left: 30px;margin-top:50px">
     <h1 style="text-align: center;">Ticket List</h1>
     <div style="display: flex;">
         <table style="min-width: 1400px;">
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
             <?php
                $listTicket = selectAll_ticket();
                foreach ($listTicket as $list) {
                    extract($list);
                    //$updateTicket= "index.php?act=ticket-edit&idTicket=".$idTicket;
                    $deleteTicket = "index.php?act=ticket-delete&idTicket=" . $idTicket;
                    echo '<tr>
                    <td>' . $idTicket . '</td>
                    <td>' . $nameFilm . '</td>
                    <td>' . $price . ' $</td>
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
                    // <a href="'.$updateTicket.'"><input type="button" value="Sửa"></a> 
                }
                ?>

         </table>
     </div>
     <!-- <a href="index.php?act=ticket-add"><input type="button" value="Nhập thêm"></a> -->
 </div>