<div class="container3">
     <table class="table">
         <thead>
           <tr>
               <th scope="col">ID</th>
               <th scope="col">PHOTO</th>
               <th scope="col">NOM</th>
               <th scope="col">PRENOM</th>
               <th scope="col">ACTION</th>

            
              
           </tr>
         </thead>

         <tbody>
                 <?php
if($_SERVER['REQUEST_METHOD'] == 'GET'  and !empty($_GET["del331"]))
{

  $stmt = $conn->prepare("SELECT *  FROM conges WHERE id=?  ");
        $stmt->execute(array($_GET["del331"]));
        $count=$stmt->rowCount();
        if($count>0)
        {
          $stmt = $conn->prepare("DELETE FROM conges WHERE id=? ;");
          $stmt->execute(array($_GET["del331"]));
        }

        $stmt = $conn->prepare("SELECT *  FROM comptes WHERE id=?  ");
        $stmt->execute(array($_GET["del331"]));
        $count=$stmt->rowCount();
        if($count>0)
        {
          $stmt = $conn->prepare("DELETE FROM comptes WHERE id=? ;");
          $stmt->execute(array($_GET["del331"]));
        }

        $stmt = $conn->prepare("SELECT *  FROM contrat WHERE id=?  ");
        $stmt->execute(array($_GET["del331"]));
        $count=$stmt->rowCount();
        if($count>0)
        {
          $stmt = $conn->prepare("DELETE FROM contrat WHERE id=? ;");
          $stmt->execute(array($_GET["del331"]));
        }

        $stmt = $conn->prepare("SELECT *  FROM notes WHERE id=?  ");
        $stmt->execute(array($_GET["del331"]));
        $count=$stmt->rowCount();
        if($count>0)
        {
          $stmt = $conn->prepare("DELETE FROM notes WHERE id=? ;");
          $stmt->execute(array($_GET["del331"]));
        }

        $stmt = $conn->prepare("SELECT *  FROM notification WHERE id=?  ");
        $stmt->execute(array($_GET["del331"]));
        $count=$stmt->rowCount();
        if($count>0)
        {
          $stmt = $conn->prepare("DELETE FROM notification WHERE id=? ;");
          $stmt->execute(array($_GET["del331"]));
        }
        $stmt = $conn->prepare("SELECT *  FROM pointage WHERE id=?  ");
        $stmt->execute(array($_GET["del331"]));
        $count=$stmt->rowCount();
        if($count>0)
        {
          $stmt = $conn->prepare("DELETE FROM pointage WHERE id=? ;");
          $stmt->execute(array($_GET["del331"]));
        }

        $stmt = $conn->prepare("SELECT *  FROM contacts WHERE id=?  ");
        $stmt->execute(array($_GET["del331"]));
        $count=$stmt->rowCount();
        if($count>0)
        {
          $stmt = $conn->prepare("DELETE FROM contacts WHERE id=? ;");
          $stmt->execute(array($_GET["del331"]));
        }
        $stmt = $conn->prepare("DELETE FROM profile_employees WHERE id=? ;");
        $stmt->execute(array($_GET["del331"]));
      


        
}
           $stmt = $conn->prepare("SELECT * FROM profile_employees  ;");
           $stmt->execute(array());
           while ($row = $stmt->fetch()) {
          echo "<tr><td>". $row["id"] ."</td><td>"."<img src='img/".$row["img_profile"]."'  alt='image' height='42' width='42'> "."</td><td>".$row["nom"]."</td><td>".$row["prenom"]."</td><td><a href='components/rhdetails.php?del=".$row["id"]."'><img src='img/view-details.png' width='25' height='30'></a><a href='components/rhedit.php?del=".$row["id"]."'><img style=' margin-left: 30px' src='img/edit.png' width='25' height='30'></a><a href='R_H.php?del331=".$row["id"]."'><img style=' margin-left: 30px' src='img/delete-24.png' width='25' height='25'></a></tr>" ;
               }
   
                        ?>
           
           </tbody>
       </table>


     </div>
