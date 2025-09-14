#  SportsHub – Web Technologies Project

##  Σκοπός
Υλοποίηση ενός **ηλεκτρονικού καταστήματος αθλητικών ειδών** με χρήση **HTML5, CSS3, JavaScript, PHP, MySQL**.

---

##  Δομή ιστοτόπου
- `index.html` → Κεντρική σελίδα με μενού, περιγραφή, iframe καιρού.
- `about.html` → Σελίδα δημιουργού.
- `products.html` → Σελίδα προϊόντων με πίνακα + εικόνες.
- `services.html` → Σελίδα υπηρεσιών με grid + iframe χάρτη.
- `register.html` → Σελίδα εγγραφής με φόρμα και JS validation.
- `php/register.php` → Αποθήκευση στοιχείων στη βάση.
- `php/retrieve.php` → Ανάκτηση στοιχείων με email.
- `css/styles.css` → Εξωτερικά styles (μορφοποίηση).
- `js/validate.js` → Έλεγχος φόρμας (JavaScript).
- `schema.sql` → Script δημιουργίας DB & πίνακα.

---

##  Τεχνολογίες
- **HTML5** → σελίδες, λίστες, πίνακες, iframe, φόρμες.
- **CSS3** → responsive εμφάνιση, κουμπιά, πίνακες.
- **JavaScript** → validation φόρμας (regex για ελληνικά, required, μήκη).
- **PHP** → σύνδεση DB, prepared statements, password hashing.
- **MySQL** → βάση `sports_shop`, πίνακας `users`.

---

##  Ασφάλεια
- Χρήση **prepared statements** για αποφυγή SQL Injection.
- Αποθήκευση κωδικών με **password_hash()** (bcrypt).

---

## 👤 Δημιουργός
Ζαχαρίας Πολυτσέρης
Μεταπτυχιακός Φοιτητής Πληροφορικής – Πανεπιστήμιο Πειραιώς
