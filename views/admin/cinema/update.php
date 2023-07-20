 <?php
    if(isset($_GET['idCinema'])&&($_GET['idCinema'])){
         $idCinema = $_GET['idCinema'];
    if(is_array(selectOne_cinema($idCinema))){
        extract(selectOne_cinema($idCinema));
    }
}
 ?>
 <div class="row">
        <div class="row fromtitle">
            <h1>Cập nhập rạp phim</h1>
        </div>
        <div class="row fromcontent">
                <form action="index.php?act=cinema-update" method="POST">
                <div class="row mb10">
                    <label for="">Tên rạp chiếu</label> <br>
                    <input type="text" name="nameCinema" value="<?php if(isset($nameCinema)&&($nameCinema!="")) echo $nameCinema; ?>">
                </div>
                <div class="row mb10">
                    <label for="">Địa chỉ </label><br>
                    <input type="text" name="addressCinema" value="<?php if(isset($addressCinema)&&($addressCinema!="")) echo $addressCinema; ?>">
                </div>
                <div class="row mb10">
                    <input type="hidden" name="idCinema" value="<?php if(isset($idCinema)&&($idCinema>0)) echo $idCinema; ?>">
                    <input type="submit" name="update" value="Cập nhật">
                    <input type="reset" value="Nhập lại">
                    <a href="index.php?act=cinema"><input type="button" value="Danh Sách"></a>
                </div>
                </form>
                <?php
                    if(isset($tb)&&$tb!=""){
                        echo $tb;
                    }
                 ?>
            </div>
    </div>
        
</div>
