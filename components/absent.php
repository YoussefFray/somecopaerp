<div class="container4">
<h5> Cochez Les Cases Des Les personnes absent </h5>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'  and !empty($_POST["all"]) ){
    $sql = "UPDATE pointage SET jour=jour+1" ;
    // Prepare statement
    $stmt = $conn->prepare($sql);
    // execute the query
    $stmt->execute();
    echo "<div class="."alert-success"."> <div class="."content"."><strong>Success!</strong> Ajouté avec succès  </div> </div> " ;
}
///////////////////
    if($_SERVER['REQUEST_METHOD'] == 'POST'  and !empty($_POST["ab"]) )
    {
$ab=$_POST["ab"];
$d=date("Y/m/d");
$p = array("CONGÉ PAYÉ","CONGÉ ANNUEL", "CONGÉ D'EXAMEN","CONGÉ INDIVIDUEL  DE FORMATION","CONGÉ FORMATION ÉCONOMIQUE, SOCIALE ET SYNDICALE","CONGÉ MALADIE","CONGÉ MATERNITÉ","CONGÉ POUR CATASTROPHE NATURELLE");
$stmt = $conn->prepare("SELECT id,debut,fin,type FROM conges");
$stmt->execute(array());
while ($row = $stmt->fetch()) {
  if  ((in_array($row["type"], $p)) and(strtotime($row["debut"])<=strtotime($d)) and (strtotime($row["fin"])>=strtotime($d)) ){
$t[]=$row["id"];
}
}
if(!empty($t) and (!empty($ab))){    
    for ($x = 0; $x <= count($ab); $x++) {
        if (in_array($ab[$x], $t)) {
            unset($ab[$x]) ;
        }      }
}
if (!empty($ab)) {  
      $sql = "UPDATE pointage SET jour=jour+1  WHERE id NOT IN (".implode(",", $ab).")" ;
    // Prepare statement
    $stmt = $conn->prepare($sql);
    // execute the query
    $stmt->execute();
    echo "<div class="."alert-success"."> <div class="."content"."><strong>Success!</strong> Ajouté avec succès  </div> </div> " ;
}
if (empty($ab)) {  
    $sql = "UPDATE pointage SET jour=jour+1" ;
    // Prepare statement
    $stmt = $conn->prepare($sql);
    // execute the query
    $stmt->execute();
    echo "<div class="."alert-success"."> <div class="."content"."><strong>Success!</strong> Ajouté avec succès  </div> </div> " ;
}
    }
?>
    <form action=""  method="POST">
    <input class="form-check-input" type="checkbox" value="a" id="invalidCheck3" name="all">
    <small id="emailHelp" class="form-text text-muted">Cochez cette case si tout les employés sont présents</small></br></br>
    <?php
           $stmt = $conn->prepare("SELECT id,nom,prenom FROM profile_employees");
           $stmt->execute(array());
           while ($row = $stmt->fetch()) {
            echo " <p> <label><input type='checkbox' class='filled-in' name='ab[]' value='" .$row["id"]. "' /> <span>".$row["nom"]." ".$row["prenom"]." (id:".$row["id"].")</span></label></p>";
                       }
    ?>

                <button type="submit" class="btn btn-primary" class="btn">Enregistrer</button>
    </form>
</div>
    