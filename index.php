<?php
	require_once('dbconfig.php');
	$connect = mysqli_connect( HOST, USER, PASS, DB )
		or die("Can not connect");


	$results = mysqli_query( $connect, "SELECT * FROM request_makeup" )
		or die("Can not execute query");

	echo "<table border> \n";
	echo "<th>ID</th> <th>Name</th> <th>MissedCourse</th> <th>CT_date</th> <th>reason</th> <th>status</th> \n";

	while( $rows = mysqli_fetch_array( $results ) ) {
		extract( $rows );
		echo "<tr>";
		echo "<td> $ID </td>";
		echo "<td> $Name </td>";
		echo "<td> $MissedCourse </td>";
		echo "<td> $CT_date </td>";
		echo "<td> $Reason </td>";
		echo "<td> $Status </td>";
		echo "<td> <a href = 'addrequest.php?id=$id'> Add Request </a> </td>";
		echo "<td> <a href = 'cancelrequest.php?ID=$ID & Name=$Name & MissedCourse=$MissedCourse & CT_date=$CT_date & Reason=$Reason & Status=$Status'> Cancel Request </a> </td>";
		echo "</tr> \n";
	}

	echo "</table> \n";

	echo "<p><a href=create_input.php>CREATE a new record</a>";
?>