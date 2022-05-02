<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Depenses</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/creer-profile-employees.js"></script>
    <link rel="stylesheet" type="text/css" href="css/creer-compte.css" />
    <link rel="stylesheet" type="text/css" href="css/creer-profile-employees.css" />
    <link rel="stylesheet" href="css/style-rh.css">
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <script src="js/scriptgs.js"></script></head>
<body onload="hide()">
<?php
    require 'config.php';
    session_start();
    session_regenerate_id();
        if(empty($_SESSION["id"]))
        { header('Location: index.php'); exit(); }

    ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="menu.php">Menu</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
            <a href="#" class="nav-link" onclick="div1()">AJOUTER</a>
            </li>
            <li class="nav-item ">
            <a href="#" class="nav-link" onclick="div2()">LISTE DES DEPENSES</a>
            </li>
           
</div>
</nav>
<div class="a">
    <div class="container">
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' and !empty($_POST["m"]) ) {
    $a=$_POST["nom"];
     $b=$_POST["m"];
     $stmt = $conn->prepare("INSERT INTO depenses (nom,	montant,date)
VALUES (:nom,:montant,:date)");
$stmt->execute(array(
"nom"=>$a,
"montant"=>$b,
"date"=>date("Y/m/d")
));
echo "<div class="."alert-success"."> <div class="."content"."><strong>Success!</strong> Ajouté avec succès  </div> </div> " ;

$conn=null;

}
?>
<form action="" method="POST"> 
<h5>Ajouter</h5>

        <input placeholder="nom" id="first_name" type="text" class="form-control form-control-lg" name="nom" required>
        <small id="emailHelp" class="form-text text-muted">taper le nom</small></br>
        <input placeholder="depenses" id="first_name" type="number" class="form-control form-control-lg" name="m" required>
        <small id="emailHelp" class="form-text text-muted">taper le montant</small></br>
        </br>

    <button class="btn btn-primary btn-lg" type="submit" name="action">Enregistrer</button>
</form>
</div></div>
<div class="b">
    <div class="container">
<h5>LISTE DES DEPENSES</h5>
<table class="table">
    <thead>
    <tr>
        <th>NOM</th>
        <th>MONTANT</th>
        <th>DATE</th>
    </tr>
    </thead>
    <tbody>
               <?php
           $stmt = $conn->prepare("SELECT * FROM depenses");
           $stmt->execute(array());
           while ($row = $stmt->fetch()) {
         echo  "<tr><td>" .$row["nom"]. "</td><td>" . $row["montant"]. "</td><td>". $row["date"] ."</td><tr>" ;  }
   
                        ?>
           
           </tbody>
       </table>



       </div></div>
</body>
</html>