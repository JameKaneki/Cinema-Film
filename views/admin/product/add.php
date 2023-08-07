<div class="container mt-2">
    <div class="row frmtitle">
        <div class="">
            <h1 class="title">ADD NEW FILM</h1>
        </div>
    </div>
    <form action="index.php?act=film-add" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="w-50 form-group my-3">
                <label for="">Name</label> <br>
                <input class="form-control" type="text" name="nameFilm" value="">
                <span style="color:red">
                    
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
                <input class="form-control" type="text" name="product_img" value="">
                <span style="color:red">
                    
                </span>
            </div>
            <div class="w-50 form-group my-3">
                <label for="">Duration</label>
                <input class="form-control" type="number" name="duration" value="" min="1" max="100">
                <span style="color:red">

                </span>
            </div>
        </div>

        <div class="row">
            <div class="w-50 form-group my-3">
                <label for="">Premiere</label>
                <input class="form-control" type="date" name="premiere" value="">
                <span style="color:red">

                </span>
            </div>
            <div class="w-50 form-group my-3">
                <label for="">Language</label>
                <input class="form-control" type="text" name="language" value="">
                <span style="color:red">
                    
                </span>
            </div>
            
            
            <!-- <div class="w-25 form-group mt-3">
                <label for="">Category</label>
                <select class="form-control" name="cate" id="">
                    <?php foreach ($listcate as $cate) : ?>
                        <option value="<?= $cate['cate_id'] ?>">
                            <?= $cate['cate_name'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div> -->

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
                <input class="form-control" type="number" name="poster" value="">
                <span style="color:red">
                </span>
            </div>
        </div>
        <div class="row">
            <div class="w-25 form-group my-3">
                <label for="">Rate</label>
                <input class="form-control" type="text" name="rate" value="">
                <span style="color:red">
                    
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
