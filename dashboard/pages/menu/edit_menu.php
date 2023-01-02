<?php
    include('../header.php');

    if(isset($_POST['create'])){
        $id = ($_POST['txt_id']); 
        $nama = ($_POST['txt_nama']);
        $harga = ($_POST['txt_harga']);
        $detail = ($_POST['txt_detail']);
        $gambar = ($_POST['txt_gambar']);
        $kategori = ($_POST['txt_kategori']);
      
        $update=mysqli_query($koneksi,"UPDATE menu SET nama_menu='$nama', harga='$harga', detail='$detail', gambar='$gambar', id_kategori='$kategori' WHERE id_menu='$id'");
        if($update){
          echo "<script>alert('Data di Update')</script>";
          echo "<script>location='menu.php'</script>";
        }
      }
    
    $id_menu = $_GET['id_menu'];
    $query = "SELECT * FROM menu WHERE id_menu = '$id_menu'";
    $result = mysqli_query($koneksi, $query);
    $u = mysqli_fetch_array($result);

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
                            <h5 class="m-0 font-weight-bold">Edit Data Menu</h5>
                        </div>
                        <div>
                            <div class="m-4">
                                <form action="edit_menu.php" method="POST" class="menu">
                                    <div class="form-group">
                                        <input type="hidden" name="txt_id" value="<?php echo $u['id_menu']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_nama">Nama Menu</label>
                                        <input type="text" class="form-control form-control-menu" placeholder="Nama Menu" name="txt_nama" value="<?php echo $u['nama_menu']; ?>">
                                    </div> 
                                    <div class="form-group">
                                        <label for="txt_harga">Harga Menu</label>
                                        <input type="number" class="form-control form-control-menu" placeholder="Harga Menu" name="txt_harga" value="<?php echo $u['harga']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_detail">Detail Menu</label>
                                        <textarea class="form-control form-control-menu" name="txt_detail" placeholder="Detail Menu"><?php echo $u['detail']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_gambar">Gambar Menu</label>
                                        <input type="file" class="form-control form-control-menu" placeholder="Gambar Menu" name="txt_gambar" value="<?php echo $u['gambar']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_kategori">Kategori</label>
                                        <div style="font-size:15px;">
                                            <input type="radio" name="txt_kategori" value="1" style="margin-left:20px;">  Harian
                                            <input type="radio" name="txt_kategori" value="2" style="margin-left: 100px;">  Prasmanan
                                            <input type="radio" name="txt_kategori" value="2" style="margin-left: 100px;">  Kotakan
                                        </div>
                                    </div>
                                    <button type="submit" name="update" class="btn btn-menu btn-block text-light" style="background-color: #E8853D;"><b>Update</b></button>
                                    <button class="btn btn-light btn-menu btn-block"><a href="menu.php">Kembali</button>
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