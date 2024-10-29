<?php
function getDBConnection()
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=dbmvc','root','');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e){
        echo 'Connection failed: ' .$e->getMessage();
    }
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
?>