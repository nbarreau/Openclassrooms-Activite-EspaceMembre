<?php
	session_start();
	if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
	{
		$conf_connexion='<p>Bonjour ' . $_SESSION['pseudo'] .' ! <br/><br/> <a href="deconnexion.php">Déconnexion...</a></p>';
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style2.css">
		<title>Mon profile</title>
	</head>
	<body>
		<?php echo '<p>' . $conf_connexion . '</p>'; ?>
	</body>
</html>