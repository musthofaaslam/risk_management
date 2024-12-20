<?php
class Home extends Controller{
    public function index(){
       
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASEURL . "/login");
            exit;
        }
        $data['analisis'] = $this->model('risk_model')->result_analisis();
        $data['tingkat'] = $this->model('risk_model')->getLevel();
        echo '<script>const chartData = ' . json_encode($data['tingkat']['level']) . ';</script>';
        // $data['resiko'] = $this->model('risk_model')->resikoAktif();
        $this->view('templates/header');
        $this->view('templates/navbar', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
    // public function identifikasi(){
    //     session_start();
    //     if($this->model('risk_model')->tambahRisk($_POST) > 0){
    //         header("Location: ". BASEURL. "/home/analisis");
    //         exit;
    //     }
    // }
    // public function analisis() {
    //     session_start();
    //     if (!isset($_SESSION['user_id'])) {
    //         header("Location: " . BASEURL . "/login");
    //         exit;
    //     }
    //     $analisis = $this->model('analisis_model');
    //     $this->view('templates/header');
    //     $this->view('home/analisis', $analisis); // Load form2 view
    //     $this->view('templates/footer');
    // }
    // public function mitigasi(){
    //     session_start();
    //     if($this->model('analisis_model')->analisisRisk($_POST) > 0){
    //         header("Location: ". BASEURL. "/home/result");
    //         exit;
    //     }
    // }
    // public function result() {
    //     session_start();
    //     if (!isset($_SESSION['user_id'])) {
    //         header("Location: " . BASEURL . "/login");
    //         exit;
    //     }
    //     $data['identity'] = $this->model('result_model')->result_data();
    //     $data['analisis'] = $this->model('result_model')->result_analisis();
    //     $data['mitigasi'] = $this->model('result_model')->result_mitigasi();
    //     $this->view('templates/header');
    //     $this->view('home/result', $data); // Load form2 view
    //     $this->view('templates/footer');
    // }
}