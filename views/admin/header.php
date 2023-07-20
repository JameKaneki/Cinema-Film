<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../view/../admin/css/style.css">
</head>

<body>
    <div class="boxcenter">
        <div class="row mb headeraddmin">
            <h1>
                Admin
            </h1>
        </div>
        <div class="row mb menu">
            <ul>
            <!-- phần act này cần clear để mn cùng lamf việc 
                - act = <cờ> :
                    + cờ ở đây sẽ bao gồm tên bảng, chức năng sẽ sử dụng ví dụ : act=film-add, act=film-update
                việc này hơi mất công một chút nhưng nó sẽ giups cả nhóm thống nhất cách hoatj động     
            -->
                <li><a href="index.php?act=home">Home</a></li>
                <li><a href="index.php?act=film">Film</a></li>
                <li><a href="index.php?act=user">User</a></li>
                <li><a href="index.php?act=room">Room</a></li>
                <li><a href="index.php?act=schedule">Schedules</a></li>
                <li><a href="index.php?act=ticket">Ticket</a></li>
                <li><a href="index.php?act=cinema">Cinema</a></li>
                <li><a href="index.php?act=comment">Comment</a></li>
            </ul>
        </div>
</body>