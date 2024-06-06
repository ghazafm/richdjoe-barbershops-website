<h2 class="h5 no-margin-bottom">Dashboard</h2>
</div>
</div>
<section class="no-padding-top no-padding-bottom">
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3 col-sm-6">
      <div class="statistic-block block">
        <div class="progress-details d-flex align-items-end justify-content-between">
          <div class="title">
            <div class="icon"><i class="fa fa-user"></i></div><strong>User</strong>
          </div>
          <div class="number dashtext-1">{{$userCount}}</div>
        </div>
        <div class="progress progress-template">
          <div role="progressbar" style="width: 100%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="statistic-block block">
        <div class="progress-details d-flex align-items-end justify-content-between">
          <div class="title">
            <div class="icon"><i class="fa fa-user-tie"></i></div><strong>Hair Artist</strong>
          </div>
          <div class="number dashtext-2">{{$kapstersCount}}</div>
        </div>
        <div class="progress progress-template">
          <div role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="statistic-block block">
        <div class="progress-details d-flex align-items-end justify-content-between">
          <div class="title">
            <div class="icon"><i class="fa fa-scissors"></i></div><strong>Service</strong>
          </div>
          <div class="number dashtext-3">{{$serviceCount}}</div>
        </div>
        <div class="progress progress-template">
          <div role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="statistic-block block">
        <div class="progress-details d-flex align-items-end justify-content-between">
          <div class="title">
            <div class="icon"><i class="icon-writing-whiteboard"></i></div><strong>Transaction</strong>
          </div>
          <div class="number dashtext-4">{{$transactionCount}}</div>
        </div>
        <div class="progress progress-template">
          <div role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

<div class="col">
  <div class="statistic-block block">
    <div class="progress-details d-flex align-items-end justify-content-between">
      <div class="title">
        <div class="icon"><i class="icon-wallet"></i></div><strong>Total Income In 6 Month</strong>
      </div>
      <div class="number dashtext-5">IDR {{ number_format($totalincome, 0, ',', '.') }}</div>
    </div>
  </div>
</div>


<canvas id="monthlyIncomeChart" width="800" height="400"></canvas>

<footer class="footer">
<div class="footer__block block no-margin-bottom">
  <div class="container-fluid text-center">
    <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
     <p class="no-margin-bottom">2024 &copy; Richdjoe Barbershop. </p>
  </div>
</div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Ambil data monthlyIncome dari PHP
  var monthlyIncomeData = <?php echo json_encode($monthlyIncome); ?>;
  
  // Persiapkan data untuk Chart.js
  var labels = Object.keys(monthlyIncomeData);
  var data = Object.values(monthlyIncomeData);
  
  // Render grafik menggunakan Chart.js
  var ctx = document.getElementById('monthlyIncomeChart').getContext('2d');
  var chart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: labels,
          datasets: [{
              label: 'Monthly Income',
              data: data,
              backgroundColor: 'rgba(54, 162, 235, 0.5)',
              borderColor: 'rgba(54, 162, 235, 1)',
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          }
      }
  });
</script>
