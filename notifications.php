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
<div class="container">
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' and !empty($_POST["c"]) ) {
     $stmt = $conn->prepare("INSERT INTO notification (id,text,date)
VALUES (:id,:text,:date)");
$stmt->execute(array(
"id"=>$_SESSION["id"],
"text"=>$_POST["c"],
"date"=>$_POST["date"]
));
echo "<div class="."alert-success"."> <div class="."content"."><strong>Success!</strong> Ajouté avec succès  </div> </div> " ;


}
?>
    <form action=""  method="POST">
</br></br>
</br></br>
<h5>Les Notifications</h5>
<input class="form-control form-control-lg" type="text" placeholder="ajouter le contenu de la notification" name="c">
<small id="emailHelp" class="form-text text-muted">ajouter le contenu de la notification</small></br>
<input class="form-control form-control-lg" type="date" placeholder="date" name="date">
<small id="emailHelp" class="form-text text-muted">le date</small></br>
<button type="submit" class="btn btn-primary">Submit</button>
</form>





</div>
</body>
</html>