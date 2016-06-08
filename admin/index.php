<?php 
require_once('../inc/init.inc.php');

if($_GET) 
{
	if(file_exists($_GET['page'] . '.php')) // si le fichier existe
		require_once($_GET['page'] . '.php'); // on le charge (inclusion)
	else // sinon (on ne trouve pas le fichier)
		$content .= '<div class="alert alert-danger">la demande n\'a pas pu aboutir</div>'; // et ensuite le message d'erreur
}

?>
PAGE INDEX NAV ADMIN


 		<div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="?page=gestion-des-produits">Gestion des produits</a></li>
            <li><a href="?page=gestion-des-membres">Gestion des membres</a></li>
            <li><a href="?page=gestion-des-salles">Gestion des salles</a></li>
            <li><a href="?page=deconnexion">Deconnexion</a></li>
            <li><a href="<?= URL; ?>">Retour Front</a></li>
          </ul>
        </div><hr>

<?php
echo $content; 