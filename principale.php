<?php session_start();
// génère le cookie
$user = $_SESSION['username'];
$contenu = $user; // le contenu de votre cookie
setcookie("pseudo", $contenu, time()+36000);
//echo $_COOKIE["test"];
var_dump($_COOKIE); // Pour vérifier que le cookie sort bien sur la page
//print_r($_COOKIE);

// Sert à des fins de test, pour voir si le cookie est créé, a commenter si OK
if (isset($_COOKIE["pseudo"]))
                    echo 'Le cookie existe ' . $_COOKIE["test"] . '!<br />';
                    else
                    echo 'Le cookie n\'existe pas <br />';

?> 

Bonjour <?php echo $contenu; ?> !

<html>
    <head>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <!--<body style='background:#fff;'>-->
        <div id="content">
        <a href='principale.php?deconnexion=true'><span>Déconnexion</span></a>
            <!-- tester si l'utilisateur est connecté -->
            <?php
            require 'connexBDD.php';
            

                 session_start();

                 if(isset($_GET['deconnexion']))
                 { 
                    if($_GET['deconnexion']==true)
                    {
                       setcookie("pseudo",'', time());  
                       session_unset();
                       header("location:login.php");
                    }
                 }
                 else if($_SESSION['username'] !== ""){

                    $user = $_SESSION['username'];
                    //$mysqli = mysqli_connect($BDD['host'], $BDD['user'], $BDD['pass'], $BDD['db']); 
                    $username = mysqli_real_escape_string($mysqli,htmlspecialchars($_POST['username'])); 
                    $querymail = "SELECT mail FROM membres WHERE
                            pseudo = '".$user."';";
                    $exec_mail = mysqli_query($mysqli,$querymail);
                    $reponse_mail      = mysqli_fetch_array($exec_mail);

                    $querytitre = "SELECT titre FROM membres WHERE
                            pseudo = '".$user."';";
                    $exec_titre = mysqli_query($mysqli,$querytitre);
                    $reponse_titre      = mysqli_fetch_array($exec_titre);
                    
                    $resultmail=mysqli_query($querymail);

                     // afficher un message
                     echo "<center><h1>Résumé d'inscription</h1></center>";
                     echo "<p>";
                     echo '<link rel="stylesheet" href="style.css" media="screen" type="text/css" />';
                     echo "<br>Bonjour $user, vous êtes connecté !";
                     echo "<br>";
                     echo "<br>Voici un résumé de votre inscription :";
                     echo "<br>Pseudo : $user";
                     echo "<br>Mail : ";
                     printf("%s \n", $reponse_mail[0], $reponse_mail[1]);
                     echo "<br>Titre choisi : ";
                     printf("%s \n", $reponse_titre[0], $reponse_titre[1]);
                     echo "<br>";
                     echo "</body>";
                     echo "</body>";
                     echo "</p>";

                     //echo "<br>Debug : ";
                     //echo "<br>exec requete : $exec_requete";
                     //echo "<br>reponse : $resultmail";

                 }
                
            ?>
            
            <a href="accueil.html">
            <input type="button" name="return" value="Retour à l'accueil" class="input">
            </a>

            <a href="login.php">
            <input type="button" name="return" value="Retour au formulaire de connexion" class="input">
            </a>

            <a href="valid.html">
            <input type="button" name="return" value="Inscrire un nouveau participant" class="input">
            </a>
        
        </div>
    </body>
</html>