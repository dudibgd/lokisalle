<?php

echo'gsdf';
//====== INSCRIPTION DE NOUVEAU MEMBRE=====
/*if(isset($_POST['pseudo'])) 
	$pseudo = $_POST['pseudo'];
else
	$pseudo = '';  
// option 3 pour le formulaire d'inscription
(isset($_POST['prenom'])) ? $prenom = $_POST['prenom'] : $prenom = '';  
(isset($_POST['nom'])) ? $nom = $_POST['nom'] : $nom = '';  
(isset($_POST['email'])) ? $email = $_POST['email'] : $email = '';  
(isset($_POST['mdp'])) ? $mdp = $_POST['mdp'] : $mdp = '';   
(!isset($_POST['civilite'])) || (isset($_POST['civilite']) && $_POST['civilite']=='f') ? $civilite_f = ' checked' : $civilite_f = '';  // razmak mesto treba ispred CHECKED jer ce se posle pojaivit spojeno u HTML i time izazvati problem
(isset($_POST['civilite'])) && $_POST['civilite']=='m' ? $civilite_m= ' checked' : $civilite_m = ''; */




$content .= '<h2> Enregistrez vous </h2>';
//================== FIN DU NOUVEAU ==========


/*if($_POST){ //ovo znaci da je korisnik kliknuo na SUBMIT

	//===============CONTROLES ET ERREURS===============
	$erreur ='';

	if(strlen($_POST['pseudo']) <=3 || strlen($_POST['pseudo'])>20 ){

		$erreur.= '<span class="label label-danger">non, taille pseudo pas OK</span>';	
		$pseudo = '';	
	} 
	if(!preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['pseudo'])){

		$erreur.= '<span class="label label-danger">non, caracteres pseudo pas OK</span>';
		$pseudo = '';
	} */
	

	//======== CONTROLE DU PSEUDO ==========
/*	$result = $pdo->query("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]'");
	if($result->rowCount() >=1){ // s'il y a 1 résultat ou plus...
		$erreur.= '<span class="label label-danger">non, ce pseudo n\'est pas disponible</span>';
	}
*/
	//============== VALIDATION=========	
/*	if(empty($erreur)){


		//========== CRYPTAGE DE MPOT DE PASSE
		$_POST['mdp'] = password_hash($_POST['mdp'], PASSWORD_DEFAULT); 

		execute_requete("INSERT INTO membre (pseudo, mdp, nom, prenom, email, ville, code_postal, adresse, civilite, date_enregistrement) VALUES('$_POST[pseudo]', '$_POST[mdp]', '$_POST[nom]', '$_POST[prenom]', '$_POST[email]', '$_POST[ville]', '$_POST[code_postal]', '$_POST[adresse]', '$_POST[civilite]', NOW())");

		// ======================
		$content .= '<span class="label label-success">Bravo, OK</span>'; //necemo nista pisati jer odmah redirektujemo korisnika na LogIn, tako da se ovaj komad teksta moze i skinuti
		header('location:'.URL.'?page=connexion&inscription=ok'); // fonction prédéfini qui permet de rédiriger l'internaute
		//======================

	} */

	//======== TRANSMISSION DES ERREURS AU CONTENU: =============
/*	$content .= $erreur; 
}
*/

//============== FORMULAIRE INSCRIPTION==============

// option 1 (conditioons contractée, ternaire)
// $pseudo = isset($_POST['pseudo'])) ? $_POST['pseudo'] : '';

/*
$content .= '<h2> Enregistrez vous </h2>
<form method="post" action="">
	<input type="text" name="pseudo" placeholder="Votre pseudo" value="'.$pseudo.'">
	<input type="text" name="prenom" placeholder="Votre prenom" value="'.$prenom.'"/>
	<input type="text" name="nom" placeholder="Votre nom" value="'.$nom.'"/> 
	<br><br><br>

	<div class="input-group">
  		<input name="email" type="text" class="form-control" placeholder="Recipient\'s username" aria-describedby="basic-addon2" value="'.$email.'">
  		<span class="input-group-addon" id="basic-addon2">@example.com</span>
	</div> 
	<br>

	<input type="text" name="mdp" placeholder="Votre MDP" value="'.$mdp.'">
	<br><br><br>

	<input type="text" name="ville" placeholder="Votre ville" value="'.$ville.'">
	<input type="text" name="code_postal" placeholder="Votre code postal" value="'.$code_postal.'">
	<input type="text" name="adresse" placeholder="Votre adresse" value="'.$adresse.'">
	<br><br><br>

	<div class="form-group" role="group" aria-label="...">
  		<input type="radio" class="btn btn-default" value="f" name="civilite"'.$civilite_f.'>Femme<br>
  		<input type="radio" class="btn btn-default" value="m" name="civilite"'.$civilite_m.'>Homme
	</div>


	<br><br><br>
	<input type="submit" value="Envoi"/>
</form>';*/
?>