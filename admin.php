<?php
    session_start();

    if(!isset($_SESSION["mail"]) or !isset($_SESSION["grade"]))
    {
        header("location:connexion.php") ;
    }
    if ($_SESSION["grade"] != "admin")
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
    <title>Panel Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Panel Admin</h1>
    <td><img src='admin.jpg' width='100'></a>
    <table>
    <tr><th> # </th><th> Nom </th><th>Etat </th><th>Date</th><th>Action</th><th>Delete</th>
     <header>
            <h1>Bonjour <?=$_SESSION["mail"]?>, Voici la liste des taches</h1>
           
   </header> 

  
    <?php
    
    $id = mysqli_connect("localhost:3306","root","","ticketing");
    $req = "select * from tickets";
    $res = mysqli_query($id, $req);
    $ligne = mysqli_fetch_assoc($res);
   
    while($tickets = mysqli_fetch_assoc($res)){
        $id = $tickets["id"];
          echo "<tr>
          <td>".$tickets["id"]."</td>
          <td>".$tickets["objet"]."</td>
          <td>".$tickets["etat"]." </td>
          <td>".$tickets["t_date"]."</td>
          <td><td><a href='statut.php'>
          <input type='image' src='fleche.png' width='15'>
          <input type='image' src='correct.png' width='15'>
         <td><a href ='sup.php?id=$id'><img src='sup.jpg' width='40'></a></td></tr>";
             
        }
        
    ?>
    <a href="deconnexion.php">Déconnexion</a><br><br>
     
</body>
</html>