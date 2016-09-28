<?php
	require("uploadFichier.php");
?>
<!-- ________The form and some indication________ -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<h1>Uploader son fichier</h1>
					<form id="fromToUpload" action="" enctype="multipart/form-data" method="post">
						<div class="row">
							<div class="col-md-12">
								<label class="btn btn-primary" for="my-file-selector">
									<input required name = 'fichier' id="my-file-selector" type="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val());">
									Browse
								</label>
								<span class='label label-info' id="upload-file-info"></span>
							</div>
							<div class="col-md-12 top-buffer">
								<button id="fileToSend" class="btn btn-default" type='submit'>Valider</button>
							</div>
						</div>
					</form>
										
					<progress id="progress" width="100px" value="0" max="100"></progress>
					
					<?php
						echo " Taille maximum autorisé : ".$tailleMAX/1000000 ." mo<br/>";
						echo "Format de fichier autorisé : ";
						$c=0;
						foreach($extensions as $element)
						{
							echo " ".$extensions[$c];
							$c++;
						}
					?>

					<!-- ________Notification of the status of the upload - To know if the upload went well________ -->
					<div id="notif">
						<?php
							if(isset($_GET['etat']))
							{
								if($_GET["etat"] == "echec")
								{
									echo "<script>notifEtatUpload('Echec de l\'upload');</script>";
								}
								else if($_GET["etat"] == "succes")
								{
									echo "<script>notifEtatUpload('Succes de l\'upload');</script>";
								}
								else if($_GET["etat"] == "extension")
								{
									echo "<script>notifEtatUpload('Format de fichier non autorisé. Seul les formats : ".implode($extensions,",")." sont autorisé');</script>";
								}
								else if($_GET["etat"] == "taille")
								{
									echo "<script>notifEtatUpload('Taille de fichier trop important. Taille max autorisé : ".$tailleMAX/1000000 ." mo');</script>";
								}
								else if($_GET["etat"] == "vide")
								{
									echo "<script>notifEtatUpload('Veuillez choisir un fichier à uploader');</script>";
								}
							}			
						?>
					</div>
				</div>

				
				<!-- ________Area showing the contents of the folder that contains the file that were uploaded________ -->
				<div class="col-md-6">
					<h2>Contenu du dossier</h2>
					<?php
						$nb_fichier = 0;
						echo '<ul>';
						if($dossier = opendir('./../videos'))
						{
							while(false !== ($fichier = readdir($dossier)))
							{
								if($fichier != '.' && $fichier != '..' && $fichier != 'index.php')
								{
									$nb_fichier++;
									echo '<li><a href="./videos/' . $fichier . '">' . $fichier . '</a></li>';
								}
							}
						}
						echo '</ul>';
					?>									
				</div>
				<div class="container">
						<div class="row">						
							<div class="col-md-offset-6 col-md-10">
								<?php
									if(!isset($_SESSION['login']))
									{		
										header('Location:index.php');
									}
									else
									{
										echo "<form action='commandes.php' method='GET'>
												<input class='btn btn-default' type='submit' value='Déconnexion' />
												<input type='hidden' name='action' value='deco' >
											  </form>";
									}
								?>
							</div>
						</div>
				</div>
				

			</div>
			<script src="functionJS.js"></script>
		</div>