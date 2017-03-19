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
<div id="content">

</div>
	
	
</body>
</html>
