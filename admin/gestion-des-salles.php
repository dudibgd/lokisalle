<?php
$content .= 'page Gestion des SALLES'; 
//============================== ENREGISTREMENT D'UN PRODUIT ==============================//
if($_POST) // si l'administrateur valide le formulaire
{

	$photo_bdd = '';
	if(!empty($_FILES['photo']['name'])) // si il y a une photo
	{
		$photo_bdd = URL . "img/$_POST[titre]_" . $_FILES['photo']['name'] ; // cette variable nous permettra de sauvegarder le chemin dans la base.
		// $content .= "<h1>chemin bdd => $photo_bdd</h1>";
		$photo_dossier = RACINE . "img/$_POST[titre]_" . $_FILES['photo']['name'] ; // cette variable nous permettra de sauvegarder la photo dans le dossier
		// $content .= "<h1>chemin dossier => $photo_dossier</h1>";
		copy($_FILES['photo']['tmp_name'], $photo_dossier); // copy permet de sauvegarder un fichier sur le serveur.
	}







	execute_requete("INSERT INTO salle (titre, description, photo, pays, ville, adresse, cp, capacite, categorie) VALUES ('$_POST[titre]','$_POST[description]', '$photo_bdd', '$_POST[pays]','$_POST[ville]','$_POST[adresse]','$_POST[cp]','$_POST[capacite]','$_POST[categorie]')");

	$content .= '<div class="alert alert-success">Le produit a bien été ajouté ;) !</div>';
}
//============================== SUPPRESSION D'UN PRODUIT ==============================//
if(isset($_GET['action']) && $_GET['action'] == 'suppression')
{
	
	
	 execute_requete("DELETE FROM salle WHERE id_salle = $_GET[id_salle]");

	 $content .= "vous avez demandé la suppression du produit : $_GET[id_salle] et maintenant produit supprimé!";
}

//============================== AFFICHAGE DES PRODUITS ==============================//
$resultat = $pdo->query('SELECT * FROM salle');
// echo $resultat->columnCount(); // nombre de colonne.
$content .= '<table class="table"><tr>';
for($i = 0; $i < $resultat->columnCount(); $i++) // Boucle sur les colonnes.
{
	$colonne = $resultat->getColumnMeta($i); // getColumnMeta recupère des informations sur les colonnes.
	$content .= "<th>$colonne[name]</th>";
}
$content .= '<th colspan="2">Actions</th>';
$content .= '</tr>';
while($salles = $resultat->fetch(PDO::FETCH_ASSOC)) // Boucle sur les données.
{



	foreach($salles as $indice => $valeur)
	{
		if($indice == 'photo') 
			$content .= "<td><img style{height:10px} src=\"$valeur\" class=\"image-back-office\"></td>";
		else 
			$content .= "<td>$valeur</td>";
	}











	$content .= '<tr>';
	$content .= "<td>$salles[id_salle]</td>";
	$content .= "<td>$salles[titre]</td>";
	$content .= "<td>$salles[description]</td>";
	$content .= "<td>$salles[photo]</td>";
	$content .= "<td>$salles[pays]</td>";
	$content .= "<td>$salles[ville]</td>";
	$content .= "<td>$salles[adresse]</td>";
	$content .= "<td>$salles[cp]</td>";
	$content .= "<td>$salles[capacite]</td>";
	$content .= "<td>$salles[categorie]</td>";

	$content .= '<td><a href="?page=gestion-des-salles&action=modification&id_salle=' . $salles['id_salle'] . '">modif</a></td>'; // lien modification
	$content .= '<td><a href="?page=gestion-des-salles&action=suppression&id_salle=' . $salles['id_salle'] . '" onClick="return(confirm(\'En êtes vous certain ?\'))">suppression</a></td>'; // lien suppression
	$content .= '</tr>';
}
$content .= '</table><br><hr><br>';
// ===================================== FORMULAIRE ==================================
$content .= '
<form method="post" action="" enctype="multipart/form-data">
	<div class="col-md-5 ">
		<div class="form-group">
			<label for="titre">Titre</label>
			<input type="text" name="titre" id="titre" class="form-control" />
		</div>

		<div class="form-group">
			<label for="description">Description</label>
			<textarea name="description" id="description" placeholder="Description" class="form-control" ></textarea>
		</div>

		<!--================ PHOTO =====================--> 
		<div class="form-group">
			<label for="photo">Photo</label>
			<input type="text" name="photo" id="photo" class="form-control" />
		</div>

		<div class="form-group">
			<label for="capacite">Capacité</label>
			<input type="number" name="capacite" id="capacite" class="form-control" />
		</div>
	</div>

	<div class="col-md-5 col-md-offset-2">
		<div class="form-group">
			<label for="categorie">Categorie</label>
			<select name="categorie" class="form-control" >
				<option value="reunion">Reunion</option>
				<option value="bureau">Bureau</option>
				<option value="formation">Formation</option>
			</select>
		</div>

		<div class="form-group">
			<label for="pays">Pays</label>
			<input type="text" name="pays" id="pays" class="form-control" />
		</div>

		<div class="form-group">
			<label for="ville">Ville</label>
			<input type="text" name="ville" id="ville" class="form-control" />
		</div>

		<div class="form-group">
			<label for="adresse">Adresse</label>
			<input type="text" name="adresse" id="adresse" class="form-control" />
		</div>

		<div class="form-group">
			<label for="cp">Code Postal</label>
			<input type="number" name="cp" id="cp" class="form-control" />
		</div>
		
		<div class="form-group">
			<input type="submit" value="Ajouter" />
		</div>
	</div>

</form>';