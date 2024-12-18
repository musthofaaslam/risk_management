<?php
class Risk extends Controller{
    public function index(){
        
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASEURL . "/login");
            exit;
        }

        $data['identity'] = $this->model('user_model')->result_data();
        $data['analisis'] = $this->model('risk_model')->result_analisis();
        $this->view('templates/header');
        $this->view('templates/navbar', $data);
        $this->view('risk/index', $data);
        $this->view('templates/footer');
    }
    public function buat(){
                if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASEURL . "/login");
            exit;
        }
        $risk = $this->model('risk_model');
        $this->view('templates/header');
        $this->view('templates/navbar', $risk);
        $this->view('risk/buat', $risk);
        $this->view('templates/footer');
    }
    public function identifikasi(){
        
        if($this->model('risk_model')->tambahRisk($_POST) > 0){
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header("Location: ". BASEURL. "/risk/index");
            exit;
        }else{
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header("Location: ". BASEURL. "/risk/index");
            exit;
        }
    }
    public function hapus($id){
        if($this->model('risk_model')->hapusData($id) > 0){
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header("Location: ". BASEURL. "/risk/index");
            exit;
        }
    }
    public function ubah($id){
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASEURL . "/login");
            exit;
        }
        $data['user'] = $this->model('risk_model');
        $data['analisis'] = $this->model('risk_model')->getUserAnalisis($id);
        $this->view('templates/header');
        $this->view('templates/navbar', $data);
        $this->view('risk/ubah', $data);
        $this->view('templates/footer');
        
    }
    public function updated(){
        if($this->model('risk_model')->ubahRisk($_POST) > 0){
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header("Location: ". BASEURL. "/risk/index");
            exit;
        }else{
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header("Location: ". BASEURL. "/risk/index");
            exit;
        }
    }
    public function detail($id){
        $data['analisis'] = $this->model('risk_model')->getUserAnalisis($id);
        $data['chart'] = $this->model('risk_model')->getRiskData($id);

        // Kirim data ke view
        echo '<script>const chartData = ' . json_encode($data['chart']) . ';</script>';
        // $this->view('risk/bubbleChart', ['data' => $data]);
        // $data['mitigasi'] = $this->model('analisis_model')->getUserMitigasi();//error
        $this->view('templates/header');
        $this->view('risk/detail', $data);
        $this->view('templates/footer');
    }
    
    
}