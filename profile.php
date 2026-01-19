<?php
include "koneksi.php";
$username = $_SESSION['username'];

$query = $conn->prepare("SELECT * FROM user WHERE username=?");
$query->bind_param("s", $username);
$query->execute();
$data = $query->get_result()->fetch_assoc();
?>
<h4 class="mb-3">Profile</h4>

<form action="proses_profile.php" method="POST" enctype="multipart/form-data">
    
    <div class="mb-3">
        <label>Username</label>
        <input type="text" class="form-control" 
               value="<?= $data['username']; ?>" readonly>
    </div>

    <div class="mb-3">
        <label>Ganti Password</label>
        <input type="password" class="form-control" 
               name="password"
               placeholder="Tuliskan Password Baru Jika Ingin Mengganti Password Saja">
    </div>

    <div class="mb-3">
        <label>Ganti Foto Profil</label>
        <input type="file" class="form-control" name="foto">
    </div>

    <div class="mb-3">
        <label>Foto Profil Saat Ini</label><br>
        <img src="img/<?= $data['foto']; ?>" width="120">
    </div>

    <button class="btn btn-primary" type="submit" name="simpan">
        Simpan
    </button>
</form>
