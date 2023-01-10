<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

  <div class="footer-top" style="background-color: #FFDA72;">
    
    <div class="container">
      
      <div class="row">

        <div class="col-lg-3 col-md-6 footer-newsletter" style="margin-right: 50px;">
          <a href="index.html"><img src="assets/img/logo/logo.png" alt="" class="img-fluid" style="width: 150px;"></a>
          <br><br>
          <p style="text-align: justify;">WM Hana Asri merupakan salah satu warung makan yang dibangun pada tahun 2012. Warung makan ini awalnya dibangun untuk membantu mahasiswa yang bertempat tinggal di sekitar wilayah patrang.</p>
        </div>
        
        <div class="col-lg-2 col-md-4 footer-links">
          <h4>Link Terkait</h4>
          <ul class="pt-4">
            <li><i class="bx bx-chevron-right"></i> <a href="index.php">Beranda</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#categories">Kategori</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#menu">Menu</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="order.php">Pesanan Saya</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="faq.php">FAQ</a></li>
          </ul>
        </div>
        
        <div class="col-lg-2 col-md-4 footer-links">
          <h4>Kategori Menu</h4>
          <ul class="pt-4">
            <?php  
            $data_kategori = mysqli_query($koneksi,"SELECT * FROM kategori");
            while($k = mysqli_fetch_array($data_kategori)){
              ?>
              <li><i class="bx bx-chevron-right"></i> <a href="menu.php?id_kategori=<?php echo $k['id_kategori']; ?>"><?php echo $k['nama_kategori']; ?></a></li>
            <?php } ?>
          </ul>
        </div>

        <div class="col-lg-4 col-md-4 footer-links">
          <h4 style="font-size: 17px;">Kontak Kami</h4>
          <ul class="pt-4">
            <li><i class="bx bx-chevron-right"></i> <strong>Alamat</strong></li>
            <p style="margin-left: 20px;">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d252767.327915946!2d113.50369662302433!3d-8.153335899999975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695560bb710a5%3A0xaefaa8c282870b5f!2sWarung%20Makan%20Hana%20Asri!5e0!3m2!1sid!2sid!4v1673314342789!5m2!1sid!2sid" width="300" height="180" style="border:1px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </p>
            <li><i class="bx bx-chevron-right"></i> <strong>No. Telepon</strong></li>
            <p class="text-secondary" style="margin-left: 20px;">+62 812-5219-9599</p>
            <p class="text-secondary" style="margin-left: 20px;">+62 858-1531-3767</p>            
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="footer p-5 pt-4 pb-3 d-md-flex text-light" style="background-color: #E8853D;">

    <div class="me-md-auto text-center text-md-start">
      <div class="copyright">
        &copy; 2022 Copyright <strong><span>WM Hana Asri</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        By Tim C5 - MIF'21
      </div>
    </div>
    
    <div class="social-links text-center text-md-right pt-3 pt-md-0">
      <a href="https://wa.me/6281252199599?text=Permisi,%20Saya%20mau%20pesan%20catering" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
      <a href="https://web.facebook.com/wm.hanaasri/" class="facebook"><i class="bx bxl-facebook"></i></a>
      <a href="https://www.instagram.com/wm.hanaasri/" class="instagram"><i class="bx bxl-instagram"></i></a>
    </div>

  </div>
  
</footer>

<!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
</body>
</html>