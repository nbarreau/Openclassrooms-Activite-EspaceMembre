
<?php 
	// Connexion à la base de données
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=membres;charset=utf8', 'root', 'root'); 
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

	// Déclaration des variables vides pour l'affichage des erreurs
	$messageErreur = false;
	
	// Vérification si une session est déjà active
	session_start();
	if (isset($_SESSION['connecte']) && $_SESSION['connecte'] == true) {
		header('location: profile.php');
    }
    
	if (isset($_POST['pseudo']) && isset($_POST['pass'])) {	

        $_POST['pseudo'] = htmlspecialchars($_POST['pseudo']); 
        $_POST['pass'] = htmlspecialchars($_POST['pass']); 

        //  Récupération de l'utilisateur et de son pass hashé
        $req = $bdd->prepare('SELECT id, pass FROM membres WHERE pseudo = :pseudo');
        $req->execute(array(
            'pseudo' => $_POST['pseudo']));
        $resultat = $req->fetch();
        
        // Comparaison du pass envoyé via le formulaire avec la base
        $isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);
        
        if (!$resultat)
        {
            echo 'Mauvais identifiant ou mot de passe !';
        }
        else
        {
            if ($isPasswordCorrect) {
                session_start();
                $_SESSION['id'] = $resultat['id'];
                $_SESSION['pseudo'] = $_POST['pseudo'];
                header('location: profile.php');
            }
            else {
            $messageErreur = 'Mauvais identifiant ou mot de passe !';
            }
        }
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Connexion à l'espace membres</title>
		<link rel="stylesheet" href="style2.css">
	</head>
	<body>
		<div id="access_connexion">
            <h2>Page de connexion</h2>
			<form action="connexion.php" method="POST">
                <table>
                    <tr>
                        <td><label for="pseudo">Pseudo</label></td>
                        <td><input type="text" name="pseudo" id="pseudo" placeholder="Votre pseudo" value="<?php if (isset($_COOKIE['pseudo'])) { echo htmlspecialchars($_COOKIE['pseudo']); } ?>"/></td>
                    </tr>
                    <tr>
                        <td><label for="mot_de_passe">Mot de passe</label>
                        <td><input type="password" name="pass" id="pass" placeholder="Votre mot de passe"/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><br/><input class="submit" type="submit" name="envoyer" value="Connexion"/></td>
                    </tr>
                </table>
            </form>
            <p><?php echo $messageErreur ?></p>

			<p>Vous devez être inscrit pour vous connecter <a href="inscription.php" class="creation_compte">Créer un compte</a></p>
		</div>
	</body>
</html>