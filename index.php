<?php
 session_start();
//kiểm tra người dùng đăng nhập hay chưa
if(!isset($_SESSION['login']) || $_SESSION['login'] != true )
 {
   header("Location:login.php");
   exit;
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Đăng nhập thành công</h1>
                <p>Tên người dùng</p>
                <p><a href="logout.php">Đăng xuất</a></p>
            </div>
        </div>
    </div>
    
</body>
</html>

