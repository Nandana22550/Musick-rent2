<?php
// Konfigurasi koneksi ke basis data
$servername = "localhost"; // Ganti sesuai nama server Anda
$username = "username"; // Ganti sesuai username basis data Anda
$password = "password"; // Ganti sesuai password basis data Anda
$dbname = "nama_database"; // Ganti sesuai nama basis data Anda

// Buat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
