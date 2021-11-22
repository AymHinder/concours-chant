<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    $db_username = 'tp_dwwm';
    $db_password = 'Greta1234!';
    $db_name     = 'inscription';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));

    // .md5($_POST['mdp'])

    if(isset($_POST['remember'])){
        $user = $_SESSION['username'];
        $contenu = $user; // le contenu de votre cookie
        setcookie("pseudo", $contenu, time()+36000, '/', 'localhost', false, true);
    }
    
    if($username !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM membres where 
              pseudo = '".$username."' and mdp='".md5($password)."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe corrects
        {
           $_SESSION['username'] = $username;
           header('Location: principale.php');
        }
        else
        {
           header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
           echo $requete;
           echo $reponse;
        }
    }
    else
    {
       header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: login.php');
}
mysqli_close($db); // fermer la connexion
?>
