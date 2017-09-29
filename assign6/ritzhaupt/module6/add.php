<?php
	//Capture data from users
	$firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $city = $_POST["city"];
        $ficoScore = $_POST["ficoScore"];

	//Create a database connection
	$mysql_access = mysql_connect(localhost, "n00010608", "123#ED#456");

	//Verify connection
	if(!$mysql_access)
	{
		die("Could not connect: " . mysql_error());
	}

	mysql_select_db("n00010608");

	$query = "INSERT INTO Persons (personEmail, personLastName, personFirstName, ";
	$query = $query . "personAddress, personCity, personFicoScore) VALUES ";
	$query = $query . "('$email', '$lastName', '$firstName', '$address', '$city', $ficoScore)";

	$result = mysql_query($query, $mysql_access);

	mysql_close($mysql_access);

	header("Location: index.php");

?>
