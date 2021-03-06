<?php
require_once 'dbconnect.php';
$sql = "SELECT Brukernavn, kommentar.argId, kommentar 
		FROM arrangement INNER JOIN 
			(bruker INNER JOIN kommentar ON bruker.PNr = kommentar.PNr)
				ON kommentar.argId = arrangement.argId";

	$result = $conn->query($sql);
	$dbdata = array();

	while($row = $result->fetch_assoc()){
	$dbdata[] = $row;
	}
	echo json_encode($dbdata);

$conn->close();
?>