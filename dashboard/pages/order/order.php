<?php
//Memanggil Header
include('../header.php');
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

<body>
    <div class="container-fluid py-3">
      <div class="row">
        <div class="col-12">
          <div class="card" style="height:100vh; max-height: 540px;">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center mb-3">
                <h6 class="mb-0">Order</h6>
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                  <div class="input-group">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" placeholder="Type here...">
                  </div>
                </div>
              </div>
            </div>
            <div class="tabs-to-dropdown">
              <div class="nav-wrapper d-flex align-items-center justify-content-between">
                <ul class="nav nav-pills d-none d-md-flex" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pills-belum-dibayar-tab" data-toggle="pill" href="#belum-dibayar" role="tab" aria-controls="belum-dibayar" aria-selected="true">Belum Dibayar</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-sedang-diproses-tab" data-toggle="pill" href="#sedang-diproses" role="tab" aria-controls="sedang-diproses" aria-selected="false">Sedang Diproses</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-pesanan-selesai-tab" data-toggle="pill" href="#pesanan-selesai" role="tab" aria-controls="pesanan-selesai" aria-selected="false">Pesanan Selesai</a>
                  </li>
                </ul>
              </div>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="belum-dibayar" role="tabpanel" aria-labelledby="pills-belum-dibayar-tab">
                  <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Customer</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Pesan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Pakai</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Menu</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Catatan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga Satuan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Harga</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pembayaran</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Bayar</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Pesanan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                          </tr>
                        </thead>
                        <tbody>                    
                            <tr>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                            </tr>                      
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="sedang-diproses" role="tabpanel" aria-labelledby="pills-sedang-diproses-tab">
                  <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Customer</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Pesan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Pakai</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Menu</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Catatan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga Satuan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Harga</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pembayaran</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Bayar</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Pesanan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                          </tr>
                        </thead>
                        <tbody>                    
                            <tr>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                            </tr>                      
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>  
                <div class="tab-pane fade" id="pesanan-selesai" role="tabpanel" aria-labelledby="pills-pesanan-selesai-tab">
                  <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Customer</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Pesan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Pakai</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Menu</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Catatan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga Satuan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Harga</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pembayaran</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Bayar</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Pesanan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                          </tr>
                        </thead>
                        <tbody>                    
                            <tr>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                              <td class="text-center">-</td>
                            </tr>                      
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>            
          </div>
        </div>
      </div>
    </div>

</body>

<!-- partial -->
<script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>

  <?php
//Memanggil Footer
include('../footer.php')
?>