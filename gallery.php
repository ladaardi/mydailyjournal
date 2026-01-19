

<div class="container">
    	<div class="row mb-2">
        <div class="col-md-6">
        <button type="button" class="btn btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="bi bi-plus-lg"></i> Tambah gallery
        </button>
        </div>
        <div class="col-md-6">
            <div class="input-group">
            <input type="text" id="search" class="form-control" placeholder="ketikan minimal tiga huruf untuk pencarian..">
            <span class="input-group-text">
            <i class="bi bi-search"></i>
            </span>
            </div>
        </div>    
        </div>
<!-- Button tambah data -->

    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th class="w-25">Judul</th>
                        <th class="w-50">Isi</th>
                        <th class="w-50">Gambar</th>
                        <th class="w-25">Aksi</th>
                    </tr>
                </thead>
                <tbody id="result">
                    
                </tbody>
            </table>
        </div>
        <!--modal tambah gallery-->
        <!-- modal tambah gallery -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="post" action="" enctype="multipart/form-data">

        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modalTambahLabel">Tambah gallery</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" class="form-control" name="judul" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Isi</label>
            <textarea class="form-control" name="isi" required></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Gambar</label>
            <input type="file" class="form-control" name="gambar">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <!-- INI SATU-SATUNYA TOMBOL SUBMIT -->
          <input type="submit" value="Simpan" name="simpan" class="btn btn-primary">
        </div>

      </form>

    </div>
  </div>
</div>
<script>
    function loadData(keyword = '') {
        $.ajax({
            url: "carigal.php",
            type: "POST",
            data: {
                keyword: keyword
            },
            success: function(data) {
                $("#result").html(data);
            }
        });
    }

    // load awal
    loadData();

    // event pencarian
    $("#search").on("keyup", function () {
    let keyword = $(this).val();

    if (keyword.length >= 3 || keyword.length === 0) {
        loadData(keyword);
    }
});

</script>
<?php
include "koneksi.php";   
include "uplodfoto.php";


/* =========================
   SIMPAN / UPDATE gallery
========================= */
if (isset($_POST['simpan'])) {

    $judul    = $_POST['judul'];
    $isi      = $_POST['isi'];
    $tanggal  = date("Y-m-d H:i:s");
    $username = $_SESSION['username'];
    $gambar   = '';
    $nama_gambar = $_FILES['gambar']['name'];

    // jika upload gambar
    if ($nama_gambar != '') {
        $cek_upload = upload_foto($_FILES["gambar"]);

        if ($cek_upload['status']) {
            $gambar = $cek_upload['message'];
        } else {
            echo "<script>
                alert('".$cek_upload['message']."');
                document.location='admin.php?page=gallery';
            </script>";
            die;
        }
    }

    // UPDATE
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        if ($nama_gambar == '') {
            $gambar = $_POST['gambar_lama'];
        } else {
            if (file_exists("img/".$_POST['gambar_lama'])) {
                unlink("img/".$_POST['gambar_lama']);
            }
        }

        $stmt = $conn->prepare("
            UPDATE gallery 
            SET judul=?, isi=?, gambar=?, tanggal=?, username=?
            WHERE id=?
        ");
        $stmt->bind_param("sssssi", $judul, $isi, $gambar, $tanggal, $username, $id);

    } 
    // INSERT
    else {
        $stmt = $conn->prepare("
            INSERT INTO gallery (judul, isi, gambar, tanggal, username)
            VALUES (?,?,?,?,?)
        ");
        $stmt->bind_param("sssss", $judul, $isi, $gambar, $tanggal, $username);
    }

    $simpan = $stmt->execute();

    if ($simpan) {
        echo "<script>alert('Simpan data sukses');</script>";
    } else {
        echo "<script>alert('Simpan data gagal');</script>";
    }

    $stmt->close();
    $conn->close();

    echo "<script>document.location='admin.php?page=gallery';</script>";
}

/* =========================
   HAPUS gallery (FIX)
========================= */
if (isset($_POST['hapus'])) {

    $id     = $_POST['id'];
    $gambar = $_POST['gambar'];

    // hapus file gambar
    if ($gambar != '' && file_exists("img/".$gambar)) {
        unlink("img/".$gambar);
    }

    $stmt = $conn->prepare("DELETE FROM gallery WHERE id=?");
    $stmt->bind_param("i", $id);
    $hapus = $stmt->execute();

    if ($hapus) {
        echo "<script>alert('Hapus data sukses');</script>";
    } else {
        echo "<script>alert('Hapus data gagal');</script>";
    }

    $stmt->close();
    $conn->close();

    echo "<script>document.location='admin.php?page=gallery';</script>";
}
?>