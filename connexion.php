<?php
    session_start();

    if(isset($_SESSION["mail"]) and isset($_SESSION["grade"]))
    {
        if ($_SESSION["grade"] == "client")
        {
            header("location:client.php") ;
        }
        if ($_SESSION["grade"] == "technicien")
        {
            header("location:technicien.php") ;
        }
        if ($_SESSION["grade"] == "admin")
        {
            header("location:admin.php") ;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="connexion.css">
</head>
<body>
    <h1>Connexion</h1>
    
    Se connecter ou <a href="inscription.php">créer un compte</a> <br> <br>
    
    <form action="" method="post">
        
        Email <br>
        <input type="email" name="mail" required> <br> <br>
        
        Mot de passe <br>
        <input type="password" name="mdp" required> <br> <br>
        
          
        &nbsp &nbsp &nbsp &nbsp
        <input type="submit" name="submitted" value="Se connecter" required>

       
       
    </form>

    <?php
        if(isset($_POST["submitted"]))
        {
            $mail = $_POST["mail"] ;
            $mdp = $_POST["mdp"] ;

            $id = mysqli_connect("localhost:3306","root","","ticketing") ;
                
            if (mysqli_connect_errno())
            {
                die('Erreur de connexion a la BDD') ;
            }

            $req = "SELECT * from utilisateurs where mail='$mail'" ;
            $res = mysqli_query($id,$req) ;
            
            if (mysqli_num_rows($res))
            {
                $ligne = mysqli_fetch_assoc($res) ;

                if($ligne["mdp"] == $mdp)
                {
                    $_SESSION["mail"] = $mail ;
                    $_SESSION["grade"] = $ligne["grade"] ;

                    if ($ligne["grade"] == "admin")
                    {
                        header("location:admin.php") ;
                    }
                    if($ligne["grade"] == "technicien")
                    {
                        header("location:technicien.php") ;
                    }
                    if ($ligne["grade"]== "client")
                    {
                        header("location:client.php") ;
                    }
                } 
                else
                {
                    exit('<br>ERREUR : adresse mail ou mot de passe incorrect');
                } 
            }
            else 
            {
                exit('<br>ERREUR : adresse mail ou mot de passe incorrect');
            }            
        }
    ?>
</body>
</html>