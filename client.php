<?php
    session_start();

    if(!isset($_SESSION["mail"]) or !isset($_SESSION["grade"]))
    {
        header("location:connexion.php") ;
    }
    if ($_SESSION["grade"] != "client")
    {
        header("location:connexion.php") ;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Client</title>
    <link rel="stylesheet" href="Client.css">
</head>

<body>
   <h1>Panel Client</h1>  
   <a href="deconnexion.php">Déconnexion</a> <br><br>
<form action=" " method="post">
<input type="text" name="objet" placeholder="objet :"><br><br>
 message:<br>
 <textarea name="contenu"  cols="40" rows="10"></textarea><br><br><br>

   <input  type="submit" name="envoyer" value="Envoyer">
   <?php
   if (isset($_POST["envoyer"])){
        $id = mysqli_connect("localhost:3306","root","","ticketing") ;
        $objet=$_POST["objet"];
        $contenu=$_POST["contenu"];
        $date = date('d-m-y ');
        $req= "insert into tickets (objet,contenu,etat,t_date) values('$objet','$contenu','en attente','$date')";
        $res= mysqli_query($id,$req);
     
    }
   ?>
</form>
   
</body>
</html>