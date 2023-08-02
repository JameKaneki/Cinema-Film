<?php
    $showTimeList = [];
    $schedules = [];
    if(isset($_POST['search']))
    {
        $date = $_POST['date'];
        $id = $_POST['idFilm'];
        $showTimeList = groupScheduleHours($date,$id);
        $schedules = getAllSchedule($date,$id);  
        // print_r($schedules);
        // print_r($showTimeList);
    }else{
        $showTimeList = groupScheduleHours('','');
        $schedules = getAllSchedule('','');
    }

 
?>
<div class="wrapper"> 
    <h1>Schedule List</h1>
        <div class="select">
        <div class="btn btn-blue" style="text-align: center;"><a href="index.php?act=schedule-create">Add new Schedule</a></div>
        <div class='search-bar'>
            <form action='index.php?act=schedules' method="POST">
                <select name="idFilm" placeholder="Film">
                    <option value="">----------</option>
                    <option value="1">Tà chú cấm</option>
                    <option value="2">Ma sơ trục quỷ</option>
                    <option value="3">Doraemon:Vùng đắt lý tưởng</option>
                    <option value="4">TRANSFỎMER</option>
                    <option value="5">jujutsu kaisen</option>
                </select>
                <input name="date" type="date" />
                <button class="btn btn-blue" type="submit" name="search">Search</button>
            </form>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>Film</th>
                <th>date</th>
                <th>showTime</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                
                foreach($schedules as $schedule){
                    // $date = date_format($schedule['date'],"Y-m-d");
                    echo "
                    <tr>
                        <td>{$schedule['nameFilm']}</td>
                        <td>{$schedule['date']}</td>
                        <td>
                            <div class='showTime bigCol'>
                    ";
                    if(isset($showTimeList[$schedule["idFilm"]])){    
                        foreach($showTimeList[$schedule["idFilm"]] as $item){
                            $time = substr($item,0,5);
                            echo " <div class='showTime-box'>$time</div>";
                        }
                    }else{
                        echo "<div>No schedule hour info</div>";
                    }
                    echo " </div>
                    </td>";
                    echo "
                        <td >
                            <div class='btn btn-red'><a href='index.php?act=schedule-delete&id={$schedule['idSchedule']}' >Remove</a></div>
                            <div class='btn btn-blue'><a href='index.php?act=schedule-edit&id={$schedule['idSchedule']}' >Edit</a></div>
                        </td>
                    </tr>
                    ";
                }
            ?>
        </tbody>
    </table>
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
    h1{
        margin-top: 30px;
        margin-left: 600px;
    }
    .select{
        margin-left: 350px;
        margin-top: 10px;
        display: flex;
        font-size: 16px;
    }
    select{
        padding: 3px 0px 7px 0px;
        font-size: 16px;
    }
    .select input{
        font-size: 16px;
        padding-bottom: 5px;
    }
    table{
        margin: 10px auto;
        padding: 12px;
        box-shadow: 1px 1px 1px 1px #999;
        border-radius: 6px;
        max-width: 100%;
        overflow-y: scroll;
        /* width: 90%; */
    }
    td,th{
        padding: 8px 4px;
        text-align: start;
        min-width: 120px;
        max-width: 300px;
    }
    th{
        background-color: rgb(158, 105, 105);
        color: white;
        text-shadow: 1px 1px 1px gray;
        font-size: 18px;

    }
    td{
        font-size: 16px;
        font-weight: bold;
    }
    table tr:nth-child(odd){
        background-color: rgb(228, 234, 241);
    }
    td.bigCol{
        width: 500px;
    }
    .showTime{
        display: flex;
        justify-content: start; 
        flex-wrap: wrap;
    }
    .showTime-box{
        margin: 2px 4px;
        border: 2px solid ;
        padding: 4px 8px;
        border-radius: 3px;
        background-color: #666;
        color: white;
    }
    .action-box{
        display: flex;
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

</style>

