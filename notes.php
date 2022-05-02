<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>notes</title>

    <link rel="stylesheet" type="text/css" href="css/materialize.css" />
    <link rel="stylesheet" type="text/css" href="css/materialize.min.css" />
    <script src="js/materialize.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/creer-profile-employees.js"></script>
    <link rel="stylesheet" type="text/css" href="css/creer-compte.css" />
    <link rel="stylesheet" type="text/css" href="css/creer-profile-employees.css" />
    <link rel="stylesheet" href="css/style-rh.css">
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <script src="js/script-rh.js"></script>
    <script src="js/materialize.min.js"></script>
 
</head>
<body>
<div class="container">

<?php
    require 'config.php';
    session_start();
    session_regenerate_id();
        if(empty($_SESSION["id"]))
        { header('Location: index.php'); exit(); }

    ?>


</br>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' and !empty($_POST["note"]) ) {
    $a=$_POST["note"];
     $stmt = $conn->prepare("INSERT INTO notes (id,note,date)
VALUES (:id,:note,:date)");
$stmt->execute(array(
"id"=>$_SESSION["id"],
"note"=>$a,
"date"=>date("Y/m/d")
));
echo "<div class="."alert-success"."> <div class="."content"."><strong>Success!</strong> Ajouté avec succès  </div> </div> " ;


}
?>
<form action="" method="POST"> 
<h5>Notes</h5>
<div class="row">
          <div class="input-field col s12">
            <textarea id="textarea2" class="materialize-textarea" data-length="120" name="note"></textarea>
            <label for="textarea2">note</label>
          </div>
        

    <button class="btn waves-effect waves-light" type="submit" name="action">Enregistrer</button>
</form>


</br></br>
</br>
<h5>LISTE DES NOTES</h5>
               <?php
           $stmt = $conn->prepare("SELECT * FROM notes ORDER BY date DESC");
           $stmt->execute(array());
           while ($row = $stmt->fetch()) {
if ($row["id"]==$_SESSION["id"]){
echo " <div class='card-panel teal'>  <span class='white-text'>".$row["note"]."<br><br><br></span><b> DATE :" .$row["date"]."<a href='notes.php?id=".$row["id"]."&note=".$row["note"]."'><img style='float: right;' src='img/delete-24.png'></a></div> "     ;

}   }
                        ?>
           
   

        


   
<div>
</body>
</html>