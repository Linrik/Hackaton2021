<?php
$tittel = "opretting";
	include "header.php";
	if (!isset($_SESSION['Brukernavn'])) {
  	$_SESSION['msg'] = "du må logge inn for å se profilen din";
  	header('location: registrer.php');
  	}
	include('brukersjekk.php');
?>
<form method="post" action="lagarra.php">
	<fieldset>
		
		<legend>Oprett arrangament</legend>
		<div class="child">
			<label>Tittel:</label>
			<input type="text" name="tittel" placeholder="tittel på arrangamanget">
		</div>
		<div class="child">
			<label>Beskrivelse:</label>
			<textarea name="beskrivelse"></textarea>
		</div>
		<div class="child">
			<label>dato med timestart:</label>
			<input type="date" id="datoen" name="dagen">
			<input type="time" id="tiden" name="tid">
		</div>
		<button type="submit" class="knapp" name="oppretning">Oprett</button>
	</fieldset>
	<?php include('errors.php'); ?>
</form>
<?php
	include "footer.php";
?>