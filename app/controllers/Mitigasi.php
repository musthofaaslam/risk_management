<?php
class Mitigasi extends Controller{
    public function index(){
        
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASEURL . "/login");
            exit;
        }

        $data['identity'] = $this->model('user_model')->result_data();
        $data['mitigasi'] = $this->model('risk_mitigasi')->result_analisis();
        $this->view('templates/header');
        $this->view('templates/navbar', );
        $this->view('mitigasi/index',$data);
        $this->view('templates/footer');
    }
    public function buat(){
                if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASEURL . "/login");
            exit;
        }
        $data['mitigasi'] = $this->model('risk_mitigasi');
        $this->view('templates/header');
        $this->view('templates/navbar', $data['mitigasi']);
        $this->view('mitigasi/buat', $data['mitigasi']);
        $this->view('templates/footer');
    }
    public function identifikasi(){
        
        if($this->model('risk_mitigasi')->tambahRisk($_POST) > 0){
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header("Location: ". BASEURL. "/mitigasi/index");
            exit;
        }else{
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header("Location: ". BASEURL. "/mitigasi/index");
            exit;
        }
    }
    public function hapus($id){
        if($this->model('risk_mitigasi')->hapusData($id) > 0){
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header("Location: ". BASEURL. "/mitigasi/index");
            exit;
        }
    }
    public function ubah($id){
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASEURL . "/login");
            exit;
        }
        $risk = $this->model('risk_mitigasi');
        $this->view('templates/header');
        $this->view('templates/navbar', $risk);
        $this->view('risk/buat', $risk);
        $this->view('templates/footer');
    }
    public function detail($id){
        $data['analisis'] = $this->model('risk_mitigasi')->getUserAnalisis($id);
        $data['chart'] = $this->model('risk_mitigasi')->getRiskData();

        // Kirim data ke view
        echo '<script>const chartData = ' . json_encode($data['chart']) . ';</script>';
        // $this->view('risk/bubbleChart', ['data' => $data]);
        // $data['mitigasi'] = $this->model('analisis_model')->getUserMitigasi();//error
        $this->view('templates/header');
        $this->view('risk/detail', $data);
        $this->view('templates/footer');
    }
    
    
}