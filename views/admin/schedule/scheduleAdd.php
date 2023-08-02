<?php 
    $errors = [];
    if(isset($_POST['create'])){
        $checked =  false;
        $date = $_POST['date'];
        $idFilm = $_POST['idFilm'];
        if(empty($date)){
            $errors['date'] = "don't try to break my app  down kids";
            $checked = true;
        }
        if(empty($idFilm)){
            $errors['$idFilm'] = "don't try to break my app  down kids";
        }
        if(!$checked){
            if(!empty(getOneSchedule('',$date,$idFilm))){
                $errors['date'] = "already has a schedule on this day";
            }else{
                createSchedule($date,$idFilm);
              
            }   
        }

    }
?>

<div class=''>
    <h1>Add schedule</h1>
    <div class='form-content'>
        <form  action="index.php?act=schedule-create" method="POST">
            <div class="input-wrap">
                <label>Date</label>
                <input type="date" name="date" required/>
                <span style="color: red;"></span>
                <?php 
                    if(isset($errors['date'])){
                        echo "<span style='color: red;'>{$errors['date']}</span> ";
                    }
                ?>
            </div>
            <div class="input-wrap">
                <label>Film</label>
                <select name="idFilm"  required>
                        <option value="">----------</option>
                        <option value="1">Tà chú cấm</option>
                        <option value="2">Ma sơ trục quỷ</option>
                        <option value="3">Doraemon:Vùng đắt lý tưởng</option>
                        <option value="4">TRANSFỎMER</option>
                        <option value="5">jujutsu kaisen</option>
                <!-- <?php 
                    foreach($filmList as $film){
                        echo "
                            <potion value='{$film['idFilm']}'>{$film['nameFilm']}</potion>
                        ";
                    }
                ?> -->
                </select>
                <?php 
                    if(isset($errors['idFilm'])){
                        echo "<span style='color: red;'>{$errors['idFilm']}</span> ";
                    }
                ?>
            </div>
            <div class='input-wrap'>
                <button class="btn btn-blue" name="create">Create</button>
            </div>
        </form>

    </div>
</div>
<style>
    :root{
        --red--color : rgb(223,69,45);
        --blue-color : rgb(65,99,232);
    }
    a,li{
    text-decoration: none;
    list-style-type: none;
    }
    .wrapper{
        width: 70%;
        margin: 0px auto;
    }
    .btn{
        padding: 6px 16px;
        margin: 2px 4px;
        border-radius: 3px;
        cursor: pointer;
        border: none;
    }
    .btn a {
        color:white;
    }
    .btn-red{
        color: white;
        background-color: var(--red--color);
    }
    .btn-blue{
        color: white;
        background-color: var(--blue-color);
    }
    .form-content{
    width: 600px;
    margin: 30px auto;
    padding: 20px;
    box-shadow: 1px 2px 2px 1px #999;
    border-radius: 12px;
    }
    .input-wrap{
      margin: 20px 10px;
    }
    .input-wrap label{
        display: block;
        margin: 10px 0px;
        padding: 0 12px;
        font-size: 1rem;
        font-weight: 700;
    }
    .input-wrap input{
        outline: none;
        padding: 12px;
        font-size: 1.2rem;
        width: 100%;
        border-radius: 12px;
        border: none;
        background-color: rgba(153, 153, 153,0.1);
    }
    .input-wrap select{
        width: 100%;
        padding: 6px;
    }
</style>

