<?php

if($_POST){
execute_requete("INSERT INTO produit (date_arrivee, date_depart, id_salle, prix) VALUES ('$_POST[date_arrivee]', '$_POST[date_depart]','$_POST[id_salle]','$_POST[prix]')");

$content .= '<div class="alert alert-success">Le produit a bien été ajouté ;) !</div>';
}else{
	$content .= 'erreur'; 
}


//============================== SUPPRESSION D'UN PRODUIT ==============================//
if(isset($_GET['action']) && $_GET['action'] == 'suppression')
{
	
	
	 execute_requete("DELETE FROM produit WHERE id_produit = $_GET[id_produit]");

	 $content .= "vous avez demandé la suppression du produit : $_GET[id_produit] et maintenant produit supprimé!";
}




//============================== AFFICHAGE DES PRODUITS ==============================//
$resultat = $pdo->query('SELECT * FROM produit');
// echo $resultat->columnCount(); // nombre de colonne.
$content .= '<table class="table"><tr>';
for($i = 0; $i < $resultat->columnCount(); $i++) // Boucle sur les colonnes.
{
	$colonne = $resultat->getColumnMeta($i); // getColumnMeta recupère des informations sur les colonnes.
	$content .= "<th>$colonne[name]</th>";
}
$content .= '<th colspan="2">Actions</th>';
$content .= '</tr>';
while($produit = $resultat->fetch(PDO::FETCH_ASSOC)) // Boucle sur les données.
{
	$content .= '<tr>';
	$content .= "<td>$produit[id_produit]</td>";
	$content .= "<td>$produit[date_arrivee]</td>";
	$content .= "<td>$produit[date_depart]</td>";
	$content .= "<td>$produit[id_salle]</td>";
	$content .= "<td>$produit[prix]</td>";
	$content .= "<td>$produit[etat]</td>";

	$content .= '<td><a href="'.URL.'?page=ficheProduit&id_produit=' .$produit['id_produit']. '"><i class="fa fa-search-plus" aria-hidden="true">Go</i></a></td>'; 




	$content .= '<td><a href="?page=gestion-des-produits&action=modification&id_produit=' . $produit['id_produit'] . '">modif</a></td>'; // lien modification
	$content .= '<td><a href="?page=gestion-des-produits&action=suppression&id_produit=' . $produit['id_produit'] . '" onClick="return(confirm(\'En êtes vous certain ?\'))">suppression</a></td>'; // lien suppression
	$content .= '</tr>';
}
$content .= '</table><br><hr><br>';
//============================== AFFICHAGE DES PRODUITS ==============================//

$content .= '<form method="post">

<!-- date arrivée -->
	<input name="date_arrivee" type="date" > Date d\'arrivée <br>

<!-- date départ -->
	<input name="date_depart" type="date" > Date de départ <br>
';

	$content .= '<select name="id_salle">';

	$resultat = $pdo->query('SELECT * FROM salle');
	while($salles = $resultat->fetch(PDO::FETCH_ASSOC))
	{
		
	 

		$content.= '<option  value="'. $salles["id_salle"] .' ">'.$salles["titre"].' - '. $salles["description"].' - '. $salles["capacite"].' - '.$salles["adresse"] .'</option>';	
	}
	$content .='</select>


	<div class="input-group">
	  <span class="input-group-addon">$</span>
	  <input name="prix" placeholder="combien?" type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
	  <span class="input-group-addon">.00</span>
	</div>	


	<input type="submit">

</form>
';

