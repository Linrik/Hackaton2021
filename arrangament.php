<?php
	$tittel = "arrangementer";
	include "header.php";
	require_once 'dbconnect.php';
	include('brukersjekk.php');
	
?>
<li><a href="lagarra.php">Lag arrangament</a></li>
	<div>
		<div class="arrangamanger">
			<?php include('errors.php'); ?>
			
		</div>
		<div class="kommentarer">
			</div>
			</div>
<?php
	include "footer.php";
?>