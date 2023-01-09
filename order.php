<?php
include("header.php");
if ($_SESSION['akses'] == 2 || empty($_SESSION['akses'])) {
	?>

	<br><br>
	<!-- popular section starts  -->
	<section id="menu" class="what-we-do">
		<div class="container">

			<div class="section-title">
				<h2>Pesanan Saya</h2>
			</div>

			<!-- DataTables -->
			<div>                        
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

								$data = mysqli_query($koneksi,"SELECT * FROM orders JOIN menu ON orders.id_menu = menu.id_menu JOIN pembayaran ON orders.id_pembayaran = pembayaran.id_pembayaran WHERE id_user = $idUser;");
								$jumlah_data = mysqli_num_rows($data);
								$total_halaman = ceil($jumlah_data / $batas);

								$data_order = mysqli_query($koneksi,"SELECT DISTINCT tgl_pesan, no_pesanan, status_pesanan, catatan FROM orders WHERE status_pesanan!='Selesai' AND id_user=$idUser LIMIT $halaman_awal, $batas");

								$data_order1 = mysqli_query($koneksi,"SELECT * FROM orders JOIN menu ON orders.id_menu = menu.id_menu JOIN pembayaran ON orders.id_pembayaran = pembayaran.id_pembayaran WHERE status_pesanan!='Selesai' AND id_user=$idUser LIMIT $halaman_awal, $batas");

								$nomor = $halaman_awal+1;
								$grand_total = 0;
								while($data = mysqli_fetch_array($data_order1)){
									
									while($d = mysqli_fetch_array($data_order)){
										$sub_total = ($data['harga_satuan'] * $data['qty']);
										$grand_total += $sub_total;
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
											<td class="text-center"><?php echo rupiah($grand_total); ?></td>
											<td class="text-center"><?php echo $d['catatan']; ?></td>
											<td class="text-center">TF</td>
											<td class="text-center"><?php echo $d['status_pesanan']; ?></td>
											<td class="text-center" style="color: #384046;">
												<a class="btn" href="nota.php?resi=<?php echo $d['no_pesanan']; ?>"><i class="bi bi-printer"></i></a>
											</td>
										</tr>

										<!-- Modal -->
										<div class="modal fade" id="exampleModalView<?php echo $d['no_pesanan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h1 class="modal-title fs-5" id="exampleModalLabel">Isi Pesanan</h1>
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
																	<input type="text" class="form-control form-control-menu" placeholder="Nama Menu" name="txt_desk" value="<?php echo rupiah($d2['harga_satuan']); ?> x <?php echo $d2['qty']; ?> = <?php echo rupiah($d2['total_harga']); ?>">
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
									}
									?>    
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</section>
			<!-- End Section -->

			<!-- popular section starts  -->
			<section id="menu" class="what-we-do">
				<div class="container">

					<div class="section-title">
						<h2>Riwayat Pesanan</h2>
					</div>

					<!-- DataTables -->
					<div>                        
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th class="text-center" style="color: #384046;">No.</th>
											<th class="text-center" style="color: #384046;">No. Pesanan</th>
											<th class="text-center" style="color: #384046;">Tanggal Pesan</th>
											<th class="text-center" style="color: #384046;">Isi Pesanan</th>
											<th class="text-center" style="color: #384046;">Sub Total Harga</th>
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

										$data_order = mysqli_query($koneksi,"SELECT DISTINCT tgl_pesan, no_pesanan, status_pesanan FROM orders WHERE status_pesanan='Selesai' AND id_user=$idUser LIMIT $halaman_awal, $batas");
										$nomor = $halaman_awal+1;
										$grand_total = 0;
										while($d = mysqli_fetch_array($data_order)){

											?>
											<tr>
												<td class="text-center"><?php echo $nomor++; ?></td>
												<td class="text-center"><?php echo $d['no_pesanan']; ?></td>
												<td class="text-center"><?php echo $d['tgl_pesan']; ?></td>
												<td class="text-center">
													<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
														Launch demo modal
													</button>
												</td>
												<td class="text-center"><?php //echo $grand_total; ?></td>
												<td class="text-center">TF</td>
												<td class="text-center"><?php echo $d['status_pesanan']; ?></td>
												<td class="text-center" style="color: #384046;">
													<a class="btn" href="nota.php"><i class="bi bi-printer"></i></a>
												</td>
											</tr>
											<!-- Modal -->
											<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
															...
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
															<button type="button" class="btn btn-primary">Save changes</button>
														</div>
													</div>
												</div>
											</div>
											<?php
										}
										?>    
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</section>
				<!-- End Section -->
				<?php
			}else{

				echo "<script>alert('Anda adalah Admin!')</script>";
				echo "<script>location='dashboard/'</script>"; 
			}
			include "footer.php";
		?>