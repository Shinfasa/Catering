<?php
include('header.php');
if ($_SESSION['akses'] == 1) {

  $bln = date("n");

  $data1 = mysqli_query($koneksi,"SELECT SUM(total_harga) FROM  orders WHERE MONTH(tgl_bayar) = '$bln' AND status_pesanan = 'Sedang Diproses' OR status_pesanan = 'Selesai';");
  $pendapatanbln = mysqli_fetch_array($data1);

  $data2 = mysqli_query($koneksi,"SELECT * FROM user WHERE id_akses = 2;");
  $jumlah_cust = mysqli_num_rows($data2);

  $data3 = mysqli_query($koneksi,"SELECT * FROM orders WHERE status_pesanan = 'Selesai';");
  $pesanan = mysqli_num_rows($data3);

  $data4 = mysqli_query($koneksi, "SELECT SUM(total_harga) FROM orders WHERE status_pesanan = 'Sedang Diproses' OR status_pesanan = 'Selesai';");
  $pendapatan = mysqli_fetch_array($data4)
?>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Pendapatan<br>Bulanan</p>
                    <h5 class="font-weight-bolder">
                      <?php
                      if (empty($pendapatanbln['SUM(total_harga)'])) {
                        echo rupiah(0);
                      }else{
                      echo rupiah($pendapatanbln['SUM(total_harga)']); 
                    }
                      ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah<br>Customer</p>
                    <h5 class="font-weight-bolder">
                      <?php echo $jumlah_cust; ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Pesanan<br>Selesai</p>
                    <h5 class="font-weight-bolder">
                      <?php echo $pesanan; ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total<br>Pendapatan</p>
                    <h5 class="font-weight-bolder">
                      <?php 
                      if (empty($pendapatanbln['SUM(total_harga)'])) {
                        echo rupiah(0);
                      }else{
                      echo rupiah($pendapatan['SUM(total_harga)']); 
                    }
                     ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Grafik Penjualan</h6>            
            </div>
            <div class="card-body p-3">
              <?php
                $label = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];

                for($bulan = 1;$bulan < 13;$bulan++){
	                $query = mysqli_query($koneksi,"SELECT SUM(qty) AS qty FROM orders WHERE MONTH(tgl_bayar)='$bulan'");
	                $row = $query->fetch_array();
	                $jumlah_produk[] = $row['qty'];
                }
              ?>
              <div class="chart" style="width: 530px;height: 335px">
                <canvas id="barChart" class="chart-canvas" height="190px"></canvas>
              </div>
              <script>
		            var ctx = document.getElementById("barChart").getContext('2d');
		            var barChart = new Chart(ctx, {
		            	type: 'line',
		            	data: {
		            		labels: <?php echo json_encode($label); ?>,
		            		datasets: [{
		            			label: 'Jumlah Penjualan',
		            			data: <?php echo json_encode($jumlah_produk); ?>,
                      backgroundColor: [
					              'rgba(255, 99, 132, 0.5)',
					              'rgba(54, 162, 235, 0.5)',
					              'rgba(255, 206, 86, 0.5)',
					              'rgba(75, 192, 192, 0.5)'
					            ],
					            borderColor: [
					              'rgba(255, 99, 132, 1)',
					              'rgba(54, 162, 235, 1)',
					              'rgba(255, 206, 86, 1)',
					              'rgba(75, 192, 192, 1)'
					            ],
		            			borderWidth: 1
		            		}]
		            	},
		            	options: {
		            		scales: {
		            			yAxes: [{
		            				ticks: {
		            					beginAtZero:true
		            				}
		            			}]
		            		}
		            	}
		            });
	            </script>
            </div>
          </div>
        </div>        
        <div class="col-lg-5">
          <div class="card">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-2">Grafik Kategori</h6>
            </div>
            <div class="card-body p-3">              
              <div class="chart" style="width: 350px;height: 335px">
                <canvas id="pieChart" class="chart-canvas" height="270px"></canvas>
              </div>
              <script>
		            var ctx = document.getElementById("pieChart").getContext('2d');
		            var pieChart = new Chart(ctx, {
		            	type: 'pie',
		            	data: {
		            		labels: ["Harian", "Prasmanan", "Kotakan", "Tumpengan"],
		            		datasets: [{
		            			label: 'Menu Terjual',
		            			data: [
		            			<?php 
		            			$harian = mysqli_query($koneksi,"SELECT SUM(qty) AS qty FROM orders JOIN menu ON orders.id_menu=menu.id_menu WHERE id_kategori='1'");
                      $h = $harian->fetch_array();
	                    $jumlah_harian[] = $h['qty'];
		            			echo json_encode($jumlah_harian);
		            			?>, 
		            			<?php 
		            			$prasmanan = mysqli_query($koneksi,"SELECT SUM(qty) AS qty FROM orders JOIN menu ON orders.id_menu=menu.id_menu WHERE id_kategori='2'");
		            			$p = $prasmanan->fetch_array();
	                    $jumlah_prasmanan[] = $p['qty'];
		            			echo json_encode($jumlah_prasmanan);
		            			?>,
                      <?php 
		            			$kotakan = mysqli_query($koneksi,"SELECT SUM(qty) AS qty FROM orders JOIN menu ON orders.id_menu=menu.id_menu WHERE id_kategori='3'");
		            			$k = $kotakan->fetch_array();
	                    $jumlah_kotakan[] = $k['qty'];
		            			echo json_encode($jumlah_kotakan);
		            			?>, 
		            			<?php 
		            			$tumpengan = mysqli_query($koneksi,"SELECT SUM(qty) AS qty FROM orders JOIN menu ON orders.id_menu=menu.id_menu WHERE id_kategori='4'");
		            			$t = $tumpengan->fetch_array();
	                    $jumlah_tumpengan[] = $t['qty'];
		            			echo json_encode($jumlah_tumpengan);
		            			?>
		            			],
		            			backgroundColor: [
					              'rgba(255, 99, 132, 0.5)',
					              'rgba(54, 162, 235, 0.5)',
					              'rgba(255, 206, 86, 0.5)',
					              'rgba(75, 192, 192, 0.5)'
					            ],
					            borderColor: [
					              'rgba(255, 99, 132, 1)',
					              'rgba(54, 162, 235, 1)',
					              'rgba(255, 206, 86, 1)',
					              'rgba(75, 192, 192, 1)'
					            ],
		            			borderWidth: 1
		            		}]
		            	},
		            	options: {
		            		scales: {
		            			yAxes: [{
		            				ticks: {
		            					beginAtZero:true
		            				}
		            			}]
		            		}
		            	}
		            });
	            </script>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>
<?php  
}else{

  echo "<script>alert('Anda adalah Customer!')</script>";
  echo "<script>location='../index.php'</script>"; 
}
?>