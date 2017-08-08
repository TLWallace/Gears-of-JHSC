<?php
	$dbConn = mysqli_connect('internalwebsite.company.on.ca', 'dbusername', 'd6p@55w0rd'); //Passing ('server', 'user', 'pw')
	if (!$dbConn)
	{
		die('Could not connect: ' . mysqli_error());
	}
?>