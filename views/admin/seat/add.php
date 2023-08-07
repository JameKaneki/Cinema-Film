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
                    
                </span>
            </div>

            <div class="w-50 form-group my-3">
                <label for="">ID ROOM</label>
                <input class="form-control" type="text" name="idRoom" value="">
                <span style="color:red">

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

