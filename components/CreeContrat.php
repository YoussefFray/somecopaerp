<div class="container8">
   <form action="" method="post">
   <fieldset>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'  and !empty($_POST["uname22"]))
{
$id=$_POST["uname22"];
$dated=$_POST["dated"];
$type=$_POST["type"];
$salaire=$_POST["salaire"];
$salaireH=$_POST["salaireH"];
$ph=$_POST["ph"];
$debut=$_POST["debut"];
$fin=$_POST["fin"];

$stmt = $conn->prepare("INSERT INTO contrat (id,date,plage_horaire,s_p_j,s_p_h,debut_contrat,fin_contrat,type,departement,titre_poste)
 VALUES (:id,:date,:plage_horaire,:s_p_j,:s_p_h,:debut_contrat,:fin_contrat,:type,:departement,:titre_poste)");
 $stmt->execute(array(
 "id"=>$id,
 "date"=>$dated,
 "plage_horaire"=>$ph,
 "s_p_j"=>$salaire,
 "s_p_h"=>$salaireH,
 "debut_contrat"=>$debut,
 "fin_contrat"=>$fin,
 "type"=>$type,
 "departement"=>$_POST["departement"],
 "titre_poste"=>$_POST["poste"],
 ));
 
 echo "<div class="."alert-success"."> <div class="."content"."><strong>Success!</strong> Ajouté avec succès  </div> </div> " ;
}
?>
   <h5>Créer un contrat </h5>
   <div class="form-group">
            <label for="uname22">Nom de l'employé:</label>
            <select class="custom-select custom-select-lg mb-3" name="uname22">
            <option selected disabled>sélectionner l'employé</option>
           <?php
               $stmt = $conn->prepare("SELECT * FROM profile_employees");
               $stmt->execute(array());
               while ($row = $stmt->fetch()) {
              echo "<option value='". $row["id"] ."'>".$row["nom"]."   ".$row["prenom"]."    (id=".$row["id"] . ")</option>" ;
                   }
           ?> 
           </select>
           <small id="emailHelp" class="form-text text-muted">sélectionner le l'employé .</small>
           </div>
           </br>
            <label for="salaire">date de contrat:</label>
            <input class="form-control form-control-lg" type="date" placeholder="le salaire" name="dated">
            <small id="emailHelp" class="form-text text-muted">sélectionner la date de Contrat .</small>
            </br>
           <label for="type">Type:</label>
             <select class="custom-select custom-select-lg mb-3" name="type">
            <option selected disabled>type</option>
            <option value="cdd">cdd</option>
            <option value="cdi">cdi</option>
            <option value="caip">caip</option>
            <option value="sivp">sivp</option>
            </select>
            <small id="emailHelp" class="form-text text-muted">sélectionner le type .</small>
            </br>
            <!--  -->
            <label for="salaire">les departements:</label>
            <select class="form-control form-control-lg" name="departement"> 
            <option disabled>sélectionner le departement</option>
            <option value="Achat">Achat</option>
            <option value="Administration">Administration</option>
            <option value="Comptabilité et Finance">Comptabilité et Finance</option>
            <option value="IT et Télécommunications">IT et Télécommunications </option>
            <option value="Ingénierie et Technique">Ingénierie et Technique</option>
            <option value="Management et Direction	Marketing">Management et Direction	Marketing</option>
            <option value="Publicité et Evénement">Publicité et Evénement</option>
            <option value="Production">Production</option>
            <option value="Recherche et Développement">Recherche et Développement	</option>
            <option value="Ressources humaines">Ressources humaines</option>
            <option value="Secrétariat et Support Administratif">Secrétariat et Support Administratif</option>
            <option value="Service Légal">Service Légal</option>
            <option value="Transport et Logistique">Transport et Logistique</option>
            <option value="Vente">Vente</option>
            </select>
            <small id="emailHelp" class="form-text text-muted">sélectionner le departement .</small>

                  </br>
            <label for="salaire">les titres des postes:</label>
            <select class="form-control form-control-lg" name="poste"> 
            <option disabled>sélectionner le poste</option>
            <option value="Directeur général">Directeur général</option>
            <option value="Digital Brand Manager">Digital Brand Manager</option>
            <option value=" Responsable communication"> Responsable communication</option>
            <option value="Responsable marketing">Responsable marketing </option>
            <option value="Directeur des opérations">Directeur des opérations</option>
            <option value="Directeur de site industriel">Directeur de site industriel</option>
            <option value="Secrétaire général">Secrétaire général</option>
            <option value="Directeur administratif et financier">Directeur administratif et financier</option>
            <option value="DSI">DSI	</option>
            <option value="Chargé de communication">Chargé de communication</option>
            <option value="directeur des ressources humaines">directeur des ressources humaines</option>
            </select>
            <small id="emailHelp" class="form-text text-muted">sélectionner le poste .</small>
            </br>




            <!--  -->
            <label for="salaire">Salaire:</label>
            <input class="form-control form-control-lg" type="number" placeholder="le salaire" name="salaire">
            <small id="emailHelp" class="form-text text-muted">tapez le salaire par jour .</small>
            </br>
            <label for="salaire">Salaire Par Heure:</label>
            <input class="form-control form-control-lg" type="number" placeholder="le salaire" name="salaireH">
            <small id="emailHelp" class="form-text text-muted">tapez le salaire par heure .</small>
            </br>
            <label for="type">Plage Horaire:</label>
             <select class="custom-select custom-select-lg mb-3" name="ph">
            <option value="Lundi -Samedi  08:00-12:00/13:00-16:00">Lundi -Samedi  08:00-12:00/13:00-16:00</option>
            <option value="Lundi -Samedi  08:00-13:00">Lundi -Samedi  08:00-13:00</option>
            <option value="Lundi -Samedi  13:00-16:00">Lundi -Samedi  13:00-16:00</option>
            </select>
            <small id="emailHelp" class="form-text text-muted">sélectionner La plage horaire .</small>
            </br>
            <label for="salaire">debut de contrat:</label>
            <input class="form-control form-control-lg" type="date" placeholder="le salaire" name="debut">
            <small id="emailHelp" class="form-text text-muted">sélectionner Le Debut De Contrat .</small>
            </br>
            <label for="salaire">fin de contrat:</label>
            <input class="form-control form-control-lg" type="date" placeholder="le salaire" name="fin">
            <small id="emailHelp" class="form-text text-muted">sélectionner Le Fin De Contrat .</small>
</br>
            <button type="submit" class="btn btn-primary btn-lg">Enregistrer</button>


           </fieldset>
           </form>
   </div>

   </br>