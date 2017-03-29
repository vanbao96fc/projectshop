<?php
	ob_start();
	session_start();
	if(!isset($_SESSION['Username']))
	{
		header('Location: index.php');
	}
?>

<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home admin</title>
</head>

<body>
<div style="margin:0 auto">
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td id="hangTieuDe">TRANG QUẢN TRỊ</td>
    </tr>
    <tr>
        <td id="hang2"> <?php require "menu.php" ?></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
</table>
</div>
</body>
</html>
