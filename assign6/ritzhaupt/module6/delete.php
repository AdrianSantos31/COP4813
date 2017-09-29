<?php
	//Capture data from users
	$personID = $_GET["personID"];

	//Create a database connection
	$mysql_access = mysql_connect(localhost, "n00010608", "123#ED#456");

	//Verify connection
	if(!$mysql_access)
	{
		die("Could not connect: " . mysql_error());
	}

	mysql_select_db("n00010608");

	$query = "DELETE FROM Persons where personID =" . $personID;

	$result = mysql_query($query, $mysql_access);

	mysql_close($mysql_access);

	header("Location: index.php");

?>
