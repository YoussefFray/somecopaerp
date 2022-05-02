<div class="container5">
<h5> Les Heures Supplementaires</h5>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'  and !empty($_POST["noh3"]))
    {
       $b=$_POST["noh3"];
        $ab1=$_POST["ab1"];
        $a=implode(",", $ab1);


        $sql = "UPDATE pointage SET heure=heure+".$b." WHERE id IN (".$a.")" ;
        // Prepare statement
        $stmt = $conn->prepare($sql);
        // execute the query
        $stmt->execute();
}   
?>
 <form action=""  method="POST">
            <?php
           $stmt = $conn->prepare("SELECT id,nom,prenom FROM profile_employees");
           $stmt->execute(array());
           while ($row = $stmt->fetch()) {
            echo " <p> <label><input type='checkbox' name='ab1[]' value='" .$row["id"]. "' /> <span>".$row["nom"]." ".$row["prenom"]." (id:".$row["id"].")</span></label></p>";                  
          }
    ?>
     
    <label>Les Heures Supplementaires </label>
     <input class="form-control form-control-lg" type="number" placeholder="Les Heures Supplementaires " name="noh3" required>
    <small id="emailHelp" class="form-text text-muted">Taper Les Heures Supplementaires  </small>
    </br>         


    <button type="submit" class="btn btn-primary btn-lg">Enregistrer</button> 
</form>
  
    </div> 