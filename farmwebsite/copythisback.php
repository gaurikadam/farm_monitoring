<!doctype html>
<html>
<head>
<meta charset = "utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Smart irrigation</title>
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===========================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body style="background:#FFFFff]]">
	<div class="limiter">

	<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
<?php 
$conn_Error = 'Could Not Connect.';
$mysql_Host = 'localhost';
$mysql_User = 'root';
$mysql_Pass = NULL;
$mysql_Db = 'mydatabase';	
if(!mysql_connect($mysql_Host,$mysql_User,$mysql_Pass) || !mysql_select_db($mysql_Db))
die($conn_Error);
else
echo '<h3><center>Smart irrigation System</center></h3>';
?>

<?php
$url1=$_SERVER['REQUEST_URI'];
	header("Refresh: 600; URL=$url1");
?>
<?php
$myQuery = "SELECT * FROM ardu";
	echo "<table border=10>";
	echo "<thead><tr<th>TEMP</th></tr></thead>";
		if($query = mysql_query($myQuery)){
			if(mysql_num_rows($query) == NULL)
				echo "Nothing found";
			else{
				while($query_row = mysql_fetch_assoc($query)){
					$tmp = $query_row['temp'];
					echo "<tr><td>$tmp</td></tr>";
				}
			}
		}
		else
			echo mysql_error();	
?>
</div>
</div>
</div>
</div>
</div>
<center><input type="button" class="button" value="Start Button"></center>
<center><input type="button" class="button" value="Stop Button"></center>
</body>
</html>














