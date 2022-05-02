<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/materialize.css" />
    <link rel="stylesheet" type="text/css" href="../css/materialize.min.css" />
    <script src="../js/materialize.js"></script>
    <script src="../js/materialize.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/normalize.css" />
    <script>
function printContent(){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById("body").innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
</head>
<body>

  <style>
    .logo {
    width:233px;
    height:100px;
    border-radius: 50%;
    margin-left:40%;
    margin-right : 50%;
    
    }
    .title{
    text-align: center ;
    font-size: large;
    }
    .head{
        margin-top: 30px;
        margin-left: 30px;
    }
    table{
        margin-top: 50px;
    }
    .foot{
    margin-top: 200px;
    display:inline-flex;
    }
    b{
    padding: 20px;
    }
    </style>
<?php
 require '../config.php';
 session_start();
 session_regenerate_id();
     if(empty($_SESSION["id"]))
     { header('Location: index.php'); exit(); }
     if($_SERVER['REQUEST_METHOD'] == 'POST' and !empty($_POST["id11"]) ) {
$id=$_POST["id11"];
$tva=$_POST["TVA"];
$p=$_POST["p"];
$stmt = $conn->prepare("SELECT id  FROM profile_employees WHERE id=?  ");
$stmt->execute(array($id));
$count=$stmt->rowCount();
if($count==0)
{
    echo $id ." "."not existe" ;
exit() ;
}
//////////
$sessinID=$_SESSION["id"];
$stmt = $conn->prepare("SELECT nom,prenom  FROM profile_employees WHERE id=?  ");
$stmt->execute(array($sessinID));
while ($row = $stmt->fetch())
{
$nameById=$row["nom"];
$firstNameById=$row["prenom"];
}
////////////
$stmt = $conn->prepare("SELECT id,nom,prenom
FROM profile_employees where id= ?");
$stmt->execute(array($id));
while ($row = $stmt->fetch())
{
   $nom= $row["nom"] ;
   $prenom = $row["prenom"];
}
$stmt = $conn->prepare("SELECT s_p_j,s_p_h
FROM contrat where id=?");
$stmt->execute(array($id));
while ($row = $stmt->fetch())
{
   $s_p_j= $row["s_p_j"] ;
   $s_p_h = $row["s_p_h"];
}
$stmt = $conn->prepare("SELECT jour,heure
FROM pointage where id=?");
$stmt->execute(array($id));
while ($row = $stmt->fetch())
{
   $jour= $row["jour"] ;
   $heure = $row["heure"];
}
if($p=="pay"){
$stmt = $conn->prepare("UPDATE pointage  SET jour=0,heure=0 WHERE id=?  ");
$stmt->execute(array($id));
}
    }
?>
<div id="body">
    <img  class="logo" src="../img/FinalSomecopaLogo.svg" alt="logo">
  <div class="title"><b>société méditerranéenne des conditionnement des produit agricole</b></div> 
<div class="head"> 
     <b>Date de la facture : <?php echo " ". date("Y/m/d") ?></b>
    </br>
    </br>
    <!--  -->
     <b>Emis par :<?php echo " ". $nameById." ".$firstNameById ?></b>
     <!--  -->
</div>  
<table class="centered">
    <thead>
      <tr>
          <th>Id</th>
          <th>Nom et Prenom</th>
          <th>Nombre Des Jours</th>
          <th>Nombre Des Heures</th>
          <th>Salaire Par Jour</th>
          <th>Salaire Par Heure</th>
          <th><b>TOTAL</b></th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td><?php echo $id ?></td>
        <td><?php echo $nom." ".$prenom ?></td>
        <td><?php echo $jour ?></td>
        <td><?php echo $heure ?></td>
        <td><?php echo $s_p_j ?></td>
        <td><?php echo $s_p_h ?></td>
        <td><?php echo ($jour*$s_p_j)+($s_p_h*$heure)  ?></td>

      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><b>TVA</b></td>
        <td><?php echo $tva."%" ?></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><b>NET a payer</b></td>
        <td><?php echo (($jour*$s_p_j)+($s_p_h*$heure))-((($jour*$s_p_j)+($s_p_h*$heure))*$tva/100)  ?></td>
      </tr>
    </tbody>
  </table>
      <div class="foot">
      <div><b>Sidi Dhaher 8061 Nabeul</b></div>
      <div><b>Tel : 72204261</b></div>
      <div><b>Fax : 72204236</b></div>
      <div><b>Email : snoussi.freres@yahoo.fr</b></div>
      </div>
      </div>
      </br>
      </br>
      </br>
      <button onclick="printContent()">Print Content</button>    
</body>
</html>