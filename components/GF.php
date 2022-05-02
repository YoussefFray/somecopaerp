<div class="container6">
<div class="container">
<h5>Générer une facture salariale</h5>
<form  method="POST">
<div class="row mx-md-n5">
  <div class="col px-md-5">
  <div class="form-group">
            <label for="uname">sélectionner Un Personne:</label>
            <select class="custom-select custom-select-lg mb-3" name="id11">
            <option selected disabled>sélectionner Un Personne</option>
           <?php
               $stmt = $conn->prepare("SELECT profile_employees.id,profile_employees.nom,profile_employees.prenom FROM profile_employees INNER JOIN contrat ON profile_employees.id= contrat.id");
               $stmt->execute(array());
               while ($row = $stmt->fetch()) {
              echo "<option value='". $row["id"] ."'>".$row["nom"]."   ".$row["prenom"]."    (id=".$row["id"] . ")</option>" ;
                   }
           ?> 
           </select>
           <small id="emailHelp" class="form-text text-muted">sélectionner un personne</small>

           </div>

  <label>TVA </label>
  <input class="form-control form-control-lg" type="number" placeholder="TVA" name="TVA" required>
  <small id="emailHelp" class="form-text text-muted">taper le tva</small>
  </br>
  <div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="p" value="pay" checked>payment
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="p" value="devis">devis
  </label>
</div></br></br></br>
<button type="submit" class="btn btn-primary" class="btn" formaction="components/factureS.php">Générer</button>

</form>
</div>
</div>
</div>
</div> 