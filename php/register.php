<?php
// Σύνδεση με τη βάση (μέσω db.php)
require_once __DIR__ . '/db.php';

// Διάβασμα πεδίων φόρμας με βασικό έλεγχο (trim + default τιμή)
$flname     = trim($_POST['flname'] ?? '');
$email      = trim($_POST['email'] ?? '');
$username   = trim($_POST['username'] ?? '');
$password   = trim($_POST['password'] ?? '');
$mathima    = trim($_POST['mathima'] ?? '');
$newsletter = trim($_POST['newsletter'] ?? 'no');
$comments   = trim($_POST['comments'] ?? '');

// Έλεγχος ότι δεν λείπουν υποχρεωτικά πεδία
if ($flname === '' || $email === '' || $username === '' || $password === '') {
  http_response_code(400);
  echo 'Απαιτούνται όλα τα υποχρεωτικά πεδία.';
  exit;
}

// Δημιουργία ασφαλούς hash για τον κωδικό
$hash = password_hash($password, PASSWORD_BCRYPT);

// Χρήση prepared statement για αποφυγή SQL injection
$stmt = $mysqli->prepare(
  'INSERT INTO users(flname,email,username,password_hash,interest,newsletter,comments) 
   VALUES(?,?,?,?,?,?,?)'
);

// Δέσμευση τιμών στα placeholders (7 strings = sssssss)
$stmt->bind_param('sssssss', $flname, $email, $username, $hash, $mathima, $newsletter, $comments);

// Εκτέλεση και μήνυμα επιτυχίας ή αποτυχίας
if ($stmt->execute()) {
  echo 'Εγγραφή ολοκληρώθηκε!';
  echo '<p><a href="../index.html">Επιστροφή στην αρχική</a></p>';
} else {
  http_response_code(500);
  echo 'Σφάλμα αποθήκευσης.';
}

// Κλείσιμο statement και σύνδεσης
$stmt->close();
$mysqli->close();
?>
