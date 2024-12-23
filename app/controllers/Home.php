<?php
class Home extends Controller{
    public function index(){
       
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASEURL . "/login");
            exit;
        }
        $data['total_resiko'] = $this->model('risk_model')->totalBarisResiko();
        $data['total_mitigasi'] = $this->model('risk_mitigasi')->totalBarisMitigasi();
        $data['tingkat'] = $this->model('risk_model')->getLevel();
        $data['category'] = $this->model('risk_model')->getCategory();
        $data['pemilik'] = $this->model('risk_model')->getPemilik();
        $data['impact'] = $this->model('risk_model')->getImpact();
        echo '<script>const chartData = ' . json_encode($data['tingkat']) . ';</script>';
        echo '<script>const categoryData = ' . json_encode($data['category']) . ';</script>';
        echo '<script>const pemilikData = ' . json_encode($data['pemilik']) . ';</script>';
        echo '<script>const ImpactData = ' . json_encode($data['impact']) . ';</script>';
        $this->view('templates/header');
        $this->view('templates/navbar', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}