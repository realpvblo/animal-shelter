<?php
session_start();

// Sprawdzanie czy użytkownik jest zalogowany
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  // Jeśli zalogowany jako admin
  if ($_SESSION["type"] == "Admin") {
    header("location: admin.php");
    exit;
  }
  // Jeśli zalogowany jako user
  elseif ($_SESSION["type"] == "user") {
    header("location: user_page.php");
    exit;
  }
}

// Wylogowywanie użytkownika
if (isset($_GET["action"]) && $_GET["action"] == "logout") {
  session_unset();
  session_destroy();
  header("location: index.html");
  exit;
}

// Kontynuacja Twojego kodu...

// Check if the form has been submitted
if (isset($_POST['submit'])) {
  // Retrieve the form data
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];

  // Validate the form data
  if (empty($username) || empty($password) || empty($email)) {
    $error = "Username or Password is invalid";
  } else {
    // Connect to the database
    $db = mysqli_connect('localhost', 'root', 'root', 'schronisko');

    // Check if the user exists in the database
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password' AND email = '$email'";
    $result = mysqli_query($db, $query);
    $num_rows = mysqli_num_rows($result);

    if ($num_rows == 1) {
      // Start a new session and store the user details in session variables
      $user = mysqli_fetch_assoc($result);
      // session_start();
      $_SESSION["loggedin"] = true;
      $_SESSION["username"] = $user['username'];
      $_SESSION["email"] = $user['email'];
      $_SESSION["type"] = $user['type'];

      // Redirect the user to the appropriate page based on their type
      if ($_SESSION["type"] == "Admin") {
        header("location: admin.php");
        exit;
      } elseif ($_SESSION["type"] == "user") {
        header("location: user_page.php");
        exit;
      }
    } else {
      $error = "Username or Password is invalid";
    }
  }
}
?>


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
    font-family: 'Open Sans', sans-serif;
    background-color: #f8f9fa;
  }

  #container {
    max-width: 500px;
    margin: 50px auto;
    border-radius: 20px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    padding: 20px 30px;
    background-color: #ffffff;
  }

  .form-container {
    margin-bottom: 20px;
  }

  form h1 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
  }

  form span {
    font-size: 16px;
    color: #6c757d;
    margin-bottom: 20px;
  }

  form input {
    padding: 10px 15px;
    margin-bottom: 10px;
    border: 1px solid #ced4da;
    border-radius: 4px;
    font-size: 16px;
    color: #495057;
  }

  form a {
    color: #007bff;
    text-decoration: none;
    display: block;
    width: 100%;
    margin-bottom: 20px;
  }

  form a:hover {
    text-decoration: underline;
  }

  form input[type="submit"] {
    background-color: #007bff;
    color: #ffffff;
    cursor: pointer;
  }

  form input[type="submit"]:hover {
    background-color: #0056b3;
  }

  .logowanie {
    display: flex;
    flex-direction: column;
    margin: 20px 0;
  }
</style>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
</head>


<body>

  <!-- Display the login form -->

  <div class="wrap">
    <div class="container">
      <div class="row">
        <div class="col-md-6 d-flex align-items-center">
          <p class="mb-0 phone pl-md-2">
            <a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span> +48 123 456 789</a>
            <a href="#"><span class="fa fa-paper-plane mr-1"></span> adoptujpupila@gmail.com</a>
          </p>
        </div>
        <div class="col-md-6 d-flex justify-content-md-end">
          <div class="social-media">
            <p class="mb-0 d-flex">
              <!-- login -->
              <a href="login.php" class="d-flex align-items-center justify-content-center"><span class="fa fa-user">Logowanie<i class="sr-only">Login</i></span></a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html"><span class="flaticon-pawprint-1 mr-2"></span>Adoptuj pupila!</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-bars"></span> Menu
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) : ?>
            <li class="nav-item"><a class="nav-link me-lg-3" href="index.php?action=logout">Wyloguj się</a></li>
          <?php else : ?>
            <li class="nav-item"><a class="nav-link me-lg-3" href="login.php">Zaloguj się</a></li>
          <?php endif; ?>
          <li class="nav-item"><a class="nav-link me-lg-3" href="register.php">Stwórz konto</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container" id="container">
    <div class="form-container sign-in-container">
      <form method="post" action="login.php">
        <h1>Zaloguj się</h1>
        <span>użyj swojego konta</span>
        <div class="logowanie">
          <input type="text" name="username" placeholder="Imię" />
          <input type="email" name="email" placeholder="E-mail" />
          <input type="password" name="password" placeholder="Hasło" />
        </div>
        <a href="#">Zapomniałeś hasła?</a>
        <input type="submit" name="submit" value="Zaloguj się">
      </form>
    </div>
  </div>

</body>

<?php if (isset($error)) {
  echo $error;
} ?>
