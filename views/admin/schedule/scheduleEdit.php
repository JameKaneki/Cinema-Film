
<?php 
     $errors = [];
     if(isset($_POST['edit'])){
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
                 
                 echo "Update successFully";
                 echo "
                     <div class='wrapper'> 
                         <div class='btn btn-blue'><a href='index.php?act=schedules'>show Schedule List<a/></div>
                         <div class='btn btn-blue'><a href='index.php?act=schedule-create'>add more Schedule <a/></div>
                     </div>
                 ";
                 die;
             }   
         }
 
     }
?>

<div style="margin-left:500px;margin-top:50px">
    <h1>Edit schedule</h1>
   <div class="form-content">
    <form action="index.php?act=schedule-edit" method="POST">
            <div class="input-wrap">
                <label>Film</label>
                <select name="idfilm" value=<?php $scheduleInfo['idFilm']?> required>
                            <option>----------</option>
                            <option value="1">Tà chú cấm</option>
                            <option value="2">Ma sơ trục quỷ</option>
                            <option value="3">Doraemon:Vùng đắt lý tưởng</option>
                            <option value="4">TRANSFỎMER</option>
                            <option value="5">jujutsu kaisen</option>
                <?php 
                    //  foreach($filmList as $film){
                    //     echo "
                    //          <potion value='{$film['idFilm']}'>{$film['nameFilm']}</potion>
                    //     ";
                    //  }
                ?>
                </select>
            </div>
            <div class="input-wrap">
                <label>Date</label>
                <?php 
                    echo " <input type='date' name='date' value='{$scheduleInfo['date']}'  required/>";
                    if(isset($errors['date'])){
                        echo "<span style='color: red;'>{$errors['date']}</span> ";
                    }
                ?>  
            </div>
          
        <button type='submit' class="btn btn-blue" name='edit'>Edit</button>
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
    .btn-blue:hover{
        color: white;
        background-color: lightgreen;
    }
    .form-content{
    width: 600px;
    margin: 30px auto;
    padding: 20px;
    box-shadow: 1px 2px 2px 1px #999;
    border-radius: 12px;
    }
    .input-wrap{
      margin: 20px 0px;
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
