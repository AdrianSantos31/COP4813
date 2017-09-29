<html>
<head>
<script>
	function changeRecord()
	{
		document.myForm.action = "change.php";
		document.myForm.submit();
	}
        function deleteRecord()
        {
                document.myForm.action = "delete.php";
                document.myForm.submit();
        }
</script>
<?php
        //Create a database connection
        $mysql_access = mysql_connect(localhost, "n00010608", "123#ED#456");

        //Verify connection
        if(!$mysql_access)
        {
                die("Could not connect: " . mysql_error());
        }

        mysql_select_db("n00010608");

        $query = "SELECT * FROM Persons";

        $result = mysql_query($query, $mysql_access);

?>
</head>
<body>
<form action="add.php" method="post">
<table>
	<tr>
		<td>First Name:</td><td><input type="text" name="firstName"></td>
	</tr>
        <tr>
                <td>Last Name:</td><td><input type="text" name="lastName"></td>
        </tr>
        <tr>
                <td>Email:</td><td><input type="text" name="email"></td>
        </tr>
        <tr>
                <td>Address:</td><td><input type="text" name="address"></td>
        </tr>
        <tr>
                <td>City:</td><td><input type="text" name="city"></td>
        </tr>
        <tr>
                <td>FICO Score:</td><td><input type="text" name="ficoScore"></td>
        </tr>
	<tr>
		<td colspan="2"><input type="Submit" value="Add Record"></td>
	</tr>
</table>
</table>
</form>
<form action="" method="get" name="myForm">
<?php
	echo "<table border='1'>";
	while($row = mysql_fetch_row($result))
	{
		$personID = $row[0];
		$email = $row[1];
		$lastName = $row[2];
		$firstName = $row[3];
		$address = $row[4];
		$city = $row[5];
		$ficoScore = $row[6];

		echo "<tr>";
		echo "<td><input type='radio' name='personID' value='$personID'></td>";
		echo "<td>$firstName</td>";
                echo "<td>$lastName</td>";
                echo "<td>$email</td>";
                echo "<td>$address</td>";
                echo "<td>$city</td>";
                echo "<td>$ficoScore</td>";
		echo "</tr>";
	}
	echo "</table>";
	mysql_close($mysql_access);
	

?>
<input type="button" value="Delete Record" onClick="deleteRecord()">
<input type="button" value="Change Record" onClick="changeRecord()">
</form>
</body>
</html>
