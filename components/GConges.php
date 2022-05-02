<div class="container9">
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'  and !empty($_POST["uname202"]))
{
$stmt = $conn->prepare("INSERT INTO conges (id,debut,fin,type)
VALUES (:id,:d,:f,:type)");
$stmt->execute(array(
"id"=>$_POST["uname202"],
"d"=>$_POST["debut"],
"f"=>$_POST["fin"],
"type"=>$_POST["type"],
));

}
?>
<fieldset>
<div class="container">
<h5>Gérez les congés de vos employés</h5>
          <form action="" method="post">
            <label for="uname22">Nom de l'employé::</label>
            <select class="custom-select custom-select-lg mb-3" name="uname202">
            <option selected disabled>sélectionner Un Personne</option>
           <?php
               $stmt = $conn->prepare("SELECT * FROM profile_employees");
               $stmt->execute(array());
               while ($row = $stmt->fetch()) {
              echo "<option value='". $row["id"] ."'>".$row["nom"]."   ".$row["prenom"]."    (id=".$row["id"] . ")</option>" ;
                   }
           ?> 
           </select>
           <small id="emailHelp" class="form-text text-muted">sélectionner l'employé .</small>
           </br>
           <select class="custom-select custom-select-lg mb-3" name="type">
            <option selected disabled>sélectionner le type</option>
            <option value="CONGÉ PAYÉ">LE CONGÉ PAYÉ</option>
            <option value="CONGÉ SANS SOLDE">LE CONGÉ SANS SOLDE</option>
            <option value="CONGÉ ANNUEL">LE CONGÉ ANNUEL</option>
            <option value="CONGÉ D'EXAMEN">LE CONGÉ D'EXAMEN</option>
            <option value="CONGÉ INDIVIDUEL  DE FORMATION">LE CONGÉ INDIVIDUEL  DE FORMATION</option>
            <option value="CONGÉ FORMATION ÉCONOMIQUE, SOCIALE ET SYNDICALE">LE CONGÉ FORMATION ÉCONOMIQUE, SOCIALE ET SYNDICALE</option>
            <option value="CONGÉ D’ENSEIGNEMENT ET DE RECHERCHE">LE CONGÉ D’ENSEIGNEMENT ET DE RECHERCHE</option>
            <option value="CONGÉ MALADIE">LE CONGÉ MALADIE</option>
            <option value="CONGÉ MATERNITÉ">LE CONGÉ MATERNITÉ</option>
            <option value="CONGÉ CRÉATION D'ENTREPRISE">LE CONGÉ CRÉATION D'ENTREPRISE</option>
            <option value="CONGÉ POUR CATASTROPHE NATURELLE">LE CONGÉ POUR CATASTROPHE NATURELLE</option>
          </select>
           <small id="emailHelp" class="form-text text-muted">sélectionner l'employé .</small>
            </br>
           <label for="salaire">debut de  congés:</label>
            <input class="form-control form-control-lg" type="date" placeholder="le salaire" name="debut">
            <small id="emailHelp" class="form-text text-muted">sélectionner Le Debut De  congés .</small>
            </br>
            <label for="salaire">fin de  congés:</label>
            <input class="form-control form-control-lg" type="date" placeholder="le salaire" name="fin">
            <small id="emailHelp" class="form-text text-muted">sélectionner Le Fin De  congés .</small>
</br>
            <button type="submit" class="btn btn-primary btn-lg">Enregistrer</button>
            </br>
            </br>
            </br>
            </br>

           </fieldset>


</form>
</div>
</div>
</div>