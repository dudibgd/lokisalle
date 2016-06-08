<?php

    $content .= 'PAge de Fiche Produit';

    

if(isset($_GET['id_produit'])){
    $content .='ok';
 
	$resultat = $pdo->query("
			SELECT s.*, p.*
			FROM produit p, salle s
			WHERE p.id_salle = s.id_salle
			AND id_produit = $_GET[id_produit]
			");


    $produits = $resultat->fetch(PDO::FETCH_ASSOC);
/*debug($produits);*/



if(isset($_GET['reservation'])){

	/*header()*/
	execute_requete("UPDATE produit SET etat TO FROM produit WHERE id_produit = $_GET[id_produit]");
}




$content .= '


<p><a  href="?page=profil&action=reservation&id_salle=' . $salles["id_salle"] . '">class="btn btn-primary btn-large">Reservation</a>
            </p>


		<header class="jumbotron hero-spacer"><strong>' . $produits['titre'] . '</strong>
				<div>
					<img height="100" width="100" src="'.$produits['photo'].'">";					
				</div>
				<div>
									<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q='. $produits['adresse'].' ' .$produits['ville'].' '.$produits['cp'] . '&amp;output=embed"></iframe><br />

					<p>Description : '.$produits['description'].'</p>
					<p>Adresse : '.$produits['adresse'].'</p>
					<p>Code postal : '.$produits['cp'].'</p>
				</div>
	            <p>Informations complémentaires</p>
	            <p>Arrivée : '.$produits['date_arrivee'].'</p>
	            <p>Depart : '.$produits['date_depart'].'</p>
	            <p>Capacite : '.$produits['capacite'].'</p>
	            <p>Categorie : '.$produits['categorie'].'</p>
	            <p>Adresse : '.$produits['adresse'].'</p>
	            <p>Tarifs : '.$produits['prix'].'</p>

	          

        </header>';


                $content .= "<strong>$produits[pays]</strong><br>";
                $content .= "<strong>$produits[id_salle]</strong><br>";
                $content .= "<strong>$produits[ville]</strong><br>";
                $content .= "<strong>$produits[etat]</strong><br>";
                $content .= "<strong>$produits[etat]</strong><br>";

}else{
	$content .= 'mauvais';
}


$r = $pdo->query("
	SELECT s.*,p.*
	FROM salle s, produit p 
	WHERE s.id_salle = p.id_salle
	");


while($produit2 =  $r->fetch(PDO::FETCH_ASSOC))
{
	global $produit;
	if($produit2['id_produit'] != $produit['id_produit'] )
	$content.= '<a href="?page=ficheProduit&id_produit='. $produit2['id_produit'] .'"><img src="' . $produit2['photo'] . '"></a>' . '  ';
}

