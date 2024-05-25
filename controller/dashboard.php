<?php
include('model/RentalMusikModel.php'); // Panggil model untuk rental musik

class RentalMusikController extends RentalMusikModel {
    // Fungsi utama untuk menampilkan dashboard
    public function index() {
        $title = "Dashboard Rental Musik";
        require('view/dashboard.php'); // Tampilkan halaman dashboard
    }

    // Fungsi untuk menampilkan data alat musik
    public function show_alat_musik() {
        $alat_musik_data = $this->get_alat_musik_data(); // Ambil data alat musik dari model
        require('view/alat_musik.php'); // Tampilkan halaman untuk menampilkan data alat musik
    }

    // Fungsi untuk menambahkan alat musik baru
    public function add_alat_musik() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->add_alat_musik(); // Panggil metode dalam model untuk menambahkan alat musik
            header("Location: dashboard.php"); // Redirect kembali ke halaman dashboard setelah berhasil menambahkan alat musik
            exit();
        }
        require('view/add_alat_musik.php'); // Tampilkan halaman untuk menambahkan alat musik
    }

    // Fungsi untuk mengedit alat musik
    public function edit_alat_musik() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->edit_alat_musik(); // Panggil metode dalam model untuk mengedit alat musik
            header("Location: dashboard.php"); // Redirect kembali ke halaman dashboard setelah berhasil mengedit alat musik
            exit();
        }
        require('view/edit_alat_musik.php'); // Tampilkan halaman untuk mengedit alat musik
    }

    // Fungsi untuk menghapus alat musik
    public function delete_alat_musik() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->delete_alat_musik(); // Panggil metode dalam model untuk menghapus alat musik
            header("Location: dashboard.php"); // Redirect kembali ke halaman dashboard setelah berhasil menghapus alat musik
            exit();
        }
    }
}

// Buat objek dari kelas RentalMusikController
$controller = new RentalMusikController();

// Periksa permintaan dan panggil fungsi yang sesuai
if(isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'show_alat_musik':
            $controller->show_alat_musik();
            break;
        case 'add_alat_musik':
            $controller->add_alat_musik();
            break;
        case 'edit_alat_musik':
            $controller->edit_alat_musik();
            break;
        case 'delete_alat_musik':
            $controller->delete_alat_musik();
            break;
        default:
            $controller->index();
            break;
    }
} else {
    $controller->index();
}
?>
