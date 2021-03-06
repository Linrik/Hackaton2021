<?php
	$tittel = "Profil";
	include "header.php";
	include('brukersjekk.php');
	require_once 'dbconnect.php';
	if (!isset($_SESSION['Brukernavn'])) {
  	$_SESSION['msg'] = "du må logge inn for å se profilen din";
  	header('location: registrer.php');
  	}
	
?>
<div class="personinfo">
	<span>Navn: <?php $brukernavn = $_SESSION['Brukernavn'];
	$bruker = "SELECT CONCAT(Fornavn, ' ', Etternavn) AS navn FROM bruker WHERE Brukernavn = '$brukernavn'";
	$objekt = mysqli_query($conn, $bruker);
	$test =	mysqli_fetch_array($objekt, MYSQLI_ASSOC);
	echo $test['navn']?></span>
	<span>Antall møter: <?php $brukernavn = $_SESSION['Brukernavn'];
	$bruker = "SELECT COUNT(argId) AS treff FROM deltaker INNER JOIN bruker ON bruker.pnr = deltaker.PNr WHERE Brukernavn = '$brukernavn'";
	$objekt = mysqli_query($conn, $bruker);
	$test =	mysqli_fetch_array($objekt, MYSQLI_ASSOC);
	echo $test['treff']?></span>

	<span>arrangamenter: <?php 
		$brukernavn = $_SESSION['Brukernavn'];
		$sql = "SELECT tittel, beskrivelse, dato, tid FROM arrangement INNER JOIN (bruker INNER JOIN deltaker ON bruker.pnr = deltaker.PNr) ON deltaker.argId = arrangement.argId WHERE Brukernavn = '$brukernavn'";
		$result = $conn->query($sql);
		if ($result = $conn->query($sql)) {
			while($row = $result->fetch_assoc()){
				echo $row["tittel"] ." ". $row["beskrivelse"]. " ". $row["dato"]. "-". $row["tid"]. "<br>";
			}
		}
	


	?></span>
</div>


<?php
	include "footer.php";
?>