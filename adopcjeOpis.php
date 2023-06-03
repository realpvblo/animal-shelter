<?php
$host = "localhost";
$dbname = "schronisko";
$username = "root";
$password = "root";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Błąd połączenia z bazą danych: " . $e->getMessage());
}

if (isset($_GET['idzwierzecia'])) {
    $idzwierzecia = $_GET['idzwierzecia'];

    $query = "SELECT * FROM zwierzeta WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $idzwierzecia, PDO::PARAM_INT);

    try {
        $stmt->execute();
        $zwierze = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Błąd podczas pobierania danych: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Zatwierdź wniosek</title>

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
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }

        table {
            margin: auto;
            margin-top: 50px;
            width: 90%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 15px;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        img {
            max-width: 100px;
            height: auto;
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
                    <li class="nav-item"><a href="adopcje.php" class="nav-link">Powrót do przeglądu</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <?php if (isset($zwierze)) : ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Imię</th>
                <th>Wiek</th>
                <th>Rasa</th>
                <th>Typ</th>
                <th>Klatka</th>
                <th>Zdjęcie</th>
                <th>Opis</th>
                <th>Szczepiony</th>
                <th>Utrzymanie</th>
                <th>Akcje</th>
            </tr>
            <tr>
                <td><?php echo $zwierze['id']; ?></td>
                <td><?php echo $zwierze['imie']; ?></td>
                <td><?php echo $zwierze['wiek']; ?></td>
                <td><?php echo $zwierze['rasa']; ?></td>
                <td><?php echo $zwierze['typ']; ?></td>
                <td><?php echo $zwierze['klatka']; ?></td>
                <td>
                    <?php if ($zwierze['zdjecie']) : ?>
                        <img src="<?php echo $zwierze['zdjecie']; ?>" alt="Zdjęcie zwierzęcia">
                    <?php endif; ?>
                </td>
                <td><?php echo $zwierze['opis']; ?></td>
                <td><?php echo $zwierze['szczepiony']; ?></td>
                <td><?php echo $zwierze['utrzymanie']; ?></td>
                <td class="action-buttons">
                    <button class="action-button approve-button btn btn-outline-success" onclick="updateStatus(<?php echo $zwierze['id']; ?>, 'zatwierdzony')">Zatwierdź</button>
                    <button class="btn btn-outline-danger" onclick="updateStatus(<?php echo $zwierze['id']; ?>, 'odrzucony')">Odrzuć</button>
                </td>
            </tr>
        </table>
    <?php else : ?>
        <p>Nie znaleziono informacji o zwierzęciu.</p>
    <?php endif; ?>
    <script>
        function updateStatus(id, status) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    location.reload();
                }
            };
            xhttp.open("POST", "update_status.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("id=" + id + "&status=" + status);
        }
    </script>
</body>

</html>