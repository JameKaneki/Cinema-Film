<?php
    if(is_array($listseat)){
        extract($listseat);
    }
?>
<style>
    .mb{
        padding: 10px 0;
    }
    input{
        margin: 10px 10px;
        padding: 5px 10px;
        font-size: 16px;
    }
    textarea{
        padding: 7px;
        font-size: 16px;
    }
</style>
<div class="container mt-2">
<div class="row frmtitle">
        <div class="">
            <h1 class="title">EDIT SEAT</h1>
        </div>
    </div> 
    <form action="index.php?act=seat_update" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="w-50 form-group my-3">
                <label for="">Seat Key</label> <br>
                <input class="form-control" type="text" name="seat_key" value="<?=$seat_key?>">
                <span style="color:red">
                    
                </span>
            </div>
            <div class="w-50 form-group my-3">
                <label for="">Room</label><br>
                <select name="idRoom" id="" style="padding: 5px 30px; margin-top: 10px;">
                    <option value="<?=$idRoom?>"><?=$nameRoom?></option>
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

                </span>
            </div>
        </div>
        <div class="col mb10 mt-3">
            <input type="hidden" name="id_seat" value="<?= $id_seat ?>">
            <input class="btn btn-success text-white" type="submit" name="capnhat" value="Update">
            <a href="index.php?act=seat"><input class="btn btn-primary text-white" type="button" value="LIST"></a>
        </div>
    </form>
</div>


