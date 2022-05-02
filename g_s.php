<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GS</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/creer-profile-employees.js"></script>
    <link rel="stylesheet" type="text/css" href="css/creer-compte.css" />
    <link rel="stylesheet" type="text/css" href="css/creer-profile-employees.css" />
    <link rel="stylesheet" href="css/style-rh.css">
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <script src="js/scriptgs.js"></script>
 
</head>
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
            <a href="#" class="nav-link" onclick="div1()">AJOUTER UN ARTICLE</a>
            </li>
            <li class="nav-item ">
            <a href="#" class="nav-link" onclick="div2()">LISTE DES ARTICLES</a>
            </li>
          
           
</div>
</nav>
<?php
   if($_SERVER['REQUEST_METHOD'] == 'GET' and !empty($_GET["del"]) ) {  
    $stmt = $conn->prepare("DELETE FROM stock WHERE nom=?;");
$stmt->execute(array($_GET["del"]));

echo "<div class="."alert-success alert-dismissible ".">  <span class="."closebtn"." onclick="."this.parentElement.style.display='none';".">&times;</span>   <strong>Danger!</strong>supprimer avec succès.</div>";
}
if($_SERVER['REQUEST_METHOD'] == 'POST' and !empty($_POST["val"]) ) {  
    $a=$_POST["select"];
    $b=$_POST["uname22"];
    $c=$_POST["val"];
    $sql = "UPDATE stock SET ".$a."='".$c."' WHERE nom= '".$b."'"   ;
    // Prepare statement
    $stmt = $conn->prepare($sql);
    // execute the query
    $stmt->execute();
    

    echo "<div class="."alert-success alert-dismissible ".">  <span class="."closebtn"." onclick="."this.parentElement.style.display='none';".">&times;</span>   <strong>Danger!</strong>ajout avec succès.</div>";
}
    require 'components/AjoutA.php';
?>

<div class="b">
<div class="container">
<h5>LISTE DES ARTICLES</h5>

<table class="table">
    <thead>
    <tr>
        <th>NOM</th>
        <th>catégorie</th>
        <th>quantité</th>
        <th>Date d'expiration</th>
        <th >ACTION</th>

    </tr>
    </thead>
    <tbody>
               <?php
           $stmt = $conn->prepare("SELECT * FROM STOCK");
           $stmt->execute(array());
           while ($row = $stmt->fetch()) {
         echo  "<tr><td>" .$row["nom"]. "</td><td>" . $row["cat"]. "</td><td>". $row["qte"] .  "</td><td>".$row["dd"]. "</td><td> <a href='g_s.php?del=".$row["nom"]."'><img src='img/delete-24.png'></a><a href='components/gsedit.php?del=".$row["nom"]."'><img style=' margin-left: 30px' src='img/edit.png' width='20' height='25'></a> </tr>" ;  }
   
                        ?>
           
           </tbody>
       </table>



    </div>
    </div>
</div>

</body>
</html>