<!doctype html>
<html>
<head>

<meta charset = "utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Remember to include the meta viewport tag in your document so mobile devices will render correctly. -->


<!--
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
-->
<title>Smart irrigation</title>

</head>
<body style="background:#fafafa">
<?php 
$conn_Error = 'Could Not Connect.';
$mysql_Host = 'localhost';
$mysql_User = 'root';
$mysql_Pass = NULL;
$mysql_Db = 'iotdb';
	
if(!mysql_connect($mysql_Host,$mysql_User,$mysql_Pass) || !mysql_select_db($mysql_Db))
die($conn_Error);
else
echo 'Connection Successful';?>

<?php
	$url1=$_SERVER['REQUEST_URI'];
	header("Refresh: 600; URL=$url1");
?>]]
<?php
	$myQuery = "SELECT * FROM iottable LIMIT 5";
	echo "<table border=10>";
	echo "<TR><TH>COUNT</TH><TH>MOTOR</TH><TH>RAIN</TH><TH>TEMP</TH><TH>HUMIDITY</TH><TH>MOISTURE</TH></TR>";
		if($query = mysql_query($myQuery)){
			if(mysql_num_rows($query) == NULL)
				echo "Nothing found";
			else{
				while($query_row = mysql_fetch_assoc($query)){
					$cnt = $query_row['id'];
					$motor = $query_row['MOTOR'];
					$rain = $query_row['RAIN'];
					$tmp = $query_row['TEMP'];
					$hum = $query_row['MOS'];
					echo "<tr><td>$cnt</td><td>$tmp</td><td>$hum</td><td>$moi</td></tr>";
				}
			}
		}
		else
			echo mysql_error();	
?>
</body>
</html>