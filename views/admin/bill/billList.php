<div class='wrapper'>
<div class="row frmtitle mb-3" >
        <h1 style="text-align: center;" class="title">Bill List</h1>
    </div>
        <div class="select">
        <div class='search-bar'>
            <form  action="index.php?act=bill"  method="POST">
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
                <td><a href='index.php?act=bill-delete&id_bill={$bill['id_bill']}'style='color: white;
                background-color: blue;' >Pay</a></td>
                <td><a href='index.php?act=bill-delete&id_bill={$bill['id_bill']}' style='color: white;
                background-color: red;'>DELETE</a></td>
                </tr>";
            }
            
        ?>
       </tbody>
    </table>
</div>
<style>
    a,
    li {
        padding: 4px 8px;
        text-decoration: none;
        list-style-type: none;
    }

    .wrapper {
        width: 70%;
        margin: 0px auto;
        float: none !important;
    }

    .select {
        margin-left: 350px;
        margin-top: 10px;
        display: flex;
        font-size: 16px;
    }

    select {
        padding: 3px 0px 7px 0px;
        font-size: 16px;
    }

    .select input {
        font-size: 16px;
        padding-bottom: 5px;
    }

    table {
        margin: 10px auto;
        padding: 12px;
        box-shadow: 1px 1px 1px 1px #999;
        border-radius: 6px;
        max-width: 100%;
        overflow-y: scroll;
        /* width: 90%; */
    }

    td,
    th {
        padding: 8px 4px;
        text-align: start;
        min-width: 120px;
        max-width: 300px;
    }

    th {
        background-color: lightgreen;
        color: white;
        text-shadow: 1px 1px 1px gray;
        font-size: 18px;

    }

    td {
        font-size: 16px;
        font-weight: bold;
    }

    table tr:nth-child(odd) {
        background-color: rgb(228, 234, 241);
        color: black;
    }

    td.bigCol {
        width: 500px;
    }

    .showTime {
        display: flex;
        justify-content: start;
        flex-wrap: wrap;
    }

    .showTime-box {
        margin: 2px 4px;
        border: 2px solid;
        padding: 4px 8px;
        border-radius: 3px;
        background-color: #666;
        color: white;
    }

    .action-box {
        display: flex;
    }

    .btn {
        padding: 6px;
        margin: 2px 4px;
        border-radius: 3px;
        cursor: pointer;
        border: none;
    }

    .btn a {
        color: white;
    }

    .btn-red {
        color: white;
        background-color: red;
    }
    .btn-blue {
        background-color: lightgreen;
    }
</style>