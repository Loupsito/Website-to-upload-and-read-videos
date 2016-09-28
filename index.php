<!DOCTYPE html> 
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="functionJS.js"></script>
		<title>My video Personnal</title>
	</head>
	<body>

		<nav class="navbar navbar-default">
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="upl/">Upload videos</a></li>
				</ul>
			</div>
		</nav>

		<div class="container-fluid">
			<h1>My videos Personnal</h1>

			<div class="row">
			<?php

			//number of files
			$nb_fichier = 0;

			//---------Content directory---------
			if($dossier = opendir('./videos'))
			{
				while(false !== ($fichier = readdir($dossier)))
				{
					if($fichier != '.' && $fichier != '..' && $fichier != 'index.php')
					{
						$nb_fichier++;
						$id = '"'.'video'.$nb_fichier.''.'"';

						echo "
						<div class='col-md-6 gutter'>
							<div class='thumbnail'>
								<h2>$fichier</h2>
								<button class='btn btn-primary' onclick='displayOn($id);'>Afficher/cacher Video</button>
								</br></br>
								<div align='center' class='embed-responsive embed-responsive-16by9' id='video$nb_fichier' style='display:none;'>
									<video controls class='embed-responsive-item'>
										<source src='videos/$fichier' type='video/mp4' type='video/mp4'>
									</video>
								</div>
							</div>
						</div>
						";
					}
				}
			}
			//----------------------------------			
			
			?>
			</div>			

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
