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

// Dodavanje nove rezervacije
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $pool_id = $_POST['pool_id'];
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];
    $duration = $_POST['duration'];
    $notes = $_POST['notes'];
    $additional_services = $_POST['additional_services'];
    $price = $_POST['price'];

    // SQL upit za dodavanje rezervacije
    $sql = "INSERT INTO reservations (username, pool_id, reservation_date, reservation_time, duration, notes, additional_services, price)
            VALUES ('$username', '$pool_id', '$reservation_date', '$reservation_time', '$duration', '$notes', '$additional_services', '$price')";

    if ($conn->query($sql) === TRUE) {
        echo "Rezervacija uspešna!";
    } else {
        echo "Greška: " . $sql . "<br>" . $conn->error;
    }
}

// Prikaz postojećih rezervacija
$sql = "SELECT * FROM reservations";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezervacije</title>
    <link rel="stylesheet" href="style.css">
    <script>
    const pricePerMinute = 0.5; // Cena po minuti

    function calculatePrice() {
        var duration = document.forms["myForm"]["duration"].value;
        var priceField = document.forms["myForm"]["price"];
        
        if (duration < 0) {
            alert("Trajanje ne može biti negativno.");
            priceField.value = 0; // Postavljanje cene na 0
        } else {
            var price = duration * pricePerMinute;
            priceField.value = price.toFixed(2); // Postavljanje cene sa 2 decimale
        }
    }

    function validateForm() {
        var duration = document.forms["myForm"]["duration"].value;
        var price = document.forms["myForm"]["price"].value;

        if (duration < 0) {
            alert("Trajanje ne može biti negativno.");
            return false;
        }
        
        if (price < 0) {
            alert("Cena ne može biti negativna.");
            return false;
        }
    }
    </script>
    <style>
        body {
            background-color: #e0f7fa; 
            font-family: Arial, sans-serif;
        }

        form {
            background-color: white; 
            padding: 20px; 
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); 
        }

        .price-input {
            -moz-appearance: textfield; 
        }

        .price-input::-webkit-inner-spin-button,
        .price-input::-webkit-outer-spin-button {
            -webkit-appearance: none; 
            margin: 0;
        }

        .price-container {
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
    <h2>Dodavanje rezervacije</h2>
    <form name="myForm" action="reservations.php" method="post" onsubmit="return validateForm();">
        <label for="username">Korisničko ime:</label>
        <input type="text" name="username" required>
        
        <label for="password">Lozinka:</label>
        <input type="password" name="password" required> <!-- Polje za lozinku -->
        
        <label for="pool_id">Izaberite bazen:</label>
        <select name="pool_id" required>
            <option value="">-- Izaberite bazen --</option>
            <option value="1">Veliki olimpijski bazen</option>
            <option value="2">Mali bazen za decu</option>
            <option value="3">SPA zona sa saunom i parnom sobom</option>
        </select>
        
        <label for="reservation_date">Datum rezervacije:</label>
        <input type="date" name="reservation_date" required>
        
        <label for="reservation_time">Vreme rezervacije:</label>
        <div>
            <select name="reservation_hour" required>
                <option value="">-- Sat --</option>
                <?php
                for ($h = 0; $h < 24; $h++) {
                    echo "<option value='$h'>" . str_pad($h, 2, '0', STR_PAD_LEFT) . "</option>";
                }
                ?>
            </select>
            :
            <select name="reservation_minute" required>
                <option value="">-- Minut --</option>
                <?php
                for ($m = 0; $m < 60; $m += 5) {
                    echo "<option value='$m'>" . str_pad($m, 2, '0', STR_PAD_LEFT) . "</option>";
                }
                ?>
            </select>
        </div>
        
        <label for="duration">Trajanje (u minutama):</label>
        <input type="number" name="duration" min="0" required oninput="calculatePrice()">
        
        <label for="notes">Napomene:</label>
        <textarea name="notes"></textarea>
        
        <label for="additional_services">Dodatne usluge:</label>
        <textarea name="additional_services"></textarea>
        
        <label for="price">Cena:</label>
        <div class="price-container">
            <input type="number" step="0.01" name="price" min="0" required readonly class="price-input">
            <span>din</span> <!-- Oznaka valute -->
        </div>
        
        <input type="submit" value="Rezerviši">
    </form>
</body>
</html>

<footer>
    <p>&copy; Vladimir Vidić 2024</p>
</footer>