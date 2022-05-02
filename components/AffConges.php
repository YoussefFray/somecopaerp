<div class="container10">
   <form action="" method="post">
   <fieldset>
   <table class="table">
         <thead>
           <tr>
               <th scope="col">ID</th>
               <th scope="col">IMAGE</th>
               <th scope="col">NOM</th>
               <th scope="col">PRENOM</th>
               <th scope="col">duree</th>
               <th scope="col">type</th>

           </tr>
         </thead>

         <tbody>
                 <?php
           $stmt = $conn->prepare("SELECT profile_employees.id,profile_employees.img_profile,profile_employees.nom,profile_employees.prenom,conges.debut,conges.fin,conges.type FROM profile_employees INNER JOIN conges ON  profile_employees.id=conges.id  ;");
           $stmt->execute(array());
           while ($row = $stmt->fetch()) {
          echo "<tr><td>". $row["id"] ."</td><td>"."<img src='img/".$row["img_profile"]."'  alt='image' height='42' width='42'> "."</td><td>".$row["nom"]."</td><td>".$row["prenom"]."</td><td>".$row["debut"]."/".$row["fin"]."</td><td>".$row["type"]."</td> </tr>" ;
               }
                        ?>
           
           </tbody>
       </table>
       </fieldset>

</div>