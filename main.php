<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div id="content">
<?php 
  $con = new mysqli('localhost','root','','icaink_db');
  $query = $con->query("
  SELECT MONTH(order_date_added) as month, COUNT(order_id) as orders FROM tbl_order GROUP BY month ORDER BY month
");

foreach ($query as $data) {
  $month[] = date('F', mktime(0, 0, 0, $data['month'], 1));
  $orders[] = $data['orders'];
}
?>


<div style="width: 950px; margin:auto;">
  <canvas id="myChart"></canvas>
</div>
 
<script>
  // === include 'setup' then 'config' above ===
  const labels = <?php echo json_encode($month) ?>;
  const data = {
    labels: labels,
    datasets: [{
      backgroundColor:'#063260;',  
      label: 'Monthly Orders',
      data: <?php echo json_encode($orders) ?>,
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            color: 'white' // Set y-axis label color to white
          }
        },
        x: {
          ticks: {
            color: 'white' // Set x-axis label color to white
          }
        }
      },
      plugins: {
        legend: {
          labels: {
            color: 'white' // Set legend label color to white
          }
        }
      }
    },
  };

  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
</div>
</body>
</html>
