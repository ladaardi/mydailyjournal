<?php
session_start();
include "koneksi.php";

$username = $_SESSION['username'];
$password = $_POST['password'];

// Jika password diisi → update password
if (!empty($password)) {
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "UPDATE user SET password='$password_hash' WHERE username='$username'");
}

// Jika upload foto
if (!empty($_FILES['foto']['name'])) {
    $namaFoto = time() . '_' . $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    move_uploaded_file($tmp, "img/" . $namaFoto);

    mysqli_query($conn, "UPDATE user SET foto='$namaFoto' WHERE username='$username'");
}

header("Location: admin.php?page=profile");
