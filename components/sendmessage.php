<?php
session_start();
require '../config.php';
$a=$_GET["to"];
$c=$_GET["content"];
$b= $_SESSION["id"];
$d=date("Y-m-d");
 $stmt = $conn->prepare("INSERT INTO messages (de,a,content,date) VALUES (?,?,?,?) ;");
 $stmt->execute(array($b,$a,$c,$d));
