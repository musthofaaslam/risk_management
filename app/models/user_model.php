<?php
class User_model{
    private $table = 'user_login_identity';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getUser() {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }
    public function getUserByEmail($email, $password){
        $this->db->query("SELECT * FROM " .$this->table. " WHERE email= :email AND password= :password");
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $password);
        return $this->db->single();
    }
    public function result_data() {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id= :id");
        $this->db->bind(":id", $_SESSION['user_id']);
        return $this->db->resultSet();
    }
}