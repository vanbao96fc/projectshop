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
if(isset($_POST['btnThem'])){
	$Ten = $_POST['Ten'];
	$Ten_KhongDau = changeTitle($Ten);
	$ThuTu = $_POST['ThuTu'];
	settype($ThuTu, "int");
	$AnHien = $_POST['AnHien'];
	settype($AnHien, "int");
	$idTL = $_POST['idTL'];
	settype($idTL, "int");
	include "../lib/dbCon.php";
	$qr = " insert into loaitin values(null, '$Ten','$Ten_KhongDau','$ThuTu','$AnHien','$idTL')";
	mysqli_query($conn, $qr);
	header("location:listLoaiTin.php");
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
                <table width="80%" border="1" cellspacing="5" cellpadding="5">
                    <tr>
                        <td colspan="2">THÊM LOẠI TIN</td>
                        </tr>
                    <tr>
                        <td>Ten</td>
                        <td><label for="Ten"></label>
                            <input type="text" name="Ten" id="Ten" /></td>
                    </tr>
                    <tr>
                        <td>ThuTu</td>
                        <td><label for="ThuTu"></label>
                            <input type="text" name="ThuTu" id="ThuTu" /></td>
                    </tr>
                    <tr>
                        <td>AnHien</td>
                        <td><p>
                            <label>
                                <input type="radio" name="AnHien" value="1" id="AnHien_0" />
                                Hiện</label>
                            <br />
                            <label>
                                <input type="radio" name="AnHien" value="0" id="AnHien_1" />
                                Ẩn</label>
                            <br />
                        </p></td>
                    </tr>
                    <tr>
                        <td>idTL</td>
                        <td><label for="idTL"></label>
                            <select name="idTL" id="idTL">
                            <?php
							$theloai = DanhSachTheLoai();
							while($row_theloai= mysqli_fetch_array($theloai)){
							?>
                            <option value="<?php echo $row_theloai['idTL'] ?>"><?php echo $row_theloai['TenTL'] ?></option>
                            <?php
							}
							?>
                            </select></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="btnThem" id="btnThem" value="Thêm" /></td>
                    </tr>
                </table>
            </form>
            <p>&nbsp;</p></td>
    </tr>
</table>
</div>
</body>
</html>