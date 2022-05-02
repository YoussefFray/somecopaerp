<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rhedit</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
    <script src="../js/bootstrap.min.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/normalize.css" />
</head>
<body>
</br></br></br></br>
<div class="container">
<form method="POST" action="" > 
<?php
require '../config.php';
session_start();
session_regenerate_id();
    if(empty($_SESSION["id"]))
    { header('Location: index.php'); exit(); }
    if($_SERVER['REQUEST_METHOD'] == 'POST' and !empty($_POST["f1"]) ) {
        $stmt = $conn->prepare("UPDATE profile_employees SET nom=?,prenom=?,sexe=?,adresse=?,numero=?,email=?,dn=? WHERE id=?  ");
        $stmt->execute(array($_POST["f1"][0],$_POST["f1"][1],$_POST["f1"][2],$_POST["f1"][3],$_POST["f1"][4],$_POST["f1"][5],$_POST["f1"][6],$_SESSION["del"]));
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' and !empty($_POST["f2"]) ) {
       $stmt = $conn->prepare("UPDATE contrat SET date=?,departement=?,titre_poste=?,plage_horaire=?,s_p_j=?,s_p_h=?,debut_contrat=?,fin_contrat =?,type =? WHERE id=?  ");
       $stmt->execute(array($_POST["f2"][0],$_POST["f2"][1],$_POST["f2"][2],$_POST["f2"][3],$_POST["f2"][5],$_POST["f2"][6],$_POST["f2"][7],$_POST["f2"][8],$_POST["f2"][4],$_SESSION["del"]));
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST' and !empty($_POST["f1"]) ) {
          echo "<div class='alert alert-success' role='alert'> Succès</div> </br>";
          echo "<a href='../menu.php'>Revenez au menu principal</a> </br>" ;
        }
    if($_SERVER['REQUEST_METHOD'] == 'GET' and !empty($_GET["del"]) ) {
        // Set session variables
       $_SESSION["del"] = $_GET["del"];
       $stmt = $conn->prepare("SELECT *  FROM profile_employees WHERE id=?  ");
       $stmt->execute(array($_GET["del"]));
       while ($row = $stmt->fetch())
       {
       $x[]=$row["nom"];
       $x[]=$row["prenom"];
       $x[]=$row["sexe"];
       $x[]=$row["adresse"];
       $x[]=$row["numero"];
       $x[]=$row["email"];
       $x[]=$row["dn"];
       }
       echo "<div class='form-group'><label>Nom :</label><input type='text' class='form-control' value='".$x[0]."' name='f1[]'></div> ";
       echo "<div class='form-group'><label>Prenom :</label><input type='text' class='form-control' value='".$x[1]."' name='f1[]'></div> ";
       echo "Sexe :</br><input type='radio'  name='f1[]' value='homme' checked><label>&nbsp homme</label> &nbsp   <input type='radio' id='male' name='f1[]' value='femme'><label> &nbspfemme</label>";
       echo "<div class='form-group'><label>Adresse :</label><input type='text' class='form-control' value='".$x[3]."' name='f1[]'></div> ";
       echo "<div class='form-group'><label>Telephone :</label><input type='number' class='form-control' value='".$x[4]."' name='f1[]'></div> ";
       echo "<div class='form-group'><label>Email :</label><input type='email' class='form-control' value='".$x[5]."' name='f1[]'></div> ";
       echo "<div class='form-group'><label>Date de naissance :</label><input type='date' class='form-control' value='".$x[6]."' name='f1[]'></div> ";

       $stmt = $conn->prepare("SELECT *  FROM contrat WHERE id=?  ");
       $stmt->execute(array($_GET["del"]));
       $count=$stmt->rowCount();
       if($count==0)
       {
           $y=false;
       }
       else
       {
           $stmt = $conn->prepare("SELECT *  FROM contrat WHERE id=?  ");
       $stmt->execute(array($_GET["del"]));
       while ($row = $stmt->fetch())
       {
        $y[]=$row["date"];
        $y[]=$row["s_p_j"];
        $y[]=$row["s_p_h"];
        $y[]=$row["debut_contrat"];
        $y[]=$row["fin_contrat"];
       }
       echo "<div class='form-group'><label>Date de contrat :</label><input type='date' class='form-control' value='".$y[0]."' name='f2[]'></div> ";
       echo "<label for='salaire'>Departement:</label> <select class='form-control form-control-lg' name='f2[]'> <option disabled>select le departement</option> <option value='Achat'>Achat</option> <option value='Administration'>Administration</option> <option value='Comptabilité et Finance'>Comptabilité et Finance</option> <option value='IT et Télécommunications'>IT et Télécommunications </option> <option value='Ingénierie et Technique'>Ingénierie et Technique</option> <option value='Management et Direction Marketing'>Management et Direction Marketing</option> <option value='Publicité et Evénement'>Publicité et Evénement</option> <option value='Production'>Production</option> <option value='Recherche et Développement'>Recherche et Développement </option> <option value='Ressources humaines'>Ressources humaines</option> <option value='Secrétariat et Support Administratif'>Secrétariat et Support Administratif</option> <option value='Service Légal'>Service Légal</option> <option value='Transport et Logistique'>Transport et Logistique</option> <option value='Vente'>Vente</option> </select> ";
       echo "<label for='salaire'>Poste:</label> <select class='form-control form-control-lg' name='f2[]'> <option disabled>select le poste</option> <option value='Directeur général'>Directeur général</option> <option value='Digital Brand Manager'>Digital Brand Manager</option> <option value=' Responsable communication'> Responsable communication</option> <option value='Responsable marketing'>Responsable marketing </option> <option value='Directeur des opérations'>Directeur des opérations</option> <option value='Directeur de site industriel'>Directeur de site industriel</option> <option value='Secrétaire général'>Secrétaire général</option> <option value='Directeur administratif et financier'>Directeur administratif et financier</option> <option value='DSI'>DSI </option> <option value='Chargé de communication'>Chargé de communication</option> </select>";
       echo " <label for='type'>Plage Horaire:</label> <select class='custom-select custom-select-lg mb-3' name='f2[]'> <option value='Lundi -Samedi 08:00-12:00/13:00-16:00'>Lundi -Samedi 08:00-12:00/13:00-16:00</option> <option value='Lundi -Samedi 08:00-13:00'>Lundi -Samedi 08:00-13:00</option> <option value='Lundi -Samedi 13:00-16:00'>Lundi -Samedi 13:00-16:00</option> </select> ";
       echo " <label for='type'>Type de contrat:</label> <select class='custom-select custom-select-lg mb-3' name='f2[]'> <option value='cdd'>cdd</option> <option value='cdi'>cdi</option> <option value='caip'>caip</option> <option value='sivp'>sivp</option> </select> ";
       echo "<div class='form-group'><label>Salaire par jour :</label><input type='number' class='form-control' value='".$y[1]."' name='f2[]'></div> ";
       echo "<div class='form-group'><label>Salaire par heure :</label><input type='number' class='form-control' value='".$y[2]."' name='f2[]'></div> ";
       echo "<div class='form-group'><label>Debut de contrat :</label><input type='date' class='form-control' value='".$y[3]."' name='f2[]'></div> ";
       echo "<div class='form-group'><label>Fin de contrat :</label><input type='date' class='form-control' value='".$y[4]."' name='f2[]'></div> ";
 
    }
  echo "  <button type='submit' class='btn btn-primary'>enregistrer</button>" ;
}

?>


</form>
</div>


</body>
</html>