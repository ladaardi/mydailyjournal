<?php
// ===== ARTICLE =====
$sql1 = "SELECT * FROM article";
$hasil1 = $conn->query($sql1);
$jumlah_article = $hasil1->num_rows;

// ===== GALLERY =====
$sql2 = "SELECT * FROM gallery";
$hasil2 = $conn->query($sql2);
$jumlah_gallery = $hasil2->num_rows;



?>
<div class="text-center mt-4">
    <h5>Selamat Datang,</h5>
    <h3 class="text-danger fw-bold">
        <?= $_SESSION['username']; ?>
    </h3>

    <img src="img/<?= $_SESSION['foto']; ?>"
         class="rounded-circle mt-3"
         width="180"
         height="180"
         style="object-fit: cover;">
</div>

<div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center pt-4">
    <div class="col">
        <div class="card border border-danger mb-3 shadow" style="max-width: 18rem;">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="p-3">
                        <h5 class="card-title"><i class="bi bi-newspaper"></i> Article</h5> 
                    </div>
                    <div class="p-3">
                        <span class="badge rounded-pill text-bg-danger fs-2"><?php echo $jumlah_article; ?></span>
                    </div> 
                </div>
            </div>
        </div>
    </div> 
    <div class="col">
        <div class="card border border-danger mb-3 shadow" style="max-width: 18rem;">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="p-3">
                        <h5 class="card-title"><i class="bi bi-camera"></i> Gallery</h5> 
                    </div>
                    <div class="p-3">
                       <span class="badge rounded-pill text-bg-danger fs-2"><?php echo $jumlah_gallery; ?></span>
                    </div> 
                </div>
            </div>
        </div>
    </div> 
</div>