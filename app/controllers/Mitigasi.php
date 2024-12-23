<?php
class Mitigasi extends Controller{
    public function index(){
        
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASEURL . "/login");
            exit;
        }

        $data['identity'] = $this->model('user_model')->result_data();
        $data['mitigasi'] = $this->model('risk_mitigasi')->result_mitigasi();
        $this->view('templates/header');
        $this->view('templates/navbar');
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
        
        if($this->model('risk_mitigasi')->tambahMitigasi($_POST) > 0){
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
        $data['user'] = $this->model('risk_mitigasi');
        $data['mitigasi'] = $this->model('risk_mitigasi')->getUserMitigasi($id);
        $this->view('templates/header');
        $this->view('templates/navbar', $data);
        $this->view('mitigasi/ubah', $data);
        $this->view('templates/footer');
    }
    public function updated(){
        if($this->model('risk_mitigasi')->ubahMitigasi($_POST) > 0){
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header("Location: ". BASEURL. "/mitigasi/index");
            exit;
        }else{
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header("Location: ". BASEURL. "/mitigasi/index");
            exit;
        }
    }
    public function detail($id){
        $data['mitigasi'] = $this->model('risk_mitigasi')->getUserMitigasi($id);
        $this->view('templates/header');
        $this->view('templates/navbar');
        $this->view('mitigasi/detail', $data);
        $this->view('templates/footer');
    }
}