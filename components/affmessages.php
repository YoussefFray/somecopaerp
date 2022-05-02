<?php
session_start();
require '../config.php';
$a=$_GET["to"];
$b= $_SESSION["id"];
 $stmt = $conn->prepare("SELECT * FROM messages WHERE (de=? or de=? )and (a=? or a=? ) ;");
 $stmt->execute(array($a,$b,$a,$b));
 while ($row = $stmt->fetch()) {
if($row["a"]==$b){
echo "
<li class='common-message is-you'>
        <p class='common-message-content'>
          ".$row["content"]."
        </p>
        <time datetime>".$row["date"]."</time>
      </li>";
}
else{
    echo "
    <li class='common-message  is-other'>
            <p class='common-message-content'>
              ".$row["content"]."
            </p>
            <time datetime>".$row["date"]."</time>
          </li>";


}


}
?>