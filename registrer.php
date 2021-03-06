<?php
	$tittel = "Login/Registrering";
	include "header.php";
	include('brukersjekk.php');
?>
<div class="wrapper">
	<div id="login">
		<form method="post" action="">
			
		</form>
	</div>
	<div id="Login">
		<form method="post" action="registrer.php">
			<label>Brukernavn</label>
			<input type="text" name="brukernavnlog">
			<label>Passord</label>
			<input type="password" name="passordlog">
			<button type="submit" class="knapp" name="logg_inn">Logg inn</button>
	</div>
	<div id="registrer">
			<label>Fornavn</label>
			<input type="text" name="fornavn">
			<label>Etternavn</label>
			<input type="text" name="etternavn">
			<label>Brukernavn</label>
			<input type="text" name="brukernavn">
			<label>Passord</label>
			<input type="password" name="passord">
			<label>Bekreft passord</label>
			<input type="password" name="bekreft">
			<button type="submit" class="knapp" name="reg_bruker">Registrer</button>
			<?php include('errors.php'); ?>
		</form>
	</div>
</div>
<?php
	include "footer.php";
?>