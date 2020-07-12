<?php 
session_start();
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
<?php
include_once "config.php";
if(isset($_POST) && !empty($_POST))
{   

   
    $error = array();
    if(!isset($_POST['username']) || empty($_POST['username']))
    {
        $error[] = "username không hợp lệ";
    }
    if(!isset($_POST['password']) || empty($_POST['password']))
    {
        $error[] = "password không hợp lệ";
    }
    if(!isset($_POST['confirmpassword']) || empty($_POST['confirmpassword']))
    {
        $error[] = "password không hợp lệ";
    }
    if($_POST['confirmpassword'] !== $_POST['password'])
    {
        $error[] = "Confirm password khác password ";
    }
    if(is_array($error) && empty($error))
    {  
       $username = $_POST['username'];
       $password = $_POST['password'];
       $createat =  date("Y-m-d");
       $sql = "INSERT INTO `users` (`id`, `username`, `password`, `create`) VALUES (NULL, ? , ?, ?)";
     //  if(mysqli_query($connection, $sql))
    //   {
    //       echo "thêm thành công";
    //   }
    //   else {
   //        echo "Lỗi";
   //    }
      // $sql = "INSERT INTO users (username, password, create) VALUES(?, ?, ?)"; 
      $stmt = $connection->prepare($sql);
      $stmt->bind_param( 'sss', $username, $password, $createat);
      $stmt->execute();
      $stmt->close();
      echo "<div class = 'alert alert-success'>";
      echo "Đăng kí người dùng thành công <a href = 'login.php'>Đăng nhập</a> ";
      echo "</div>";

    }
    else
    {
        $error_string = implode("<br>", $error );
        echo "<div class = 'alert alert-danger'>";
        echo $error_string;
        echo "</div>";
    }
}

?>
<div class="container">
     <div class="row">
         <div class="col-md-12">
             <h1>Đăng kí người dùng</h1>
         <form name="register" method="post" action="">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="password" type="password" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input name="confirmpassword" type="password" class="form-control" >
                </div>
                <button name="btnregister" type="submit" class="btn btn-primary">Đăng kí</button>
         </form>

         </div>
     </div>
    </div>
    
</body>
</html>

