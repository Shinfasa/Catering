<?php
  include 'header.php';
?>

<!--Main layout -->
<main class="mt-5 pt-4">
  <div class="container wow fadeIn">

    <!-- Heading -->
    <div class="section-title">
      <br><br>
      <h2>Check Out</h2>
    </div>

    <!--Card-->
    <div class="card mb-3" style="border-radius: 0;">
        <div>
          <div class="m-4">
            <div>
              <h6 style="text-align: right;">Tanggal Pemesanan : 29/12/2022</h6>
            </div>            
            <form action="" method="POST" class="user">
              <div class="form-group pb-3">
                <label for="txt_harga">Username</label>
                <input type="text" class="form-control form-control-user" placeholder="Username" name="txt_harga" value="">
              </div>
              <div class="form-group pb-3">
                <label for="txt_detail">Alamat</label>
                <input type="text" class="form-control form-control-user" placeholder="Alamat" name="txt_detail" value="">
              </div>
              <div class="form-group">
                <label for="txt_gambar">No. Handphone</label>
                <input type="text" class="form-control form-control-user" placeholder="628*****" name="txt_gambar" value="">
              </div>     
            </form>
          </div>
        </div>
    </div>

    <!-- DataTables -->
    <div>                        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center" style="color: #384046;">No.</th>
                            <th class="text-center" style="color: #384046;">Menu</th>
                            <th class="text-center" style="color: #384046;">Harga</th>
                            <th class="text-center" style="color: #384046;">Jumlah</th>
                            <th class="text-center" style="color: #384046;">Total Harga</th>
                        </tr>
                    </thead>                                    
                    <tbody> 
                        <tr>
                            <td class="text-center" style="color: #384046;">1</td>
                            <td class="text-center" style="color: #384046;"><img src="assets/img/p-1.jpg" width="100px"><span style="margin-left: 10px;">Tasty Burger</span></td>
                            <td class="text-center" style="color: #384046;">Rp 10000</td>
                            <td class="text-center" style="color: #384046;">1</td>
                            <td class="text-center" style="color: #384046;">Rp 10000</td>
                        </tr>                                     
                    </tbody>
                    <tfoot>
                      <tr>
                        <th colspan="4" class="text-center" style="color: #384046;">Total Harga</th>
                        <th class="text-center" style="color: #384046;">Rp 10000</th>
                      </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!--Card-->
    <div class="card mb-3" style="border-radius: 0;">
        <div>
          <div class="m-4">
            <form action="" method="POST" class="user">                       
              <div class="form-group pb-3">
                <label for="txt_nama">Tanggal Pemakaian</label>
                <input type="datetime-local" class="form-control form-control-user" name="txt_nama" value="">
              </div> 
              <div class="form-group pb-3">
                <label for="txt_nama">Catatan</label>
                <input type="text" class="form-control form-control-user" name="txt_nama" value="">
              </div> 
              <div class="form-group pb-3">
                <label for="txt_bayar">Metode Pembayaran</label>
                  <div style="font-size:15px;">
                    <input type="radio" name="txt_bayar" value="1" style="margin-left: 20px;">  BRI
                    <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;">  BCA
                    <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;">  Shopee Pay
                    <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;">  Dana
                    <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;">  COD
                  </div>
              </div>
              <a href="payment.php" class="btn btn-user btn-block text-light font-weight-bold" style="background-color: #E8853D;">Lanjutkan</a>
              <button type="submit" name="submit" class="btn btn-user btn-block" style="color: #E8853D;"><b>Kembali</b></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<!--Main layout-->

<?php
include 'footer.php';
?>