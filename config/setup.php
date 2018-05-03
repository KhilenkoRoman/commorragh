<?php

require 'database.php';

try {
	$pdo = new PDO($DB_DSN_INIT, $DB_USER, $DB_PASSWORD);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = 'CREATE DATABASE IF NOT EXISTS db_commorragh';
	$pdo->exec($sql);
	echo "Dd db_commorragh created sucdesfuly<br>";
}
catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}

$pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
	$sql = "CREATE TABLE IF NOT EXISTS users (
	id_user INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	email VARCHAR(255) NOT NULL UNIQUE,
	password VARCHAR(130) NOT NULL,
	name VARCHAR(30) NOT NULL,
	date_creation TIMESTAMP,
	active BOOLEAN DEFAULT 0 NOT NULL,
	comments_to_mail BOOLEAN DEFAULT 1 NOT NULL,
	token VARCHAR(255))";
	$pdo->exec($sql);
	echo "table users created sucdesfuly<br>";

  // Creating admin user
	$password = hash('sha512', 'qweqwe');
	$sql = "INSERT INTO users (email, name, password, active)
	VALUES ('admin@admin.com', 'admin', '$password', '1')";
	$pdo->exec($sql);
	echo "admin created sucdesfuly<br>";
}
catch (PDOException $e) {
	die('Error : ' . $e->getMessage());
}

try {
	$sql = "CREATE TABLE IF NOT EXISTS pictures (
	id_pic INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	id_user INT UNSIGNED NOT NULL,
	date_creation TIMESTAMP,
	pic LONGBLOB NOT NULL,
	FOREIGN KEY (id_user) REFERENCES users(id_user) ON DELETE CASCADE)";
	$pdo->exec($sql);
	echo "table pictures created sucdesfuly<br>";
}
catch (PDOException $e) {
	die('Error : ' . $e->getMessage());
}

try {
	$sql = "CREATE TABLE IF NOT EXISTS likes (
	id_like INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	id_pic INT UNSIGNED NOT NULL,
	id_user INT UNSIGNED NOT NULL,
	date_creation TIMESTAMP,
	FOREIGN KEY (id_user) REFERENCES users(id_user) ON DELETE CASCADE,
    FOREIGN KEY (id_pic) REFERENCES pictures(id_pic) ON DELETE CASCADE)";
	$pdo->exec($sql);
	echo "table likes created sucdesfuly<br>";
}
catch (PDOException $e) {
  die('Error : ' . $e->getMessage());
}

try {
	$sql = "CREATE TABLE IF NOT EXISTS comments (
	id_comment INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	id_pic INT UNSIGNED NOT NULL,
	id_user INT UNSIGNED NOT NULL,
	comment TEXT NOT NULL,
	date_creation TIMESTAMP,
	FOREIGN KEY (id_user) REFERENCES users(id_user) ON DELETE CASCADE,
    FOREIGN KEY (id_pic) REFERENCES pictures(id_pic) ON DELETE CASCADE)";
	$pdo->exec($sql);
	echo "table comments created sucdesfuly<br>";
}
catch (PDOException $e) {
  die('Error : ' . $e->getMessage());
}

$pdo = null;
?>