<?php
$servername = "localhost";
$username = "root"; // Promenite ako je potrebno
$password = ""; // Promenite ako je potrebno
$dbname = "bazeni";

// Kreiranje konekcije
$conn = new mysqli($servername, $username, $password, $dbname);

// Proverite konekciju
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Registracija korisnika
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Šifrovanje lozinke
    $role = 'user'; // Predefinisano

    // SQL upit za dodavanje korisnika
    $sql = "INSERT INTO users (first_name, last_name, username, password, role) VALUES ('$firstName', '$lastName', '$username', '$password', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "Registracija uspešna! Možete se prijaviti.";
    } else {
        echo "Greška: " . $sql . "<br>" . $conn->error;
    }
}

// Zatvorite konekciju
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
    <link rel="stylesheet" href="style.css"> <!-- Linkovanje CSS datoteke -->
</head>
<body>
    <h2>Registracija korisnika</h2>
    <form name="myForm" action="register.php" method="post" onsubmit="return validateForm()">
        <div>
            <label for="first_name">Ime:</label>
            <input type="text" name="first_name" required>
        </div>
        <div>
            <label for="last_name">Prezime:</label>
            <input type="text" name="last_name" required>
        </div>
        <div>
            <label for="username">Korisničko ime:</label>
            <input type="text" name="username" required>
        </div>
        <div>
            <label for="password">Lozinka:</label>
            <input type="password" name="password" required>
        </div>
        <input type="submit" value="Registruj se">
    </form>
    <a href="index.php">Nazad na početnu</a>

    <script>
    function validateForm() {
        var firstName = document.forms["myForm"]["first_name"].value;
        var lastName = document.forms["myForm"]["last_name"].value;
        var username = document.forms["myForm"]["username"].value;
        if (firstName == "" || lastName == "" || username == "") {
            alert("Sva polja su obavezna.");
            return false; // Prekida slanje formulara
        }
        return true; // Omogućava slanje formulara
    }
    </script>
</body>
</html>

<footer>
    <p>&copy; Vladimir Vidić 2024</p>
</footer>