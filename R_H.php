<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RH</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/creer-profile-employees.js"></script>
    <link rel="stylesheet" type="text/css" href="css/creer-compte.css" />
    <link rel="stylesheet" type="text/css" href="css/creer-profile-employees.css" />
    <link rel="stylesheet" href="css/style-rh.css">
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <script src="js/script-rh.js"></script>
    <script src="js/mj.js"></script>

    </head>
<body onload="hide()">
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
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Employés
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a href="#"  class="dropdown-item" onclick="div1()">Créer employé </a>
            <a href="#"  class="dropdown-item" onclick="div2()">Créer Compte</a>
            <a href="#"  class="dropdown-item" onclick="div3()">Liste employés</a>
            <a href="#"  class="dropdown-item" onclick="div8()">Créer un contrat</a>
            <a href="#"  class="dropdown-item" onclick="div9()">Gérer les congés </a>
            <a href="#"  class="dropdown-item" onclick="div10()">Liste des congés </a>
            </li>
            <li class="nav-item ">
            <a href="#" class="nav-link" onclick="div4()">absences</a>
            </li>
            <li class="nav-item ">
            <a href="#" class="nav-link" onclick="div5()">Les Heures Supplementaires</a>
            </li>
            <li class="nav-item ">
            <a href="#" class="nav-link" onclick="div6()">Les Facture salariale</a>
            </li>
        
            </ul>
</div>
</nav>
    <?php   
        require 'components/creer-compte.php';
        require 'components/creer-profile-employees.php';
        require 'components/creer-profile-employees-html.html';
        require 'components/aff_emp.php';
        require 'components/absent.php';
        require 'components/HSup.php';
        require 'components/GF.php';
        require 'components/CreeContrat.php';
        require 'components/GConges.php';
        require 'components/AffConges.php';

        

    ?>
 
</body>
</html>