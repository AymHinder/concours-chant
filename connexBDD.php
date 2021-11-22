<?php
    
// Phase de paramétrage de la connexion à la BDD :
$BDD = array(); // On définit un tableau de variables -- https://www.php.net/manual/fr/function.array.php
$BDD['host'] = "localhost";
$BDD['user'] = "tp_dwwm";
$BDD['pass'] = "Greta1234!";
$BDD['db'] = "inscription";
// Ouverture de la connexion SQL en s'appuyant sur les variables définies dans le tableau, retour true si ok, false si non ok -- https://www.php.net/manual/fr/function.mysqli-connect.php
$mysqli = mysqli_connect($BDD['host'], $BDD['user'], $BDD['pass'], $BDD['db']); 
if(!$mysqli) {
    echo "<br>Connexion non établie.";
    exit;
}else{
    echo "<br>";
    echo "<br>Connexion vers la BDD OK !<br />";
}

//traitement du formulaire:
  if(isset($_POST['pseudo'],$_POST['mdp'],$_POST['titre'],$_POST['mail'])){ // L'utilisateur à cliqué sur "S'inscrire", on demande donc si les champs sont défini avec "isset" -- https://www.php.net/manual/fr/function.isset.php
    if(empty($_POST['pseudo'])){ // Si le champ pseudo est vide avec le retour de "empty", on arrête l'exécution du script et on affiche un message d'erreur -- https://www.php.net/manual/fr/function.empty.php
        echo "Le champ Pseudo est vide.";

    } elseif(empty($_POST['mail'])){ // Si le champ mail est vide avec le retour de "empty", on arrête l'exécution du script et on affiche un message d'erreur -- https://www.php.net/manual/fr/function.empty.php
        echo "Le champ Mail est vide.";

    } elseif(!preg_match("#^[a-z0-9]+$#",$_POST['pseudo'])){ // Le champ pseudo est renseigné mais ne convient pas au format qu'on souhaite qu'il soit, soit: que des lettres minuscule + des chiffres 
      //(je préfère personnellement enregistrer le pseudo des membres en minuscule afin de ne pas avoir deux pseudos identiques mais différents comme par exemple: Admin et admin)

      // A checker pour le forçage "minuscule et chiffre uniquement" : fonction "preg_match" -- https://www.php.net/manual/fr/function.preg-match.php 
      // + expressions régulières (regex) -- https://fr.wikipedia.org/wiki/Expression_r%C3%A9guli%C3%A8re
        echo "Le Pseudo doit être renseigné en lettres minuscules sans accents, sans caractères spéciaux.";

    } elseif(strlen($_POST['pseudo'])>25){ // Si le pseudo est trop long, on indique cette erreur -- https://www.php.net/manual/fr/function.strlen.php
        echo "Le pseudo est trop long, il dépasse 25 caractères.";

    } elseif(empty($_POST['mdp'])){ // Si le champ mdp est vide avec le retour de "empty", on arrête l'exécution du script et on affiche un message d'erreur -- https://www.php.net/manual/fr/function.empty.php
        echo "Le champ Mot de passe est vide.";

    } elseif(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM membres WHERE pseudo='".$_POST['pseudo']."'"))==1){ // On check si le champ renseigné n'est pas en doublon
        echo "Ce pseudo est déjà utilisé.";

    } elseif(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM membres WHERE titre='".$_POST['titre']."'"))==1){ // On check si le champ renseigné n'est pas en doublon
        echo "Ce titre à déjà été inscrit.";

    } elseif(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM membres WHERE mail='".$_POST['mail']."'"))==1){ // On check si le champ renseigné n'est pas en doublon
        echo "Ce mail à déjà été inscrit.";

    } else {
        // On insère dans la table la donnée rentrée. Si le retour de "mysqli_query" est 0 alors on affiche l'erreur, sinon on affiche OK -- https://www.php.net/manual/fr/mysqli.query.php
        // Il s'agit là d'un script simplifié au maximum, libre à vous de rajouter des conditions avant l'enregistrement comme la longueur minimum du mot de passe par exemple
        if(!mysqli_query($mysqli,"INSERT INTO membres SET pseudo='".$_POST['pseudo']."', mdp='".md5($_POST['mdp'])."', titre='".$_POST['titre']."', mail='".$_POST['mail']."'")){ // On crypte le mot de passe avec la fonction propre à PHP: md5()
            echo "Une erreur s'est produite: ".mysqli_error($mysqli);//je conseille de ne pas afficher les erreurs aux visiteurs mais de l'enregistrer dans un fichier log
        } else {
            echo "Vous êtes inscrit avec succès!<br />";
            echo "Allez à la page de connexion<br />";
        }

// Phase de vérification des champs rentrés dans le formulaire
//if(isset($_POST['mail'])){ // L'utilisateur à cliqué sur "S'inscrire", on demande donc si les champs sont défini avec "isset" -- https://www.php.net/manual/fr/function.isset.php
//    if(empty($_POST['mail'])){ // Si le champ mail est vide avec le retour de "empty", on arrête l'exécution du script et on affiche un message d'erreur -- https://www.php.net/manual/fr/function.empty.php
//        echo "Le champ mail est vide.";
//    }

//    elseif(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM user WHERE mail='".$_POST['mail']."'"))==1){ //on vérifie que ce mail n'est pas en doublon
//        echo "Ce mail à déjà été inscrit.";
//    }

    // A checker pour le forçage "minuscule et chiffre uniquement" : fonction "preg_match" -- https://www.php.net/manual/fr/function.preg-match.php 
    // + expressions régulières (regex) -- https://fr.wikipedia.org/wiki/Expression_r%C3%A9guli%C3%A8re

    // A checker pour afficher une erreur si une char chain contient + d'un certain nombre de caractères : fonction "strlen" en php -- https://www.php.net/manual/fr/function.strlen.php

//    else{
// On insère dans la table la donnée rentrée. Si le retour de "mysqli_query" est 0 alors on affiche l'erreur, sinon on affiche OK -- https://www.php.net/manual/fr/mysqli.query.php
//        if(!mysqli_query($mysqli,"INSERT INTO user SET mail='".$_POST['mail']."'")){ 
//            echo "Une erreur s'est produite: ".mysqli_error($mysqli); 
            // Une fois le projet fonctionnel, je conseille de ne pas afficher les erreurs aux visiteurs mais de l'enregistrer dans un fichier log
//        } else {
//            echo "<br>Vous êtes inscrit avec succès!";
//    }
//    }
//}

// Phase "Upload"


  }
}
