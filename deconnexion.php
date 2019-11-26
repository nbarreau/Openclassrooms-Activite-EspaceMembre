<?php
	session_start();
	$_SESSION = array();
    session_destroy();

    // Suppression des cookies de connexion automatique
    setcookie('login', '');

	$ConfDeconnection = '<p> Vous êtes déconnecté. <a href="connexion.php"> Retourner à la page de connexion</a> </p>';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Déconnexion</title>
	</head>
	<body>
		<?php echo '<p>' . $ConfDeconnection . '</p>'; ?>
	</body>
</html>