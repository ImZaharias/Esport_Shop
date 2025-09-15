<?php
// Σύνδεση με τη βάση
require_once __DIR__ . '/db.php';

// Παίρνουμε το email από το query string (?email=...)
$email = trim($_GET['email'] ?? '');
?>
<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="utf-8">
  <title>Ανάκτηση χρήστη</title>
  <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

  <!-- Κεφαλίδα με απλό μενού -->
  <header>
    <h1>Ανάκτηση εγγραφής</h1>
    <nav>
      <a href="../index.html">Αρχική</a>
      <a href="../register.html">Εγγραφή</a>
    </nav>
  </header>

  <main>
    <!-- Φόρμα για αναζήτηση χρήστη με email -->
    <form method="get" action="retrieve.php" style="display:flex; gap:8px; align-items:center;">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required 
             value="<?php echo htmlspecialchars($email); ?>">
      <button type="submit">Αναζήτηση</button>
    </form>

<?php
// Αν ο χρήστης έβαλε email
if ($email !== '') {
  // Χρήση prepared statement για ασφάλεια
  $stmt = $mysqli->prepare(
    'SELECT flname, email, username, interest, newsletter, comments, created_at 
     FROM users WHERE email = ?'
  );
  $stmt->bind_param('s', $email);
  $stmt->execute();
  $res = $stmt->get_result();

  // Αν βρεθεί ο χρήστης, εμφάνιση των στοιχείων σε πίνακα
  if ($row = $res->fetch_assoc()) {
    echo '<h3>Αποτέλεσμα</h3>';
    echo '<table class="product-table">';
    foreach ($row as $k => $v) {
      echo '<tr><th>'.htmlspecialchars($k).'</th><td>'.htmlspecialchars((string)$v).'</td></tr>';
    }
    echo '</table>';
  } else {
    // Αν δεν βρέθηκε χρήστης
    echo '<p style="color:red">Δεν βρέθηκε χρήστης με αυτό το email.</p>';
  }
  $stmt->close();
}

// Κλείσιμο σύνδεσης με DB
$mysqli->close();
?>
  </main>

  <footer>
    <p>&copy; 2025 eHellenicSports</p>
  </footer>
</body>
</html>

