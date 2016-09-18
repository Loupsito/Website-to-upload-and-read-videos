/* 
 * @param {string} element - the tag that is to be created
 * @param {string} contenu - the futur content of the tag
 * @param {string} divMere - the id of the tag who will contains the new tag
 * @param {number} idd - the id to the new tag
 */
//Function to create the tag you want (<p> <span>, etc. with assigning an id)
function genereContenuID(element,contenu,divMere,idd)
{
    nouveauDiv = document.createElement(element);                //Creation of the element
    nouveauDiv.innerHTML = contenu;				 				 //Assigning content
    nouveauDiv.id=idd;                                           //Assigning an id
    document.getElementById(divMere).appendChild(nouveauDiv);    
}
/**
*  This function assign a color to the panel notification
*  @param {string} etat - Message of the notification
*/
function notifEtatUpload(etat)
{
    genereContenuID("div",etat,"notif","EtatUpload");        
    $("#EtatUpload").
            css("position","relative").            
            css("width","300px").
            css("height","60px").
            css("text-align","center").            
			css("vertical-align","middle").            
            css("border-radius","2px").
            css("margin-left","auto").
			css("padding-top","26px").			
            css("margin-right","auto").
            css("margin-bottom","-86px").
			css("margin-top","0px");             
			
    //Notification to indicate the succes of the upload
	if(etat==="Succes de l\'upload")
        $("#EtatUpload").css("background-color","#0FB7AC");//background green
    
	//Other case : if the upload doesn't success
	else
        $("#EtatUpload").css("background-color","#CC2424");//background red
    
    $("#EtatUpload").hide().fadeIn(2000);                                        
}