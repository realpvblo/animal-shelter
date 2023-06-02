<!DOCTYPE html>
<html>

<head>
    <title>Usuń zwierzę</title>

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
        .tabelka {
            display: flex;
            justify-content: center;
            flex-direction: column;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .tabelaUsun {
            margin-left: 100px;
            margin-top: 25px;
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
    

    <div class="tabelka">
        <h2 style="margin: 0 auto; font-size:30px; font-weight: bold">Usuń zwierzę</h2>

        <?php
        // Połączenie z bazą danych (przykładowe dane)
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "schronisko";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Połączenie nieudane: " . $conn->connect_error);
        }

        // Pobranie wszystkich danych z tabeli "zwierzeta"
        $sql = "SELECT * FROM zwierzeta";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class='tabelaUsun'>";
            echo "<tr><th>ID</th><th>Imię</th><th>Wiek</th><th>Rasa</th><th>Typ</th><th>Zdjęcie</th><th>Akcje</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["imie"] . "</td>";
                echo "<td>" . $row["wiek"] . "</td>";
                echo "<td>" . $row["rasa"] . "</td>";
                echo "<td>" . $row["typ"] . "</td>";
                echo "<td><img src='" . $row["zdjecie"] . "' width='100' height='100'></td>";
                echo "<td><form method='POST' action=''>
                    <input type='hidden' name='id' value='" . $row["id"] . "'>
                    <input type='submit' name='delete' value='Usuń' class='btn btn-outline-danger'>
                </form></td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "Brak danych w tabeli.";
        }

        $conn->close();
        ?>

        <?php
        // Obsługa usuwania zwierzęcia
        if (isset($_POST['delete'])) {
            $id = $_POST['id'];

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Połączenie nieudane: " . $conn->connect_error);
            }

            // Usunięcie zwierzęcia na podstawie ID
            $sql = "DELETE FROM zwierzeta WHERE id = '$id'";

            if ($conn->query($sql) === TRUE) {
                echo "Zwierzę o ID $id zostało usunięte.";
            } else {
                echo "Błąd: " . $conn->error;
            }

            $conn->close();
        }
        ?>
    </div>
</body>

</html>