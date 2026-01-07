<?php
//menyertakan code dari file koneksi
include "koneksi.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>mie sedaap</title>
    <link rel="icon" href="icon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
      <div class="container">
        <a class="navbar-brand fw-bold" href="#">mie sedaap</a>

        <span class="ms-3" id="realtime" style="font-weight: 500;"></span>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="#">home</a></li>
            <li class="nav-item"><a class="nav-link" href="#article">article</a></li>
            <li class="nav-item"><a class="nav-link" href="#gallery">gallery</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- HERO -->
    <!-- HERO -->
<section id="hero" class="text-center p-5 bg-danger-subtle text-sm-start">
  <div class="container">
    <div class="d-sm-flex flex-sm-row-reverse align-items-center">
      <img src="mie soto.webp" class="img-fluid" width="300">
      <div>
        <p id="waktuHero"></p>

        <h1 class="fw-bold display-4">bikin kenyang sebentar</h1>

        <!-- Teks + Waktu Digabung -->
        <h4 class="lead display-6">enak makan pas hujan</h4>
        <p id="waktuHero" style="font-size: 18px; font-weight: 500; margin-top: -10px;"></p>

      </div>
    </div>
  </div>
</section>


    <!-- ARTICLE -->
    <section id="article" class="text-center p-5">
      <div class="container">
        <h1 class="fw-bold display-4 pb-3">article</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">

        <?php
        $sql = "SELECT * FROM article ORDER BY tanggal DESC";
        $hasil = $conn->query($sql); 
        print_r($hasil);

        while($row = $hasil->fetch_assoc()){
        

        ?>

          <!-- cool begin -->
          <div class="col">
            <div class="card h-100">
              <img src="img/<?= $row["gambar"]?>" class="card-img-top"alt=.../>
              <div class="card-body">
                <h5 class="card-title">mie goreng</h5>
                <p class="card-text">Mie goreng merupakan salah satu makanan populer</p>
                <?=$row["isi"]?>
              </div>
            <div class="card-footer">
               <small class="text-body-secondary">
              <?= $row['tanggal']; ?>
           </small>
            </div>

          </div>
         </div>

          <!--cool end -->

          <?php
          }
          ?>
        </div>
      </div>
    </section>

    <!-- GALLERY -->
    <section id="gallery" class="text-center p-5 bg-danger-subtle">
      <div class="container">
        <h1 class="fw-bold display-4 pb-3">gallery</h1>
        <div id="carouselExample" class="carousel slide">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="kabeh.webp" class="d-block w-100">
            </div>
          </div>

          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </button>

          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
          </button>
        </div>
      </div>
    </section>

    <!-- SCHEDULE -->
    <section id="schedule" class="text-center p-5 bg-white">
      <div class="container">
        <h2 class="fw-bold mb-4">Schedule</h2>

        <!-- ROW 1 -->
        <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center">
          <div class="col">
            <div class="card h-100 shadow-sm border-0">
              <div class="card-body">
                <i class="bi bi-book h1 text-danger"></i>
                <h5 class="fw-semibold">Membaca</h5>
                <p class="text-muted">Menambah wawasan setiap pagi.</p>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card h-100 shadow-sm border-0">
              <div class="card-body">
                <i class="bi bi-pencil-square h1 text-danger"></i>
                <h5 class="fw-semibold">Menulis</h5>
                <p class="text-muted">Mencatat pengalaman harian.</p>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card h-100 shadow-sm border-0">
              <div class="card-body">
                <i class="bi bi-people h1 text-danger"></i>
                <h5 class="fw-semibold">Diskusi</h5>
                <p class="text-muted">Bertukar ide dengan teman.</p>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card h-100 shadow-sm border-0">
              <div class="card-body">
                <i class="bi bi-bicycle h1 text-danger"></i>
                <h5 class="fw-semibold">Olahraga</h5>
                <p class="text-muted">Bersepeda sore hari.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- ROW 2 -->
        <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center mt-1">
          <div class="col">
            <div class="card h-100 shadow-sm border-0">
              <div class="card-body">
                <i class="bi bi-film h1 text-danger"></i>
                <h5 class="fw-semibold">Movie</h5>
                <p class="text-muted">Menonton film bagus.</p>
              </div>
            </div>
          </div>

          <div class="col"></div>
          <div class="col"></div>

          <div class="col">
            <div class="card h-100 shadow-sm border-0">
              <div class="card-body">
                <i class="bi bi-bag-check h1 text-danger"></i>
                <h5 class="fw-semibold">Belanja</h5>
                <p class="text-muted">Belanja kebutuhan bulanan.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- ABOUT -->
    <section id="about" class="p-5 text-center" style="background-color: #f8d7da;">
      <div class="container">
        <h2 class="fw-bold mb-4">About Me</h2>
        <div class="accordion" id="accordionExample">

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button bg-danger text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                Universitas Dian Nuswantoro (2024-Now)
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show">
              <div class="accordion-body">This is the first item's accordion body.</div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                SMA Negeri 1 Semarang (2021–2024)
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse">
              <div class="accordion-body">Masa SMA adalah waktu belajar ...</div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                SMP Negeri 2 Semarang (2018–2021)
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse">
              <div class="accordion-body">Masa SMP penuh pengalaman ...</div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- FOOTER -->
    <footer class="text-center p-5">
      <div>
        <a href="https://www.instagram.com/ladaardi_s.l/" class="text-dark p-2 h2"><i class="bi bi-instagram"></i></a>
        <a href="https://twitter.com/udinusofficial" class="text-dark p-2 h2"><i class="bi bi-twitter"></i></a>
        <a href="https://wa.me/+6285702307771" class="text-dark p-2 h2"><i class="bi bi-whatsapp"></i></a>
      </div>
      <div>ladaardi sachio lawidyarthdana &copy;2025</div>
    </footer>

    <!-- SCROLL BUTTON -->
    <button id="scrollTopBtn" class="btn btn-danger rounded-circle p-3" style="display:none; position:fixed; bottom:20px; right:20px;">
      <i class="bi bi-arrow-up"></i>
    </button>

    <!-- SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

   <script type="text/javascript">
  function updateWaktu() {
    const waktu = new Date();

    const tanggal = waktu.getDate();
    const bulan = waktu.getMonth();
    const tahun = waktu.getFullYear();
    const jam = waktu.getHours();
    const menit = waktu.getMinutes();
    const detik = waktu.getSeconds();

    const arrBulan = ["1","2","3","4","5","6","7","8","9","10","11","12"];

    const tanggal_full = tanggal + "/" + arrBulan[bulan] + "/" + tahun;
    const jam_full =
      jam.toString().padStart(2, "0") + ":" +
      menit.toString().padStart(2, "0") + ":" +
      detik.toString().padStart(2, "0");

    // MASUKKAN KE HERO
    const heroWaktu = document.getElementById("waktuHero");
    if (heroWaktu) {
      heroWaktu.innerHTML = tanggal_full + " - " + jam_full;
    }

    // MASUKKAN KE NAVBAR
    const navRealtime = document.getElementById("realtime");
    if (navRealtime) {
      navRealtime.innerHTML = tanggal_full + " • " + jam_full;
    }
  }

  // Update setiap detik
  setInterval(updateWaktu, 1000);

  // Jalankan pertama kali
  updateWaktu();

  //scroll on top
  const scrollBtn = document.getElementById("scrollTopBtn");

  window.addEventListener("scroll", function () {
    if (window.scrollY > 200) {
      scrollBtn.style.display = "block";
    } else {
      scrollBtn.style.display = "none";
    }
  });

  scrollBtn.addEventListener("click", function () {
    window.scrollTo({
      top: 0,
      behavior: "smooth"
    });
  });
</script>


  </body>
</html>
