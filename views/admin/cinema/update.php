 <?php
    if(isset($_GET['idCinema'])&&($_GET['idCinema'])){
         $idCinema = $_GET['idCinema'];
    if(is_array(selectOne_cinema($idCinema))){
        extract(selectOne_cinema($idCinema));
    }
}
 ?>
<div class="container mt-2">
    <div class="row frmtitle">  
        <div class="">
            <h1 class="title">UPDATE CINEMA</h1>
        </div>
    </div>
    <form action="index.php?act=cinema-update" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="w-50 form-group my-3">
                <label for="">Name Cinema</label> <br>
                <input class="form-control" type="text" name="nameCinema" value="<?php if(isset($nameCinema)&&($nameCinema!="")) echo $nameCinema; ?>">
                <span style="color:red">
                    
                </span>
            </div>

            <div class="w-50 form-group my-3">
                <label for="">Address</label>
                <input class="form-control" type="text" name="addressCinema" value="<?php if(isset($addressCinema)&&($addressCinema!="")) echo $addressCinema; ?>">
                <span style="color:red">

                </span>
            </div>
        </div>
        <div class="col mb10 mt-3">
        <input type="hidden" name="idCinema" value="<?php if(isset($idCinema)&&($idCinema>0)) echo $idCinema; ?>">
            <input class="btn btn-success text-white" type="submit" name="update" value="UPDATE">
            <a href="index.php?act=cinema"><input class="btn btn-primary text-white" type="button" value="LIST"></a>
        </div>
    </form>
</div>


