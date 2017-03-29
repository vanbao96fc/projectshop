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
            <table width="80%" border="1" cellspacing="0" cellpadding="0">
                <tr>
                    <td colspan="7">DANH SÁCH LOẠI TIN</td>
                    </tr>

                <tr>
                    <td>idLT</td>
                    <td>Ten</td>
                    <td>Ten_KhongDau</td>
                    <td>ThuTu</td>
                    <td>AnHien</td>
                    <td>idTL</td>
                    <td><a href="themLoaiTin.php">Thêm</a></td>
                </tr>
                <?php 
				$loaitin = DanhSachLoaiTin();
                while($row_loaitin = mysqli_fetch_array($loaitin)){
                    ob_start(); 
				?>
                <tr>
                    <td>{idLT}</td>
                    <td>{Ten}</td>
                    <td>{Ten_KhongDau}</td>
                    <td>{ThuTu}</td>
                    <td>{AnHien}</td>
                    <td>{TenTL}</td>
                    <td><a href="suaLoaiTin.php?idLT={idLT}">Sửa</a> - <a onclick="return confirm('Bạn có chăc muốn xóa loại tin này không?');" href="xoaLoaiTin.php?idLT={idLT}">Xóa</a></td>
                </tr>
                <?php
				$s= ob_get_clean();
				$s = str_replace("{idLT}", $row_loaitin['idLT'] , $s);

                $s = str_replace("{TenTL}", $row_loaitin['TenTL'] , $s);
                $s = str_replace("{Ten}", $row_loaitin['Ten'] , $s);
                $s = str_replace("{Ten_KhongDau}", $row_loaitin['Ten_KhongDau'] , $s);
                $s = str_replace("{ThuTu}", $row_loaitin['ThuTu'] , $s);
                $s = str_replace("{AnHien}", $row_loaitin['AnHien'] , $s);
                echo $s;
				}
				?>
            </table>
            <p>&nbsp;</p></td>
    </tr>
</table>
</div>
</body>
</html>