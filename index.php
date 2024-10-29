<?php
if (!file_exists('app/config/database.php')) {
    die('File konfigurasi database tidak ditemukan.');
}
require_once('app/config/database.php');

require_once 'app/controllers/UserControllers.php';

$dbConnection = getDBConnection();
$id = isset($_GET['id']) ? intval ($_GET['id']):1;
$controller = new userControllers($dbConnection);
$controller->show($id);
?>