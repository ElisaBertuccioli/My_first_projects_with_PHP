<?php

// Recuperation du contenu des champs du formulaire

	if(isset($_POST['nom'])){
		$nom = htmlentities(urldecode($_POST['nom']));
		}else{
			$nom = "";
		}

	if(isset($_POST['prenom'])){
			$prenom = htmlentities(urldecode($_POST['prenom']));
		}else{
			$prenom = "";
		}

	if(isset($_POST['ville_naissance'])) {
			$ville_naissance = htmlentities(urldecode($_POST['ville_naissance']));
		}else{
			$ville_naissance = "";
		}

	if(isset($_POST['message'])){
			$message = htmlentities(urldecode($_POST['message']));
		}else{
			$message = "";
		}
	
//definition d'une nouvelle variable pour afficher date et heure locale à paris

	setlocale(LC_TIME, 'fr_FR');
	date_default_timezone_set('Europe/Paris');
	$date = utf8_encode(strftime('%d/%m/%Y, %H:%M'));

	
//1ere tentative de verification longeur du message -- NE MARCHE PAS
/*	function verifierMessage($texteMessage){
		$longeur_texteMessage = strlen($texteMessage);
		if ($longeur_texteMessage > 100) {
			return true;
		}else{
			return false;
		}
	}
	$verification = verifierMessage($message);
*/

// 2eme tentative de verification longeur du message -- NE MARCHE PAS

	$longeur_message = strlen($message);
	$verification = ($longeur_message > 100)?"oui":"non";

// Bonus 2

	$siHacker = strpos($message, "Hacker")?"oui":"non";

// Bonus 3
	if ($prenom == "Toto") 
  {
  	$message = "";
  }



// definition d'un tableau associatif pour recuperés les infos du formulaire
// NE MARCHE PAS VERIFICATION LONGEUR MESSGAGE
	$tableau = array(
		'Votre nom est ' => $nom,
		'Votre prenom est ' => $prenom,
		'Votre ville de naissance est ' => $ville_naissance,
		'Votre message est ' => $message,
		'Date et heure de l’envoi ' => $date,
		'Caractères message > 100 ?'=> $verification,
		'Contient le mot hacker?' => $siHacker
	);



// boucle pour afficher le tableau associatif en tableau HTML
	foreach($tableau as $cle => $valeur){
		echo "<table border=1 style=border-collapse:collapse table-layout:auto; width:180px>";
		echo "<tr><td>".$cle."</td><td>".$valeur."</td></tr>";
		echo "</table>";
	}


// Bonus 1 - cela fonctionne mais beaucoup de code 
/*

  $mot = "hacker";
  if(strpos($message, $mot) !== false){
    echo "<table border=1 style=border-collapse:collapse>";
    echo "<tr><td>Contient le mot hacker?</td><td>Oui!</td></tr>";
    echo "</table>";
  } else{
    echo "<table border=1 style=border-collapse:collapse>";
    echo "<tr><td>Contient le mot hacker?</td><td> Non!</td></tr>";
    echo "</table>";
  }

*/ 




?>





