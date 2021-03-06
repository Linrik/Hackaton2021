<?php
	session_start();
	
	if (isset($_GET['logg_ut'])) {
  	session_destroy();
  	unset($_SESSION['Brukernavn']);
  	echo "du er nå logget ut";
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $tittel;?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Nettsted mal">
	<meta name="keywords" content="mal, nettsted">
	<meta name="author" content="Henrik">
	<script type="text/javascript" src="jq.js"></script>
	<script type="text/javascript" src="script.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<div id="headbox">
			<div id="headrow">
				<nav>
					<div>
						<ul>
							<li><a href="Index.php">Hjemmesiden</a></li>
							<li><a href="arrangament.php">Arrangamenter</a></li>
							<li><a href="registrer.php" style="<?php if (isset($_SESSION['Brukernavn'])){
								echo 'display: none;';
  							}?> ">Logg inn</a></li>
							<li><a href="profil.php"><?php if (isset($_SESSION['Brukernavn'])){
								echo $_SESSION['Brukernavn'];
  							}?></a></li>
						</ul>
					</div>
				</nav>
				<form>
					<button type="submit" class="knapp" name="logg_ut">logg ut</button>
				</form>
		</form>
			</div>
		</div>
	</header>
