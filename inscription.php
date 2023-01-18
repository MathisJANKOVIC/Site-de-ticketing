<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <h1>Inscription</h1>
    
    Déjà inscrit ? <a href="connexion.php">Se connecter</a> <br> <br>
    
    <form action="" method="post">

        Nom* <br>
        <input type="text" name="nom" required> <br> <br>
        
        Prénom* <br>
        <input type="text" name="prenom" required> <br> <br>
        
        Email* <br>
        <input type="email" name="mail" required> <br> <br>

        Mot de passe* <br>
        <input type="password" name="mdp" required> <br> <br>
        
        Comfirmer le mot de passe* <br>
        <input type="password" name="mdp_c"> <br> <br>
        
        &nbsp &nbsp 
        <input type="submit" name="sub" value="Créer mon compte">
    </form>
    <?php
    
        if(isset($_POST["sub"]))
        {            
            $nom = $_POST["nom"] ;
            $prenom = $_POST["prenom"] ;
            $mail = $_POST["mail"] ;
            $mdp = $_POST["mdp"] ;
            $mdp_c = $_POST["mdp_c"] ;
            $grade = "client" ;
            
            if($mdp != $mdp_c)
            {
                die("<br>ERREUR : les mots de passe ne correspondent pas <br>Veuillez réessayer") ;
            }

            $id = mysqli_connect("localhost:3306","root","","ticketing");
                
            if (mysqli_connect_errno())
            {
                die('Erreur de connexion a la BDD');
            }
            
            $req1 = "SELECT * FROM UTILISATEURS WHERE mail='$mail'" ;
            $res1 = mysqli_query($id,$req1) ;

            if(mysqli_num_rows($res1))
            {
                die('<br>ERREUR : cette adresse mail est déjà associée à un compte existant');
            }
            
            $req2 = "INSERT INTO UTILISATEURS set nom='$nom', prenom='$prenom', grade='$grade', mail='$mail', mdp='$mdp'" ;
            $res2 = mysqli_query($id,$req2) ;

            $_SESSION["mail"] = $mail ;
            $_SESSION["grade"] = $grade ;
                
            header("location:technicien.php") ;
            
        }
        
    ?>
    
</body>
</html>