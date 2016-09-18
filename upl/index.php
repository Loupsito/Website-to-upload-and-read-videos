<?php
session_start();
?>
<!DOCTYPE html> 
<html>
    <head>
        <meta charset="UTF-8">
		<link rel="stylesheet" href="myCSS.css" type="text/css">   
        <title>Upload Videos</title>         
    </head>	
    <body>		        		

        <div id="name"><h1>Upload Videos</h1></div>
            <div id="zoneDeConnexionContenu">
                <h2>Connexion</h2>		
                <form id="formulaireDeConnexion" action='index.php' method='post' class="element">
                    <table>				
                        <tr><td>Votre login :</td><td><input type='text' name = 'login' placeholder="login..." size='30'/></td></tr>     
                        <tr><td>Mot de passe :</td><td><input type ='password' name='mdp' placeholder= "Mot de passe..." size='30'/></td></tr>  					
                    </table>
                    <input id="boutonConnexion" type='submit' value='Validation' name='valider'/>
                </form>

                <?php
                //temporary connection information
                $valid_login = "adminLoup";
				$valid_mdp = "ceSontMesVideos78!";

                if (!isset($_SESSION["login"])) {//verification existence of the session
                    if (isset($_POST['login'])and isset($_POST['mdp'])) {
                        $log = $_POST['login'];
                        $pass = $_POST['mdp'];
                    }
                    if ((isset($log)) and ( isset($pass))) {//verification existence of the login and the password
                        if (!empty($log) and ! empty($pass)) {//verification si les variable login et mdp ne sont pas vide
                            if (($log != $valid_login) or ( $pass != $valid_mdp)) {//verification if login and mdp are valid
                                echo "Le login et/ou le mot de passe ne sont pas valide";     // if it's wrong : return to the login page and  and indication of "false"
                                $_SESSION['erreur'] = "faux";
                            }
                            else {
                                $_SESSION['login'] = $log;
                                header('Location:siteUpload.php');   //If it's valid : redirection to the pageIntranet
                            }
                        }
                        else {
                            echo "Veuillez remplir toutes les zones";  //Else : return to the login page and indication of "empty"
                            $_SESSION['erreur'] = "vide";
                        }
                    }
                    if (!isset($_SESSION['erreur'])) {
                        echo "<script>animationConnexion();</script>";
                    }
                }
                else {
                    header('Location:siteUpload.php');
                }
                ?>
            </div>        			
    </body>
</html>