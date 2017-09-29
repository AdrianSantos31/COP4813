<html>
<head>
<?php
	$personID = $_GET["personID"];

        //Create a database connection
        $mysql_access = mysql_connect(localhost, "n00010608", "123#ED#456");

        //Verify connection
        if(!$mysql_access)
        {
                die("Could not connect: " . mysql_error());
        }

        mysql_select_db("n00010608");

        $query = "SELECT * FROM Persons WHERE personID=" . $personID;

        $result = mysql_query($query, $mysql_access);

        $row = mysql_fetch_row($result);
        $personID = $row[0];
        $email = $row[1];
        $lastName = $row[2];
        $firstName = $row[3];
        $address = $row[4];
        $city = $row[5];
        $ficoScore = $row[6];


        $result = mysql_query($query, $mysql_access);

	mysql_close($mysql_access);
?>
</head>
<body>
<form action="change_p.php" method="post">
<table>
	<tr>
		<td>First Name:</td><td><input type="text" name="firstName" value="<?php echo $firstName; ?>"></td>
	</tr>
        <tr>
                <td>Last Name:</td><td><input type="text" name="lastName"  value="<?php echo $lastName; ?>"></td>
        </tr>
        <tr>
                <td>Email:</td><td><input type="text" name="email" value="<?php echo $email; ?>"></td>
        </tr>
        <tr>
                <td>Address:</td><td><input type="text" name="address" value="<?php echo $address; ?>"></td>
        </tr>
        <tr>
                <td>City:</td><td><input type="text" name="city" value="<?php echo $city; ?>"></td>
        </tr>
        <tr>
                <td>FICO Score:</td><td><input type="text" name="ficoScore"  value="<?php echo $ficoScore; ?>"></td>
        </tr>
	<tr>
		<td colspan="2"><input type="Submit" value="Change Record"></td>
	</tr>
</table>
<input type="hidden" name="personID" value="<?php echo $personID; ?>">
</form>
</body>
</html>
