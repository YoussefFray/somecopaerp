<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rhedit</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
    <script src="../js/bootstrap.min.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/normalize.css" />
</head>
<body>
</br></br></br></br>
<div class="container">
<form method="POST" action="" > 
<?php
require '../config.php';
session_start();
session_regenerate_id();
    if(empty($_SESSION["id"]))
    { header('Location: index.php'); exit(); }
    if($_SERVER['REQUEST_METHOD'] == 'POST' and !empty($_POST["f1"]) ) {
        $stmt = $conn->prepare("UPDATE stock SET nom=?,cat=?,qte=?,dd=? WHERE nom=?  ");
        $stmt->execute(array($_POST["f1"][0],$_POST["f1"][1],$_POST["f1"][2],$_POST["f1"][3],$_SESSION["del"]));
        echo "<div class='alert alert-success' role='alert'> Succès</div> </br>";
        echo "<a href='../menu.php'>Revenez au menu principal</a> </br>" ;
   
    }
if($_SERVER['REQUEST_METHOD'] == 'GET' and !empty($_GET["del"]) ) {
    // Set session variables
   $_SESSION["del"] = $_GET["del"];
   $stmt = $conn->prepare("SELECT *  FROM stock WHERE nom=?  ");
   $stmt->execute(array($_GET["del"]));
   while ($row = $stmt->fetch())
   {
   $x[]=$row["nom"];
   $x[]=$row["qte"];
   $x[]=$row["dd"];
   }
   echo "<div class='form-group'><label>nom de l'article :</label><input type='text' class='form-control' value='".$x[0]."' name='f1[]'></div> ";
   echo " <label for='type'>Plage horaire:</label> <select class='custom-select custom-select-lg mb-3' name='f1[]'> <option value='produit alimentaire'>produit alimentaire</option><option value='autre'>autre</option> </select> ";
   echo "<div class='form-group'><label>quantité:</label><input type='number' class='form-control' value='".$x[1]."' name='f1[]'></div> ";
   echo "<div class='form-group'><label>Date d'expiration :</label><input type='date' class='form-control' value='".$x[2]."' name='f1[]'></div> ";
   echo " </br> <button type='submit' class='btn btn-primary'>enregistrer</button>" ;

}



?>



</form>
</div>


</body>
</html>