<?php
    include('header.php');
?>

<br><br>

<body>

<!-- popular section starts  -->
<section id="faq" class="what-we-do">
  <div class="container">

    <div class="section-title">
      <h2>Frequently Asked Questions (FAQ)</h2>
    </div>
    
    <div class="accordion w-100" id="basicAccordion">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
        data-mdb-target="#basicAccordionCollapseOne" aria-expanded="false" aria-controls="collapseOne">
        1. Bagaimana cara membuat akun?
      </button>
    </h2>
    <div id="basicAccordionCollapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
      data-mdb-parent="#basicAccordion">
      <div class="accordion-body">
        Anda bisa membuat akun dengan cara :
        Masuk pada halaman Login > Pilih ikon Sign Up untuk membuat akun > Kemudian masukkan Username Anda > masukkan E-mail yang Anda miliki > Masukkan juga Password Anda > kemudian klik ikon Sign Up yang berada di bawah > Setelah itu Anda akan dibawa pada halaman Login dan Anda bisa Login menggunakan akun yang sudah Anda buat.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
        data-mdb-target="#basicAccordionCollapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        2. Bagaimana cara melakukan pesanan?
      </button>
    </h2>
    <div id="basicAccordionCollapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
      data-mdb-parent="#basicAccordion">
      <div class="accordion-body">
        <strong>This is the second item's accordion body.</strong> It is hidden by default,
        until the collapse plugin adds the appropriate classes that we use to style each
        element. These classes control the overall appearance, as well as the showing and
        hiding via CSS transitions. You can modify any of this with custom CSS or overriding
        our default variables. It's also worth noting that just about any HTML can go within
        the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
        data-mdb-target="#basicAccordionCollapseThree" aria-expanded="false" aria-controls="collapseThree">
        3. Bagaimana cara membayar pesanan?
      </button>
    </h2>
    <div id="basicAccordionCollapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
      data-mdb-parent="#basicAccordion">
      <div class="accordion-body">
        <strong>This is the third item's accordion body.</strong> It is hidden by default,
        until the collapse plugin adds the appropriate classes that we use to style each
        element. These classes control the overall appearance, as well as the showing and
        hiding via CSS transitions. You can modify any of this with custom CSS or overriding
        our default variables. It's also worth noting that just about any HTML can go within
        the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
</div>
  </div>
</section>
<!-- End Section -->

</body>

<?php
    include('footer.php');
?>