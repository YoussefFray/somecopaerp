<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
     <link rel="stylesheet" type="text/css" href="css/materialize.css" /> 
     <link rel="stylesheet" type="text/css" href="css/materialize.min.css" /> 
     <link rel="stylesheet" type="text/css" href="css/styles.css" />
     <link rel="stylesheet" type="text/css" href="css/normalize.css" />
     <script src="js/materialize.js"></script>
     <script src="js/materialize.min.js"></script>
  </head>
  <body>
<style>
.alert-success {
    background-color:#F8D7DA;
    color: #721C24;
    border-radius: 4px;
    width: 350px;
    height: 50px;
    border-color: #721C24 ;
  }
  .content {
    margin-top: 4px;
    margin-bottom: 4px;
    transform: translate(20px, 15px);
  }

</style>


    <?php
require 'config.php';
session_start();
error_reporting(0);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  // for xss attack (cross site scripting )
  $id=filter_var($_POST["id"], FILTER_SANITIZE_STRING);
  $password=$_POST["password"];
  $hash_pass=sha1($password);
  $stmt = $conn->prepare("SELECT id,mot_passe FROM comptes WHERE id=? and mot_passe=?  ");
  $stmt->execute(array($id,$hash_pass));
  $count=$stmt->rowCount();
  if($count>0)
  {
  $_SESSION["id"]=$id ;
  header('Location: menu.php') ;
    exit();
  }
   
  else
   {
    $error="<div class="."alert-success"."> <div class="."content"."><strong>Échec!</strong> Ce compte n'existe pas  </div> </div> " ;
    } 

}
    ?>
<form action="" method="post" >
    <div class="login-div">
      <div class="row">
        <img class="logo" src="img/FinalSomecopaLogo.svg" alt="logo">
      </div>
      <div class="row center-align">
        <h5>Sign in</h5>
        <h6>SomecopaERP</h6>
      <?php
      if(!empty($error))
      echo $error ;
      ?>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="text_input" type="text"name="id" >
          <label for="text_input">ID</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password_input" type="password" class="validate" name="password">
          <label for="password_input">Password</label>
          <div class="subButton">
      <button class="waves-effect waves-light btn" type="submit" name="action">Login</button>
           </div>
        </div>
      </div >
      </div>
    
    </div>
 

    </form>
  </body>
</html>
