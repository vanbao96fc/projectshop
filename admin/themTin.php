<?php
ob_start();
session_start();
if(!isset($_SESSION["idUser"]) && $_SESSION["idGroup"] != 1){
	header("location:../index.php");
}
require "../lib/dbCon.php";
require "../lib/quantri.php";
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
                        <td colspan="2">THÊM TIN</td>
                        </tr>
                    <tr>
                        <td>TieuDe</td>
                        <td><label for="TieuDe"></label>
                            <input type="text" name="TieuDe" id="TieuDe" /></td>
                    </tr>
                    <tr>
                        <td>TomTat</td>
                        <td><label for="TomTat"></label>
                            <textarea name="TomTat" id="TomTat" cols="45" rows="5"></textarea></td>
                    </tr>
                    <tr>
                        <td>urlHinh</td>
                        <td><label for="urlHinh"></label>
                            <input type="text" name="urlHinh" id="urlHinh" /></td>
                    </tr>
                    <tr>
                        <td>Content</td>
                        <td><label for="Content"></label>
                            <textarea name="Content" id="Content" cols="45" rows="5"></textarea></td>
                    </tr>
                    <tr>
                        <td>idTL</td>
                        <td><label for="idTL"></label>
                            <select name="idTL" id="idTL">
                            <?php
							$theloai = DanhSachTheLoai();
							while($row_theloai= mysqli_fetch_array($theloai)){
							 ?>
                            <option value="<?php echo $row_theloai['idTL']; ?>"><?php echo $row_theloai['TenTL']; ?></option>
                            <?php
							}
							 ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td>idLT</td>
                        <td><label for="idLT"></label>
                            <select name="idLT" id="idLT">
                             <?php
							$loaitin = DanhSachLoaiTin();
							while($row_loaitin= mysqli_fetch_array($loaitin)){
							 ?>
                            <option value="<?php echo $row_loaitin['idLT']; ?>"><?php echo $row_loaitin['Ten']; ?></option>
                            <?php
							}
							 ?>
                            
                            </select></td>
                    </tr>
                    <tr>
                        <td>TinNoiBat</td>
                        <td><p>
                            <label>
                                <input type="radio" name="TinNoiBat" value="1" id="TinNoiBat_0" />
                                Nổi bật</label>
                            <br />
                            <label>
                                <input type="radio" name="TinNoiBat" value="0" id="TinNoiBat_1" />
                                Bình thường</label>
                            <br />
                        </p></td>
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