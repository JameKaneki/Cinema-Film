
<div class="container mt-2">
    <div class="row frmtitle">
        <div class="">
            <h1 class="title">ADD NEW CINEMA</h1>
        </div>
    </div>
    <form action="index.php?act=cinema-add" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="w-50 form-group my-3">
                <label for="">Name Cinema</label> <br>
                <input class="form-control" type="text" name="nameCinema" value="">
                <span style="color:red">
                    
                </span>
            </div>

            <div class="w-50 form-group my-3">
                <label for="">Address</label>
                <input class="form-control" type="text" name="addressCinema" value="">
                <span style="color:red">

                </span>
            </div>
        </div>
        <div class="col mb10 mt-3">
            <input class="btn btn-success text-white" type="submit" name="addCinema" value="ADD">
            <a href="index.php?act=cinema"><input class="btn btn-primary text-white" type="button" value="LIST"></a>
        </div>
    </form>
</div>
<?php
        if (isset($tb) && $tb != "") {
            echo $tb;
        }
        ?>
