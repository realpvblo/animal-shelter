<!DOCTYPE html>
<html>

<head>
    <title>Zwierzęta</title>

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
        .animal {
            display: inline-block;
            margin: 10px;
            text-align: center;
        }

        .animal img {
            width: 300px;
            height: 300px;
            object-fit: cover;
            border: 1px solid #ccc;
        }

        .animal .details {
            margin-top: 10px;
        }

        .containerSearch {
            display: flex;
            flex-direction: row;
            justify-content: center;
            margin-top: 25px;
            flex-wrap: wrap;
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
                    <li class="nav-item"><a href="admin.php" class="nav-link">Powrót do panelu</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <a href="welcome.php" class="fixed-button">
        <!-- <span>&rarr;</span> -->
    </a>

    <h2 style="text-align: center; margin-top: 50px; font-size: 30px; font-weight: bold;">Przegląd zwierząt</h2>
    <div class="containerSearch">
        <?php
        $host = "localhost";
        $username = "root";
        $password = "root";
        $database = "schronisko";

        // Utworzenie połączenia z bazą danych
        $conn = new mysqli($host, $username, $password, $database);
        if ($conn->connect_error) {
            die("Połączenie nieudane: " . $conn->connect_error);
        }

        // Pobranie danych zwierząt z bazy danych
        $sql = "SELECT * FROM zwierzeta";
        $result = $conn->query($sql);

        // Wyświetlanie danych zwierząt
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $imie = $row['imie'];
                $zdjecie = $row['zdjecie'];
                $opis = $row['opis'];

                echo '<div class="animal">';
                echo '<a href="szczegoly.php?id=' . $row['id'] . '"><img src="' . $zdjecie . '" alt="' . $imie . '"></a>';
                echo '<div class="details">';
                echo '<h3>' . $imie . '</h3>';
                echo '<p>' . $opis . '</p>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "Brak danych zwierząt.";
        }

        // Zamknięcie połączenia z bazą danych
        $conn->close();
        ?>
    </div>
</body>

</html>