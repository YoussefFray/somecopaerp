<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>discuter</title>
  <link rel="stylesheet" href="css/reset.min.css">
<link rel="stylesheet" href="css/styleD.css">
</head>
<body>
<?php
        session_start();
        session_regenerate_id();
        if(empty($_SESSION["id"]))
        { header('Location: index.php'); exit(); }
        require 'config.php';
////
$stmt = $conn->prepare("SELECT id,img_profile,nom,prenom FROM profile_employees WHERE id=? ");
$stmt->execute(array($_SESSION["id"]));
while ($row = $stmt->fetch()) {
  $i=  $row["img_profile"];
  $p= $row["prenom"];
  $n=$row["nom"] ;


}


        ?>
<!-- partial:index.partial.html -->
<section class="main-grid">
  <aside class="main-side">
     <header class="common-header">
       <div class="common-header-start">
           <button class="u-flex js-user-nav">
             <img class="profile-image" src="img/<?php echo $i;?>" alt="Elad Shechter">
             <div class="common-header-content">
                <h1 class="common-header-title"><?php echo "<b>". $p." ".$n."</b> ";?></h1>
            </div>
           </button>
       </div>
     </header>

    



    <?php
     $stmt = $conn->prepare("SELECT * FROM profile_employees ;");
     $stmt1 = $conn->prepare("SELECT * FROM messages WHERE (de=? or de=? )and (a=? or a=? ) ;");
     $stmt->execute(array());
     while ($row = $stmt->fetch()) {
       if($row["id"]!=$_SESSION["id"]){
    echo "<section class='chats'>    <ul class='chats-list'>   
     <li class='chats-item' value='".$row["id"]."' onclick='rootFolder(this)'> 
     <div class='chats-item-button js-chat-button' role='button' tabindex='0'>
     <img class='profile-image' src='img/".$row["img_profile"]."'>
     <header class='chats-item-header'>
     <h3 class='chats-item-title'><b>".$row["nom"]." ".$row["prenom"]."</b></h3>";
     $stmt1->execute(array($row["id"],$_SESSION["id"],$row["id"],$_SESSION["id"]));
     while ($row1 = $stmt1->fetch()) {
      $az= $row1["content"];
      $d= $row1["date"];
    }
    if (isset($d)) {
    echo "<time class='chats-item-time'>".$d."</time>";
    }
    
     echo "</header>
     <div class='chats-item-content'>
     <p class='chats-item-last'>";
     if (isset($az)) {
    echo $az ;
    $az=null;
     }
     else
    {
      echo "il n'y a pas de message";
    }  
     echo "
     </p>
     </div>
     </div>
   </li>
 </ul>
</section>
     "     ;
 }}
    ?>

  </aside>

  <main class="main-content">
    <div class="messanger">
      <ol class="messanger-list">
      
    </ol>
    </div>

    <div class="message-box">
      <input class="text-input" id="message-box" placeholder="Type a message" type="text" name="" value="">
      <button class="button" style="vertical-align:middle" onclick="addMessage();refresh()"><span>send </span></button>
    </div>
  </main>

</section>
<script src="js/scriptd.js"></script>

</body>
</html>



