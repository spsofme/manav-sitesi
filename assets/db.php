<?php
$host = 'localhost';
$dbname = 'manav';
$username = 'root';
$password = '';

try {
	$db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->exec("SET NAMES utf8");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    print "<script>alert('Veritabanı bağlantısı oluşturulamadı! HATA: ".$e->getMessage()."');</script>";
    die();
}

session_start();
?>
