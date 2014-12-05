

<?php
  //$usernme=$_POST['usernme'];
	//echo $username;
	$con=mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("online_exam_db",$con);
	$query1 = "SELECT * FROM session WHERE username='Abhinav'";
	$result = mysql_query($query1);
	$usernaame="Abhinav";
	while ($row=mysql_fetch_array($result))
	{
		$usernaame = $row["username"];
		$semester = $row["semester"];
	}
?>