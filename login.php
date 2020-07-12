
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
    session_start();
    if(isset($_SESSION['login']) && $_SESSION['login'] == true)
    {
        header("Location:index.php");
    }
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
        if(is_array($error) && empty($error))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM `users` WHERE `username` = ? AND `password` = ? ";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute(); //thực thi câu lệnh sql
            $res = $stmt->get_result(); //lấy ra bản ghi
            $row = $res->fetch_array(MYSQLI_ASSOC);
            echo "<pre>";
            print_r($row);
            echo "</pre>";
            if(isset($row['id']) && $row['id'] > 0)
            {    
                //nếu tồn tại bản ghi tạo ra session đăng nhập
                $_SESSION['login'] = true;
                $_SESSION['username'] = $row['username'];
              
            }
            else 
            {
                $error[] = "Không tồn tại tài khoản đăng nhập";
                $error_string = implode("<br>", $error );
                echo "<div class = 'alert alert-danger'>";
                echo $error_string;
                echo "</div>";
            }

        }
        else
        {
            $error_string = implode("<br>", $error );
            echo "<div class = 'alert alert-danger'>";
            echo $error_string;
            echo "</div>";

        }
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";
    }
    
    ?>
    <div class="container">
     <div class="row">
         <div class="col-md-12">
             <h1>Đăng nhập</h1>
         <form name="login" method="post" action="">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group form-check">
                    <p><a href="register.php">Đăng kí</a></p>
                </div>
                <button name="btnlogin" type="submit" class="btn btn-primary">Đăng nhập</button>
         </form>

         </div>
     </div>
    </div>
</body>
</html>

