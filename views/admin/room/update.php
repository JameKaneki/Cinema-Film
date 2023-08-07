<?php
    if(isset($_GET['idRoom'])&&$_GET['idRoom']){
        if(is_array(selectOne_room($_GET['idRoom']))){
            extract(selectOne_room($_GET['idRoom']));
        }
    }
?>
<div class="container mt-2">
    <div class="row frmtitle">
        <div class="">
            <h1 class="title">UPDATE ROOM</h1>
        </div>
    </div>
    <form action="index.php?act=room-update" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="w-50 form-group my-3">
                <label for="">Name Room</label> <br>
                <input class="form-control" type="text" name="nameRoom" value="<?php if(isset($nameRoom)&&($nameRoom!="")) echo $nameRoom; ?>">
                <span style="color:red">
                </span>
            </div>

            <div class="w-50 form-group my-3">
                <label for="">Seat List</label>
                <input class="form-control" type="text" name="seatList" value='<?php echo "$seatList" ?>' >
                <span style="color:red">
                </span>
            </div>
        </div>
        <div class="row">
            <div class="w-50 form-group my-3">
            <label for="">Tên Rạp Chiếu</label><br>
                <select name="idCinema" id="">
                    <option value="<?php echo "$idCinema" ?>" selected> <?php echo "$nameCinema" ?></option>
                    <?php
                    $listCinema = selectAll_cinema();
                    foreach ($listCinema as $list) {
                        extract($list);
                        echo '
                            <option value=' . $idCinema . '>' . $nameCinema . '</option>';
                    }
                    ?>
                </select>
                <span style="color:red">
                </span>
            </div>
        </div>
        <div class="col mb10 mt-3">
            <input type="hidden" name="idRoom" value="<?= $idRoom ?>">
            <input class="btn btn-success text-white" type="submit" name="updateRoom" value="ADD">
            <a href="index.php?act=room"><input class="btn btn-primary text-white" type="button" value="LIST"></a>
        </div>
    </form>
</div>
