<?php
class Risk_mitigasi{
    private $table = 'risk_mitigasi';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getUser() {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->single();
    }
    
    public function result_analisis() {
        $this->db->query("SELECT * FROM " . $this->table. " WHERE user_mit= :user_mit ");
        $this->db->bind(":user_mit", $_SESSION['user_id']);
        return $this->db->resultSet();
    }
    // public function getRisks() {
    //     $this->db->query("SELECT * FROM ". $this->table);
    //     return $this->db->resultSet();
    // }
    
    //     
    public function tambahRisk($risk) {
    // Validasi data
    $requiredKeys = ['risk_event', 'rencana_mitigasi', 'bulan', 'evidence', 'risk_owner'];
    foreach ($requiredKeys as $key) {
        if (!isset($risk[$key])) {
            throw new Exception("Missing key in risk array: $key");
        }
    }

    // Jika 'bulan' adalah array, ubah menjadi string
    if (is_array($risk['bulan'])) {
        $risk['bulan'] = implode(',', $risk['bulan']);
        $risk['eksekusi'] = implode(',', $risk['eksekusi']);
    }

    // Query SQL
    $query = "INSERT INTO risk_mitigasi 
    (user_mit, risk_event, rencana_mitigasi, bulan,eksekusi, evidence, risk_owner)
    VALUES 
    (:user_mit, :risk_event, :rencana_mitigasi, :bulan,:eksekusi, :evidence, :risk_owner)";
    $this->db->query($query);

    // Binding data
    $this->db->bind('user_mit', $_SESSION['user_id']);
    $this->db->bind('risk_event', $risk['risk_event']);
    $this->db->bind('rencana_mitigasi', $risk['rencana_mitigasi']);
    $this->db->bind('bulan', $risk['bulan']); // Sudah string
    $this->db->bind('eksekusi', $risk['eksekusi']); // Sudah string
    $this->db->bind('evidence', $risk['evidence']); // Sudah string
    $this->db->bind('risk_owner', $risk['risk_owner']);

    // Eksekusi dan return hasil
    $this->db->execute();
    return $this->db->rowCount();
}

    public function getUserAnalisis($id) {
        $this->db->query("SELECT * FROM " . $this->table. " WHERE id= :id AND user_id= :user_id");
        $this->db->bind(":user_id", $_SESSION['user_id']);
        $this->db->bind(":id", $id);
        return $this->db->resultSet();
    }
    public function hapusData($id){
        $query = "DELETE FROM " .$this->table. " WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(":id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function ubahData($id){
        $ubah = "";
        $this->db->query($ubah);
    }
    public function getRiskData() {
        // Query untuk mengambil data dari tabel 'risk_model'
        $sql = "SELECT inherit_likelihood, inherit_impact, inherit_level,
                       residual_likelihood, residual_impact, residual_level,
                       target_likelihood, target_impact, target_level
                FROM " .$this->table;
        $result = $this->db->query($sql);
        $result = $this->db->resultSet();
        $data = [
            'inherit' => [],
            'residual' => [],
            'target' => []
        ];

        foreach( $result as $row) {
            // Ambil data untuk inherit
            $data['inherit'][] = [
                'x' => $row['inherit_likelihood'],
                'y' => $row['inherit_impact'],
                'r' => $row['inherit_level']
            ];
            // Ambil data untuk residual
            $data['residual'][] = [
                'x' => $row['residual_likelihood'],
                'y' => $row['residual_impact'],
                'r' => $row['residual_level']
            ];
            // Ambil data untuk target
            $data['target'][] = [
                'x' => $row['target_likelihood'],
                'y' => $row['target_impact'],
                'r' => $row['target_level']
            ];
        }

        return $data;
    }
}