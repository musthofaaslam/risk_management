<?php
class Home extends Controller{
    public function index(){
       
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASEURL . "/login");
            exit;
        }
        $risk = $this->model('risk_model');
        $this->view('templates/header');
        $this->view('templates/navbar', $risk);
        $this->view('home/index', $risk);
        $this->view('templates/footer');
    }
    public function identifikasi(){
        session_start();
        if($this->model('risk_model')->tambahRisk($_POST) > 0){
            header("Location: ". BASEURL. "/home/analisis");
            exit;
        }
    }
    public function analisis() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASEURL . "/login");
            exit;
        }
        $analisis = $this->model('analisis_model');
        $this->view('templates/header');
        $this->view('home/analisis', $analisis); // Load form2 view
        $this->view('templates/footer');
    }
    public function mitigasi(){
        session_start();
        if($this->model('analisis_model')->analisisRisk($_POST) > 0){
            header("Location: ". BASEURL. "/home/result");
            exit;
        }
    }
    public function result() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASEURL . "/login");
            exit;
        }
        $data['identity'] = $this->model('result_model')->result_data();
        $data['analisis'] = $this->model('result_model')->result_analisis();
        $data['mitigasi'] = $this->model('result_model')->result_mitigasi();
        $this->view('templates/header');
        $this->view('home/result', $data); // Load form2 view
        $this->view('templates/footer');
    }
}