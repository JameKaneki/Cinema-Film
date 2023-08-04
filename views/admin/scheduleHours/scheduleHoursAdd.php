<style>
    .row {
        margin: 30px;
    }

    label {
        line-height: 40px;
    }

    select,
    input {
        padding: 10px 12px;
    }
</style>

<?php
$scheduleList = getAllSchedule('', '');
$roomList = getAllRoom();
$errors = [];
$schedule = "";
$room = "";
$time = "";
if (isset($_POST['create'])) {
    $check = true;
    $schedule = $_POST['idSchedule'];
    $room = $_POST['idRoom'];
    $time = $_POST['time'];
    // đoạn này cần vaildate thêm
    if (!empty($schedule) && !empty($room) && !empty($time)) {
        if (in_array($room, $roomList)) {
            $check = false;
            $errors['room'] = "invalidate room Infomation";
        }
        if (in_array($schedule, $scheduleList)) {
            $check = false;
            $errors['schedule'] = "invalidate schedule Infomation";
        }
    }
    if ($check) {
        createScheduleHours($schedule, $time, $room);
        echo '<script>alert("Create successfully")</script>';
        header("Location:index.php?act=schedule_hours");
    }
}
?>


<div class=''>
    <h1>Add schedule Hours</h1>
    <div class='form-content'>
        <form action="index.php?act=schedule_hours-create" method="POST">
            <div class="input-wrap">
                <label>Schedule</label>
                <select name="idSchedule" required>
                    <option value="">----------</option>
                    <?php
                    foreach ($scheduleList as $schedule) {
                        echo "
                            <option value='{$schedule['idSchedule']}'>{$schedule['date']} - {$schedule['nameFilm']} </option>
                        ";
                    }
                    ?>
                </select>
                <?php
                if (isset($errors['schedule'])) {
                    echo "<span style='color: red;'>{$errors['schedule']}</span> ";
                }
                ?>
            </div>
            <div class="input-wrap">
                <label>Room</label>
                <select name="idRoom" required>
                    <option value="">------</option>
                    <?php
                    foreach ($roomList as $room) {
                        echo "
                                <option value='{$room['idRoom']}'>{$room['nameRoom']} - {$room['nameCinema']}</option>
                            ";
                    }

                    ?>
                </select>
                <?php
                if (isset($errors['room'])) {
                    echo "<span style='color: red;'>{$errors['room']}</span> ";
                }
                ?>
            </div>
            <div class="input-wrap">
                <label>Time</label>
                <input type="time" name="time" required />
                <!-- <?php
                        if (isset($errors['time'])) {
                            echo "<span style='color: red;'>{$errors['time']}</span> ";
                        }
                        ?> -->
            </div>
            <div class='input-wrap'>
                <button class="btn btn-blue" name="create">Create</button>
            </div>
        </form>

    </div>
</div>



<style>
    :root {
        --red--color: rgb(223, 69, 45);
        --blue-color: rgb(65, 99, 232);
    }

    a,
    li {
        text-decoration: none;
        list-style-type: none;
    }

    .wrapper {
        width: 70%;
        margin: 0px auto;
    }

    .btn {
        padding: 6px 16px;
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
        background-color: var(--red--color);
    }

    .btn-blue {
        color: white;
        background-color: var(--blue-color);
    }

    .form-content {
        width: 600px;
        margin: 30px auto;
        padding: 20px;
        box-shadow: 1px 2px 2px 1px #999;
        border-radius: 12px;
    }

    .input-wrap {
        margin: 20px 0px;
    }

    .input-wrap label {
        display: block;
        margin: 10px 0px;
        padding: 0 12px;
        font-size: 1rem;
        font-weight: 700;
    }

    .input-wrap input {
        outline: none;
        padding: 12px;
        font-size: 1.2rem;
        width: 100%;
        border-radius: 12px;
        border: none;
        background-color: rgba(153, 153, 153, 0.1);
    }

    .input-wrap select {
        width: 100%;
        padding: 6px;
    }
</style>