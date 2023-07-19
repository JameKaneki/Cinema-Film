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
            <!-- phần act này cần clear để mn cùng làm việc 
            việc này hơi mất công một chú nhưng nó sẽ giúp cả nhóm làm việc hiệu quả hơn
                - act = <cờ> :
                    + cờ ở đây sẽ bao gồm tên bảng - chức năng sẽ sử dụng 
                    + khi "cờ" chỉ có tên bảng : => vào thẳng list của bảng ví dụ: act=film => vào list film
                    + khi "cờ" có thêm chức năng gọi tới : vào chức năng ví dụ : act=film-add => vào phần add film
            -->
                <li><a href="index.php?act=home">Home</a></li>
                <li><a href="index.php?act=film">Film</a></li>
                <li><a href="index.php?act=user">User</a></li>
                <li><a href="index.php?act=room">Room</a></li>
                <li><a href="index.php?act=seat">Seat</a></li>
                <li><a href="index.php?act=schedule">Schedules</a></li>
                <li><a href="index.php?act=ticket">Ticket</a></li>
                <li><a href="index.php?act=cinema">Cinema</a></li>
            </ul>
        </div>