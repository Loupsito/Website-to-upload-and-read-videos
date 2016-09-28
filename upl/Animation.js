/* 
 * @param {string} element - the tag that is to be created
 * @param {string} contenu - the futur content of the tag
 * @param {string} divMere - the id of the tag who will contains the new tag
 * @param {number} idd - the id to the new tag
 */
//Function to create the tag you want (<p> <span>, etc. with assigning an id)
function genereContenuID(element,contenu,divMere,idd)
{
    nouveauDiv = document.createElement(element);               //Creation of the element
    nouveauDiv.innerHTML = contenu;                              //Assigning content
    nouveauDiv.id=idd;                                         //Assigning an id
    document.getElementById(divMere).appendChild(nouveauDiv);
}
/**
*  This function assign a color to the panel notification
*  @param {string} etat - Message of the notification
*/
function notifEtatUpload(etat)
{
    genereContenuID("div",etat,"notif","EtatUpload");

    //Notification to indicate the succes of the upload
    if(etat==="Succes de l\'upload")
        $("#EtatUpload").attr("class","bg-success");//background green

    //Other case : if the upload doesn't success
    else
        $("#EtatUpload").attr("class","bg-danger");//background red

    $("#EtatUpload").hide().fadeIn(2000);
}

function notifConnexion(msg)
{	
	$("#notifCo").append("<div class='alert alert-danger' id='myAlert'>"
							+"<a href='#' class='close'>&times;</a>"
								+msg
						+"</div>");
}