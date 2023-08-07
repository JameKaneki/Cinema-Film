<div class="wrapper">
        <h1>Thêm Mới Phim</h1>
    <div class="box">
        <form action="index.php?act=film_add" method="post" enctype="multipart/form-data">
            <div class="input">
                Name<br>
                <input type="text" name="nameFilm" id="">
            </div>
            <div class="input">
                Director<br>
                <input type="text" name="director" id="">
            </div>
            <div class="input">
                Performer<br>
                <input type="text" name="performer" id="">
            </div>
            <div class="input">
                Premiere<br>
                <input type="date" name="premiere" id="">
            </div>
            <div class="input">
                Duration<br>
                <input type="number" name="duration" id="" value="1">
            </div>
            <div class="input">
                Language<br>
                <input type="text" name="language" id="">
            </div>
            <div class="input">
                Description <br>
               <textarea name="description" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="input">
                Category <br>
                <label for="action">Action</label>
                <input type="checkbox" name="category" id="action" value="Action">

                <label for="romantic">Romantic</label>
                <input type="checkbox" name="category" id="romantic" value="Romantic">

                <label for="sciencefiction">Science Fiction</label>
                <input type="checkbox" name="category" id="sciencefiction" value="Science Fiction">

                <label for="cartoon">Cartoon</label>
                <input type="checkbox" name="category" id="cartoon" value="Cartoon">

                <label for="mentality">Mentality</label>
                <input type="checkbox" name="category" id="mentality" value="Mentality">

                <label for="aventure">Aventure</label>
                <input type="checkbox" name="category" id="aventure" value="Aventure">

                <label for="horrified">Horrified</label>
                <input type="checkbox" name="category" id="horrified" value="Horrified">

                <label for="detective">Detective</label>
                <input type="checkbox" name="category" id="detective" value="Detective">
            </div>
            <div class="input">
                Trailer<br>
                <input type="text" name="trailer" id="" placeholder="link">
            </div>
            <div class="input">
                Poster<br>
                <input type="text" name="poster" id="" placeholder="link">
            </div>
            <div class="input">
                Rate<br>
                <select name="rate" id="">
                    <option value="">-----</option>
                    <option value="4">Trên 18 Tuổi</option>
                    <option value="3">Trên 16 Tuổi</option>
                    <option value="2">Trên 12 Tuổi</option>
                    <option value="1">Trên 8 Tuổi</option>
                    <option value="0">Mọi độ Tuổi</option>
                </select>
            </div>
            <div class="input">
                <input type="submit" name="addnew" value="Thêm Mới">
                <a href="index.php?act=film"> <input type="button" value="Danh Sách"></a>
            </div>
        </form>
    </div>
</div>
