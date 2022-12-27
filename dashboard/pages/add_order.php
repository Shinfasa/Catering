<?php
    include('header.php')
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTables Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold">Tambah Data Order</h5>
                        </div>
                        <div>
                            <div class="m-4">
                                <form action="edit_user.php" method="POST" class="user">
                                    <div class="form-group">
                                        <input type="hidden" name="txt_id" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_nama">Nama Customer</label>
                                        <input type="text" class="form-control form-control-user" placeholder="Nama Customer" name="txt_nama" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_tglpesan">Tanggal Pemesanan</label>
                                        <input type="date" class="form-control form-control-user" name="txt_tglpesan" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_tglpakai">Tanggal Pemakaian</label>
                                        <input type="datetime-local" class="form-control form-control-user" name="txt_tglpakai" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_menu">Nama Menu</label>
                                        <input type="text" class="form-control form-control-user" id="exampleFisrtName" placeholder="Nama Menu" name="txt_menu" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_note">Catatan</label>
                                        <input type="text" class="form-control form-control-user" placeholder="Catatan" name="txt_note" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_hrgsatuan">Harga Satuan</label>
                                        <input type="number" class="form-control form-control-user" placeholder="Harga Satuan" name="txt_hrgsatuan" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_jml">Jumlah Pesanan</label>
                                        <input type="number" class="form-control form-control-user" placeholder="Harga Satuan" name="txt_jml" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_total">Total Harga</label>
                                        <input type="number" class="form-control form-control-user" placeholder="Total Harga" name="txt_total" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_bayar">Metode Pembayaran</label>
                                        <div style="font-size:15px;">
                                            <input type="radio" name="txt_bayar" value="1" style="margin-left:20px;">  BRI
                                            <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;">  BCA
                                            <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;">  Shopee Pay
                                            <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;">  Dana
                                            <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;">  COD
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_tglbayar">Tanggal Pembayaran</label>
                                        <input type="date" class="form-control form-control-user" placeholder="Tanggal Pembayaran" name="txt_tglbayar" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_status">Status Pesanan</label>
                                        <div style="font-size:15px;">
                                            <input type="radio" name="txt_status" value="1" style="margin-left:20px;">  Belum Dibayar
                                            <input type="radio" name="txt_status" value="2" style="margin-left: 50px;">  Sedang Diproses
                                            <input type="radio" name="txt_status" value="2" style="margin-left: 50px;">  Selesai
                                        </div>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-user btn-block text-light" style="background-color: #E8853D;"><b>Simpan</b></button>
                                    <button class="btn btn-light btn-user btn-block"><a href="user.php">Kembali</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>