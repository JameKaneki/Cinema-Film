<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="boxcenter">
        <div class="row mb headeraddmin" style="display:flex;justify-content: space-between;">
            <h1>
                Admin
            </h1>
            <li style="margin-top:20px;">
                <a href="index.php?act=user_exit" style="font-size: 2vw;color: #666;">Logout</a>
            </li>
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
            </ul>
        </div>