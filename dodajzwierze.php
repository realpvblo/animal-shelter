<!DOCTYPE html>
<html>
<head>
  <title>Dodaj zwierzę</title>
  <style>
    .form-container {
      max-width: 1200px;
      width: 50%;
      margin: 5% auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin-top: 5px;
    }
    .form-container label {
      display: block;
      margin-bottom: 10px;
    }
    .form-container input[type="text"],
    .form-container select,
    .form-container textarea {
      width: 100%;
      padding: 10px;
      border-radius: 3px;
      border: 1px solid #ccc;
      box-sizing: border-box;
      margin-bottom: 15px;
    }
    .form-container input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
  </style>

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
</head>

<body>
<div class="wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-6 d-flex justify-content-md-end">
						<div class="social-media">
			    		<p class="mb-0 d-flex">
							<!-- login -->
							<a href="login.php" class="d-flex align-items-center justify-content-center"></a>
			    		</p>
		        </div>
					</div>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	    	<a class="navbar-brand" href="index.html"><span class="flaticon-pawprint-1 mr-2"></span>Panel Admina</a>
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
      $zdjecie = $_POST['zdjecie']; // Zdjęcie jako link
      $opis = $_POST['opis'];

      // Dodanie zwierzęcia do bazy danych
      $query = "INSERT INTO zwierzeta (typ, imie, wiek, rasa, zdjecie, opis) VALUES (:typ, :imie, :wiek, :rasa, :zdjecie, :opis)";
      $stmt = $db->prepare($query);
      $stmt->bindParam(':typ', $typ);
      $stmt->bindParam(':imie', $imie);
      $stmt->bindParam(':wiek', $wiek);
      $stmt->bindParam(':rasa', $rasa);
      $stmt->bindParam(':zdjecie', $zdjecie);
      $stmt->bindParam(':opis', $opis);

      try {
        $stmt->execute();

        // Pobierz ID dodanego zwierzęcia
        $idZwierzecia = $db->lastInsertId();

        // Przekieruj użytkownika na stronę wyboru klatki
        header("Location: wybierz_klatke.php?id=$idZwierzecia");
        exit();
      } catch (PDOException $e) {
        echo "Błąd podczas dodawania zwierzęcia do bazy danych: " . $e->getMessage();
      }
    }
  }
  ?>

  <div>
    <h1 style="font-size: 30px; justify-content: center; display: flex; margin-top: 5%; margin-bottom: 2%; font-weight: bold;">Dodaj zwierzę do bazy danych</h1>
    <div class="form-container">
      <form method="POST" action="" enctype="multipart/form-data">
        <label for="typ">Typ:</label>
        <select name="typ" id="typSelect" required onchange="updateRasy()">
          <option value="kot">Kot</option>
          <option value="pies">Pies</option>
        </select>

        <label for="imie">Imię:</label>
        <input type="text" name="imie" required>

        <label for="wiek">Wiek:</label>
        <select name="wiek" required>
          <?php
          // Generowanie opcji dla wieku 1-20
          for ($i = 1; $i <= 20; $i++) {
            echo "<option value='$i'>$i</option>";
          }
          ?>
        </select>

        <label for="rasa">Rasa:</label>
        <select name="rasa" id="rasaSelect" required></select>

        <label for="zdjecie">Zdjęcie (link):</label>
        <input type="text" name="zdjecie" required>

        <label for="opis">Opis:</label>
        <textarea name="opis" required></textarea>

        <input type="submit" name="submit" value="Dodaj zwierzę">

        <script>
          function updateRasy() {
            var typSelect = document.getElementById("typSelect");
            var rasaSelect = document.getElementById("rasaSelect");
            rasaSelect.innerHTML = ""; // Wyczyść opcje pola rasy

            if (typSelect.value === "kot") {
              var kotRasy = ['Dachowiec', 'Bezdomny', 'Inna'];
              for (var i = 0; i < kotRasy.length; i++) {
                var option = document.createElement("option");
                option.text = kotRasy[i];
                option.value = kotRasy[i];
                rasaSelect.add(option);
              }
            } else if (typSelect.value === "pies") {
              var piesRasy = ['Labrador', 'Husky', 'Inna'];
              for (var i = 0; i < piesRasy.length; i++) {
                var option = document.createElement("option");
                option.text = piesRasy[i];
                option.value = piesRasy[i];
                rasaSelect.add(option);
              }
            }
          }
        </script>
      </form>
    </div>
  </div>
</body>
</html>
