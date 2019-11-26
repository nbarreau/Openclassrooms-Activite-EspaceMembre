
<!-- 
    - rajouter cookies
    - architecture MVC = rajouter pages ?
    - effacer les messages erreur php
    - if vides ? possibles de regrouper les conditions ?
    - est ce que les mesures de sécurité fonctionnent?
-->


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

	// Déclaration de variable pour les messages d'erreur et confirmation (par défault=false)
    $erreur= false;
  
    // si envoie du formulaire
    if (isset($_POST ['form_inscription'])){

        // Vérification si les champs sont définis
        if (isset($_POST['pseudo']) || isset($_POST['email']) || isset($_POST['pass']) || isset($_POST['pass_verif'])) {

            // On rend inoffensives les balises HTML que le visiteur a pu entrer
            $_POST['pseudo'] = htmlspecialchars($_POST['pseudo']); 
            $_POST['email'] = htmlspecialchars($_POST['email']); 
            $_POST['pass'] = htmlspecialchars($_POST['pass']); 
            $_POST['pass_verif'] = htmlspecialchars($_POST['pass_verif']); 


            // verif si mots de passe identiques
            if ($_POST['pass'] == $_POST['pass_verif'])
            {
                // hachage du mot de passe 
                $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            }
            else
            {
                $erreur= 'les mots de passe saisis ne sont pas identiques';
            }

            // limitation longueur du pseudo
            $pseudolength = strlen($_POST['pseudo']);
            if($pseudolength >= 3 && $pseudolength <= 20)
            {
                
            }
            else if ($pseudolength < 3 || $pseudolength > 20)
            {
                $erreur='Votre pseudo doit comporter au minimum 3 caractères et ne doit pas dépasser 20 caractères !';
            }

            // on met un cookie sur le pseudo
            setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);
            
            // vérification du pseudo dans la base de donneés 
            $reqPseudo = $bdd->prepare('SELECT pseudo FROM membres WHERE pseudo = ? ');
            $reqPseudo->execute(array($_POST['pseudo']));
            $verifPseudo = $reqPseudo->fetch();
            $reqPseudo->closeCursor();

            if (isset($_POST['pseudo']) != ($verifPseudo))
            {
                
            }
            else 
            {
                $erreur= 'le pseudo existe déjà, veuillez choisir un autre pseudo.';
            }
       
            // vérification format du mail
            if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])) 
            {
                
            }
            else
            {
                $erreur= 'l\'email saisi n\'est pas valide';
            }

            // vérification du mail dans la base de donneés
            $reqMail = $bdd->prepare('SELECT email FROM membres WHERE email = ? ');
            $reqMail->execute(array ($_POST['email']));
            $verifMail = $reqMail->fetch();
            $reqMail->closeCursor();

            if (isset($_POST['email']) != ($verifMail))
            {

            }
            else 
            {
                $erreur= 'Cet email existe déjà ! Connectez vous pour accéder à votre compte <a href="connexion.php">Connexion</a>';
            }
            
            // Si tout est ok, on ecrit les informations dans la base de données
            if (($erreur)== false && ($_POST['pseudo']) != ($verifPseudo['pseudo']) && ($_POST['email'] != $verifMail['email']) && ($_POST['pass'] == $_POST['pass_verif'])) {
                
                //Ecriture dans la base de données
                $reqEcriture = $bdd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES (:pseudo, :pass, :email, CURDATE())');
                $reqEcriture->execute(array(
                    'pseudo' => $_POST['pseudo'],
                    'pass' => $pass_hache,
                    'email' => $_POST['email']
                ));
                $reqEcriture->closeCursor();
                $conf_inscription= 'Votre inscription a bien été prise en compte !';
                // $confirmation_inscription = "<p style=\"color: Green;\">Bienvenue parmis nous!<br/><a href=\"connexion.php\">Connectez vous</a></p>";
            }
        }

        else 
        {
            $erreur='Un ou plusieurs champs n\'ont pas été complétés !';
        }
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Inscription</title>
        <link rel="stylesheet" href="style2.css">
    </head>
    <body>
        <h2>Formulaire d'inscription</h2>

        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="pseudo">Pseudo: </label></td>
                    <td><input type="text" name="pseudo" id="pseudo" placeholder="Votre pseudo"required></td>
                </tr>
                <tr>
                    <td><label for="email">Email: </label></td>
                    <td><input type="email" name="email" id="email" placeholder="Votre adresse email" required></td>
                </tr>
                <tr>
                    <td><label for="pass">Mot de passe: </label></td>
                    <td><input type="password" name="pass" id="pass" placeholder="Votre mot de passe" required></td>
                </tr>
                <tr>
                    <td><label for="pass_verif">Vérification mot de passe: </label></td>
                    <td> <input type="password" name="pass_verif" id="pass_verif" placeholder="Ressaisissez votre Votre mot de passe" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td> <br/> <input class="submit" type="submit" name= "form_inscription" value="Valider"/></td>
                </tr>
            </table> 
        </form>

        <?php 
        if(isset($erreur))
        {
            echo '<p class="alert">' . $erreur . '</p>'; 
        }
        ?>

    </body>
</html>