<?php
class Risk_model{
    private $table = 'risk_management';
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
        if($_SESSION['role'] == 'admin' ){
            $this->db->query("SELECT * FROM " . $this->table);
            return $this->db->resultSet();
        }elseif($_SESSION['role'] == 'pemilik_resiko'){
            $this->db->query("SELECT * FROM " . $this->table. " WHERE pemilik_resiko= :pemilik_resiko OR user_id= :user_id ");
            $this->db->bind(":pemilik_resiko", $_SESSION['username']);
            $this->db->bind(":user_id", $_SESSION['user_id']);
            return $this->db->resultSet();
        }else{
            $this->db->query("SELECT * FROM " . $this->table. " WHERE user_id= :user_id ");
            $this->db->bind(":user_id", $_SESSION['user_id']);
            return $this->db->resultSet();
        }
        
    }
    // public function getRisks() {
    //     $this->db->query("SELECT * FROM ". $this->table);
    //     return $this->db->resultSet();
    // }
    
        public function tambahRisk($risk) {
            // Validasi data
            $requiredKeys = ['tujuan', 'proses_bisnis', 'risk_category', 'uraian_resiko', 'penyebab_resiko', 'sumber_resiko', 'kerugian_kualitatif', 'pemilik_resiko', 'unit_terkait', 'inherit_likelihood', 'inherit_impact',  'pengendalian_ada', 'pengendalian_sudah', 'pengendalian_max', 'residual_likelihood', 'residual_impact', 'trait_risk', 'trait_desc', 'target_likelihood', 'target_impact',];
            foreach ($requiredKeys as $key) {
                if (!isset($risk[$key])) {
                    throw new Exception("Missing key in risk array: $key");
                }
            }
        
            // Query SQL
            $query = "INSERT INTO risk_management 
            (user_id, tujuan, proses_bisnis, risk_category, uraian_resiko, penyebab_resiko, sumber_resiko, kerugian_kualitatif,  pemilik_resiko, unit_terkait, inherit_likelihood, inherit_impact, inherit_level, pengendalian_ada, pengendalian_sudah, pengendalian_max, residual_likelihood, residual_impact, residual_level, trait_risk, trait_desc, target_likelihood, target_impact, target_level)
            VALUES 
            (:user_id, :tujuan, :proses_bisnis, :risk_category, :uraian_resiko, :penyebab_resiko, :sumber_resiko, :kerugian_kualitatif,  :pemilik_resiko, :unit_terkait, :inherit_likelihood, :inherit_impact, :inherit_level, :pengendalian_ada, :pengendalian_sudah, :pengendalian_max, :residual_likelihood, :residual_impact, :residual_level, :trait_risk, :trait_desc, :target_likelihood, :target_impact, :target_level)";
            $this->db->query($query);
        
            // Binding data
            $risk['inherit_level'] = $risk['inherit_likelihood'] * $risk['inherit_impact'];
            $risk['residual_level'] = $risk['residual_likelihood'] * $risk['residual_impact'];
            $risk['target_level'] = $risk['target_likelihood'] * $risk['target_impact'];
            $this->db->bind('user_id', $_SESSION['user_id']);
            $this->db->bind('tujuan', $risk['tujuan']);
            $this->db->bind('proses_bisnis', $risk['proses_bisnis']);
            $this->db->bind('risk_category', $risk['risk_category']);
            $this->db->bind('uraian_resiko', $risk['uraian_resiko']);
            $this->db->bind('penyebab_resiko', $risk['penyebab_resiko']);
            $this->db->bind('sumber_resiko', $risk['sumber_resiko']);
            $this->db->bind('kerugian_kualitatif', $risk['kerugian_kualitatif']);
            $this->db->bind('pemilik_resiko', $risk['pemilik_resiko']);
            $this->db->bind('unit_terkait', $risk['unit_terkait']);
            $this->db->bind('inherit_likelihood', $risk['inherit_likelihood']);
            $this->db->bind('inherit_impact', $risk['inherit_impact']);
            $this->db->bind('inherit_level', $risk['inherit_level']);
            $this->db->bind('pengendalian_ada', $risk['pengendalian_ada']);
            $this->db->bind('pengendalian_sudah', $risk['pengendalian_sudah']);
            $this->db->bind('pengendalian_max', $risk['pengendalian_max']);
            $this->db->bind('residual_likelihood', $risk['residual_likelihood']);
            $this->db->bind('residual_impact', $risk['residual_impact']);
            $this->db->bind('residual_level', $risk['residual_level']);
            $this->db->bind('trait_risk', $risk['trait_risk']);
            $this->db->bind('trait_desc', $risk['trait_desc']);
            $this->db->bind('target_likelihood', $risk['target_likelihood']);
            $this->db->bind('target_impact', $risk['target_impact']);
            $this->db->bind('target_level', $risk['target_level']);
        
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
    public function ubahRisk($data) {
        // Validasi data
        $requiredKeys = ['tujuan', 'proses_bisnis', 'risk_category', 'uraian_resiko', 'penyebab_resiko', 'sumber_resiko', 'kerugian_kualitatif',  'pemilik_resiko', 'unit_terkait', 'inherit_likelihood', 'inherit_impact', 'pengendalian_ada', 'pengendalian_sudah', 'pengendalian_max', 'residual_likelihood', 'residual_impact', 'trait_risk', 'trait_desc', 'target_likelihood', 'target_impact'];
        foreach ($requiredKeys as $key) {
            if (!isset($data[$key])) {
                throw new Exception("Missing key in data array: $key");
            }
        }
    
        // Hitung nilai tambahan
        $data['inherit_level'] = $data['inherit_likelihood'] * $data['inherit_impact'];
        $data['residual_level'] = $data['residual_likelihood'] * $data['residual_impact'];
        $data['target_level'] = $data['target_likelihood'] * $data['target_impact'];
    
        // Query SQL untuk UPDATE
        $query = "UPDATE risk_management SET
            id = :id,
            user_id = user_id,
            tujuan = :tujuan,
            proses_bisnis = :proses_bisnis,
            risk_category = :risk_category,
            uraian_resiko = :uraian_resiko,
            penyebab_resiko = :penyebab_resiko,
            sumber_resiko = :sumber_resiko,
            kerugian_kualitatif = :kerugian_kualitatif,
            pemilik_resiko = :pemilik_resiko,
            unit_terkait = :unit_terkait,
            inherit_likelihood = :inherit_likelihood,
            inherit_impact = :inherit_impact,
            inherit_level = :inherit_level,
            pengendalian_ada = :pengendalian_ada,
            pengendalian_sudah = :pengendalian_sudah,
            pengendalian_max = :pengendalian_max,
            residual_likelihood = :residual_likelihood,
            residual_impact = :residual_impact,
            residual_level = :residual_level,
            trait_risk = :trait_risk,
            trait_desc = :trait_desc,
            target_likelihood = :target_likelihood,
            target_impact = :target_impact,
            target_level = :target_level
            WHERE id = :id";
    
        // Eksekusi Query
        $this->db->query($query);
    
        // Bind data ke query
        $this->db->bind('id', $data['id']); // Pastikan 'id' ada di $data
        $this->db->bind('user_id', $_SESSION['user_id']);
        $this->db->bind('tujuan', $data['tujuan']);
        $this->db->bind('proses_bisnis', $data['proses_bisnis']);
        $this->db->bind('risk_category', $data['risk_category']);
        $this->db->bind('uraian_resiko', $data['uraian_resiko']);
        $this->db->bind('penyebab_resiko', $data['penyebab_resiko']);
        $this->db->bind('sumber_resiko', $data['sumber_resiko']);
        $this->db->bind('kerugian_kualitatif', $data['kerugian_kualitatif']);
        $this->db->bind('pemilik_resiko', $data['pemilik_resiko']);
        $this->db->bind('unit_terkait', $data['unit_terkait']);
        $this->db->bind('inherit_likelihood', $data['inherit_likelihood']);
        $this->db->bind('inherit_impact', $data['inherit_impact']);
        $this->db->bind('inherit_level', $data['inherit_level']);
        $this->db->bind('pengendalian_ada', $data['pengendalian_ada']);
        $this->db->bind('pengendalian_sudah', $data['pengendalian_sudah']);
        $this->db->bind('pengendalian_max', $data['pengendalian_max']);
        $this->db->bind('residual_likelihood', $data['residual_likelihood']);
        $this->db->bind('residual_impact', $data['residual_impact']);
        $this->db->bind('residual_level', $data['residual_level']);
        $this->db->bind('trait_risk', $data['trait_risk']);
        $this->db->bind('trait_desc', $data['trait_desc']);
        $this->db->bind('target_likelihood', $data['target_likelihood']);
        $this->db->bind('target_impact', $data['target_impact']);
        $this->db->bind('target_level', $data['target_level']);
    
        // Eksekusi dan kembalikan hasil
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    public function getRiskData($id) {
        // Query untuk mengambil data dari tabel 'risk_model'
        $sql = "SELECT inherit_likelihood, inherit_impact, inherit_level,
                       residual_likelihood, residual_impact, residual_level,
                       target_likelihood, target_impact, target_level
                FROM " .$this->table. " WHERE id= :id ";

        $result = $this->db->query($sql);
        $this->db->bind(":id", $id);
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
                'z' => $row['inherit_level'],
                'r' => 5
            ];
            // Ambil data untuk residual
            $data['residual'][] = [
                'x' => $row['residual_likelihood'],
                'y' => $row['residual_impact'],
                'z' => $row['residual_level'],
                'r' => 5
            ];
            // Ambil data untuk target
            $data['target'][] = [
                'x' => $row['target_likelihood'],
                'y' => $row['target_impact'],
                'z' => $row['target_level'],
                'r' => 5
            ];
        }

        return $data;
    // }public function getLevel() {
    //     // Query untuk mengambil inherit_level berdasarkan user_id
    //     // $query = "SELECT inherit_likelihood FROM " . $this->table . " WHERE user_id = :user_id";
    //     // $this->db->query($query);
    //     // $this->db->bind(':user_id', $_SESSION['user_id']);
    //     if($_SESSION['role'] == 'admin' ){
    //         $this->db->query("SELECT * FROM " . $this->table);
    //         return $this->db->resultSet();
    //     }elseif($_SESSION['role'] == 'pemilik_resiko'){
    //         $this->db->query("SELECT * FROM " . $this->table. " WHERE pemilik_resiko= :pemilik_resiko OR user_id= :user_id ");
    //         $this->db->bind(":pemilik_resiko", $_SESSION['username']);
    //         $this->db->bind(":user_id", $_SESSION['user_id']);
    //         return $this->db->resultSet();
    //     }else{
    //         $this->db->query("SELECT * FROM " . $this->table. " WHERE user_id= :user_id ");
    //         $this->db->bind(":user_id", $_SESSION['user_id']);
    //         return $this->db->resultSet();
    //     }
        
    //     // Ambil hasil query
    //     $result = $this->db->resultSet();
        
    //     // Siapkan data untuk output
    //     $data = [
    //         'level' => []
    //     ];
        
    //     foreach ($result as $row) {
    //         // Masukkan level ke dalam array
    //         $data['level'][] = (int) $row['inherit_likelihood'];
    //     }
        
    //     // Kembalikan data yang telah diolah
    //     return $data;
    // } 
    }public function getLevel() {
        $data = ['level' => []];
        
        if ($_SESSION['role'] == 'admin') {
            $this->db->query("SELECT inherit_likelihood FROM " . $this->table);
        } elseif ($_SESSION['role'] == 'pemilik_resiko') {
            $this->db->query("SELECT inherit_likelihood FROM " . $this->table . " WHERE pemilik_resiko = :pemilik_resiko OR user_id = :user_id");
            $this->db->bind(":pemilik_resiko", $_SESSION['username']);
            $this->db->bind(":user_id", $_SESSION['user_id']);
        } else {
            $this->db->query("SELECT inherit_likelihood FROM " . $this->table . " WHERE user_id = :user_id");
            $this->db->bind(":user_id", $_SESSION['user_id']);
        }
        
        $result = $this->db->resultSet();
    
        foreach ($result as $row) {
            if (isset($row['inherit_likelihood'])) {
                $data['level'][] = (int) $row['inherit_likelihood'];
            }
        }
    
        return $data;
    }
       
}