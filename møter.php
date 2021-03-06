<?php
require_once 'dbconnect.php';
$sql = "SELECT Brukernavn, argId, tittel, beskrivelse, dato, tid FROM arrangement INNER JOIN bruker ON bruker.PNr = arrangement.PNr";

	$result = $conn->query($sql);
	$dbdata = array();

	while($row = $result->fetch_assoc()){
	$dbdata[] = $row;
	}
	echo json_encode($dbdata);

$conn->close();
?>