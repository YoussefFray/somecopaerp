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

     $stmt = $conn->prepare("SELECT *  FROM vente WHERE ninvoice=?  ");
     $stmt->execute(array($_GET["x"]));
     while ($row = $stmt->fetch())
     {
   $date_f= $row["date_f"];
   $ninvoice= $row["ninvoice"];
   $client= $row["client"];
   $mf= $row["mf"];
   $adresse= $row["adresse"];
   $content= $row["content"];
   $total= $row["total"];
   $mdp= $row["mdp"];
   $banque= $row["banque"];
   $iban= $row["iban"];
   $swift= $row["swift"];
     }
$t=explode(",",$content);

?>

<div id="body">
    <img  class="logo" src="../img/FinalSomecopaLogo.svg" alt="logo">
  <div class="title"><b>société méditerranéenne des conditionnement des produit agricole</b></div> 
<div class="head"> 
    </br>
    </br>
<b>Date de facture :</b> <?php echo $date_f ; ?> </br></br>
<b>Numero de facture :</b> <?php echo $ninvoice ; ?> </br></br>
<b>client :</b> <?php echo $client ; ?> </br></br>
<b>MF :</b> <?php echo $mf ; ?> </br></br>
<b>Adrese :</b> <?php echo $adresse ; ?> </br></br></br></br></br></br>
<table class="centered">
    <thead>
      <tr>
          <th>n° colis</th>
          <th>designation</th>
          <th>p.brut</th>
          <th>p.net</th>
          <th>p.u</th>
          <th>total</th>
      </tr>
    </thead>
    <tbody>
     <?php
     $j=0;
     while($j <= sizeof($t)-1) {
        echo "<tr> <td>".$t[$j]."</td><td>".$t[$j+1]."</td><td>".$t[$j+2]."</td><td>".$t[$j+3]."</td><td>".$t[$j+4]."</td><td>".$t[$j+5]."</td></tr>";
        $j=$j+6;
      } 

     
     ?>
    </tbody>
    </table>

    </br></br></br></br>
<b>total:</b> <?php echo $total ; ?> </br></br>
<b>Mode De Paiment :</b> <?php echo $mdp ; ?> </br></br>
<b>Banque :</b> <?php echo $banque ; ?> </br></br>
<b>IBAN  :</b> <?php echo $iban ; ?> </br></br>
<b>Swift  :</b> <?php echo $swift ; ?> </br></br>




<div>
    <p><strong><center>sidi dhaher 8061 nabeul -tel:72 204 261 -fax: 72204261 -mail snoussi.feres@yahoo.fr</br></br> MF:3300258G/A/M/000</center> </strong></p>

  </div>




</div>
</br>
      </br>
      </br>
      <button onclick="printContent()">Print Content</button>    
</body>
</html>
