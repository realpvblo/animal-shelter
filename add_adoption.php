<?php
// Połączenie z bazą danych - należy dostosować poniższe dane do swojej konfiguracji
$host = 'localhost';
$dbUsername = 'root';
$dbPassword = 'root';
$database = 'schronisko';

$conn = mysqli_connect($host, $dbUsername, $dbPassword, $database);

if ($conn) {
    if (isset($_POST['animal_id']) && isset($_POST['dlaczego_chcesz_adoptowac'])) {
        $animalId = $_POST['animal_id'];
        $description = $_POST['dlaczego_chcesz_adoptowac'];

        // Dodanie danych do bazy danych
        $query = "INSERT INTO dane (idzwierzecia, opis) VALUES ('$animalId', '$description')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "Dane zostały dodane do bazy danych.";
        } else {
            echo "Wystąpił błąd podczas dodawania danych.";
        }
    } else {
        echo "Nieprawidłowe dane przekazane formularzem.";
    }

    mysqli_close($conn);
} else {
    echo "Błąd połączenia z bazą danych.";
}
?>
