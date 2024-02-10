<?php
class Auth
{
    private $host = DB_HOST;
    private $username = DB_USER;
    private $password = DB_PASS;
    private $database = DB_NAME;
    private $connection;
    private $error;
    public function __construct()
    {
        $this->connection = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
    }

    public function RegisterValidate($rows, $table,$where = null) {
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
    public function register($table, $data)
    {
        $sql = "INSERT INTO $table VALUES (:nik,:username, :password, :role)";
        $statement = $this->connection->prepare($sql);
        $statement->execute($data);
        return $this->connection->lastInsertId();
    }


    public function login($username, $password)
    {

            $sql = "SELECT * FROM users WHERE username = :username";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($stmt->rowCount() > 0) {          
                if (password_verify($password, $data['password'])) {
                    // session_start();
                    $_SESSION['users'] = $data['nik'];
                    return 200;
                } else {
                    return $this->error=403;
                }
            }else{
                return $this->error=404;
            }
    
    }
    public function getData($rows, $table, $where = null)
    {
        if ($rows == null) {
            $sql = "SELECT * FROM $table";
        } else {
            $sql = "SELECT $rows FROM $table";
        }

        if ($where != null) {
            $sql .= " WHERE $where";
        }
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function profile($rows, $table, $where = null)
    {
        if ($rows == null) {
            $sql = "SELECT * FROM $table";
        } else {
            $sql = "SELECT $rows FROM $table";
        }

        if ($where != null) {
            $sql .= " WHERE $where";
        }
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    // public function updateProfile($table, $data, $nama, $alamat ,$where = null)
    public function updateProfile($table, $data,$where = null)
    {
        // $sql = "UPDATE $table SET nama = $nama, alamat = $alamat WHERE $where" ;
        $sql = "UPDATE $table SET nama = :nama, alamat= :alamat , update_at = Now() " ;

        if ($where != null) {
            $sql .= " WHERE $where";
        }
        $statement = $this->connection->prepare($sql);
        // $cek = $statement->execute();
        $cek = $statement->execute($data);
        return $cek;
        // return $statement->fetch(PDO::FETCH_ASSOC);
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
    
    public function isLoggedIn()
    {
        if (isset($_SESSION['users'])) {
            return $_SESSION['users'];
        }
    }
    public function isAdmin()
    {
        $nik = Auth::isLoggedIn();
        $role_cek = Auth::profile("role", "users" , "nik=$nik");
        if ($role_cek['role'] == 'admin') {
            return true;
        }else {
            return false;
        }
    }


    public function logout()
    {

        // Hapus user_session
        session_start();
        unset($_SESSION['users']);
        session_unset();
        session_destroy();
        return true;
    }

    public function __destruct()
    {
        if ($this->connection) {
            $this->connection = null;
            return exit;
        }
    }
}
