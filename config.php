<?php
//khai báo hằng số kết nối tới cơ sở dữ liệu
define("DB_SERVER", "localhost");
define("DB_SERVER_USERNAME", "root");
define("DB_SERVER_PASSWORD", "");
define("DB_SERVER_NAME","demo_app_login");
//kết nối tới cơ sở dữ liệu
$connection = mysqli_connect(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_SERVER_NAME);
if($connection ==  false)
{
    die("Không thể kết nối tới cơ sở dữ liệu".mysqli_connect_error());

}
else {
    echo "Kết nối thành công";
}


?>