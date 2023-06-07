<!-- This is the Registration page -->
<?php
require_once "config.php";
$username = $password = "";
$username_err = $password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Username cannot be blank!";
    } else {
        $sql = "SELECT * FROM users WHERE username = ?";   // prepare the select statement
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST["username"]);

            // Execute the statement
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken!";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Something went wrong!";
            }
        }
    }
    mysqli_stmt_close($stmt);


    // Check for password
    if (empty(trim($_POST['password']))) {
        $password_err = "Password cannot be blank";
    } elseif (strlen(trim($_POST['password'])) < 5) {
        $password_err = "Password length cannot be less than 5 characters";
    } else {
        $password  = trim($_POST['password']);
    }
    
    $token = bin2hex(random_bytes(15));

    // If there were no error, then insert the data in db
    if (empty($username_err) && empty($password_err)) {
        $sql = "INSERT INTO users (fullname, username, email, phoneNo, password, token, status) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssssss", $param_fullname, $param_username, $param_email, $param_phoneNo,$param_password, $param_token, $param_status);

            $param_fullname = $_POST['fullname'];
            $param_username = $username;
            $param_email = $_POST['email'];
            $param_phoneNo = $_POST['phoneNo'];
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $param_token = $token;
            $param_status = "inactive";
            
            if (mysqli_stmt_execute($stmt)) {
                setcookie('tokenid', $token, time() + 3600); 
                setcookie('fullnaav', $_POST['fullname'], time() + 3600); 
                $url = "login.php?phone=+91" . urlencode($_POST['phoneNo']) . "&email=" . urlencode($_POST['email']) . "#popup";
                // setcookie('currurl', "login.php?phone=+91" . urlencode($_POST['phoneNo']) . "&email=" . urlencode($_POST['email']), time() + 3600);
                // setcookie('phoneNo', $_POST['phoneNo'], time() + 3600);
                // setcookie('mail', $_POST['email'], time() + 3600);
                header("Location: " . $url);
                // header("location: login.php#popup");
            } else {
                echo "Something went wrong: Cannot redirect!";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}
?>

<!-- Start of the html document -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Natours | Registeration</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="./css/registration.min.css">
    <script src="scripts/registration-script.js" defer></script>
</head>

<body>
    <div class="registration-page">
        <!-- A blackish filter on the background -->
        <div class="overlay"></div>
        <!-- Back button -->
        <a href="https://sugamphirke.com/Projects/natours/" class="registration-page__btn-text">&larr;&nbsp;Back</a>
        <div class="registration-page__block">
            <div class="col-1-of-2 registration-page__logo-container">
                <div class="registration-page__logo">
                    <img class="logoimage" src="images/logo-green-2x.png"  alt="">
                </div> <!-- Ending of .logo -->
            </div> <!-- Ending of .col-1-of-2 and .logo-container -->
            <div class="col-1-of-2 registration-page__form">
                <p class="registration-page__heading">Hello There!</p>
                <p class="registration-page__tagline">Sign Up to start your journey...</p>
                
                <!-- Registration form -->
                <form action="" method="post" id="signupform">
                    <!-- Name field -->
                    <label class="form-group three">
                        <input type="text" name="fullname" required autocomplete="off">
                        <span class="placeholder">Full Name</span>
                        <span class="border"></span>
                    </label>
                    <!-- Username field -->
                    <label class="form-group three">
                        <input type="text" name="username" required autocomplete="off">
                        <span class="placeholder">Username</span>
                        <span class="border"></span>
                    </label>
                    <!-- Email field -->
                    <label class="form-group three">
                        <input type="text" name="email" required autocomplete="off">
                        <span class="placeholder">E-mail</span>
                        <span class="border"></span>
                    </label>
                    <!-- Phone number field -->
                    <label class="form-group three">
                        <input type="text" name="phoneNo" required autocomplete="off">
                        <span class="placeholder">Phone No</span>
                        <span class="border"></span>
                    </label>
                    <!-- Password field -->
                    <label class="form-group three">
                        <input type="password" name="password" id="password" required autocomplete="off">
                        <span class="placeholder">Password</span>
                        <span class="border"></span>
                        <!-- Password visibility button -->
                        <div id="toggle" onclick="showHide();"></div>
                    </label>
                    <button type="submit" class="btn btn--green">Sign Up</button>
                </form> <!-- Ending of #signupform -->
                <span class="registration-page__prompt">ALREADY HAVE AN ACCOUNT?
                    <a href="./login.php" class="registration-page__promptAsk">SIGN IN</a>
                </span> <!-- Ending of .prompt -->
            </div> <!-- Ending of .col-1-of-2 and .form -->
        </div> <!-- Ending of .row -->
    </div> <!-- Ending of .bgImage and #registration-page -->
    </div>
</body>

</html>
<!-- Ending of the html document -->