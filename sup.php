<?php
$id = mysqli_connect("localhost:3306","root","","ticketing");
$nu=$_GET["id"]; 
$req ="delete from tickets where id=$nu";
$res= mysqli_query($id, $req);

echo "<h3>le ticket numéro $nu a été supprimé</h3>";
header("refresh:3; url=admin.php");
header("refresh:3; url=technicien.php");
?> 



