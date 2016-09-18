<?php
$tailleMAX=200000000;	
$extensions = array('.mp4');	 
$dossier = '../videos/';
if(isset($_FILES['fichier']))
{ 		 	      
     $fichier = basename($_FILES['fichier']['name']);	 
	 $extension = strrchr($_FILES['fichier']['name'], '.');// récupère la partie de la chaine à partir du dernier . pour connaître l'extension.	 	 
	 $taille = filesize($_FILES['fichier']['tmp_name']);
	 	 	
	 //-----------------GESTION DES EXTENTIONS-----------------
	 if(!in_array($extension, $extensions)) 
	 {
		$erreur = 'extension';		
	 }	 	 	 	 
	 //------------GESTION DE LA TAILLE DES FICHIERS------------
	 if ($taille>$tailleMAX)
	 {
		$erreur = 'taille';
		header('Location:siteUpload.php?etat=taille');
		echo "taille";
	 }	 	
	 //-------VERIFICATION SI UN FICHIER A ETE SELECTIONNE-------
	 if($fichier=="")
	 {
		$erreur = 'vide';
	 }
	 
	 function wd_remove_accents($str,$charset='utf-8')	 
		{			
			$str = htmlentities($str, ENT_NOQUOTES, $charset);
			
			$str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
			$str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
			$str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères
			
			return $str;
		}
	 
	if(!isset($erreur))
	{
		//-------------GESTION DES NOMS DE FICHIERS------------		 			
		//pour numerote les fichiers
		$nb_fichier = 0;                            
        if($directory = opendir('./../videos'))
        {
			while(false !== ($lesFichiers = readdir($directory)))
            {
				if($lesFichiers != '.' && $lesFichiers != '..' && $lesFichiers != 'index.php')
                {
					$nb_fichier++;                            														
                }
            }
        }						
		
		//Suppression des accents
		$fichier = wd_remove_accents($fichier);				 		
		
		echo ">>".$dossier.$nb_fichier.") ".$fichier;
		 
		 //-----------------UPLOAD DU FICHIER-----------------
		 if(move_uploaded_file($_FILES['fichier']['tmp_name'],$dossier.$nb_fichier.") ".$fichier))      
		 {
			  header('Location:siteUpload.php?etat=succes');
		 }		 		 
		 /*
		 * Note : une taille de base max est defini par php.ini 
		 *        Si la taille du fichier depasse cette taille, 
		 *        la fonction 'move_uploaded_file' renvoi false (on envoie donc 'echec' a siteUpload.php)
		 * /!\ Attention /!\ : Si La taille du fichier depasse 8 mo , cela depassera la limite d'envoi permis avec la methode POST
		 */		 
		 else
		 {
			  header('Location:siteUpload.php?etat=echec');
		 }    
	}	 
	else
	{
		header('Location:siteUpload.php?etat='.$erreur.'');				
	}
}
?>