<?php
include("header.php");
if ($_SESSION['akses'] == 2 || empty($_SESSION['akses'])) {
	if(isset($_POST['upload'])){
		$id = ($_POST['nopesanan']);
		$file = $_FILES['bukti']['name'];
		move_uploaded_file($_FILES['bukti']['tmp_name'], "assets/img/buktitf/".basename($_FILES['bukti']['name']));
		$update=mysqli_query($koneksi,"UPDATE orders SET bukti_pembayaran='$file' WHERE no_pesanan='$id'"); 

		if($update){
			echo "<script>alert('Bukti Pembayaran Telah Diupload!')</script>";
			echo "<script>location='order.php'</script>";
		}
	}
	?>

	<head>
		<style>
			.tabs-to-dropdown .nav-wrapper {
				padding: 10px;
			}
			.tabs-to-dropdown .nav-pills .nav-link.active {
				background-color: #E8853D;
				color:#ffffff;
			}
			.tabs-to-dropdown .nav-pills .nav-link {
				color:#444444;
			}
			.tabs-to-dropdown .dropdown-item {
				padding: 10px;
			}
			@media (min-width: 1280px) {
				.tabs-to-dropdown .nav-wrapper {
					padding: 15px 30px;
				}
			}
		</style>
	</head>

	<br><br>
	<!-- popular section starts  -->
	<section id="menu" class="what-we-do">
		<div class="container">

			<div class="section-title">
				<h2>Pesanan Saya</h2>
			</div>

		<!--Tabs -->
		<div class="tabs-to-dropdown">
          <div class="nav-wrapper d-flex align-items-center justify-content-between">
            <ul class="nav nav-pills d-none d-md-flex" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="pills-pesanan-tab" data-toggle="pill" href="#pesanan" role="tab" aria-controls="pesanan" aria-selected="true">Saat Ini</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-riwayat-tab" data-toggle="pill" href="#riwayat" role="tab" aria-controls="riwayat" aria-selected="false">Sebelumnya</a>
              </li>
            </ul>
          </div>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pesanan" role="tabpanel" aria-labelledby="pills-pesanan-tab">
              <div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th class="text-center" style="color: #384046;">No.</th>
								<th class="text-center" style="color: #384046;">No. Pesanan</th>
								<th class="text-center" style="color: #384046;">Tanggal Pesan</th>
								<th class="text-center" style="color: #384046;">Detail Pesanan</th>
								<th class="text-center" style="color: #384046;">Total Harga</th>
								<th class="text-center" style="color: #384046;">Catatan</th>
								<th class="text-center" style="color: #384046;">Bukti Pembayaran</th>
								<th class="text-center" style="color: #384046;">Status</th>
								<th class="text-center" style="color: #384046;">Nota</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$batas = 10;
							$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
							$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  
							$previous = $halaman - 1;
							$next = $halaman + 1;
							$data = mysqli_query($koneksi,"SELECT * FROM orders JOIN menu ON orders.id_menu = menu.id_menu JOIN pembayaran ON orders.id_pembayaran = pembayaran.id_pembayaran WHERE id_user = $idUser;");
							$jumlah_data = mysqli_num_rows($data);
							$total_halaman = ceil($jumlah_data / $batas);
							$data_order = mysqli_query($koneksi,"SELECT DISTINCT tgl_pesan, no_pesanan, status_pesanan, catatan, total_harga FROM orders WHERE status_pesanan!='Selesai' AND id_user=$idUser LIMIT $halaman_awal, $batas");
							$data_order1 = mysqli_query($koneksi,"SELECT * FROM orders JOIN menu ON orders.id_menu = menu.id_menu JOIN pembayaran ON orders.id_pembayaran = pembayaran.id_pembayaran WHERE status_pesanan!='Selesai' AND id_user=$idUser LIMIT $halaman_awal, $batas");
							$nomor = $halaman_awal+1;
							$grand_total = 0;
							if ($jumlah_data>0) {
								while($d = mysqli_fetch_array($data_order)){
									?>
									<tr>
										<td class="text-center"><?php echo $nomor++; ?></td>
										<td class="text-center"><?php echo $d['no_pesanan']; ?></td>
										<td class="text-center"><?php echo $d['tgl_pesan']; ?></td>
										<td class="text-center">
											<a href="" class="text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#exampleModalView<?php echo $d['no_pesanan']; ?>">
												Lihat
											</a>
										</td>
										<td class="text-center"><?php echo rupiah($d['total_harga']); ?></td>
										<td class="text-center"><?php echo $d['catatan']; ?></td>
										<td class="text-center">
											<a href="" class="text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#exampleModalUpload<?php echo $d['no_pesanan']; ?>">
												Upload
											</a>
										</td>
										<td class="text-center"><?php echo $d['status_pesanan']; ?></td>
										<td class="text-center" style="color: #384046;">
											<?php 
											$status = $d['status_pesanan'];
											if ($status == "Belum Dibayar") {
												?>
												-
											<?php }else{ ?>
												<a class="btn" href="nota.php?resi=<?php echo $d['no_pesanan']; ?>"><i class="bi bi-printer" ></i></a>
											<?php } ?>
										</td>
									</tr>

									<!-- Modal Create -->
									<div class="modal fade" id="exampleModalUpload<?php echo $d['no_pesanan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h1 class="modal-title fs-5" id="exampleModalLabel">Upload Bukti Pembayaran</h1>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<form action="order.php" method="POST">
													<div class="modal-body">
														<?php  
														$pesanan = $d['no_pesanan'];
														$data_bukti = mysqli_query($koneksi,"SELECT * FROM orders JOIN pembayaran ON orders.id_pembayaran = pembayaran.id_pembayaran WHERE no_pesanan = '$pesanan'");
														$bukti = mysqli_fetch_array($data_bukti);
														?>
														<div class="form-group">
															<label for="txt_gambar">Metode Pembayaran</label>
															<input type="text" class="form-control form-control-iklan" placeholder="Metode Pembayaran" name="metode" value="<?php echo $bukti['metode_pembayaran']; ?>">
															<br>
															<label for="no_rek">Nomor Rekening</label>
															<input type="text" class="form-control form-control-iklan" placeholder="no_rek" name="no_rek" value="<?php echo $bukti['no_rek']; ?>">															
														</div>													
														<div class="form-group">
															<br>
															<label for="txt_gambar">Bukti</label>
															<input type="file" class="form-control form-control-iklan" placeholder="Gambar" name="gambar" value="">
														</div>
													</div>
													<div class="modal-footer">
														<button type="submit" class="btn" data-bs-dismiss="modal">Tutup</button>
														<button type="submit" name="create" class="btn text-light" style="background-color: #E8853D;">Simpan</button>
													</div>
												</form>
											</div>
										</div>
									</div>
									<!-- End Modal Create -->

									<!-- Modal -->
									<div class="modal fade" id="exampleModalView<?php echo $d['no_pesanan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h1 class="modal-title fs-5" id="exampleModalLabel">Detail Pesanan</h1>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<form action="order.php" method="POST">
														<?php 
														$pesanan = $d['no_pesanan'];
														$data_order1 = mysqli_query($koneksi,"SELECT * FROM orders JOIN menu ON orders.id_menu = menu.id_menu JOIN pembayaran ON orders.id_pembayaran = pembayaran.id_pembayaran WHERE no_pesanan= '$pesanan' AND id_user='$idUser' LIMIT $halaman_awal, $batas");
														while($d2 = mysqli_fetch_array($data_order1)){ ?>
															<br>
															<img width="100px" src="assets/img/menu/<?php echo $d2['gambar']; ?>" alt="">
															<div class="form-group">
																<br>
																<label for="txt_nama">Nama Menu</label>
																<input type="text" class="form-control form-control-menu" placeholder="Nama Menu" name="txt_nama" value="<?php echo $d2['nama_menu']; ?>">
															</div> 
															<br>
															<div class="form-group">
																<label for="txt_desk">Sub Total Harga</label>
																<input type="text" class="form-control form-control-menu" placeholder="Nama Menu" name="txt_desk" value="<?php echo rupiah($d2['harga_satuan']); ?> x <?php echo $d2['qty']; ?> = <?php echo rupiah($d2['subtotal_harga']); ?>">
															</div> 
														<?php } ?>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn" data-bs-dismiss="modal">Tutup</button>
													</div>
												</div>
											</div>
										</div>
										<?php
									}
								}else{ ?>
									<tr>
										<td colspan="9" class="text-center">Belum Ada Pesanan</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
            </div>
            <div class="tab-pane fade" id="riwayat" role="tabpanel" aria-labelledby="pills-riwayat-tab">
              <div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th class="text-center" style="color: #384046;">No.</th>
										<th class="text-center" style="color: #384046;">No. Pesanan</th>
										<th class="text-center" style="color: #384046;">Tanggal Pesan</th>
										<th class="text-center" style="color: #384046;">Isi Pesanan</th>
										<th class="text-center" style="color: #384046;">Total Harga</th>
										<th class="text-center" style="color: #384046;">Catatan</th>
										<th class="text-center" style="color: #384046;">Bukti Pembayaran</th>
										<th class="text-center" style="color: #384046;">Status</th>
										<th class="text-center" style="color: #384046;">Nota</th>
									</tr>
								</thead>                                    
								<tbody>
									<?php 
									$batas = 10;
									$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
									$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  
									$previous = $halaman - 1;
									$next = $halaman + 1;
									$data = mysqli_query($koneksi,"SELECT * FROM orders JOIN menu ON orders.id_menu = menu.id_menu JOIN pembayaran ON orders.id_pembayaran = pembayaran.id_pembayaran WHERE status_pesanan='Selesai' AND id_user = $idUser;");
									$jumlah_data = mysqli_num_rows($data);
									$total_halaman = ceil($jumlah_data / $batas);
									$data_order = mysqli_query($koneksi,"SELECT DISTINCT tgl_pesan, no_pesanan, status_pesanan FROM orders WHERE status_pesanan='Selesai' AND id_user=$idUser LIMIT $halaman_awal, $batas");
									$nomor = $halaman_awal+1;
									$grand_total = 0;
									if ($jumlah_data>0) {
									while($d = mysqli_fetch_array($data_order)){
										?>
										<tr>
											<td class="text-center"><?php echo $nomor++; ?></td>
											<td class="text-center"><?php echo $d['no_pesanan']; ?></td>
											<td class="text-center"><?php echo $d['tgl_pesan']; ?></td>
											<td class="text-center">
												<a href="" class="text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#exampleModalView<?php echo $d['no_pesanan']; ?>">
													Lihat
												</a>
											</td>
											<td class="text-center"><?php echo rupiah($d['total_harga']); ?></td>
											<td class="text-center"><?php echo $d['catatan']; ?></td>
											<td class="text-center">TF</td>
											<td class="text-center"><?php echo $d['status_pesanan']; ?></td>
											<td class="text-center" style="color: #384046;">
												<a class="btn" href="nota.php?resi=<?php echo $d['no_pesanan']; ?>" ><i class="bi bi-printer"></i></a>
											</td>
										</tr>
										<!-- Modal -->
										<div class="modal fade" id="exampleModalView<?php echo $d['no_pesanan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<form action="order.php" method="POST">
															<?php 
															$pesanan = $d['no_pesanan'];
															$data_order1 = mysqli_query($koneksi,"SELECT * FROM orders JOIN menu ON orders.id_menu = menu.id_menu JOIN pembayaran ON orders.id_pembayaran = pembayaran.id_pembayaran WHERE no_pesanan= '$pesanan' AND id_user='$idUser' LIMIT $halaman_awal, $batas");
															while($d2 = mysqli_fetch_array($data_order1)){ ?>
																<br>
																<img width="100px" src="assets/img/menu/<?php echo $d2['gambar']; ?>" alt="">
																<div class="form-group">
																	<br>
																	<label for="txt_nama">Nama Menu</label>
																	<input type="text" class="form-control form-control-menu" placeholder="Nama Menu" name="txt_nama" value="<?php echo $d2['nama_menu']; ?>">
																</div> 
																<br>
																<div class="form-group">
																	<label for="txt_desk">Deskripsi</label>
																	<input type="text" class="form-control form-control-menu" placeholder="Nama Menu" name="txt_desk" value="<?php echo rupiah($d2['harga_satuan']); ?> x <?php echo $d2['qty']; ?> = <?php echo rupiah($d2['subtotal_harga']); ?>">
																</div> 
															<?php } ?>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
														</div>
													</div>
												</div>
											</div>
											<?php
									}
								}else{ ?>
									<tr>
										<td colspan="9" class="text-center">Belum Ada Riwayat Pesanan</td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
            	</div>
          </div>
    </div>            
</section>
<!-- End Section -->

				<!-- partial -->
				<script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>
				<script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>

				<?php
			}else{
				echo "<script>alert('Anda adalah Admin!')</script>";
				echo "<script>location='dashboard/'</script>"; 
			}
			include "footer.php";
		?>