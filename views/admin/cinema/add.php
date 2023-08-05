<style>
    .row{
        margin: 30px;
    }

    label{
        line-height: 40px; 
    }

    select, input{
        padding: 10px 12px;
    }
</style>

<div class="row" style="    text-align: center;">
<div class="row fromtitle">
            <h1 style="margin-left: 0px;">Thêm rạp phim</h1>
        </div>
        <div class="row fromcontent">
                <form action="index.php?act=cinema-add" method="post">
                <div class="row mb10">
                    <label for="">Tên rạp chiếu</label> <br>
                    <input type="text" name="nameCinema">
                </div>
                <div class="row mb10">
                    <label for="">Địa chỉ </label><br>
                    <input type="text" name="addressCinema">
                </div>
                <div class="row mb10">
                    <input type="submit" name="addCinema" value="Thêm mới">
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