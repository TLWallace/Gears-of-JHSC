<?php
	$host_name = "internalwebsite.company.on.ca";
	$database = "hs_risk_factor";
	$username = "dbusername"; 
	$password = "d6p@55w0rd";
	try
	{
		$dbo = new PDO('mysql:host='.$host_name.';dbname='.$database, $username, $password);
	}
	catch (PDOException $e)
	{
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
?>