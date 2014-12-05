<?php 
session_start();

?>
<?php
	include('session.php');
	$usernme=$_POST['username'];
	$passwrd=$_POST['password'];
	$semestr=$_POST['semester'];
	
	$con=mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("online_exam_db",$con);
	$query = "SELECT * FROM login WHERE username='$usernme'";
	$result = mysql_query($query);
	while ($row=mysql_fetch_array($result))
	{
		$usernme = $row['username'];
		$passwrd = $row['password'];
		$semestr = $row['semester'];
	}
	echo $usernme;
	echo $passwrd;
	echo $semestr;
	echo "<SCRIPT LANGUAGE='JAVASCRIPT'> window.location='exam.php?username=chinnu' </SCRIPT>";
	if ($usernme == '')
	{
		$errunavail = "Username Field is Blank!!!";
		$errunavailencode = base64_encode($errunavail);
		echo "<SCRIPT LANGUAGE='JAVASCRIPT'> window.location='login.php?erruserid=$errunavailencode' </SCRIPT>";	
	}
	else if ($passwrd == '')
	{
		$errunavail = "Password Field is Blank!!!";
		$errunavailencode = base64_encode($errunavail);
		echo "<SCRIPT LANGUAGE='JAVASCRIPT'> window.location='login.php?erruserid=$errunavailencode' </SCRIPT>";	
	}
	else if ($usernme != $usernme)
	{
		$errunavail = "Invalid Username!!!";
		$errunavailencode = base64_encode($errunavail);
		echo "<SCRIPT LANGUAGE='JAVASCRIPT'> window.location='login.php?erruserid=$errunavailencode' </SCRIPT>";	
	}
	else if ($passwrd != $passwrd)
	{
		$errunavail = "Invalid Password but valid Username!!!";
		$errunavailencode = base64_encode($errunavail);
		echo "<SCRIPT LANGUAGE='JAVASCRIPT'> window.location='login.php?erruserid=$errunavailencode' </SCRIPT>";	
	}
	else if ($usernme == $usernaame)
	{
		$errunavail = "Session already started!!!";
		$errunavailencode = base64_encode($errunavail);
		echo "<SCRIPT LANGUAGE='JAVASCRIPT'> window.location='login.php?erruserid=$errunavailencode' </SCRIPT>";	
	}
	else if ($semestr != $semestr)
	{
		$errunavail = "Please Enter the Correct Semester!!!";
		$errunavailencode = base64_encode($errunavail);
		echo "<SCRIPT LANGUAGE='JAVASCRIPT'> window.location='login.php?erruserid=$errunavailencode' </SCRIPT>";	
	}
	else
	{
		$con1=mysql_connect("localhost","root","") or die(mysql_error("Could not Connect the database"));
		mysql_select_db("online_exam_db",$con1) or die(mysql_error("Could not Select the database"));
		$query3="INSERT INTO session(username, semester) values ('$usernme',  '$semestr')";
		mysql_query($query3);
		echo "<SCRIPT LANGUAGE='JAVASCRIPT'> window.location='exam.php?username=$usernme' </SCRIPT>";
	}	
?>