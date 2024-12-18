<?php
class Logout extends Controller {
    public function index() {
        // Start the session to access session data
        session_start();
        
        // Destroy all session data (logout the user)
        session_unset();
        session_destroy();

        // Optionally, redirect to the home page or login page after logout
        header('Location: ' . BASEURL . '/home');
        exit;
    }
}
