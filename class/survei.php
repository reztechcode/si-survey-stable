<?php
class Survei {

    private $host = DB_HOST;
    private $username = DB_USER;
    private $password = DB_PASS;
    private $database = DB_NAME;
    private $connection;

    public function __construct() {
        $this->connection = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
    }

    public function getData($rows, $table,$where = null) {
        if ($rows == null) {
            $sql = "SELECT * FROM $table";
        }else {
            $sql = "SELECT $rows FROM $table";
        }
        
        if ($where != null) {
            $sql .= " WHERE $where";
        }
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllData($rows, $table, $table1) {
        if ($rows == null) {
            $sql = "SELECT * FROM $table";
        }else {
            $sql = "SELECT $rows FROM $table iNNER JOIN $table1 on survey.nik = users.nik ";
        }
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function count($rows, $table,$where = null) {
        if ($rows == null) {
            $sql = "SELECT COUNT(*) FROM $table";
        }else {
            $sql = "SELECT COUNT($rows) FROM $table";
        }
        
        if ($where != null) {
            $sql .= " WHERE $where";
        }
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchColumn();
    }

    public function insertSurvey($table, $data) {
        $sql = "INSERT INTO $table VALUES (:nik, :layanan_kesehatan, :layanan_pendidikan, :layanan_kebersihan, :layanan_pangan, :layanan_informasi, :saran_masukan)";
        $statement = $this->connection->prepare($sql);
        $statement->execute($data);
        return $this->connection->lastInsertId();
    }
    public function delete($table, $data) {
        $sql = "DELETE FROM $table WHERE id_survey = :id ";
        $statement = $this->connection->prepare($sql);
        return $statement->execute($data);
    }
    
       
}



?>