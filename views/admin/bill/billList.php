<?php
// include "../../modules/bill.php";
    $showSeatList=[];
    $billList=[];
    if(isset($_POST['search'])){
        $idUser = $_POST['idUser'];
        $idFilm = $_POST['idFilm'];
        $billList = getBill_By_idUser_nameFilm($idUser,$idFilm);
        $showSeatList = groupData_bill($idUser,$idFilm);
    }
    else{
        $billList = getBill_By_idUser_nameFilm('','');
        $showSeatList = groupData_bill('','');
    }
?>
<div class='wrapper'>
    <h1>Bill List</h1>
        <div class="select">
        <div class="btn btn-blue"><a href="index.php?act=schedule_hours-create">Add new Schedule hours</a></div>
        <div class='search-bar'>
            <form action='index.php?act=schedule_hours' method="POST">
                <select name="idFilm" placeholder="Film">
                    <option value="">----------</option>
                    <option value="1">Tà chú cấm</option>
                    <option value="2">Ma sơ trục quỷ</option>
                    <option value="3">Doraemon:Vùng đắt lý tưởng</option>
                    <option value="4">TRANSFỎMER</option>
                    <option value="5">jujutsu kaisen</option>
                </select>
                <select name='idRoom'>
                    <option value="">-------</option>
                    <option value='1'>BetaMD1</option>
                    <option value="2">BetaMD2</option>
                    <option value="3">BetaGP1</option>
                    <option value='4'>BetaGP2</option>
                </select>
                <input name="time" type="time" value="<?php echo $date?>"/>
                <button class="btn btn-blue" type="submit" name="search">Search</button>
            </form>
        </div>
        
    </div>
    <table>
       <thead>
            <tr>
                <th>Id Bill</th>
                <th>Create at</th>
                <th>Status</th>
                <th>Price</th>
                <th>User Name</th>
                <th>Name Film</th>
                <th>Seat</th>
                <th></th>
            </tr>
       </thead>
       <tbody>

        <?php 
            foreach($billList as $List){
                extract($List);
                echo 
                "<tr>
                    <td>{$List['id_bill']}</td>
                    <td>{$List['create_at']}</td>
                    <td>{$List['status']}</td>
                    <td>{$List['price']}</td>
                    <td>{$List['userName']}</td>
                    <td>{$List['nameFilm']}</td>
                    ";
                foreach ($showSeatList[$List['id_bill']] as $seatList){
                    $seat= substr($seatList,0,3);
                    echo "<td>{$seat}</td>";
                }
                echo "<div class='btn btn-red'>
                <td><a href='index.php?act=schedule_hours-delete&id_bill={$List['id_bill']}' class='btn btn-red'>Remove</a></td>
                </div>
                </tr>";
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
        margin-left: 530px;
    }
    .select{
        margin-left: 300px;
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
    button{
        font-size: 16px;
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