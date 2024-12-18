<?php
class Login extends Controller{
    public function index(){
        
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            // Hanya mengakses email jika sudah ada dan tidak kosong
            $data['user'] = $this->model('user_model')->getUser();
        } else {
            // Jika email tidak ada, tampilkan pesan error atau redirect
            $data = null;
        }
        $this->view('templates/header');
        $this->view('login/index',$data);
        $this->view('templates/footer');
    }
    public function auth() {
        session_start();
        if (isset($_POST['submit'])) {
            // Mengambil data dari form dan membersihkan
            $email = ($_POST['email']);
            $password = ($_POST['password']);
    
            // Periksa apakah email dan password tidak kosong
            if (!empty($email) && !empty($password)) {
                // Ambil data pengguna dari model
                $data['user'] = $this->model('user_model')->getUserByEmail($email, $password);
    
                // Periksa apakah email ditemukan
                if ($data['user']['email']) {
                    // Periksa apakah password cocok
                    if ($password === $data['user']['password']) {
                        $_SESSION['user_id'] = $data['user']['id'];
                        $_SESSION['role'] = $data['user']['role'];
                        // Redirect ke halaman utama setelah login berhasil
                        header("Location: " . BASEURL . '/index.php');
                        exit;  // Jangan lupa exit setelah header
                    } else {
                        
                        header("Location: " . BASEURL . '/index.php');
                        exit;
                    }
                } else {
                    header("Location: " . BASEURL . '/index.php');
                    exit;
                }
            } else {
                header("Location: " . BASEURL . '/index.php');
                exit;
            }
        }
    }
}

