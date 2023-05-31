<?php

session_start();
 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
    
}
$email = $_SESSION['email'];
$username = $_SESSION['username'];

  
?>
<?php
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
    
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Formularz adopcyjny</title>
    <style>
        /* Stylizacja formularza */
        .form-container {
            width: 400px;
            margin: 0 auto;
        }

        .form-container label,
        .form-container input {
            display: block;
            margin-bottom: 10px;
        }

        .form-container input[type="submit"] {
            margin-top: 10px;
        }

        .animal-container {
            margin-top: 20px;
            display: none;
        }

        .animal {
            margin-bottom: 10px;
            border: 1px solid #ccc;
            padding: 10px;
        }

        .animal img {
            width: 100px;
            height: auto;
            display: block;
            margin-bottom: 10px;
        }

        .animal-button {
            margin-top: 10px;
        }
    </style>
    <script>
        function showAnimals() {
            var animalContainer = document.getElementById('animal-container');
            animalContainer.style.display = 'block';
        }

        function selectAnimal(animalId) {
            document.getElementById('animal-id').value = animalId;
            document.getElementById('animal-form').style.display = 'block';
        }

        // Inicjalizacja kalendarza
        window.addEventListener('DOMContentLoaded', function() {
            var dateInputs = document.querySelectorAll('.date-input');
            for (var i = 0; i < dateInputs.length; i++) {
                dateInputs[i].addEventListener('focus', function() {
                    this.setAttribute('type', 'date');
                });
                dateInputs[i].addEventListener('blur', function() {
                    if (!this.value) {
                        this.setAttribute('type', 'text');
                    }
                });
            }
        });
    </script>
</head>
<body>
    <div class="form-container">
        <form method="post" action="process_form.php" onsubmit="event.preventDefault(); showAnimals();">
            <label for="imie">Imię:</label>
            <input type="text" id="imie" name="imie" required>
            
            <label for="nazwisko">Nazwisko:</label>
            <input type="text" id="nazwisko" name="nazwisko" required>
            
            <label for="telefon">Telefon:</label>
            <input type="text" id="telefon" name="telefon" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="data_urodzenia">Data urodzenia:</label>
            <input type="text" id="data_urodzenia" name="data_urodzenia" class="date-input" required>
            
            <label for="miejsce_zamieszkania">Miejsce zamieszkania:</label>
            <input type="text" id="miejsce_zamieszkania" name="miejsce_zamieszkania" required>
            
            <label for="dochod">Dochód:</label>
            <select id="dochod" name="dochod" required>
                <option value="">Wybierz widełki dochodu</option>
                <option value="1000-3000">1000-3000</option>
                <option value="3001-4999">3001-4999</option>
                <option value="5000+">5000+</option>
            </select>
            
            <input type="submit" value="Zaadoptuj">
        </form>
    </div>

    <div id="animal-container" class="animal-container">
        <?php
        // Połączenie z bazą danych - należy dostosować poniższe dane do swojej konfiguracji
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'schronisko';

        $conn = mysqli_connect($host, $username, $password, $database);

        if ($conn) {
            // Pobranie danych zwierząt z bazy danych
            $query = "SELECT * FROM zwierzeta";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="animal">';
                    echo '<img src="' . $row['zdjecie'] . '">';
                    echo '<p>imie: ' . $row['imie'] . '</p>';
                    echo '<p>rasa: ' . $row['rasa'] . '</p>';
                    echo '<button class="animal-button" onclick="selectAnimal(' . $row['id'] . ')">Wybierz</button>';
                    echo '</div>';
                }
            }

            mysqli_close($conn);
        }
        ?>
    </div>

    <div id="animal-form" style="display: none;">
        <h2>Formularz adopcyjny dla zwierzęcia:</h2>
        <form method="post" action="add_adoption.php">
            <input type="hidden" id="animal-id" name="animal_id">
            
            <label for="dlaczego_chcesz_adoptowac">Dlaczego chcesz adoptować psa?</label>
            <textarea id="dlaczego_chcesz_adoptowac" name="dlaczego_chcesz_adoptowac" required></textarea>
            
           
            <input type="button" value="Adoptuje">
        </form>
    </div>

 


</body>
</html>
