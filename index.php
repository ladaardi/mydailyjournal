<?php
include "koneksi.php";
?>
<!doctype html>
<html lang="en" data-bs-theme="light">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>mie sedaap</title>

  <!-- ICON -->
  <link rel="icon" href="icon.png">

  <!-- BOOTSTRAP -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- DARK MODE STYLE -->
  <style>
    body {
      transition: background-color 0.3s, color 0.3s;
    }

    [data-bs-theme="dark"] {
      background-color: #121212;
    }

    [data-bs-theme="dark"] .card {
      background-color: #1e1e1e;
    }

    [data-bs-theme="dark"] footer a {
      color: #fff !important;
    }
  </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">mie sedaap</a>
    <span class="ms-3 fw-medium" id="realtime"></span>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#article">Article</a></li>
        <li class="nav-item"><a class="nav-link" href="#gallery">Gallery</a></li>
        <li class="nav-item"><a class="nav-link" href="#schedule">Schedule</a></li>
        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">
            <i class="bi bi-speedometer2"></i> Login
          </a>
        </li>

        <!-- DARK / LIGHT TOGGLE -->
        <li class="nav-item ms-2">
          <button id="themeToggle" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-moon"></i>
          </button>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- HERO -->
<section id="hero" class="text-center p-5 bg-danger-subtle text-sm-start">
  <div class="container">
    <div class="d-sm-flex flex-sm-row-reverse align-items-center">
      <img src="mie soto.webp" class="img-fluid" width="300" alt="mie soto">
      <div>
        <p id="waktuHero" class="fw-medium"></p>
        <h1 class="fw-bold display-4">bikin kenyang sebentar</h1>
        <h4 class="lead display-6">enak makan pas hujan</h4>
      </div>
    </div>
  </div>
</section>

<!-- ARTICLE -->
<section id="article" class="text-center p-5">
  <div class="container">
    <h1 class="fw-bold display-4 pb-3">Article</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <?php
      $sql = "SELECT * FROM article ORDER BY tanggal DESC";
      $hasil = $conn->query($sql);

      if ($hasil && $hasil->num_rows > 0) {
        while ($row = $hasil->fetch_assoc()) {
      ?>
        <div class="col">
          <div class="card h-100">
            <img src="img/<?= htmlspecialchars($row['gambar']); ?>" class="card-img-top" alt="gambar artikel">
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($row['judul']); ?></h5>
              <p class="card-text"><?= htmlspecialchars($row['isi']); ?></p>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary"><?= $row['tanggal']; ?></small>
            </div>
          </div>
        </div>
      <?php
        }
      } else {
        echo "<p class='text-muted'>Belum ada artikel.</p>";
      }
      ?>
    </div>
  </div>
</section>

<!-- GALLERY -->
<section id="gallery" class="text-center p-5 bg-danger-subtle">
  <div class="container">
    <h1 class="fw-bold display-4 pb-3">Gallery</h1>

    <?php
    $sql = "SELECT * FROM gallery ORDER BY tanggal DESC";
    $hasil = $conn->query($sql);

    if ($hasil && $hasil->num_rows > 0) {
    ?>

    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">

        <?php
        $active = "active";
        while ($row = $hasil->fetch_assoc()) {
        ?>
          <div class="carousel-item <?= $active; ?>">
            <img src="upload/<?= $row['gambar']; ?>"
                 class="d-block w-100"
                 alt="<?= $row['judul']; ?>">
          </div>
        <?php
          $active = ""; // hanya item pertama yang active
        }
        ?>

      </div>

      <button class="carousel-control-prev" type="button"
              data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>

      <button class="carousel-control-next" type="button"
              data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>

    </div>

    <?php
    } else {
        echo "<p class='text-muted'>Belum ada gallery.</p>";
    }
    ?>

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

<!-- JAM REALTIME -->
<script>
function updateWaktu() {
  const w = new Date();
  const full = `${w.getDate()}/${w.getMonth()+1}/${w.getFullYear()} - 
               ${w.getHours().toString().padStart(2,'0')}:${w.getMinutes().toString().padStart(2,'0')}:${w.getSeconds().toString().padStart(2,'0')}`;
  document.getElementById("waktuHero").innerHTML = full;
  document.getElementById("realtime").innerHTML = full;
}
setInterval(updateWaktu, 1000);
updateWaktu();
</script>

<!-- DARK / LIGHT SCRIPT -->
<script>
const toggleBtn = document.getElementById("themeToggle");
const icon = toggleBtn.querySelector("i");

const savedTheme = localStorage.getItem("theme");
if (savedTheme) {
  document.documentElement.setAttribute("data-bs-theme", savedTheme);
  icon.className = savedTheme === "dark" ? "bi bi-sun" : "bi bi-moon";
}

toggleBtn.addEventListener("click", () => {
  const html = document.documentElement;
  const theme = html.getAttribute("data-bs-theme") === "dark" ? "light" : "dark";
  html.setAttribute("data-bs-theme", theme);
  localStorage.setItem("theme", theme);
  icon.className = theme === "dark" ? "bi bi-sun" : "bi bi-moon";
});
</script>

</body>
</html>
