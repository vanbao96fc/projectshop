<?php
    ob_start();
    session_start();
    if(!isset($_SESSION['Username']))
    {
        header('Location: index.php');
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
            <table width="100%" border="1" cellspacing="0" cellpadding="0">
                <tr>
                    <td colspan="5">DANH SÁCH TIN</td>
                    </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><a href="themTin.php">Thêm</a></td>
                    </tr>
                <?php
				$tin = DanhSachTin();
				while($row_tin = mysqli_fetch_array($tin)){
				ob_start();
				?>
                <tr>
                    <td><p>idTin: {idTin}</p>
                        <p>{Ngay}</p></td>
                    <td><a href="suaTin.php?idTin={idTin}">{TieuDe}</a><br />                        
                        <img style="float:left;margin-right:5px" src="../upload/tintuc/{urlHinh}" width="150" height="103" />{TomTat}<br /></td>
                    <td><p>{TenTL}<br />
                        -<br />
                        {Ten}<br />
                        </p></td>
                    <td>Số lần xem: {SoLanXem}<br />
                        {TinNoiBat}<br />
                        - {AnHien}</td>
                    <td><a href="suaTin.php?idTin={idTin}">Sửa</a> - <a href="xoaTin.php?idTin={idTin}">Xóa</a></td>
                    </tr>
                        <?php
						$s = ob_get_clean();
						$s = str_replace("{idTin}", $row_tin['idTin'] , $s);
						$s = str_replace("{urlHinh}", $row_tin['urlHinh'] , $s);
						$s = str_replace("{Ngay}", $row_tin['Ngay'] , $s);
						$s = str_replace("{TieuDe}", $row_tin['TieuDe'] , $s);
						$s = str_replace("{TomTat}", $row_tin['TomTat'] , $s);
						$s = str_replace("{TenTL}", $row_tin['TenTL'] , $s);
						$s = str_replace("{Ten}", $row_tin['Ten'] , $s);
						$s = str_replace("{SoLanXem}", $row_tin['SoLanXem'] , $s);
						$s = str_replace("{TinNoiBat}", $row_tin['TinNoiBat'] , $s);
						$s = str_replace("{AnHien}", $row_tin['AnHien'] , $s);
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