<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>rhdetails</title>
<link rel='stylesheet' href='../css/bulma.min.css'>
</head>
<body>
<style>
html,body {
  font-family: 'Open Sans', sans-serif;
  font-size: 14px;
  font-weight: 300;
}
.hero.is-success {
  background: #F2F6FA;
}
.hero .nav, .hero.is-success .nav {
  -webkit-box-shadow: none;
  box-shadow: none;
}
#avatar{
  width: 170px;
}
#user_id{

}
.userid-field{
  flex-grow: 3;
}
table.details{
  width: 100%;
}
table.details tr td{
  width: 50%;
  word-break: break-all;
}
table.details tr td:first-child{
  text-align: right;
  font-weight: bold;
}
#bio{
  margin-top: -10px;
  margin-bottom: 20px;
  text-align: fill;
  font-size: small;
  max-width: 100%;
  word-break: break-word;
}
#points{
  font-weight: bold;
}
#pronoun{
  font-size: 11px;
  opacity: 0.7;
}
.box {
  margin-top: 5rem;
}
.avatar {
  margin-top: -70px;
  padding-bottom: 20px;
}
.avatar img {
  padding: 5px;
  background: #fff;
  border-radius: 50%;
  -webkit-box-shadow: 0 2px 3px rgba(10,10,10,.1), 0 0 0 1px rgba(10,10,10,.1);
  box-shadow: 0 2px 3px rgba(10,10,10,.1), 0 0 0 1px rgba(10,10,10,.1);
}
input {
  font-weight: 300;
}
p {
  font-weight: 700;
}
p.subtitle {
  padding-top: 1rem;
}

.login-hr{
  border-bottom: 1px solid black;
}

.has-text-black{
  color: black;
}

.field{
  padding-bottom: 10px;
}

.fa{
  margin-left: 5px;
}


</style>
<?php
 require '../config.php';
 session_start();
 session_regenerate_id();
     if(empty($_SESSION["id"]))
     { header('Location: index.php'); exit(); }
     if($_SERVER['REQUEST_METHOD'] == 'GET' and !empty($_GET["del"]) ) {
        $stmt = $conn->prepare("SELECT *  FROM profile_employees WHERE id=?  ");
        $stmt->execute(array($_GET["del"]));
        while ($row = $stmt->fetch())
        {
        $x[]=$row["id"];
        $x[]=$row["img_profile"];
        $x[]=$row["nom"];
        $x[]=$row["prenom"];
        $x[]=$row["sexe"];
        $x[]=$row["adresse"];
        $x[]=$row["numero"];
        $x[]=$row["email"];
        $x[]=$row["dn"];
        }
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
         $y[]=$row["departement"];
         $y[]=$row["titre_poste"];
         $y[]=$row["plage_horaire"];
         $y[]=$row["s_p_j"];
         $y[]=$row["s_p_h"];
         $y[]=$row["debut_contrat"];
         $y[]=$row["fin_contrat"];
         $y[]=$row["type"];
        }
        }
    }
?>



<section class="hero is-success is-fullheight">
    <div class="hero-body">
        <div class="container has-text-centered">
                <div class="box">
                  <figure class="avatar">
                      <?php  echo "<img id='avatar' src='../img/".$x[1]."' alt='pdp'  > ";?>
                  </figure>
                  <h3 class="title has-text-black"><span id="name"> <?php  echo $x[2]." ".$x[3]   ?></span> <sup><i id="pronoun"></i></sup></h3>
                  <div id="bio"></div>
                  <br>
                  <table class="table details">
                    <tr>
                      <td>sexe:</td>
                      <td><span id="location"><?php  echo $x[4]?></span></td>
                    </tr>
                    <tr>
                      <td>adresse:</td>
                      <td><span id="points"><?php  echo $x[5]?></span></td>
                    </tr>
                    <tr>
                      <td>Telephone:</td>
                      <td><span id="posts" ><?php  echo $x[6]?></span></td>
                    </tr>
                    <tr>
                      <td>Email:</td>
                      <td><span id="reactions"><?php  echo $x[7]?></span></td>
                    </tr>
                    <tr>
                      <td>date de naissance:</td>
                      <td><span id="moderator" ><?php  echo $x[8]?></span></td>
                    </tr>
                  </table>
                  <br>


                  <h3 class="is-size-4">Détails du contrat</h3>
                  <table class="table details">
                   <?php
                   if ($y==false)
                   {
                     echo "Cette personne n'a pas de contrat";
                   }
                   else
                   {
                     echo "<tr><td>date de contrat:</td><td><span>".$y[0]."</span></td></tr>";
                     echo "<tr><td>departement:</td><td><span>".$y[1]."</span></td></tr>";
                     echo "<tr><td> titre_poste:</td><td><span>".$y[2]."</span></td></tr>";
                     echo "<tr><td>plage_horaire:</td><td><span>".$y[3]."</span></td></tr>";
                     echo "<tr><td>salaire par jour:</td><td><span>".$y[4]."</span></td></tr>";
                     echo "<tr><td>salaire par heure:</td><td><span>".$y[5]."</span></td></tr>";
                     echo "<tr><td>debut de contrat:</td><td><span>".$y[6]."</span></td></tr>";
                     echo "<tr><td>fin de contrat:</td><td><span>".$y[7]."</span></td></tr>";
                     echo "<tr><td>type de contrat:</td><td><span>".$y[8]."</span></td></tr>";
                   }
                   
                   ?>
                  </table>
                 <?php echo "<a href='../menu.php'>Revenez au menu principal</a> </br>" ; ?>

                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>
