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
<link type="text/css" href="include/css.css" rel="stylesheet"></style>
<title>Admin Login</title>
</head>

<body>

<section class="login">
    <div class="titulo">Admin Login</div>
    <form method="POST">
        <input type="text" name="user" id ="user" required title="Username required" placeholder="Username" data-icon="U" value="">
        <input type="password" name="pass" id="pass" required title="Password required" placeholder="Password" data-icon="x" value="">
        <div class="olvido">
            <p id="notification"></p>
        </div>
        <input type="submit" class="enviar" name="btnLogin" value="Login"/>

    </form>    
    </section>    	
            <?php
                
                if (isset($_POST['btnLogin'])){
                    $checkuser = $_POST['user'];
                    $checkpass =  $_POST['pass'];

                    $dbqlhs = mysqli_connect("localhost", "root", "", "iseshop");

                    $tvdb = "select * from users where Username = '$checkuser' and Password = '$checkpass'";
                    $check = mysqli_query($dbqlhs, $tvdb);
                    $row = mysqli_fetch_array($check);
                    if($row['Username'] == $checkuser && $row['Password'] == $checkpass)
                    {
                        header('Location: home-admin.php?UserID='.$row['UserID']);
                    }
                    else
                       {
                        echo "<script type='text/javascript'>
                                document.getElementById('notification').innerHTML = 'Username or password are incorrect';
                                document.getElementById('user').value = '$checkuser';
                                document.getElementById('pass').value = '$checkpass';
                            </script>";
                       }

                }
                ?>

        </div>
</body>
</html>