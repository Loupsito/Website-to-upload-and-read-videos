
$("#fromToUpload").on("submit", function(event){
	event.preventDefault(); //On empêche de submit le form
	var form = $(this);
	var formdata = false;
	
	if (window.FormData){
		formdata = new FormData(form[0]);
	}
	
	var formAction = form.attr('action');
	
	$.ajax({
		xhr: function() { // xhr qui traite la barre de progression
			myXhr = $.ajaxSettings.xhr();
			if(myXhr.upload){ // vérifie si l'upload existe
				myXhr.upload.addEventListener('progress',afficherAvancement, false);
			}
			return myXhr;
		},
		
		url         : 'uploadFichier.php',
		data        : formdata ? formdata : form.serialize(),
		cache       : false,
		contentType : false,
		processData : false,
		type        : 'POST',
		success     : function(data, textStatus, jqXHR){
			// alert("Upload terminé !" +"---"+textStatus+"---"+jqXHR);
			window.location.reload(false);
		}
	});
 });
						 

function afficherAvancement(e){
   if(e.lengthComputable){
	  $('progress').attr({value:e.loaded,max:e.total});
   }
}

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