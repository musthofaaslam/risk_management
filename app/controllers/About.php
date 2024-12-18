<?php
class About extends Controller{
    public function index(){
        session_start();
        if (!isset($_SESSION['login'])) {
            header("Location: " . BASEURL . "/login");
            exit;
        }
        $this->view('templates/header');
        $this->view('templates/navbar');
        $this->model('user_model');
        $this->view('about/index');
        $this->view('templates/footer');
    }
}