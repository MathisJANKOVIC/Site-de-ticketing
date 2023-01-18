<?php
session_start();
$idcon= mysqli_connect("localhost:3306","root","","ticketing");
$id = $_SESSION['$i'];
$requete= " UPDATE tickets SET etat='en cours' where id=$id";
$resultat = mysqli_query($idcon,$requete);
echo "l'etat du ticket $id a été modifié";





?>