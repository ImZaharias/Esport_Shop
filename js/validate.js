(function() {
  // συνάρτηση ελέγχου φόρμας
  function checkMe() {
    var errors = []; // λίστα με μηνύματα λαθών

    // Βρεσ τα πεδία φόρμας
    var flname = document.getElementById("flname");
    var email = document.getElementById("email");
    var username = document.getElementById("username");
    var password = document.getElementById("password");

    // Έλεγχος ονοματεπώνυμου μόνο ελληνικοί χαρακτήρες REGEX
    if (!/^[\u0370-\u03FF\u1F00-\u1FFF\s-]+$/u.test(flname.value.trim())){
      errors.push("Το ονοματεπώνυμο πρέπει να περιέχει μόνο ελληνικούς χαρακτήρες.");
      flname.style.border = "2px solid red"; // κόκκινο περίγραμμα αν λάθος
    } else {
      flname.style.border = "";
    }

    // Έλεγχος email (με χρήση built-in HTML5 checkValidity)
    if(!email.checkValidity()){
      errors.push("Το email δεν είναι έγκυρο.");
      email.style.border = "2px solid red";
    } else {
      email.style.border = "";
    }

    // Έλεγχος username (τουλάχιστον 3 χαρακτήρες)
    if(username.value.trim().length < 3){
      errors.push("Το username πρέπει να έχει τουλάχιστον 3 χαρακτήρες.");
      username.style.border = "2px solid red";
    } else {
      username.style.border = "";
    }

    // Έλεγχος password (τουλάχιστον 6 χαρακτήρες)
    if(password.value.trim().length < 6){
      errors.push("Το password πρέπει να έχει τουλάχιστον 6 χαρακτήρες.");
      password.style.border = "2px solid red";
    } else {
      password.style.border = "";
    }

    // Εμφάνιση λαθών στο <p id="errors">
    var holder = document.getElementById("errors");
    holder.textContent = errors.join(" ");

    // Αν δεν υπάρχουν λάθη -> στείλε τη φόρμα
    if(errors.length === 0){
      document.getElementById("regform").submit();
    }
  }

  // Όταν πατηθεί το κουμπί Αποστολή, τρέχει το checkMe
  document.getElementById("mysubmt").addEventListener("click", checkMe);
})();
