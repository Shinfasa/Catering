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
                            <h5 class="m-0 font-weight-bold">Edit Data User</h5>
                        </div>
                        <div>
                            <div class="m-4">
                                <form action="edit_user.php" method="POST" class="user">
                                    <div class="form-group">
                                        <input type="hidden" name="txt_id" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_email">Email</label>
                                        <input type="email" class="form-control form-control-user"  placeholder="Email" name="txt_email" value="" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_nama">Nama Lengkap</label>
                                        <input type="text" class="form-control form-control-user" placeholder="Nama Lengkap" name="txt_nama" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_alamat">Alamat</label>
                                        <input type="text" class="form-control form-control-user" placeholder="Alamat" name="txt_alamat" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_nohp">No. Handphone</label>
                                        <input type="number" class="form-control form-control-user" placeholder="No. Handphone" name="txt_nohp" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_pass">Password</label>
                                        <input type="password" class="form-control form-control-user" placeholder="Password" name="txt_pass" value="">
                                    </div>
                                    <button type="submit" name="update" class="btn btn-user btn-block text-light" style="background-color: #E8853D;"><b>Update</b></button>
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