<?php
// Connect to the database
$db = new mysqli('localhost', 'root', 'root', 'schronisko');

// Check for a successful connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Check if the form has been submitted
if (isset($_POST['submit'])) {

    // Get the form data
    $email = $db->real_escape_string($_POST['email']);
    $username = $db->real_escape_string($_POST['username']);
    $password = $db->real_escape_string($_POST['password']);
    $type = "user"; // Set the type as "user"

    // Insert the data into the database
    $query = "INSERT INTO users (email, username, password, type) VALUES ('$email', '$username', '$password', '$type')";
    if ($db->query($query) === TRUE) {
        echo "Registration successful!";
        header("location: login.php");
    } else {
        echo "Error: " . $query . "<br>" . $db->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Zarejestruj się</title>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form method="post" action="register.php">
                <h1>Stwórz konto</h1>
                <span>użyj swojego emaila do rejestracji</span>
                <input type="text" name="username" placeholder="Imię" required>
                <input type="email" name="email" placeholder="E-mail" required>
                <input type="password" name="password" placeholder="Hasło" required>
                <input type="submit" name="submit" value="Stwórz konto">
            </form>
        </div>
       
    </div>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
