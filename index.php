<!DOCTYPE html> 
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="myCSS.css" type="text/css">   
        <title>My video Personnal</title>         
    </head>	
    <body id="Main">		        
        <div id="titrePage" data-myValue="Accueil"></div>     
		
		<div id="enTeteCorps">	
			<h1>My videos Personnal</h1>
			<a style="top:-15px; position: relative;" href="upl/" target="_blanck">Upload videos</a>		
		</div>
		
		
        <div id ='corps'>	
			<?php			
			$nb_fichier = 0;
                echo '<ul>';                
                if($dossier = opendir('./videos'))
                {
                    while(false !== ($fichier = readdir($dossier)))
                    {
                        if($fichier != '.' && $fichier != '..' && $fichier != 'index.php')
                        {
                            $nb_fichier++;                            	
							$id = '"'.'video'.$nb_fichier.''.'"';
							echo "							
							<div class='accueilZone'>               				
								<h2>$fichier</h2>
								<button type=button onclick='displayOn($id);'>Afficher/cacher Video</button>
								</br></br>
								<video id='video$nb_fichier' controls width='720' height='405'>					
									<source src='videos/$fichier' type='video/mp4' type='video/mp4'>
								</video>								
							</div>							
							";
                        }
                    }
                }       			
			?>
			
			<script>
				function displayOn(id)
				{					
					var myDiv = document.getElementById(id);									
					if(myDiv.style.display==="none" || myDiv.style.display==="")          
					{
						myDiv.style.display = "block";                						
					}
				   else
				   {
						myDiv.style.display = "none";						
				   }
				}
			</script>
        </div>             
    </body>
</html>