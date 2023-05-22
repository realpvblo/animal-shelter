<?php
// Połączenie z bazą danych - należy dostosować do własnych ustawień
$host = "localhost";
$dbname = "schronisko";
$username = "root";
$password = "";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Błąd połączenia z bazą danych: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sprawdzenie, czy formularz został wysłany
    if (isset($_POST['submit'])) {
        $typ = $_POST['typ'];
        $imie = $_POST['imie'];
        $wiek = $_POST['wiek'];
        $rasa = $_POST['rasa'];
        $klatka = $_POST['klatka'];
        $zdjecie = $_POST['zdjecie']; // Zdjęcie jako link

        // Dodanie zwierzęcia do bazy danych
        $query = "INSERT INTO zwierzeta (typ, imie, wiek, rasa, klatka, zdjecie) VALUES (:typ, :imie, :wiek, :rasa, :klatka, :zdjecie)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':typ', $typ);
        $stmt->bindParam(':imie', $imie);
        $stmt->bindParam(':wiek', $wiek);
        $stmt->bindParam(':rasa', $rasa);
        $stmt->bindParam(':klatka', $klatka);
        $stmt->bindParam(':zdjecie', $zdjecie);

        try {
            $stmt->execute();
            echo "Zwierzę zostało dodane do bazy danych.";
        } catch (PDOException $e) {
            echo "Błąd podczas dodawania zwierzęcia do bazy danych: " . $e->getMessage();
        }
    }
}
?>

<form method="POST" action="" enctype="multipart/form-data">
    <!-- Pozostałe pola formularza -->

    <label for="zdjecie">Zdjęcie (link):</label>
    <input type="text" name="zdjecie" required><br>

    <label for="typ">Typ:</label>
    <select name="typ" id="typSelect" required onchange="updateRasy()">
        <option value="kot">Kot</option>
        <option value="pies">Pies</option>
    </select><br>

    <label for="imie">Imię:</label>
    <input type="text" name="imie" required><br>

    <label for="wiek">Wiek:</label>
    <select name="wiek" required>
        <?php
        // Generowanie opcji dla wieku 1-20
        for ($i = 1; $i <= 20; $i++) {
            echo "<option value='$i'>$i</option>";
        }
        ?>
    </select><br>

    <label for="rasa">Rasa:</label>
    <select name="rasa" id="rasaSelect" required></select><br>

    <label for="klatka">Klatka:</label>
    <select name="klatka" id="klatkaSelect" required></select><br>

    <input type="submit" name="submit" value="Dodaj zwierzę">

    <script>
        function updateRasy() {
            var typSelect = document.getElementById("typSelect");
            var rasaSelect = document.getElementById("rasaSelect");
            rasaSelect.innerHTML = ""; // Wyczyść opcje pola rasy

            if (typSelect.value === "kot") {
                var kotRasy = ['Dachowiec', 'Bezdomny'];
                for (var i = 0; i < kotRasy.length; i++) {
                    var option = document.createElement("option");
                    option.text = kotRasy[i];
                    option.value = kotRasy[i];
                    rasaSelect.add(option);
                }
            } else if (typSelect.value === "pies") {
                var piesRasy = ['Labrador', 'Husky'];
                for (var i = 0; i < piesRasy.length; i++) {
                    var option = document.createElement("option");
                    option.text = piesRasy[i];
                    option.value = piesRasy[i];
                    rasaSelect.add(option);
                }
            }

            // Aktualizacja opcji klatek
            var klatkaSelect = document.getElementById("klatkaSelect");
            klatkaSelect.innerHTML = ""; // Wyczyść opcje pola klatka

            // Pobierz klatki dla wybranego typu zwierzęcia z bazy danych
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'pobierz_klatki.php?typ=' + typSelect.value, true);

            xhr.onload = function() {
                if (xhr.status === 200) {
                    var klatki = JSON.parse(xhr.responseText);
                    for (var i = 0; i < klatki.length; i++) {
                        var option = document.createElement("option");
                        option.text = klatki[i];
                        option.value = klatki[i];
                        klatkaSelect.add(option);
                    }
                }
            };

            xhr.send();
        }
    </script>
</form>
