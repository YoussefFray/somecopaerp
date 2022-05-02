<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contacts</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/creer-profile-employees.js"></script>
    <link rel="stylesheet" type="text/css" href="css/creer-compte.css" />
    <link rel="stylesheet" type="text/css" href="css/creer-profile-employees.css" />
    <link rel="stylesheet" href="css/style-rh.css">
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <script src="js/scriptgs.js"></script>
</head >
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
            <a href="#" class="nav-link" onclick="div1()">AJOUTER UN CONTACT</a>
            </li>
            <li class="nav-item ">
            <a href="#" class="nav-link" onclick="div2()">LISTE DES CONTACTS</a>
            </li>
           
</div>
</nav>
<?php
if($_SERVER['REQUEST_METHOD'] == 'GET' and !empty($_GET["del"]) ) {  
    $stmt = $conn->prepare("DELETE FROM contacts WHERE numero=?;");
$stmt->execute(array($_GET["del"]));

echo "<div class="."alert-success"."> <div class="."content"."><strong>Success!</strong> supprimé avec succès  </div> </div> " ;

}

if($_SERVER['REQUEST_METHOD'] == 'POST' and !empty($_POST["nom"]) ) {   
    $a=$_POST["nom"];
    $b=$_POST["prenom"];
    $c=$_POST["email"];
    $d=$_POST["numero"];
    $e=$_POST["titre"];

    $stmt = $conn->prepare("INSERT INTO contacts (id,nom,prenom,email,numero,titre)
VALUES (:id,:nom,:prenom,:email,:numero,:titre)");
$stmt->execute(array(
"id"=>$_SESSION["id"],
"nom"=>$a,
"prenom"=>$b,
"email"=>$c,
"numero"=>$d,
"titre"=>$e,

));
echo "<div class="."alert-success"."> <div class="."content"."><strong>Success!</strong> Ajouté avec succès  </div> </div> " ;

}
?>
<div class="a">
    <div class="container">
    <h5>AJOUTER UN CONTACT</h5>
    <form action="" method="POST"> 
       <input placeholder="nom" id="first_name" type="text" class="form-control form-control-lg" name="nom" required>
        <small id="emailHelp" class="form-text text-muted">taper le nom</small></br>

        <input placeholder="prenom" id="first_name" type="text" class="form-control form-control-lg" name="prenom" required>
        <small id="emailHelp" class="form-text text-muted">taper le prenom</small></br>

        <input placeholder="email" id="first_name" type="email" class="form-control form-control-lg" name="email" required>
        <small id="emailHelp" class="form-text text-muted">taper le email</small></br>

        <input placeholder="numero" id="first_name" type="number" class="form-control form-control-lg" name="numero" required>
        <small id="emailHelp" class="form-text text-muted">taper le numero</small></br>
        <input placeholder="titre" id="first_name" type="text" class="form-control form-control-lg" name="titre" required>
        <small id="emailHelp" class="form-text text-muted">taper le titre</small></br>
        <button class="btn btn-primary btn-lg" type="submit" name="action">Enregistrer</button></br></br>

        </form>
    </div>
</div>

<div class="b">
    <div class="container">
    <h5>LISTE DES CONTACTS</h5>

    <fieldset>
   <table class="table">
         <thead>
           <tr>
          
               <th scope="col">NOM</th>
               <th scope="col">PRENOM</th>
               <th scope="col">EMAIL</th>
               <th scope="col">numero</th>
               <th scope="col">titre</th>
               <th scope="col">supprimer</th>

           </tr>
         </thead>

         <tbody>
                 <?php
           $stmt = $conn->prepare("SELECT * FROM contacts WHERE id=?   ;");
           $stmt->execute(array($_SESSION["id"]));
           while ($row = $stmt->fetch()) {
          echo "<tr><td>". $row["nom"] ."</td><td>".$row["prenom"]."</td><td>".$row["email"]."</td><td>".$row["numero"]."</td><td>".$row["titre"]."</td><td> <a href='contacts.php?del=".$row["numero"]."'><img src='img/delete-24.png'></a></tr> " ;
               }
                        ?>
           
           </tbody>
       </table>
       </fieldset>











    </div>
</div>










</body>
</html>

