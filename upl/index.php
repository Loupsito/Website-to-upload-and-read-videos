<?php
session_start();
?>
<!DOCTYPE html> 
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../style.css">
		<title>Upload Videos</title>
	</head>
	<body>

		<nav class="navbar navbar-default">
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="../">Home</a></li>
					<li class="active"><a href="upl/">Upload videos</a></li>
				</ul>
			</div>
		</nav>

		<div class="container-fluid">

			<h1>Upload Videos</h1>

			<h2>Connexion</h2>
			<form action='index.php' method='post' class="form-horizontal">
				<div class="form-group">
					<label class="col-md-2 control-label">Login</label>
					<input class="col-md-10" type='text' name = 'login' placeholder="Login" size='30'/>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Mot de passe</label>
					<input class="col-md-10" type ='password' name='mdp' placeholder= "Mot de passe" size='30'/>
				</div>
				<div class="form-group">
					<div class="col-md-offset-2 col-md-10">
						<button class="btn btn-default" type='submit'>Connexion</button>
					</div>
				</div>
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
							echo "Le login et/ou le mot de passe ne sont pas valide";	 // if it's wrong : return to the login page and  and indication of "false"
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