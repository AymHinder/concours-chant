<?php session_start();
// génère le cookie
$user = $_SESSION['username'];
$contenu = $user; // le contenu de votre cookie
setcookie("pseudo", $contenu, time()+36000);
echo $_COOKIE["test"];
//print_r($_COOKIE);
?> 

Bonjour <?php echo $contenu; ?> !

<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body>
    <center><h1>Bienvenue sur le site d'inscription au concours de chant de Longuenesse</h1></center>
        <div id="container">
            <!-- zone de connexion -->
            
            <form action="verification.php" method="POST">
                <h1>Connexion</h1>
                
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="checkbox" name='remember'> Se souvenir de moi

                <input type="submit" id='submit' value='Se connecter' >

                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                        echo $err;
                }
                ?>
            <a href="accueil.html">
            <input type="button" name="return" value="Retour à l'accueil" class="input">
            </a>
            </form>
        </div>
    </body>
</html>