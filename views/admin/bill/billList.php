<div class='wrapper'>
    <div class="row frmtitle mb-3" >
        <h1 style="text-align: center;" class="title">Bill List</h1>
    </div>
            <form  action="index.php?act=bill"  method="POST" class='horizontal-form'>
                <div>
                    <label>Film</label>
                    <div>
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
                    </div>
                </div>
                <button class="btn btn-blue" type="submit" name="search">Search</button>
            </form>
    <table>
       <thead>
            <tr>
                <th>id Bill</th>
                <th>Schedule</th>
                <th>Price</th>
                <th>User Name</th>
                <th>Name Film</th>
                <th>Seat</th>
                <th>Status</th>
                <th>CreateAt</th>
                <th>Payment</th>
            </tr>
       </thead>
       <tbody>

        <?php 
                foreach($billList as $bill){
                $status = $bill['status'] === 1 ? 'Paid' : 'UnPay';
                $schedule = $bill['date'] . ' ' . substr($bill['time'],0,5);
                $seat_key = join(',',$bill['seat_key']);
                $id_Bill = $bill['id_bill'];
                echo   "<tr>
                    <td>{$bill['id_bill']}</td>
                    <td>{$schedule}</td>
                    <td>{$bill['price']}</td>
                    <td>{$bill['userName']}</td>
                    <td>{$bill['nameFilm']}</td>
                    <td>{$seat_key}</td>
                    <td>$status</td>
                    <td>{$bill['create_at']}</td>";
                if($status === 'UnPay'){
                    echo "
                    <td>
                        <a href='index.php?act=bill-qrpay&id=$id_Bill' class = 'btn btn-blue' >
                            QR Pay  
                        </a>
                        <div  class = 'btn btn-blue'
                            onClick='confirmChangeBillStatus($id_Bill)'
                        >
                        Change to Paid
                        </div>
                    </td>"; 
                }else{
                    echo "
                        <td></td>
                    ";
                }
                echo "
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
        padding: 6px 12px;
        margin: auto 4px;
        margin-bottom: 1px  ;
        border-radius: 3px;
        cursor: pointer;
        border: none;
        height: fit-content;
    }

    .btn a {
        color: white;
    }

    .btn-red {
        color: white;
        background-color: red;
    }
    .btn-blue {
        background-color: blue;
        color: white;
    }
    .horizontal-form{
        display: flex;
        margin: 0px auto;
        justify-content: center;
    }
</style>
<script>
    const confirmChangeBillStatus = (id) =>{
        const result = confirm(`Change bill -${id}- status to Paid`);
        if(result){
            location.href = `http://localhost/Cinema-Film/views/admin/index.php?act=bill-pay&id=${id}` 
        }
    }

</script>