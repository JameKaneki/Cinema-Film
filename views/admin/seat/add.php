<div class="container mt-2">
    <div class="row frmtitle">
        <div class="">
            <h1 class="title">ADD NEW SEAT</h1>
        </div>
    </div>
    <form action="index.php?act=seat_add" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="w-50 form-group my-3">
                <label for="">Seat Key</label> <br>
                <input class="form-control" type="text" name="seat_key" value="">
                <span style="color:red">
                <?php
                 if(isset($_POST['addnew'])&& $_POST['addnew']){
                    if($_POST['seat_key']==""){
                        echo "Không để chống ghế";
                      }
                 }
                ?>
                </span>
            </div>
            <div class="w-50 form-group my-3" >
            <label for="">Room</label> <br>
                <select name="idRoom" id="" style="padding: 5px 30px;">
                    <option value="">------</option>
                <?php
                    $listRoom=selectAll_room();
                    foreach($listRoom as $list){
                        extract($list);
                        echo "<option value=".$idRoom.">$nameRoom</option>";
                    }
                 ?>
                </select>
                <span style="color:red">
                <?php
                 if(isset($_POST['addnew'])&& $_POST['addnew']){
                    if($_POST['idRoom']==""){
                        echo "Chưa chọn phòng chiếu";
                      }
                 }
                ?>
                </span>
            </div>
        </div>
        <div class="col mb10 mt-3">
            <input class="btn btn-success text-white" type="submit" name="addnew" value="ADD">
            <input class="btn btn-danger text-white" type="reset" value="RESET">
            <a href="index.php?act=seat"><input class="btn btn-primary text-white" type="button" value="LIST"></a>
        </div>
    </form>
</div>

