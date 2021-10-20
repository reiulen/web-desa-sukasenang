// Call the dataTables jQuery plugin
$(document).ready(function() {
   var ctx = document.getElementById("piechart").getContext("2d");
  var data = {
            labels: [<?php while ($p = mysqli_fetch_array($pekerjaan)) { echo '"' . $p['pekerjaan'] . '",';}?>],
            datasets: [
            {
              label: "Pekerjaan",
              data: [<?php while ($p = mysqli_fetch_array($jumlah)) { echo '"' . $p['jumlah'] . '",';}?>],
              backgroundColor: [
                '#FFD100',
                '#6A05FD',
                '#FC2C2C',
                '#CBE0E3',
                '#5DFF00',
                '#00E4FF',
                '#C900FF',
                '#FF006C'
              ]
            }
            ]
            };

  var myPieChart = new Chart(ctx, {
                  type: 'bar',
                  data: data,
                  options: {
                    responsive: true
                }
              });
});
