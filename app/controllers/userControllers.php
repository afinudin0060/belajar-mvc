<?php
require_once 'app/models/User.php';

class userControllers 
{
    private $userModel;

    public function __construct($dbConnection) {
        $this->userModel = new User($dbConnection); // Pastikan ini benar
    }

    public function show($id) {
        $user = $this->userModel->getUserById($id); // Ini seharusnya tidak null
        require_once 'app/views/userView.php';
    }
    function addUser($name, $email) {
        $query = "INSERT INTO users (name, email) VALUES (?, ?)";
        $stmt = mysqli_prepare($this->connect, $query);
        mysqli_stmt_bind_param($stmt, "ss", $name, $email);
        return mysqli_stmt_execute($stmt);
    }
    function updateUser($id, $name, $email) {
        $query = "UPDATE users SET name = ?, email = ? WHERE id = ?";
        $stmt = mysqli_prepare($this->connect, $query);
        mysqli_stmt_bind_param($stmt, "ssi", $name, $email, $id);
        return mysqli_stmt_execute($stmt);
    }
    function tampilData()
    {
        $data = mysqli_query($this->connect, "SELECT * FROM users");
        $rows = mysqli_fetch_all($data, MSQLI_ASSOC);
        
        return $rows;
    }
}

?>