<?php
//-----------------------------------
function debug($d, $mode = 1){
	echo '<div style="background: lime; padding:5px; position:absolute; bottom:0; right:0; z-index:1000; position:fixed;">';
	
	$trace = debug_backtrace();
	echo 'Debug demandé dans le fichier <strong>'.$trace[0]['file'].'</strong> à la ligne <strong>'.$trace[0]['line'].'</strong>.';

	if($mode ==1){
		echo '<pre>'; print_r($d); echo '</pre>'; 
	} else {
		var_dump($d);
	}

	echo '</div>';
}
//-----------------------------------
function execute_requete($req){
	global $pdo; 
	$result = $pdo->query($req); // pour les protections concernant les injections SQL
	return $result;
}