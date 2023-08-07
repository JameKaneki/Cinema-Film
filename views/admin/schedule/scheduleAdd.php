<?php
$errors = [];
if (isset($_POST['create'])) {
    $checked =  false;
    $date = $_POST['date'];
    $idFilm = $_POST['idFilm'];
    if (empty($date)) {
        $errors['date'] = "don't try to break my app  down kids";
        $checked = true;
    }
    if (empty($idFilm)) {
        $errors['$idFilm'] = "don't try to break my app  down kids";
    }
    if (!$checked) {
        if (!empty(getOneSchedule('', $date, $idFilm))) {
            $errors['date'] = "already has a schedule on this day";
        } else {
            createSchedule($date, $idFilm);
        }
    }
}
?>

<div  class="Form-add-schedules">
    <h1>Add schedule</h1>
    <div sty class='form-content'>
        <form action="index.php?act=schedule-create" method="POST">
            <div class="input-wrap">
                <label>Date</label>
                <input type="date" name="date" required />
                <span style="color: red;"></span>
                <?php
                if (isset($errors['date'])) {
                    echo "<span style='color: red;'>{$errors['date']}</span> ";
                }
                ?>
            </div>
            <div class="input-wrap">
                <label>Film</label>
                <select name="idFilm" required>
                    <option value="">----------</option>
                     <?php
                        $filmList = loadall_film();
                            foreach ($filmList as $film) {
                                echo "
                            <option value='{$film['idFilm']}'>{$film['nameFilm']}</option>
                        ";
                            }
                            ?>
                </select>
                <?php
                if (isset($errors['idFilm'])) {
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
    .Form-add-schedules{
        margin-left: 500px;
        margin-top:50px;
    }
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

    .btn-blue:hover {
        color: white;
        background-color: lightgreen;
    }

    .form-content {
        width: 600px;
        margin: 30px auto;
        padding: 20px;
        box-shadow: 1px 2px 2px 1px #999;
        border-radius: 12px;
    }

    .input-wrap {
        margin: 20px 10px;
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