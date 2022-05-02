<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Graphique des ventes</title>

</head>
<body>
  <style>
  body {
  padding: 16px;
}

canvas {
  border: 1px dotted red;
}

.chart-container {
  margin: auto;
  height: 80vh;
  width: 80vw;
}  
  </style>
<?php
require 'config.php';
session_start();
session_regenerate_id();
    if(empty($_SESSION["id"]))
    { header('Location: index.php'); exit(); }

    $stmt = $conn->prepare("SELECT date_f,total FROM vente");
    $stmt->execute(array());
    while ($row = $stmt->fetch()) {
$x[]=substr($row["date_f"],8,2)." ".date('F', mktime(0, 0, 0, substr($row["date_f"],5,2), 10))." ".substr($row["date_f"],0,4);
$y[]=$row["total"];
    } 
   
?>
<a href="menu.php">retour au menu principal </a> </br></br></br>
<!-- partial:index.partial.html -->
<div class="chart-container">
    <canvas id="chart"></canvas>
</div>
<!-- partial -->
  <script src='js/Chart.min.js'></script>
  <script>
    var data = {
      labels: [<?php 
      for ($i = 0; $i < count($x); $i++) {
        echo "'".$x[$i]."',";
      }
           
        ?> ],
      datasets: [{
        label: "Graphique des ventes",
        backgroundColor: "rgba(255,99,132,0.2)",
        borderColor: "rgba(255,99,132,1)",
        borderWidth: 2,
        hoverBackgroundColor: "rgba(255,99,132,0.4)",
        hoverBorderColor: "rgba(255,99,132,1)",
        data: [<?php echo implode(",",$y);   ;     ?>],
      }]
    };
    
    var options = {
      maintainAspectRatio: false,
      scales: {
        yAxes: [{
          stacked: true,
          gridLines: {
            display: true,
            color: "rgba(255,99,132,0.2)"
          }
        }],
        xAxes: [{
          gridLines: {
            display: false
          }
        }]
      }
    };
    
    Chart.Line('chart', {
      options: options,
      data: data
    });
    
    </script>

</body>
</html>
