<?php

class RentalMusikModel {
    
    // Fungsi utama
    public function index($data) {
        // Isi fungsi utama disini
    }
    
    // Mendapatkan semua data dari tabel alat musik
    public function get_alat_musik_data() {
        global $con;
        $get_data = $con->query("SELECT * FROM alat_musik ");
        $arr = array();
        while($get = $get_data->fetch_assoc()) {
            array_push($arr, $get);
        }
        return $arr;
    }
    
    // Menambahkan alat musik ke database
    public function add_alat_musik() {
        global $con;
        $con->query('
            INSERT INTO alat_musik (nama_alat, harga_sewa_per_hari)
            VALUES ("'.$_POST['nama_alat'].'","'.$_POST['harga_sewa_per_hari'].'")
        ');
        $_SESSION['message'] = "<div class='alert alert-success' role='alert'>Anda berhasil Menambahkan Data</div>";
    }
    
    // Mengedit alat musik dalam database
    public function edit_alat_musik() {
        global $con;
        $con->query('
            UPDATE alat_musik SET 
            nama_alat ="'.$_POST['nama_alat'].'",
            harga_sewa_per_hari ="'.$_POST['harga_sewa_per_hari'].'"
            WHERE id_alat_musik = "'.$_POST['del'].'"
        ');
        $_SESSION['message'] = "<div class='alert alert-success' role='alert'>Success</div>";
    }
    
    // Menghapus alat musik dari database
    public function delete_alat_musik() {
        global $con;
        $con->query('DELETE FROM alat_musik WHERE id_alat_musik = "'.$_POST['del'].'"');
        $_SESSION['message'] = "<div class='alert alert-success' role='alert'>Anda berhasil melakukan Menghapus Data</div>";
    }
    
    // Implementasi metode untuk tabel penyewaan, pelanggan, dll. sesuai dengan yang Anda butuhkan
    
}
?>
