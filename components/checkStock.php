<?php

session_start();
require '../config.php';
$a=$_GET["to"];
$stmt = $conn->prepare("SELECT * FROM stock WHERE nom=? ;");
$stmt->execute(array($a));
$count = $stmt->rowCount();
if ($count==0)
echo "cet article n'existe pas" ;
else {
while ($row = $stmt->fetch()) {
if ($row["nom"]==$a)
{
echo $row["qte"]. " pièces restantes";
}
}
}
