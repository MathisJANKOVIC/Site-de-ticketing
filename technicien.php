<?php
    session_start();

    if(!isset($_SESSION["mail"]) or !isset($_SESSION["grade"]))
    {
        header("location:connexion.php") ;
    }
    if ($_SESSION["grade"] != "technicien")
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
    <title>Panel Technicien</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Panel Technicien</h1>
    <img src="techni.jpg" width='120'><br>
    <a href="deconnexion.php">Déconnexion</a>
    <table>
    <tr><th> # &nbsp&nbsp&nbsp</th>
    <th>Nom</th>
    <th>&nbsp &nbsp &nbsp etat</th>
    <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDate</th>
    <th>Action</th>
    
     <header>
            <h1>Bonjour <?=$_SESSION["mail"]?>, Voici la liste des taches:</h1>
           
   </header> 
       
  
    <?php
    
    $id = mysqli_connect("localhost:3306","root","","ticketing");
    $req = "select * from tickets";
    $res = mysqli_query($id, $req);
    $ligne = mysqli_fetch_assoc($res); //permet d'executer la requete ligne par ligne
    $nu="id";
    $i = 0;
    while($tickets = mysqli_fetch_assoc($res)){
        $_SESSION['$i'] = $tickets["id"];
        $i=$i+1;


    

          echo "<tr>
                 <td>".$tickets["id"]."</td>
                  <td>".$tickets["objet"]."</td>
                  <td>".$tickets["etat"]." </td>
                  <td>".$tickets["t_date"]."</td>
                  <td><a href='statut.php'>
                  <input type='image' src='fleche.png' width='15'>
                  <a href='statut2.php'>
                  <input type='image' src='correct.png' width='15'>
                  </td>
                </tr>";
      }

             
    //   if(isset($_POST["bout1"]))
    //         {
    //           $requete=" UPDATE tickets SET etat='en cours' WHERE id=$id";
    //           $resultat = mysqli_query($id,$requete);
              
    //          echo "A";
    //         }   
    //   else if(isset($_POST["bout2"]))
    //   {
    //       $req=" UPDATE tickets SET etat='en cours' WHERE id=$id";
    //       $res = mysqli_query($id,$req);
             
    //           header("refresh:3; url=technicien.php");
      
            
        
    ?>


</table>
</body>
</html>