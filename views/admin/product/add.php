<div class="container mt-2">
<div class="row frmtitle">
        <div class="">
            <h1 class="title">ADD FILM</h1>
        </div>
    </div>
    <form action="index.php?act=film_add" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="w-50 form-group my-3">
                <label for="">Name</label> <br>
                <input class="form-control" type="text" name="nameFilm" value="">
                <span style="color:red">
                <?php
                if(isset($_POST['addnew'])&& $_POST['addnew']){
                    if($_POST['nameFilm']==""){
                        echo "Chưa có tên phim";
                      }
                    }
                ?>
                </span>
            </div>

            <div class="w-50 form-group my-3">
                <label for="">Director</label>
                <input class="form-control" type="text" name="director" value="">
                <span style="color:red">

                </span>
            </div>
        </div>
        <div class="row">
            <div class="w-50 form-group my-3">
                <label for="">Performer</label>
                <input class="form-control" type="text" name="performer" value="">
                <span style="color:red">
                    
                </span>
            </div>
            <div class="w-50 form-group my-3">
                <label for="">Duration</label>
                <input class="form-control" type="number" name="duration" value="1" min="1" max="100">
                <span style="color:red">
                <?php
                if(isset($_POST['addnew'])&& $_POST['addnew']){
                    if($_POST['duration']<=60){
                        echo "Thời gian chiếu quá ngắn";
                      }
                    }
                ?>
                </span>
            </div>
        </div>

        <div class="row">
            <div class="w-50 form-group my-3">
                <label for="">Premiere</label>
                <input class="form-control" type="date" name="premiere" value="">
                <span style="color:red">
                <?php
                if(isset($_POST['addnew'])&& $_POST['addnew']){
                    if($_POST['premiere']<getDateTimeNow()){
                        echo "Lịch khởi chiếu phải lớn hơn ngày thêm phim";
                      }
                    }
                ?>
                </span>
            </div>
            <div class="w-50 form-group my-3">
                <label for="">Language</label>
                <input class="form-control" type="text" name="language" value="">
                <span style="color:red">   
                </span>
            </div>
        </div>
        <div class="row">
            <div class="w-50 form-group my-3">
                <label for="">Trailer</label>
                <input class="form-control" type="text" name="trailer" value="">
                <span style="color:red">
                    
                </span>
            </div>
            <div class="w-50 form-group my-3">
                <label for="">Poster</label>
                <input class="form-control" type="text" name="poster" value="">
                <span style="color:red">
                </span>
            </div>
        </div>
        <div class="row">
            <div class="w-25 form-group my-3">
                <label for="">Rate</label>
                <select name="rate" id="">
                    <option value="">-----</option>
                    <option value="4">Trên 18 Tuổi</option>
                    <option value="3">Trên 16 Tuổi</option>
                    <option value="2">Trên 12 Tuổi</option>
                    <option value="1">Trên 8 Tuổi</option>
                    <option value="0">Mọi độ Tuổi</option>
                </select>
                <span style="color:red">
                </span>
            </div>

            <div class="w-25 form-group my-3" style="margin-left: 40px;">
                <label for="">Category</label>
                <select name="category" id="">
                    <option value="">-------</option>
                    <option value="Action">Action</option>
                    <option value="Romantic">Romantic</option>
                    <option value="Science Fiction">Science Fiction</option>
                    <option value="Cartoon">Cartoon</option>
                    <option value="Mentality">Mentality</option>
                    <option value="Aventure">Aventure</option>
                    <option value="Horrified">Horrified</option>
                    <option value="Detective">Detective</option>
                </select><br>
                <span style="color:red">
                <?php
                if(isset($_POST['addnew'])&& $_POST['addnew']){
                    if($_POST['category']==""){
                        echo "Chưa có thể loại phim";
                      }
                    }
                ?>
                </span>
            </div>
        </div>

        <div class="row">
            <div class="form-group my-3">
                <label for="">Description</label>
                <textarea class="form-control" cols="30" rows="5" name="description" value=""></textarea>
                <span style="color:red">

                </span>
            </div>
        </div>
        <div class="col mb10 mt-3">
            <input class="btn btn-success text-white" type="submit" name="addnew" value="ADD">
            <input class="btn btn-danger text-white" type="reset" value="RESET">
            <a href="index.php?act=film"><input class="btn btn-primary text-white" type="button" value="LIST"></a>
        </div>
    </form>
</div>
