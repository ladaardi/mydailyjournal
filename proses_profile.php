<?php
include "koneksi.php";
session_start();

$username = $_SESSION['username'];

/* ===== PASSWORD ===== */
if (!empty($_POST['password'])) {
    $password_md5 = md5($_POST['password']);
    $stmt = $conn->prepare(
        "UPDATE user SET password=? WHERE username=?"
    );
    $stmt->bind_param("ss", $password_md5, $username);
    $stmt->execute();
}

/* ===== FOTO ===== */
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {

    if (!is_dir("img")) {
        die("Folder img tidak ditemukan");
    }

    $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
    $namaBaru = uniqid('profile_') . '.' . $ext;

    move_uploaded_file(
        $_FILES['foto']['tmp_name'],
        "img/" . $namaBaru
    );

    $stmt = $conn->prepare(
        "UPDATE user SET foto=? WHERE username=?"
    );
    $stmt->bind_param("ss", $namaBaru, $username);
    $stmt->execute();
}

header("Location: admin.php?page=profile");
