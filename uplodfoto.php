<?php
function upload_foto($file){    

    $hasil = [
        "status" => false,
        "message" => ""
    ];

    // Properti file
    $fileName = $file['name'];
    $tmpName  = $file['tmp_name'];
    $fileSize = $file['size'];

    // Ambil ekstensi
    $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Ekstensi diizinkan
    $allowed = ['jpg','jpeg','png','gif'];

    // Validasi ukuran (500KB)
    if ($fileSize > 500000) {
        $hasil['message'] = "Ukuran gambar maksimal 500KB";
        return $hasil;
    }

    // Validasi ekstensi
    if (!in_array($ext, $allowed)) {
        $hasil['message'] = "Format gambar harus JPG, JPEG, PNG, atau GIF";
        return $hasil;
    }

    // Nama file baru
    $newName = date("YmdHis") . "_" . rand(100,999) . "." . $ext;
    $destination = "img/" . $newName;

    // Upload
    if (move_uploaded_file($tmpName, $destination)) {
        $hasil['status']  = true;
        $hasil['message'] = $newName;
    } else {
        $hasil['message'] = "Gagal upload gambar";
    }

    return $hasil;
}
