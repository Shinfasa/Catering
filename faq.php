<?php
    include('header.php');
      if ($_SESSION['akses'] == 2) {
?>

<br><br>

<body>

<!-- popular section starts  -->
<section id="faq" class="what-we-do">
  <div class="container">

    <div class="section-title">
      <h2>Frequently Asked Questions (FAQ)</h2>
    </div>
    
<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
        1. Bagaimana cara membuat Akun?
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <ul data-role="list">
          <strong>Anda dapat membuat akun dengan cara berikut:</strong> 
          <li>Masuk pada halaman Login</li> 
          <li>Pilih ikon Sign Up pada halaman Login</li>
          <li>Kemudian masukkan Username anda</li>
          <li>Masukkan Email yang Anda miliki</li>
          <li>Masukkan Password</li>
          <li>Setelah itu klik pada tombol Sign Up</li>
          <li>Kemudian Anda akan diarahkan pada halaman Login dan Anda bisa Login dengan akun yang telah Anda buat.</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        2. Bagaimana cara untuk melakukan Pemesanan dan Pembayaran?
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <ul data-role="list">
          <strong>Berikut cara untuk melakukan pemesanan pada WM Hana Asri.</strong>
          <li>Pilih Menu yang akan di pesan pada tombol Kategori/Menu/Pada Rekomendasi Menu</li>
          <li>Setelah itu Anda bisa melihat Detail Menu yang ada pada Menu</li>
          <li>Kemudian Anda bisa memasukkan jumlah pemesanan yang diinginkan</li>
          <li>Pilih tombol Add to Cart untuk memasukkan pemesanan pada Keranjang Anda</li>
          <li>Masuk pada halaman Keranjang</li>
          <li>Anda bisa melihat detail pesanan Anda pada keranjang</li>
          <li>Kemudian klik tombol Check Out untuk melakukan Pemesanan</li>
          <li>Pada halaman Check Out Anda harus memasukkan detail pembayaran Anda</li>
          <li>Setelah itu klik tombol Check Out</li>
          <li>Kemudian Anda diharus kan mengupload Bukti Transfer Pembayaran</li>
          <li>Sekarang Anda telah melakukan pemesanan dan pembayaran, Anda bisa melihat detail pesanan pada Pesanan Saya.</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        3. Dimana saya dapat melihat Riwayat Pesanan?
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <ul data-role="list">
          <strong>Anda dapat melihat Riwayat Pesanan Anda dengan cara berikut:</strong>
          <li>Pada halaman Beranda terdapat tombol Pesanan Saya</li>
          <li>Kemudian klik dan Anda akan diarahkan pada halaman Pesanan Saya</li>
          <li>Dalam halaman Pesanan Saya Anda dapat melihat detail Pesanan Anda dan Riwayat Pesanan Anda.</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingFour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
        4. Bagaimana Prosedur Pembayaran?
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <ul data-role="list">
          <strong>Berikut Prosedur Pembayaran :</strong>
          <li>Setelah Anda memasukkan detail Pembayaran Anda pada halaman Check Out</li>
          <li>Terdapat pilihan bank untuk melakukan metode pembayaran</li>
          <li>Setelah Anda memilih metode pembayaran, Anda diharuskan melakukan transaksi pada akun rekening yang telah di cantumkan</li>
          <li>Kemudian setelah anda melakukan transaksi pembayaran Anda diharuskan mengupload file bukti transaksi pembayaran.</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingFive">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapsefive">
        5. Apa yang terjadi jika telat melakukan pembayaran lebih dari 24 jam?
      </button>
    </h2>
    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <ul data-role="list">
          <strong>Berikut jika Anda telat melakukan pembayaran lebih dari kurun waktu 24 jam.</strong>
          <li>Jika anda telat melakukan pembayaran lebih dari 24 jam maka Pesanan Anda yang ingin di Check Out akan otomatis di cancel atau dibatalkan, Maka dari itu lakukan pembayaran sebelum 24 jam jika pesanan Anda tidak ingin dibatalkan.</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingSix">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
        6. Bagaimana cara menghubungi customer service?
      </button>
    </h2>
    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <ul data-role="list">
        <strong>Customer Service.</strong>
        <br>Apabila Anda memiliki pertanyaan lebih lanjut atau mengalami kendala saat menggunakan WM Hana Asri, silahkan hubungi No.Telp dan Email yang tercantum dibawah ini untuk informasi lebih lanjut:
        <br><strong>No. Telepon</strong>
        <li>+62 858 1531 3767</li>
        <li>+62 822 2883 5524</li>
        <br><strong>Email</strong>
        <li>wm.hanaasri@gmail.com</li>
        </ul>
      </div>
    </div>
  </div>
</div>

</div>

</section>
<!-- End Section -->

</body>

<?php
}else{

  echo "<script>alert('Anda adalah Admin!')</script>";
  echo "<script>location='dashboard/'</script>"; 
}
    include('footer.php');
?>