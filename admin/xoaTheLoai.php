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
include "../lib/dbCon.php";
$idTL = $_GET['idTL'];
settype($idTL, "int");
$qr = "delete from theloai where idTL = '$idTL'";
mysqli_query($conn, $qr);
header("location:listTheLoai.php");
?>