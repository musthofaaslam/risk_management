<?php
class Risk_mitigasi{
    private $table = 'risk_mitigasi';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function result_mitigasi() {
        if($_SESSION['role'] == 'admin' ){
            $this->db->query("SELECT * FROM " . $this->table);
            return $this->db->resultSet();
        }elseif($_SESSION['role'] == 'pemilik_resiko'){
            $this->db->query("SELECT * FROM " . $this->table. " WHERE pemilik_resiko= :pemilik_resiko OR user_mit= :user_mit ");
            $this->db->bind(":pemilik_resiko", $_SESSION['username']);
            $this->db->bind(":user_mit", $_SESSION['user_id']);
            return $this->db->resultSet();
        }else{
            $this->db->query("SELECT * FROM " . $this->table. " WHERE user_mit= :user_mit ");
            $this->db->bind(":user_mit", $_SESSION['user_id']);
            return $this->db->resultSet();
        }
    }
    public function tambahMitigasi($mitigasi) {
        // Validasi data
        $requiredKeys = ['risk_event', 'rencana_mitigasi', 'bulan', 'eksekusi', 'evidence', 'pemilik_resiko'];
        foreach ($requiredKeys as $key) {
            if (!isset($mitigasi[$key])) {
                throw new Exception("Missing key in mitigasi array: $key");
            }
        }
    
        // Menangani jika bulan berupa array (checkbox)
        // Misalnya, bulan disimpan dalam format string yang dipisahkan koma
        $bulan = is_array($mitigasi['bulan']) ? implode(',', $mitigasi['bulan']) : $mitigasi['bulan'];
        $eksekusi = is_array($mitigasi['eksekusi']) ? implode(',', $mitigasi['eksekusi']) : $mitigasi['eksekusi'];
    
        // Query SQL
        $query = "INSERT INTO risk_mitigasi 
        (user_mit, risk_event, rencana_mitigasi, bulan, eksekusi, evidence, pemilik_resiko)
        VALUES 
        (:user_mit, :risk_event, :rencana_mitigasi, :bulan, :eksekusi, :evidence, :pemilik_resiko)";
        
        $this->db->query($query);
    
        // Binding data
        $this->db->bind('user_mit', $_SESSION['user_id']);
        $this->db->bind('risk_event', $mitigasi['risk_event']);
        $this->db->bind('rencana_mitigasi', $mitigasi['rencana_mitigasi']);
        $this->db->bind('bulan', $bulan);  // Menggunakan string bulan yang sudah diolah
        $this->db->bind('eksekusi', $eksekusi);
        $this->db->bind('evidence', $mitigasi['evidence']);
        $this->db->bind('pemilik_resiko', $mitigasi['pemilik_resiko']);
    
        // Eksekusi dan return hasil
        $this->db->execute();
    
        // Mengembalikan jumlah baris yang terpengaruh oleh query
        return $this->db->rowCount();   
    }
    public function hapusData($id){
        $query = "DELETE FROM " .$this->table. " WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(":id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function getUserMitigasi($id) {
        if($_SESSION['role'] == 'admin' ){
            $this->db->query("SELECT * FROM " . $this->table. " WHERE id= :id");
            $this->db->bind("id", $id);
            return $this->db->resultSet();
        }elseif($_SESSION['role'] == 'pemilik_resiko'){
            $this->db->query("SELECT * FROM " . $this->table. " WHERE pemilik_resiko= :pemilik_resiko OR user_mit= :user_mit AND id= :id");
            $this->db->bind(":pemilik_resiko", $_SESSION['username']);
            $this->db->bind(":user_mit", $_SESSION['user_id']);
            $this->db->bind("id", $id);
            return $this->db->resultSet();
        }else{
            $this->db->query("SELECT * FROM " . $this->table. " WHERE id= :id AND user_mit= :user_mit");
            $this->db->bind(":user_mit", $_SESSION['user_id']);
            $this->db->bind(":id", $id);
            return $this->db->resultSet();
        }
    }
    public function ubahMitigasi($data) {
        // Validasi data
        $requiredKeys = ['risk_event', 'rencana_mitigasi', 'bulan', 'eksekusi', 'evidence', 'pemilik_resiko'];
        foreach ($requiredKeys as $key) {
            if (!isset($data[$key])) {
                throw new Exception("Missing key in data array: $key");
            }
        }
    
        // Menangani array bulan dan eksekusi (checkbox)
        $bulan = is_array($data['bulan']) ? implode(',', $data['bulan']) : $data['bulan'];
        $eksekusi = is_array($data['eksekusi']) ? implode(',', $data['eksekusi']) : $data['eksekusi'];
    
        // Query SQL untuk UPDATE
        $query = "UPDATE risk_mitigasi SET
            user_mit = :user_mit,
            risk_event = :risk_event,
            rencana_mitigasi = :rencana_mitigasi,
            bulan = :bulan,
            eksekusi = :eksekusi,
            evidence = :evidence,
            pemilik_resiko = :pemilik_resiko
        WHERE id = :id";  // Pastikan 'WHERE id' untuk update berdasarkan id
    
        // Eksekusi Query
        $this->db->query($query);
    
        // Bind data ke query
        $this->db->bind('id', $data['id']); // Pastikan 'id' ada di $data
        $this->db->bind('user_mit', $_SESSION['user_id']);
        $this->db->bind('risk_event', $data['risk_event']);
        $this->db->bind('rencana_mitigasi', $data['rencana_mitigasi']);
        $this->db->bind('bulan', $bulan);  // Menggunakan string bulan yang sudah diolah
        $this->db->bind('eksekusi', $eksekusi);  // Menggunakan string eksekusi yang sudah diolah
        $this->db->bind('evidence', $data['evidence']);
        $this->db->bind('pemilik_resiko', $data['pemilik_resiko']);
    
        // Eksekusi dan kembalikan hasil
        $this->db->execute();
        return $this->db->rowCount();  // Mengembalikan jumlah baris yang terpengaruh (diperbarui)
    }    
    //home
    public function totalBarisMitigasi(){
        $sql = "SELECT COUNT(*) AS total_rows FROM risk_mitigasi";
        $this->db->query($sql);
        return $this->db->single()['total_rows'];
    } 
}