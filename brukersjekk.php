<?php
$errors = array();

require_once 'dbconnect.php';

if (isset($_POST['logg_inn'])) {
	$brukernavn = mysqli_real_escape_string($conn, $_POST['brukernavnlog']);
	$passord = mysqli_real_escape_string($conn, $_POST['passordlog']);

	if (empty($brukernavn)) { array_push($errors, "Du må fylle inn brukernavn");}
	if (empty($passord)) { array_push($errors, "Du må fylle inn passord");}

	if (count($errors) == 0) {
  		$sql = "SELECT * FROM bruker WHERE Brukernavn ='$brukernavn' AND Passord = '$passord'";
  		$resultat = mysqli_query($conn, $sql);
  		if (mysqli_num_rows($resultat) == 1) {
  			$_SESSION['Brukernavn'] = $brukernavn;
  			$_SESSION['success'] = "du er nå logget inn";
  			header('location: index.php');
  		} else{
  			array_push($errors, "feil kombinasjon");
  		}
  	}

}

if (isset($_POST['reg_bruker'])) {
	$fornavn = mysqli_real_escape_string($conn, $_POST['fornavn']);
	$etternavn = mysqli_real_escape_string($conn, $_POST['etternavn']);
	$brukernavn = mysqli_real_escape_string($conn, $_POST['brukernavn']);
	$passord = mysqli_real_escape_string($conn, $_POST['passord']);
	$bekreft = mysqli_real_escape_string($conn, $_POST['bekreft']);

	if (empty($fornavn)) { array_push($errors, "Du må ha fornavn");}
	if (empty($etternavn)) { array_push($errors, "Du må ha etternavn");}
	if (empty($brukernavn)) { array_push($errors, "Du må ha brukernavn");}
	if (empty($passord)) { array_push($errors, "Du må ha passord");}
	if (empty($bekreft)) { array_push($errors, "Du må bekrefte passord");}
	if ($passord != $bekreft) { array_push($errors, "passordene matcher ikke");}

	$bruker_query = "SELECT * FROM bruker WHERE Brukernavn='$brukernavn'";
	$resultat = mysqli_query($conn, $bruker_query);

  	if (mysqli_num_rows($resultat) > 0) { array_push($errors, "brukernavn er allerede tatt");}
  		

  	if (count($errors) == 0) {
  		$legginn = "INSERT INTO bruker (Fornavn, Etternavn, Brukernavn, passord) 
  		VALUES('$fornavn', '$etternavn', '$brukernavn', '$passord')";
  		mysqli_query($conn, $legginn);
  		$_SESSION['Brukernavn'] = $brukernavn;
  		$_SESSION['success'] = "You are now logged in";
  	}
} 
if (isset($_POST['oppretning'])) {
	$brukernavn = $_SESSION['Brukernavn'];
	$bruker = "SELECT PNr FROM bruker WHERE Brukernavn = '$brukernavn'";
	$objekt = mysqli_query($conn, $bruker);
	$test =	mysqli_fetch_array($objekt, MYSQLI_ASSOC);
	

	$tittel = mysqli_real_escape_string($conn, $_POST['tittel']);
	$beskrivelse = mysqli_real_escape_string($conn, $_POST['beskrivelse']);
	$dato = mysqli_real_escape_string($conn, $_POST['dagen']);
	$timen = mysqli_real_escape_string($conn, $_POST['tid']);

	if (empty($tittel)) { array_push($errors, "Du må ha tittel");}
	if (empty($beskrivelse)) { array_push($errors, "Du må ha beskrivelse");}
	if (empty($dato)) { array_push($errors, "Du må ha dato");}
	if (empty($timen)) { array_push($errors, "Du må ha tidsstart");}

	if (count($errors) == 0) {
  		$legginn = "INSERT INTO arrangement (PNr, tittel, beskrivelse, dato, tid) 
  		VALUES('$test[PNr]', '$tittel', '$beskrivelse', '$dato', '$timen')";
  		mysqli_query($conn, $legginn);
  	}
}

if (isset($_POST['delta'])) {
	$brukernavn = $_SESSION['Brukernavn'];
	$bruker = "SELECT PNr FROM bruker WHERE Brukernavn = '$brukernavn'";
	$objekt = mysqli_query($conn, $bruker);
	$test =	mysqli_fetch_array($objekt, MYSQLI_ASSOC);
	$argId = mysqli_real_escape_string($conn, $_POST['argId']);

	$legginn = "INSERT INTO deltaker(PNr, argId)
	VALUES('$test[PNr]', $argId)";
	mysqli_query($conn, $legginn);
}

if (isset($_POST['kommenter'])) {
	$brukernavn = $_SESSION['Brukernavn'];
	$bruker = "SELECT PNr FROM bruker WHERE Brukernavn = '$brukernavn'";
	$objekt = mysqli_query($conn, $bruker);
	$test =	mysqli_fetch_array($objekt, MYSQLI_ASSOC);
	$argId = mysqli_real_escape_string($conn, $_POST['argId']);
	$kommentar = mysqli_real_escape_string($conn, $_POST['kommentar']);

	if (empty($kommentar) || $kommentar == '') { array_push($errors, "Du må skrive noe");}
	if (count($errors) == 0) {
  		$legginn = "INSERT INTO kommentar(PNr, argId, kommentar)
			VALUES('$test[PNr]', '$argId', '$kommentar')";
		mysqli_query($conn, $legginn);
  	}
	
}
?>