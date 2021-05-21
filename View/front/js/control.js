function verifInscrit() {
	// Outils
	var letters = /^[A-Za-z]+$/;
	var numbers = /^[0-9]+$/;



	//Fomulaire Inscription
    var errors="";
    var nomut=document.getElementById('nomut').value;
	var mdp=document.getElementById('mdp').value;
	var email=document.getElementById('email').value;
	var nomp=document.getElementById('nomp').value;
	var pays=document.getElementById('pays').value;
	var adresse=document.getElementById('adresse').value;
	var tel=document.getElementById('tel').value;
	var sexe=document.getElementById('sexe').value;



	if (nomut.length > 20)
	{
        alert(" Verifier votre Nom d'utilisateur svp !");
		return false;
    }

	if(nomp.match(numbers) || nomp.length > 20)
	{
        alert(" Verifier votre Nom et Prenom svp !");
		return false;
	}

	if (!pays.match(letters) || pays.length > 20){
        alert(" Verifier votre Pays svp !");
		return false;
	}

	if(email.indexOf("@") == -1 || email.indexOf(".") == -1)
	{
		alert(" Verifier votre Email svp !");
		return false;
	}

	if(mdp.length > 20){
		alert(" Minimaliser votre Mot de passe svp !");
		return false;	
	}

	if(tel.length != 8)
	{
		alert(" verifier votre Numero svp !");
		return false;
	}


	return true;
}



function verifContact(){
	// Outils
	var letters = /^[A-Za-z]+$/;
	var numbers = /^[0-9]+$/;

	//Formulaire Contact us

	var titre=document.getElementById('tit').value;
	var message=document.getElementById('descRec').value;

	alert(titre);

	if(titre.length > 20)
	{
		alert(" verifier votre Titre svp !");
		return false;		
	}

	if(message.length > 100)
	{
		alert(" verifier votre Message svp !");
		return false;		
	}

	return true;
}



function verifAvis(){
	var nomUt=document.getElementById('nomUt').value;
	var emailUt=document.getElementById('emailUt').value;
	var message=document.getElementById('message').value;

	if(emailUt.indexOf('@') == -1){
		alert(" verifier votre Email svp !");
		return false;	
	}

	if(message.length>50){
		alert(" verifier votre message svp !");
		return false;
	}
	return true;
}