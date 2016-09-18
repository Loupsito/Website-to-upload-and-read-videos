/* 
 * @param {string} element - la balise que l'on veut creer
 * @param {string} contenu - ce que va contenir la balise
 * @param {string} divMere - la division qui va contenir la nouvelle balise
 * @param {number} idd - nom de l'id a donnee
 */
//Fonction qui permet de creer la balise que l'on veut (<p>,<span>,etc, avec attribution d'un id)
function genereContenuID(element,contenu,divMere,idd)
{
    nouveauDiv = document.createElement(element);                //creation de l'element
    nouveauDiv.innerHTML = contenu;				 //Attribution d'un contenu
    nouveauDiv.id=idd;                                           //Attribution d'un id
    document.getElementById(divMere).appendChild(nouveauDiv);    //pour insérer dans une div qu'on aura donnee au prealable
}

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
    /*$(function() { 	
		var windowWidth= $(window).width();
		if(windowWidth < 590){
			$("#EtatUpload").css("margin-top","-20px").css("margin-left","0").css("margin-right","0");  
		}	   
	});*/
	
    if(etat==="Succes de l\'upload")
        $("#EtatUpload").css("background-color","#0FB7AC");//Fond vert
    else
        $("#EtatUpload").css("background-color","#CC2424");//Fond rouge
    
    $("#EtatUpload").hide().fadeIn(2000);                                        
}