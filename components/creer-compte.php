<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'  and !empty($_POST["acces"]))
{
$uname=$_POST["uname"];
$pswd=$_POST["pswd"];
$pswd2=$_POST["pswd2"];
$acces=$_POST["acces"];
$all=implode(',',$acces);
if (empty($uname) or empty($pswd) or empty($pswd2)) 
{
    $errors[]="<div class="."alert".">  <span class="."closebtn"." onclick="."this.parentElement.style.display='none';".">&times;</span>   <strong>Danger!</strong>remplissez toutes les champs s'il vous plaît.</div>";

}
if (!($pswd==$pswd2)) 
{
    $errors[]="<div class="."alert".">  <span class="."closebtn"." onclick="."this.parentElement.style.display='none';".">&times;</span>   <strong>Danger!</strong>vérifier le mot de passe.</div>";

}
if (empty($errors) ){
    try {
 $hash_pass=sha1($pswd);
 $stmt = $conn->prepare("INSERT INTO comptes (id,acces,mot_passe)
 VALUES (:id,:acces,:mot_passe)");
 $stmt->execute(array(
 "id"=>$uname,
 "acces"=>$all,
 "mot_passe"=>$hash_pass,
 ));

 echo "<div class="."alert-success"."> <div class="."content"."><strong>Success!</strong> Ajouté avec succès  </div> </div> " ;
 
 }
 catch(PDOException $e) {
        echo  "<div class="."alert".">  <span class="."closebtn"." onclick="."this.parentElement.style.display='none';".">&times;</span>   <strong>Danger!</strong>enregistrement échouée.</div>" ;
     }
    }
     if (!empty($errors))
     {
        foreach ($errors as $arr) 
        {
            echo $arr;
         }
     }
}
?>
</br>
</br>
<div class="container">
       
    <h5>Créer un compte</h5>
    <form action="" class="needs-validated" method="POST">
    <fieldset>
        <div class="form-group">
            <label for="uname">Nom de l'employé :</label>
            <select class="custom-select custom-select-lg mb-3" name="uname">
            <option selected disabled>sélectionner un employé</option>
           <?php
               $stmt = $conn->prepare("SELECT * FROM profile_employees");
               $stmt->execute(array());
               while ($row = $stmt->fetch()) {
              echo "<option value='". $row["id"] ."'>".$row["nom"]."   ".$row["prenom"]." </option>" ;
                   }
           ?> 
           </select>
           </div>

        </br></br>
        <div class="form-group">
            <label for="pwd">Mot de passe:</label>
            <input type="password" class="form-control form-control-lg" id="pwd" placeholder="Saisir le mot de passe" name="pswd" required>
        </div>
        </br></br>
        <div class="form-group">
            <label for="pwd">Confirmer le mot de passe:</label>
            <input type="password" class="form-control form-control-lg" id="pwd" placeholder="Saisir le mot de passe" name="pswd2" required>
        </div>
        </br>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="form-check-input" id="invalidCheck2" name="acces[]" value="Ressource Humaine">
                <label class="form-check-label" for="invalidCheck2" >Ressource Humaine</label>
              </div>
              
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="form-check-input"  name="acces[]" value="Gestion De Stock">
                <label class="form-check-label">Gestion De Stock</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="form-check-input" id="customCheck1" name="acces[]" value="Discuter">
                <label class="form-check-label">Discuter</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="form-check-input" id="customCheck1" name="acces[]" value="Notes">
                <label class="form-check-label" for="customCheck1">Notes</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="form-check-input" id="customCheck1" name="acces[]" value="Ventes">
                <label class="form-check-label" for="customCheck1">Ventes</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="form-check-input" id="customCheck1" name="acces[]" value="Notification">
                <label class="form-check-label" for="customCheck1">Notification</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="form-check-input" id="customCheck1" name="acces[]" value="Depenses">
                <label class="form-check-label" for="customCheck1">Depenses</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="form-check-input" id="customCheck1" name="acces[]" value="Contacts">
                <label class="form-check-label" for="customCheck1">Contacts</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="form-check-input" id="customCheck1" name="acces[]" value="Graphiques">
                <label class="form-check-label" for="customCheck1">Graphiques</label>
              </div>
            </br></br>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            </fieldset>      
            </form>
    </div>