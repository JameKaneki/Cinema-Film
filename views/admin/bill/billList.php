<?php
// include "../../modules/module_bill.php";
// include "../../modules/module.php";

// modules

/**
 * Mở kết nối đến CSDL sử dụng PDO
 */
function pdo_get_connection(){
    $dburl = "mysql:host=localhost;dbname=duan1";
    $username = 'root';
    $password = '';

    $conn = new PDO($dburl,$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}
/**
 * Thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE, DELETE)
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_execute($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $stmt->fetch(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}

function pdo_execute_return($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        return $conn->lastInsertId();
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}

/**
 * Thực thi câu lệnh sql truy vấn dữ liệu (SELECT)
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng các bản ghi
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt-> execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}
/**
 * Thực thi câu lệnh sql truy vấn một bản ghi
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng chứa bản ghi
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query_one($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}
/**
 * Thực thi câu lệnh sql truy vấn một giá trị
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return giá trị
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query_value($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}

// module-bill

function getBill_By_idUser_nameFilm($idUser,$idFilm){
    $sql=" SELECT DISTINCT b.id_bill,se.seat_key From `bill` as b
    inner join `tickets` as t on t.id_bill = b.id_bill
    inner join `schedule_hours` as sh on t.idScheduleHour = sh.idScheduleHour
    inner join `schedules` as s on sh.idSchedule = s.idSchedule
    inner join `seats` as se on t.id_seat = se.id_seat
    inner join `users` as u On u.idUser = b.idUser
    inner join `films` as f on s.idFilm = f.idFilm";
    if($idUser != ''){
        $sql .= " AND u.idUser = '$idUser' ";
    }
    if($idFilm != ''){
        $sql .= " AND s.idFilm = '$idFilm' ";
    }
    $sql .= " ORDER BY se.seat_key asc";
    return pdo_query($sql);
}

function groupData_bill($idUser,$idFilm){
    $data = getBill_By_idUser_nameFilm($idUser,$idFilm);
    return array_reduce($data,"groupData_bill_seat",[]);
}

function groupData_bill_seat($carry, array $current){
    if(isset($carry[$current["id_bill"]])){
        return [...$carry,$current["id_bill"]=>[...$carry[$current['id_bill']],$current['seat_key']]];
    }else{
        return [...$carry,$current["id_bill"]=>[$current['seat_key']]];
    }
    }
function select_bill($idUser,$idFilm){
    $sql=" SELECT DISTINCT b.id_bill,u.userName,b.status,b.create_at,b.price,f.nameFilm From `bill` as b
    inner join `tickets` as t on t.id_bill = b.id_bill
    inner join `schedule_hours` as sh on t.idScheduleHour = sh.idScheduleHour
    inner join `schedules` as s on sh.idSchedule = s.idSchedule
    inner join `seats` as se on t.id_seat = se.id_seat
    inner join `users` as u On u.idUser = b.idUser
    inner join `films` as f on s.idFilm = f.idFilm";
    if($idUser != ''){
        $sql .= " AND u.idUser = '$idUser' ";
    }
    if($idFilm != ''){
        $sql .= " AND s.idFilm = '$idFilm' ";
    }
    $sql .= " ORDER BY b.id_bill";
    return pdo_query($sql);{
}
}

// user
function loadall_acount(){
    $sql = "SELECT * FROM `users` ORDER BY `idUser` DESC";
    return pdo_query($sql);
}
//product   
function loadIdFilm_nameFilm(){
    $sql = "SELECT f.idFilm,f.nameFilm FROM `films` as f Order by `idFilm` asc";
    return pdo_query($sql);
}

// billList

    $showSeatList=[];
    $billList=[];
    $seatList=[];
    if(isset($_POST['search'])){
        $idUser = $_POST['idUser'];
        $idFilm = $_POST['idFilm'];
        $seatList = getBill_By_idUser_nameFilm($idUser,$idFilm);
        $showSeatList = groupData_bill($idUser,$idFilm);
        $billList=select_bill($idUser,$idFilm);
    }
    else{
        $seatList = getBill_By_idUser_nameFilm('','');
        $showSeatList = groupData_bill('','');
        $billList=select_bill('','');
        print_r($showSeatList);
    }
?>
<div class='wrapper'>
    <h1>Bill List</h1>
        <div class="select">
        <div class="btn btn-blue"><a href="index.php?act=">Add new Bill</a></div>
        <div class='search-bar'>
            <form action='index.php?act=bill' method="POST">
                <select name="idFilm" placeholder="Film">
                <option value="">----------</option>
                    <?php
                        $listFilm = loadIdFilm_nameFilm();
                        foreach ($listFilm as $list) {
                            extract($list);
                            echo "<option value=".$idFilm.">$nameFilm</option>";
                        }
                    ?>
                </select>
                <select name='idUser'>
                <option value="">-------</option>
                <?php
                        
                        $listAcount = loadall_acount();
                        foreach ($listAcount as $list) {
                            extract($list);
                            echo "<option value=".$idUser.">$userName</option>";
                        }
                    ?>
                </select>
                <button class="btn btn-blue" type="submit" name="search">Search</button>
            </form>
        </div>
        
    </div>
    <table>
       <thead>
            <tr>
                <th>Id Bill</th>
                <th>Create at</th>
                <th>Price</th>
                <th>User Name</th>
                <th>Name Film</th>
                <th>Seat</th>
                <th>Status</th>
                <th>Payment</th>
                <th></th>
            </tr>
       </thead>
       <tbody>

        <?php 
                foreach($billList as $bill){
                    extract($bill);
                echo 
                "<tr>
                    <td>{$bill['id_bill']}</td>
                    <td>{$bill['create_at']}</td>
                    <td>{$bill['price']}</td>
                    <td>{$bill['userName']}</td>
                    <td>{$bill['nameFilm']}</td>
                    <td>";
                // foreach($seatList as $List){
                // extract($List);
                if(isset($showSeatList[$bill['id_bill']])){
                    foreach ($showSeatList[$bill['id_bill']] as $seatL){
                    $seat= substr($seatL,0,3);
                    echo "
                    <div class='showTime bigCol showTime-box'>
                    {$seat}
                    </div>
                    ";
                }
                }
            // }
                echo "</div>";	
                if($bill['status']==1){
                    echo "<td>Paid</td>";
                }
                else{
                    echo "<td>Unpaid</td>";
                }
                echo "
                <td><a href='' class='btn btn-blue'>Pay</a></td>
                <td><a href='index.php?act=bill-delete&id_bill={$bill['id_bill']}' class='btn btn-red'>Remove</a></td>
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