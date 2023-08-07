<?php
    if(is_array($listseat)){
        extract($listseat);
    }
?>
<div class="container mt-2">
    <div class="row frmtitle">
        <div class="">
            <h1 class="title">Edit Seat</h1>
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
                <label for="">ID ROOM</label>
                <input class="form-control" type="text" name="idRoom" value="<?=$idRoom?>">
                <span style="color:red">

                </span>
            </div>
        </div>
        <div class="col mb10 mt-3">
            <input class="btn btn-success text-white" type="submit" name="capnhat" value="Update">
            <a href="index.php?act=seat"><input class="btn btn-primary text-white" type="button" value="LIST"></a>
        </div>
    </form>
</div>


