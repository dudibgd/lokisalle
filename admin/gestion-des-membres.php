<?php
$content .= 'page Gestion des MEMBRES'; 

if($_POST) // si l'administrateur valide le formulaire
{

	
execute_requete("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, statut) VALUES ('$_POST[pseudo]','$_POST[mdp]', '$_POST[nom]','$_POST[prenom]','$_POST[email]','$_POST[civilite]','$_POST[statut]')");


$content .= 'Bravo, vous etes bien ajouté !';
}
//============================== SUPPRESSION D'UN PRODUIT ==============================//
if(isset($_GET['action']) && $_GET['action'] == 'suppression')
{
	
	
	 execute_requete("DELETE FROM membre WHERE id_membre = $_GET[id_membre]");

	 $content .= "vous avez demandé la suppression du membre : $_GET[id_membre] et maintenant membre supprimé!";
}





//============================== AFFICHAGE DES PRODUITS ==============================//
$resultat = $pdo->query('SELECT * FROM membre');
// echo $resultat->columnCount(); // nombre de colonne.
$content .= '<table class="table"><tr>';
for($i = 0; $i < $resultat->columnCount(); $i++) // Boucle sur les colonnes.
{
	$colonne = $resultat->getColumnMeta($i); // getColumnMeta recupère des informations sur les colonnes.
	$content .= "<th>$colonne[name]</th>";
}
$content .= '<th colspan="2">Actions</th>';
$content .= '</tr>';
while($membres = $resultat->fetch(PDO::FETCH_ASSOC)) // Boucle sur les données.
{
	$content .= '<tr>';
	$content .= "<td>$membres[id_membre]</td>";
	$content .= "<td>$membres[pseudo]</td>";
	$content .= "<td>$membres[mdp]</td>";
	$content .= "<td>$membres[nom]</td>";
	$content .= "<td>$membres[prenom]</td>";
	$content .= "<td>$membres[email]</td>";
	$content .= "<td>$membres[civilite]</td>";
	$content .= "<td>$membres[statut]</td>";
	// $content .= "<td>$membres[date_enregistrement]</td>";

	$content .= '<td><a href="?page=gestion-des-membres&action=modification&id_membre=' . $membres['id_membre'] . '">modif</a></td>'; // lien modification
	$content .= '<td><a href="?page=gestion-des-membres&action=suppression&id_membre=' . $membres['id_membre'] . '" onClick="return(confirm(\'En êtes vous certain ?\'))">suppression</a></td>'; // lien suppression
	$content .= '</tr>';
}
$content .= '</table><br><hr><br>';
//============================== AFFICHAGE DES PRODUITS ==============================//





$content .= '
<form method="post" action="">
	<label for="pseudo">Pseudo</label><br>
	<input type="text" id="pseudo" name="pseudo" maxlength="20" placeholder="votre pseudo" value=""><br>
	      
	<label for="mdp">Mot de passe</label><br>
	<!-- <input type="password" id="mdp" name="mdp" required value=""><br> -->
	<input type="text" id="mdp" name="mdp" required value=""><br>
	      
	<label for="nom">Nom</label><br>
	<input type="text" id="nom" name="nom" placeholder="votre nom" value=""><br>
	      
	<label for="prenom">Prénom</label><br>
	<input type="text" id="prenom" name="prenom" placeholder="votre prénom" value=""><br>

	<label for="email">Email</label><br>
	<!-- <input type="email" id="email" name="email" placeholder="xxx@gmail.com" value=""><br> -->
	<input type="text" id="email" name="email" placeholder="xxx@gmail.com" value=""><br>
	      
	<label for="civilite">Civilité</label><br>
	<input name="civilite" value="m" checked="" type="radio">Homme<br>
	<input name="civilite" value="f" type="radio">Femme<br>

	<label for="statut">Statut</label><br>
	<input name="statut" value="0" checked="" type="radio">Membre<br>
	<input name="statut" value="1" type="radio">Admin<br>

	<input type="submit" name="inscription" value="S\'inscrire">
</form>';