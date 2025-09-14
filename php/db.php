<?php
// Συμπερίληψη αρχείου με τα στοιχεία σύνδεσης (user, pass, db, host)
require_once __DIR__ . '/credent.php';

// Δημιουργία αντικειμένου σύνδεσης MySQLi
$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_BASE);

// Έλεγχος αν η σύνδεση απέτυχε
if ($mysqli->connect_error) {
  die('Connection failed: ' . $mysqli->connect_error);
}

// Ορισμός charset (UTF-8 με υποστήριξη emoji/Greek)
$mysqli->set_charset('utf8mb4');
?>
