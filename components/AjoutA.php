<div class="a">
<div class="container">
    
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' and !empty($_POST["c"]) ) {
$a=$_POST["name"];
$b=$_POST["c"];
$c=$_POST["d_d"];
$d=$_POST["qte"];


$stmt = $conn->prepare("SELECT nom  FROM stock WHERE nom=?  ");
$stmt->execute(array($a));
$count=$stmt->rowCount();
  if($count==0)
  {
//if existe insert 
$stmt = $conn->prepare("INSERT INTO stock (nom,cat,qte,dd)
VALUES (:nom,:cat,:qte,:dd)");
$stmt->execute(array(
"nom"=>$a,
"cat"=>$b,
"qte"=>$d,
"dd"=>$c,
));
echo "<div class="."alert-success alert-dismissible ".">  <span class="."closebtn"." onclick="."this.parentElement.style.display='none';".">&times;</span>   <strong>Danger!</strong>ajout avec succès.</div>";

  }
 else{
     //else update data 
    $stmt = $conn->prepare("UPDATE stock SET cat=? ,qte=qte+? ,dd=? WHERE nom=  ?");
    $stmt->execute(array($b,$d,$c,$a));
    echo "<div class="."alert-success alert-dismissible ".">  <span class="."closebtn"." onclick="."this.parentElement.style.display='none';".">&times;</span>   <strong>Danger!</strong>ajout avec succès.</div>";

 }
}
    ?>

<form method="post" action="">
<h5>AJOUTER UN ARTICLE</h5>
<input placeholder="Nom" id="first_name" type="text" class="form-control form-control-lg" name="name" required>
        <small id="emailHelp" class="form-text text-muted">taper le nom</small>
        </br>
        <input placeholder="quantité" id="first_name" type="number" class="form-control form-control-lg" name="qte" required>
        <small id="emailHelp" class="form-text text-muted">taper le quantite</small>
        </br>
        <select class="custom-select custom-select-lg mb-3" name="c">
          <option value="produit alimentaire">produit alimentaire</option>
          <option value="autre">autre</option>
        </select>
        <small id="emailHelp" class="form-text text-muted">taper le categorie</small>
        </br>
        <input type="date" value="2020-01-01" name="d_d" required>
        <small id="emailHelp" class="form-text text-muted">taper le date d'expiration</small>
            </br>
        <button class="btn btn-primary btn-lg" type="submit" name="action">Enregistrer</button>


</form>
</div>
</div>
