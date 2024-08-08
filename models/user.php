<?php
class User{
    private $conn;
    private $table = 'users';
    public $id;
    public $username;
    public $email;
    public $password;

    public function __construct($db) {
        $this->conn = $db; //asigna la conexion a la base de datos
    }
    public function register(){
        if(strlen($this->username)< 3 || strlen($this->username) > 49) {
            return "Username must be between 3 and 49 characters.";
        }
        if(!preg_match('/^[a-zA-Z0-9._]+$/', $this->username)) {
            return "Username can only contain letters, numbers, dots and underscores.";
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format.";
        }
        if (strlen($this->password) < 4) {
            return "Password must be at least 4 characters long.";
        }

        $hashed_password = password_hash($this->password, PASSWORD_DEFAULT);
        
        //Comporbar si existe un username igual
        $check_sql = "SELECT * FROM ".$this->table." WHERE username = ?";
        $check_stmt = $this->conn->prepare($check_sql);
        $check_stmt->execute([$this->username]);
        
        if($check_stmt->rowCount() > 0) {
            return "This username already exists.";
        }

        //Comprobar si existe un email igual
        $check_sql = "SELECT * FROM ".$this->table." WHERE email = ?";
        $check_stmt = $this->conn->prepare($check_sql);
        $check_stmt->execute([$this->email]);
        if($check_stmt->rowCount() > 0) {
            return "This email already exists.";
        }

        //Insertar nuevo usuario
        $sql = "INSERT INTO ". $this->table." (username, email, password) VALUES(?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        if($stmt->execute([$this->username, $this->email, $hashed_password])) {
            return true;
        } else{
            return "Error: ".$stmt->errorInfo()[2];
        }
    }

    public function login() {
        $sql = "SELECT id, password FROM ". $this->table ." WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$this->username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user) {
            if(password_verify($this->password, $user['password'])){
            $this->id = $user['id'];
            return true; 
            }else{
            return "Incorrect password.";
            }
        } else{
            return "No account found with that username.";
        }
    } 
}
