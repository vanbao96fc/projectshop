<?php
ob_start();
session_start();
if(!isset($_SESSION["idUser"]) && $_SESSION["idGroup"] != 1){
	header("location:../index.php");
}
require "../lib/dbCon.php";
require "../lib/quantri.php";
?>
<?php
$idTL = $_GET['idTL'];
settype($idTL, "int");
$row_theloai = ChiTietTheLoai($idTL);

?>
<?php
	if(isset($_POST['btnSua'])){
	$TenTL = $_POST['TenTL'];
	$TenTL_KhongDau = changeTitle($TenTL);
	$ThuTu = $_POST['ThuTu'];
	settype($ThuTu, "int");
	$AnHien = $_POST['AnHien'];
	settype($AnHien, "int");
	include "../lib/dbCon.php";
	$qr= "update theloai set
	TenTL ='$TenTL',
	TenTL_KhongDau ='$TenTL_KhongDau',
	ThuTu= '$ThuTu',
	AnHien='$AnHien'
	where idTL = '$idTL'";
	mysqli_query($conn, $qr);	
	header("location:listTheLoai.php");
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="layout.css"/>
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
        <td><p>&nbsp;</p>
            <form id="form1" name="form1" method="post" action="">
                <table width="80%" border="1" cellspacing="0" cellpadding="0">
                    <tr>
                        <td colspan="2">SỬA THỂ LOẠI</td>
                        </tr>
                    <tr>
                        <td>TenTL</td>
                        <td><label for="TenTL"></label>
                            <input type="text" name="TenTL" value="<?php echo $row_theloai['TenTL']; ?>" id="TenTL" /></td>
                    </tr>
                    <tr>
                        <td>ThuTu</td>
                        <td><label for="ThuTu"></label>
                            <input type="text" name="ThuTu" value="<?php echo $row_theloai['ThuTu']; ?>" id="ThuTu" /></td>
                    </tr>
                    <tr>
                        <td>AnHien</td>
                        <td><p>
                            <label>
<input type="radio" <?php if($row_theloai['AnHien']==1) echo "checked='checked'"; ?> name="AnHien" value="1" id="AnHien_0" />
Hiện</label>
                            <br />
                            <label>
                                <input type="radio" name="AnHien" <?php if($row_theloai['AnHien']==0) echo "checked='checked'"; ?> value="0" id="AnHien_1" />
                                Ẩn</label>
                            <br />
                        </p></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="btnSua" id="btnSua" value="Sửa" /></td>
                    </tr>
                </table>
            </form>
            <p>&nbsp;</p></td>
    </tr>
</table>
</div>
</body>
</html>