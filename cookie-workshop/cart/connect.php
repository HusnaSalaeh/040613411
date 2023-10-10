<?php
try {
	$pdo = new PDO("mysql:host=localhost:3307;dbname=blueshop;charset=utf8", "root", "");
} catch (PDOException $e) {
	echo "เกิดข้อผิดพลาด : ".$e->getMessage();
}
?>