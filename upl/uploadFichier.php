<?php

//maximum size authorized for upload
$tailleMAX=200000000;	

//Array of the extensions authorized
$extensions = array('.mp4');	 

//The directory : Where the file will be upload
$dossier = '../videos/';

/**
*
* Remove the accents present in a string
* @param $str - The string
*/
function wd_remove_accents($str,$charset='utf-8')	 
{			
	$str = htmlentities($str, ENT_NOQUOTES, $charset);	
	$str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
	$str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); 
	$str = preg_replace('#&[^;]+;#', '', $str);	
	return $str;
}

if(isset($_FILES['fichier']))
{ 		 	      
     $fichier = basename($_FILES['fichier']['name']);	  //recover the file name
	 $extension = strrchr($_FILES['fichier']['name'], '.');// recover part of the chain from the last "." to know the extension. 	 
	 $taille = filesize($_FILES['fichier']['tmp_name']);  //recover the file size
	 	 	
	 //-----------------MANAGEMENT EXTENSIONS-----------------	 	 	
	 if((!in_array($extension, $extensions)) or (mime_content_type($_FILES['fichier']['tmp_name'])!='video/mp4')) 
	 {
		$erreur = 'extension';		
	 }	 	 	 	 
	 //------------MANAGEMENT FILE SIZE------------
	 if ($taille>$tailleMAX)
	 {
		$erreur = 'taille';
		header('Location:index.php?etat=taille');
		echo "taille";
	 }	 	
	 //-------CHECKING IF FILE WAS SELECTED-------
	 if($fichier=="")
	 {
		$erreur = 'vide';
	 }	 
	 
	if(!isset($erreur))
	{
		//-------------MANAGEMENT OF NAMES FILES------------		 			
		//to number the files
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
		
		//Removing accents
		$fichier = wd_remove_accents($fichier);				 		
		
		echo ">>".$dossier.$nb_fichier.") ".$fichier;
		 
		 //-----------------UPLOAD FILE-----------------
		 if(move_uploaded_file($_FILES['fichier']['tmp_name'],$dossier.$nb_fichier.") ".htmlentities($fichier)))      
		 {
			  header('Location:index.php?etat=succes');
		 }		 		 		 
		 else
		 {
			  header('Location:index.php?etat=echec');
		 }    
	}	 
	else
	{
		header('Location:index.php?etat='.$erreur.'');				
	}
}
?>