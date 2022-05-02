<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' and !empty($_POST["group1"]) ) {
    $name=$_POST["name"];
    $prenom=$_POST["prenom"];
    $adresse=$_POST["adresse"];
    $group1=$_POST["group1"];
    $email=$_POST["email"];
    $numero=$_POST["numero"];
    $date=$_POST["date003"];

    
    $image_name=$_FILES["fileToUpload"]['name'] ;
    $image_tmp=$_FILES["fileToUpload"]['tmp_name'] ;
    $image_size=$_FILES["fileToUpload"]['size'] ;
    $image_type=$_FILES["fileToUpload"]['type'] ;
    $image_error=$_FILES["fileToUpload"]['error'] ;
    $not_allowed=array('jpeg','gif','png','jpg');
    $image_exploded=explode('.',$image_name);
    $image_extension=strtolower(end($image_exploded));
    
    // Compress image
    function compressImage($source, $destination, $quality) {
    
      $info = getimagesize($source);
      if ($info['mime'] == 'image/jpeg') {
        $image = imagecreatefromjpeg($source);
        }
      elseif ($info['mime'] == 'image/gif') {
        $image = imagecreatefromgif($source);
    
      }
      elseif ($info['mime'] == 'image/png') {
        $image = imagecreatefrompng($source);
      }
      imagejpeg($image, $destination, $quality);
    
    }
    
    
    //check if file is image
    if (!(in_array($image_extension,$not_allowed))){
    $errors[]="<div class="."alert".">  <span class="."closebtn"." onclick="."this.parentElement.style.display='none';".">&times;</span>   <strong>Danger!</strong>Ce n'est pas une photo.</div>";
    }
    //check if file is empty
    if($image_error==4){
        $errors[]="<div class="."alert".">  <span class="."closebtn"." onclick="."this.parentElement.style.display='none';".">&times;</span>   <strong>Danger!</strong> ce fichier est vide.</div>" ;
    
    }

    //move the image
    if(empty($errors)) {
    $id=mt_rand(1000, 9999);  
    $rand_name=mt_rand().'.'.$image_extension;
     // Location
     $location = $_SERVER['DOCUMENT_ROOT'].'\apps\SomecopaERP\img\\'. $rand_name;
     //compressImage
     compressImage($image_tmp,$location,60);
    $stmt = $conn->prepare("INSERT INTO profile_employees (id,img_profile,nom,prenom,sexe,adresse,numero,email,dn)
    VALUES (:id,:img_profile,:nom,:prenom,:sexe,:adresse,:numero,:email,:dn)");
    
    $stmt->execute(array(
    "id"=>$id,
    "img_profile"=>$rand_name,
    "nom"=>$name,
    "prenom"=>$prenom,
    "sexe"=>$group1,
    "adresse"=>$adresse,
    "numero"=>$numero,
    "email"=>$email,
    "dn"=>$date
    ));
    $stmt = $conn->prepare("INSERT INTO pointage (id,nom,prenom,jour,heure)
    VALUES (:id,:nom,:prenom,:jour,:heure)");
    
    $stmt->execute(array(
    "id"=>$id,
    "nom"=>$name,
    "prenom"=>$prenom,
    "jour"=>0,
    "heure"=>0,
    ));
   
    echo "<div class="."alert-success alert-dismissible ".">  <span class="."closebtn"." onclick="."this.parentElement.style.display='none';".">&times;</span>   <strong>Danger!</strong>ajout avec succès.</div>";

    }
    else 
    {
        foreach ($errors as $arr) {
            echo $arr;
        }
    }
 }
    

?>