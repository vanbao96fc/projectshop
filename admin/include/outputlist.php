<?php
$query = "select * from hocsinh";
	 	$result = mysqli_query($dbqlhs, $query);
	 	if(mysqli_num_rows($result) > 0)
	 	{
	 		echo "<table width='90%' border='1'>";
 	 		echo "<tr>";
    		echo "<th scope='col' width='10%'>Mã học sinh</th>";
		    echo "<th scope='col' width='10%'>Họ</th>";
		    echo "<th scope='col' width='10%'>Tên</th>";
		    echo "<th scope='col' width='10%'>Năm sinh</th>";
		    echo "<th scope='col' width='10%'>Giới tính</th>";
		    echo "<th scope='col' width='10%'>Nơi sinh</th>";
		    echo "<th scope='col' width='10%'>Lớp</th>";
		    echo "<th scope='col' width='15%'>Tính năng</th>";
  			echo "</tr>";
	     while ($row = mysqli_fetch_row($result)) {
	     	$mahs = $row[0];
	     	echo "<tr>";
	     	echo "<th>$row[0]</th>";
	     	echo "<th>$row[1]</th>";
	     	echo "<th>$row[2]</th>";
	     	echo "<th>$row[3]</th>";
	     	echo "<th>$row[4]</th>";
	     	echo "<th>$row[5]</th>"; 
	     	echo "<th>$row[6]</th>";
	     	echo "<th>
	     			<a href='update.php?&mahs=".$mahs."'>Chỉnh sửa</a>
	     			<a href='delete.php?&mahs=".$mahs."'>Xóa</a>
	     			</form>";
	     	echo "</th>";

	     	echo "</tr>";
	     }
	     echo "</table>";
	 }

?>
