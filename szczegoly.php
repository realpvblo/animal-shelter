<!DOCTYPE html>
<html>

<head>
    <title>Szczegóły zwierzęcia</title>

    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        .opisDuzy {
            display: flex;
            flex-direction: row;
            margin-top: 25px;
            justify-content: center;
        }

        .opisZwierzecia {
            margin-left: 25px;
        }
    </style>
</head>

<body>

    <div class="wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex justify-content-md-end">
                    <div class="social-media">
                        <p class="mb-0 d-flex">
                            <!-- login -->
                            <a href="#" class="d-flex align-items-center justify-content-center"></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="#"><span class="flaticon-pawprint-1 mr-2"></span>Panel Admina</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="przegladaj.php" class="nav-link">Powrót do przeglądu</a></li>
                </ul>
            </div>
        </div>
    </nav>

    </a>
    <h1 style="text-align: center; margin-top:50px; font-weight: bold">Szczegóły zwierzęcia</h1>

    <?php
    // Połączenie z bazą danych - wymaga odpowiednich danych dostępowych
    $host = "localhost";
    $username = "root";
    $password = "root";
    $database = "schronisko";

    $conn = new mysqli($host, $username, $password, $database);

    // Sprawdzenie połączenia
    if ($conn->connect_error) {
        die("Błąd połączenia: " . $conn->connect_error);
    }

    // Pobranie danych zwierzęcia na podstawie przekazanego ID
    $id = $_GET["id"];

    $sql = "SELECT * FROM zwierzeta WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Wyświetlanie danych zwierzęcia
        $row = $result->fetch_assoc();
        $zdjecie = $row['zdjecie'];
        $imie = $row["imie"];
        $wiek = $row["wiek"];
        $rasa = $row["rasa"];
        $szczepiony = $row["szczepiony"];
        $utrzymanie = $row["utrzymanie"];
        $opis = $row["opis"];

        echo "<div class='opisDuzy'>";
        echo "<img src='$zdjecie' width='300px' height='300px'>";
        echo "<div class='opisZwierzecia'>";
        echo "<h2>$imie</h2>";
        echo "<p>Wiek: $wiek</p>";
        echo "<p>Rasa: $rasa</p>";
        echo "<p>Szczepiony: $szczepiony</p>";
        echo "<p>Koszt utrzymania miesięczny: $utrzymanie</p>";
        echo "<p>Opis: $opis</p>";
        echo "</div>";
        echo "</div>";
    } else {
        echo "Nie znaleziono zwierzęcia o podanym ID.";
    }

    $conn->close();
    ?>
</body>

</html>