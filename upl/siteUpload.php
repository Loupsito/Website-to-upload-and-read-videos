<!DOCTYPE html> 
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="CSS_Upload.css" type="text/css"> 
        <script src="jquery-2.2.0.js"></script>
        <script src="Animation.js"></script>
        <title>Uploader son fichier</title>         
    </head>
	<?php	
		require("uploadFichier.php");
	?>
    <body>
		<!-- ________Le formulaire et quelques indications________ -->
        <div id ='corps'>
            <h1 style="background-color:#DFDFDF; border-radius :10px;">Uploader son fichier</h1>
            <form action="uploadFichier.php" method="POST" enctype="multipart/form-data">
                <input type="file" name = 'fichier'/><br/><br/><br/>                                
                <input type="submit" value="VALIDATION" name='valider'/>
            </form>
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
			<br/><hr/><br/>			
        </div>      
		<br/><br/>	
		<!-- ________Notification de l'etat de l'upload - Pour savoir si l'upload s'est bien passe________ -->
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
        
		<!-- ________Zone montrant le contenu du dossier qui contient les fichier qui ont ete uploade________ -->
        <div id="listeFichier">
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
            ?>
        </div>            

		<!--________Petit pied de page________-->
        <footer style="text-align: center;">
            <h3>Outil pour uploader des fichiers</h3>
        </footer>
    </body>
</html>