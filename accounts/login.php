<!-- This is the Login page -->
<?php

session_start();

if (isset($_SESSION['username'])) {
    header("location: ../index.php");
    exit;
}

require_once "config.php";
$username = $password = "";
$id = "";
$hashed_password = "";
$err = "";

if (($_SERVER['REQUEST_METHOD'] == "POST") && isset($_POST['loginformsubmit'])) {

    if (empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
        $err = "Please enter all the fields!";
    } else {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }

    if (empty($err)) {
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        
        $param_username = $username;
        mysqli_stmt_bind_param($stmt, "s", $param_username);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
                
                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);

                if (mysqli_stmt_fetch($stmt)) {

                    if (password_verify($password, $hashed_password)) {
                        // Login now
                        session_start();
                        $_SESSION["username"] = $username;
                        $_SESSION["id"] = $id;
                        $_SESSION["loggedIn"] = true;

                        header("location: ../index.php");
                    }
                }
            }
        }
    }
}

$data = $_COOKIE['tokenid'];
$fullnaav=$_COOKIE['fullnaav'];

if (($_SERVER['REQUEST_METHOD'] == "POST") && isset($_POST['send_mail'])) {
    $mail_to = $_POST['email'];
    include('smtp/PHPMailerAutoload.php');

$html = "
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <style>
        @media only screen and (max-width: 600px){
            .mailid{
                display: none;
            }
        }
    </style>
</head>


<body>
    <table border='0' width='50%' style='margin:auto;padding:30px;background-color: #F3F3F3;border:1px solid #FF7A5A;'>
        <tr>
            <td>
                <table border='0' width='100%'>
                    <tr>
                        <td>
                            <img src='https://sugamphirke.com/Projects/natours/img/logo-green-small-2x.png' style='margin-left:20px;height: 30px;' alt='Logo'>
                        </td>
                        <td  class='mailid'>
                            <p style='text-align: right;'><a href='mailto:projects@sugamphirke.com' target='_blank'
                                    style='text-decoration: none;'>projects@sugamphirke.com</a></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table border='0' cellpadding='0' cellspacing='0'
                    style='text-align:center;width:100%;background-color: #fff;'>
                    <tr>
                        <td style='background-color:#FF7A5A;height:100px;font-size:50px;color:#fff;'>
                            <img style='margin-top:15px;height:70px;' src='https://sugamphirke.com/Projects/natours/accounts/images/mail.png' >
                                </td>
                    </tr>
                    <tr>
                        <td>
                            <h1 style='padding-top:25px;'>Email Confirmation</h1>
                        </td>
                    </tr>
                    <tr>
                        <td style='position: relative;'>
                            <p style='text-align:left;margin-left:40px;'>Dear $fullnaav,</p>
                            
                            <p style='padding:0px 70px;text-align:left;margin-left:20px;'>
                                Thank you for signing up for Natours! To complete your verification and gain full access to our services, we kindly ask you to verify your email address by clicking the below button.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style='height: 100px;'>
                            <a id='redirectbutton' style='text-decoration:none;margin:10px 0px 30px 0px;border-radius:4px;padding:10px 20px;border: 0;color:#fff;background-color:#FF7A5A;' href='https://sugamphirke.com/Projects/natours/accounts/activate.php?token=$data'>Verify Email address</a>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table border='0' width='100%' style='border-radius: 5px;text-align: center;'>
                    <tr>
                        <td>
                            <h3 style='margin-top:10px;'>Stay in touch</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style='margin-top:10px;'>
                                <a href='https://twitter.com/phirke__sugam' style='text-decoration: none;'>
                                    <span 
                                        style='color:#fff;border-radius:50%;'>
                                            <img src='https://sugamphirke.com/Projects/natours/accounts/images/twitter.png' style='height:40px;width:40px;'>
                                            </span></a>
                                            <a href='https://www.linkedin.com/in/sugam-phirke/' style='text-decoration: none;'><span class='msg'
                                        style='color:#fff;border-radius:50%;'><img src='https://sugamphirke.com/Projects/natours/accounts/images/linkedin.png' style='height:40px;width:40px;'></span></a>
                                <a href='https://www.facebook.com/sugam.phirke.3/' style='text-decoration: none;'><span class='fb'
                                        style='color:#fff;border-radius:50%;'><img src='https://sugamphirke.com/Projects/natours/accounts/images/facebook.png' style='height:40px;width:40px;'></span></a>
                                
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style='margin-top: 20px;'>
                                <span style='font-size:12px;'>Sugam Phirke</span><br>
                                <span style='font-size:12px;'>Copyright &copy; 2023 sugamphirke.com</span>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
";

    // $html = file_get_contents('./emailtemplate.html');
	smtp_mailer($mail_to, 'Account Verification: Natours', $html);
}

function smtp_mailer($to, $subject, $msg) {
	$mail = new PHPMailer();
// 	$mail->SMTPDebug  = 3;
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'ssl';
	$mail->Host = "smtp.hostinger.com";
	$mail->Port = 465;
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "projects@sugamphirke.com";
	$mail->Password = "Sugam@016";
	$mail->SetFrom("projects@sugamphirke.com");
	$mail->Subject = $subject;
	$mail->Body = $msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions = array('ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => false
	));
	if (!$mail->Send()) {
		echo $mail->ErrorInfo;
	} else {
// 		echo 'Mail sent successfully.';
        // header("location: login.php#mail-sent");
        
        $currentURL = $_SERVER['REQUEST_URI']; 
        $newURL = $currentURL . "#mail-sent"; 

        header("Location: " . $newURL);
	}
}
?>

<!-- HTML document starts here -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="x-icon" href="images/favicon.png">
    <title>Natours | Login</title>
    <link rel="stylesheet" href="./css/login.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Importing the Bungee and Lato google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <script src="scripts/login-script.js" defer></script>
</head>

<body>
    <div class="login-page" id="login-form">
        <!-- Applying a blackish film over the background -->
        <div class="overlay"></div>
        <!-- Back button, goes to home page(../index.php) -->
        <a href="https://sugamphirke.com/Projects/natours/" class="login-page__btn-text" style="position:relative;z-index: 10000;">&larr;&nbsp;Back</a>
        <div class="login-page__block">
            <div class="col-1-of-2 login-page__logo-container">
                <div class="login-page__logo">
                    <img class="logoimage" src="images/logo-green-2x.png" alt="">
                </div>  <!-- Ending of .logo -->
            </div>  <!-- Ending of .col-1-of-2 and .logo-container -->
            <div class="col-1-of-2 login-page__form">
                <p class="login-page__heading">Welcome Back!</p>
                <p class="login-page__tagline">Sign In to continue...</p>
                <!-- Sign in form -->
                <form action="" method="post" class="signupform">
                    <!-- Username field -->
                    <label class="form-group three">
                        <input type="text" name="username" required autocomplete="off">
                        <span class="placeholder">Username</span>
                        <span class="border"></span>
                    </label>
                    <!-- Password field -->
                    <label class="form-group three">
                        <input type="password" name="password" id="password" required autocomplete="off">
                        <span class="placeholder">Password</span>
                        <span class="border"></span>
                        <!-- Password visiblity toggle button -->
                        <div id="toggle" onclick="showHide();"></div>
                    </label>
                    <button name="loginformsubmit" class="btn btn--green">Sign In</button>
                </form>  <!-- Ending of .signupform -->
                <!-- If user has not registered yet, then redirect to Sign up page(./index.php) -->
                <span class="login-page__prompt">DON'T HAVE AN ACCOUNT?
                    <a href="index.php" class="login-page__promptAsk">SIGN UP</a>
                </span>

            </div>  <!-- Ending of .col-1-0f-2 and .container -->

        </div>  <!-- Ending of .row -->
    </div>  <!-- Ending of .bgImage and #login-form -->

    <!-- Verification popup - 1 -->
    <div class="popup" id="popup">
        <div class="popup__content">
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://assets2.lottiefiles.com/private_files/lf30_DkPC3g.json" background="transparent" speed="1" style="width: 150px; height: 150px;" loop autoplay></lottie-player>
            <h2 class="heading-secondary u-bottom-margin-small" style="margin-top: 0px;">Account Created</h2>
            <hr>
            <h3 class="heading-tertiary u-bottom-margin-small">Please verify your account</h3>
            <div class="popup__buttons">
                <a href="#verification" onclick="phoneAuth()" class="btn btn--green">Verify Now</a>
                <a href="#login-form" class="btn btn--green">I'll do it later</a>
            </div>

        </div>
    </div>

    <!-- Verification popup - 2 -->
    <div class="popupVerification" id="verification">
        <div class="popupVerification__content">
            <div class="popupVerification__left">
                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_o7vsrokz.json" background="#55C57A" speed="1" style="width: 400px; height: 500px;" loop autoplay></lottie-player>
            </div>
            <div class="popupVerification__right">
                <a href="#login-form" class="popupVerification__close">&times;</a>
                <h2 class="heading-secondary u-bottom-margin-small">Mobile Verification <span class="heading-secondary__span">(1/2)</span></h2>
                <div id="recaptcha-container" style="margin-bottom: 10px;"></div>
                <div id="message"></div>
                <h3 class="heading-tertiary u-bottom-margin-small">Please confirm your OTP:</h3>
                <div class="otp-bx">
                    <input type="text" maxlength="1">
                    <input type="text" maxlength="1">
                    <input type="text" maxlength="1" class="otp-bx__space">
                    <input type="text" maxlength="1">
                    <input type="text" maxlength="1">
                    <input type="text" maxlength="1">
                </div>
                <a onclick="codeverify()" id="link" class="btn btn--green" style="margin-left: 30%;">Verify</a>
                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player id="animation" src="https://assets10.lottiefiles.com/packages/lf20_sqi4v74j.json" background="transparent" speed=".5" style="width: 100px; height: 100px; margin-left: 30%; display: none;" loop autoplay></lottie-player>
            </div>
        </div>
    </div>

    <!-- Verification popup - 3 -->
    <div class="popupVerification" id="emailverification">
        <div class="popupVerification__content">
            <div class="popupVerification__left">
                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_ebqz3ltq.json" background="#55C57A" speed="1" style="width: 400px; height: 500px;" loop autoplay></lottie-player>
            </div>
            <div class="popupVerification__right">
                <a href="#login-form" class="popupVerification__close">&times;</a>
                <h2 class="heading-secondary u-bottom-margin-small">E-mail Verification <span class="heading-secondary__span">(2/2)</span></h2>
                <div>Click the below button to get a verification link!</div>
                <form action="" method="post">
                    <input type="hidden" name="email" id="emailField">
                    <button type="submit" onclick="changeContent()" style="margin-left: 0;" class="btn btn--green" name="send_mail">Send Mail</button>
                </form>
                <div id="sentMsgBlock" style="display: none;">A account activation mail has been sent to
                    <span id="sentMsg" class="heading-tertiary u-bottom-margin-small"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Verification popup - 4 -->
    <div class="popupVerification" id="mail-sent">
        <div class="popupVerification__content">
            <div class="popupVerification__left">
                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_ebqz3ltq.json" background="#55C57A" speed="1" style="width: 400px; height: 500px;" loop autoplay></lottie-player>
            </div>
            <div class="popupVerification__right">
                <a href="#login-form" class="popupVerification__close">&times;</a>
                <h2 class="heading-secondary u-bottom-margin-small">E-mail Verification <span class="heading-secondary__span">(2/2)</span></h2>
                <div>Didn't recieve a mail?</div>
                <form action="" method="post">
                    <input type="hidden" name="email" id="emailField">
                    <button type="submit" onclick="changeContent()" style="margin-left: 0;" class="btn btn--green" name="send_mail">Resend Mail</button>
                </form>
                <div>A account activation mail has been sent to
                    <span id="sentMsg2" class="heading-tertiary u-bottom-margin-small"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Firebase configurational scripts -->
    <script src="https://www.gstatic.com/firebasejs/9.12.1/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.12.1/firebase-auth-compat.js"></script>
</body>

</html>