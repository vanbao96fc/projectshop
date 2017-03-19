<?php
session_start();
if(isset($_POST['btnLogin']))
  {  $_SESSION['Username'] = $_POST['user'];
    setcookie('Username', 'thehalfheart', time() + 3600);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>login admin</title>
</head>

<body>

	<div id="formlogin">
  
    	<form method="POST">
        	<p id="ThongBao"></p>
        	<p>
            	<label>Username:</label>
                <input type="text" id="user" name="user" />
        	</p>
            <p>
            	<label>Password:</label>
                <input type="password" id="pass" name="pass" />
        	</p>
            <p>
            	<input type="submit" name="btnLogin" value="Login" onclick="Kiemtra()" />
            </p>
            <?php
                
                if (isset($_POST['btnLogin'])){
                    $checkuser = $_POST['user'];
                    $checkpass =  $_POST['pass'];

                    //Loại bỏ các ký tự \
                    $checkuser = stripslashes($checkuser);
                    $checkpass = stripslashes($checkpass);


                    $dbqlhs = mysqli_connect("localhost", "root", "", "iseshop");

                    $tvdb = "select * from users where Username = '$checkuser' and Password = '$checkpass'";
                    $check = mysqli_query($dbqlhs, $tvdb);
                    $row = mysqli_fetch_array($check);
                    if($row['Username'] == $checkuser && $row['Password'] == $checkpass)
                    {
                        header('Location: http://localhost:1024/projectshop/admin/home-admin.php?UserID='.$row['UserID']);
                    }
                    else
                        echo "sai tên đăng nhập hoặc mật khẩu";

                }
                ?>
            <p>
            	<a href="signup.php" id="dkuser">Tạo tài khoản.</a>
            </p>
            </form>
        </div>
</body>
</html>