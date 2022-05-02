<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GS</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/stylev.css">
</head>
<body>


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
            <a href="#" class="nav-link" onclick="div1()">VENDRE</a>
            </li>
            <li class="nav-item ">
            <a href="#" class="nav-link" onclick="div2()">LISTE DES FACTURES</a>
            </li>
           
</div>
</nav>
<div class="div1">
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
$x=$_POST["fname"];
$y=$_POST["client"];
$z= implode(",",$x);
$stmt = $conn->prepare("INSERT vente (date_f,ninvoice,client,mf,adresse,content,total,mdp,banque,iban,swift)
VALUES (:date_f,:ninvoice,:client,:mf,:adresse,:content,:total,:mdp,:banque,:iban,:swift)");
$stmt->execute(array(
"date_f"=> date("Y/m/d"),
"ninvoice"=>$y[0],
"client"=>$y[1],
"mf"=>$y[2],
"adresse"=>$y[3],
"content"=>$z,
"total"=>$y[4],
"mdp"=>$y[5],
"banque"=>$y[6],
"iban"=>$y[7],
"swift"=>$y[8],
));

$i= count($x)/6 ;
$j=0;
while($i > 0) {
  $sql = "UPDATE stock SET qte=qte -".$x[$j+3]." WHERE nom='".$x[$j]."'" ;
    // Prepare statement
  $stmt2 = $conn->prepare($sql);
  // execute the query
  $stmt2->execute();
$j=$j+6;
  $i--; 
} 
}
?>
<form method="POST" action="">
<header>
  <h1>SOMECOPA</h1>
  <address >
    <p>Tunis </p>
    <p>Nabeul,Sidi Dhaher</p>
    <p>le <?php echo date("Y/m/d")?></p>
  </address>
</header>
<article>
  <address>
    <p>Facture export <br>N° <span class="date"></span> </p>
  </address>
  <table class="meta">
    <tr>
      <th><span >numero #</span></th>
      <td><span><input type="text" name="client[]" > </span></td>
    </tr>
    <tr>
      <th><span >Client</span></th>
      <td><span><input type="text" name="client[]" > </span></td>
    </tr>
    <tr>
      <th><span >MF</span></th>
      <td><span><input type="text" name="client[]" > </span></td>
    </tr>
    <tr>
      <th><span >Adresse</span></th>
      <td><span><input type="text" name="client[]"> </span></td>
    </tr>

  </table>
  <table class="inventory">
    
      <tr>
      <th><span >designation</span></th>
        <th><span >n° colis</span></th>
        <th><span >p.brut</span></th>
        <th><span >p.net</span></th>
        <th><span >p.u</span></th>
        <th><span >total</span></th>

      </tr>
      
      <tr>
        <td><a class="cut" onclick="cut(this)" >-</a><div class="col"><input type="text" name="fname[]" onkeyup="checkS(this)" ></td>
        <td><input type="text" name="fname[]" ></td>
        <td><input type="text" name="fname[]"></td>
        <td><input type="text" name="fname[]" ></td>
        <td><input type="text" name="fname[]" onkeyup="somme(this)"></td>
        <td><input type="text" name="fname[]" class="final"></td>
      </tr>
  </table>
  
  <a class="add" onclick="add()">+</a>
</br>
<p><small name="small" style="color:red;"></small></p>
</br>
  <table class="meta2">
  <tr>
      <th><span  >Total</span></th>
      <td><span><input type="text" name="client[]" > </span></td>
    </tr>
    <tr>
      <th><span  >Mode De Paiment</span></th>
      <td><span><input type="text" name="client[]" > </span></td>
    </tr>
    <tr>
      <th><span >Banque</span></th>
      <td><span><input type="text" name="client[]"> </span></td>
    </tr>
    <tr>
      <th><span >IBAN </span></th>
      <td><span><input type="text" name="client[]"> </span></td>
    </tr>
    <tr>
      <th><span >Swift </span></th>
      <td><span><input type="text" name="client[]"> </span></td>
    </tr>

  </table>
</article>
<button type="submit" class="btn btn-primary" >vendre</button></br></br></br>
<aside>
  <h1><span></span></h1>
  <div>
    <p><strong><center>sidi dhaher 8061 nabeul -tel:72 204 261 -fax: 72204261 -mail snoussi.feres@yahoo.fr</br></br> MF:3300258G/A/M/000</center> </strong></p>

  </div>
</aside>
</form>
</div>


<div class="div2">
<div class="container">
</br>
</br>
</br>
<h5>LISTE DES FACTURE</h5>

<table class="table">
    <thead>
    <tr>
        <th>date de facture</th>
        <th>numero</th>
        <th>client</th>
        <th>totale</th>
        <th >ouvrir</th>

    </tr>
    </thead>
    <tbody>
               <?php
           $stmt = $conn->prepare("SELECT * FROM vente");
           $stmt->execute(array());
           while ($row = $stmt->fetch()) {
         echo  "<tr><td>" .$row["date_f"]. "</td><td>" . $row["ninvoice"]. "</td><td>". $row["client"] .  "</td><td>".$row["total"]. "</td><td> <a href='components/facturev.php?x=".$row["ninvoice"]."'>ouvrir</a></tr>" ;  }
   
                        ?>
           
           </tbody>
       </table>



    </div>
    </div>
    <script src="js/scriptv.js"></script>
    <script src="js/jquery.min.js"></script>

</body>
</html>