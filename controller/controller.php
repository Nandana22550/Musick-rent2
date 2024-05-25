<?php
// Include file koneksi database
include 'model/database.php';

// Function untuk mendapatkan data alat musik dari database
function getAlatMusik() {
    global $conn;
    $query = "SELECT * FROM alatmusik";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    } else {
        return "Gagal mengambil data alat musik dari database.";
    }
}

// Function untuk mendapatkan data musisi dari database
function getMusisi() {
    global $conn;
    $query = "SELECT * FROM musisi";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    } else {
        return "Gagal mengambil data musisi dari database.";
    }
}

// Panggil function untuk mendapatkan data dari database
$alatMusik = getAlatMusik();
$musisi = getMusisi();

// Load halaman dashboard
include 'dashboard.php';
?>
