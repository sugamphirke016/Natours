<!-- This file pops up after the user clicks the link sent via mail. -->
<!-- Functionality: It sets the status for user as active indicating that user has completed the verification process and then displays the verification completed msg on screen. -->
<?php
session_start();
require_once "config.php";
$displayDiv = false;
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $updatequery = "UPDATE users SET status='active' WHERE token='$token'";
    $query = mysqli_query($conn, $updatequery);
    if ($query) {
    }
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee&family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            font-size: 62.5%;
        }

        body {
            font-family: 'Lato', sans-serif;
            background: #000;
        }
        
        @media only screen and (max-width: 56.25em){
            body{
                max-height: calc(100vh - 20rem) !important;
            }
        }

        .col-1-of-2 {
            min-width: calc((100% - 5px) / 2);
        }

        #center {
            position: absolute;
            top: 35%;
            left: 35%;
            transform: translate(-35%, -35%);
            background-color: transparent;
            color: #fff;
            margin: 0 auto;
        }

        @media only screen and (max-width: 56.25em) {
            #center {
                width: 100%;
                height: calc(100vh - 20rem);
            }
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            height: 100vh;
            background-color: #000;
            margin-right: 0;
        }

        .container__heading-secondary {
            font-size: 25px;
            text-transform: uppercase;
            font-family: 'Kanit', sans-serif;
            font-weight: 900;
            letter-spacing: 0px;
            background-image: linear-gradient(to right, #7ed56f, #28b485);
            display: inline-block;
            -webkit-background-clip: text;
            color: transparent;
            transition: all .2s;
        }

        .container__heading-secondary:hover {
            transform: skewY(2deg) skewX(15deg) scale(1.1);
            text-shadow: 0.5rem 1rem 2rem rgba(0, 0, 0, 0.2);
        }

        .container__heading-tertiary {
            font-size: 16px;
            font-weight: 700;
        }

        .container__btn-text:link,
        .container__btn-text:visited {
            font-size: 20px;
            color: #55c57a;
            display: inline-block;
            text-decoration: none;
            border-bottom: 1px solid #55c57a;
            padding: 3px;
            transition: all .2s;
        }

        .container__btn-text:hover {
            background-color: #55c57a;
            color: #fff;
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        .container__btn-text:active {
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.15);
            transform: translateY(0);
        }

        .container__logo {
            height: 100px;
            position: absolute;
            bottom: 25px;
        }
        
        @media only screen and (max-width: 56.25em){
            .container__logo{
                position: relative;
                margin-top: 10rem;
                height: 50px;
            }
        }

        .u-bottom-margin-medium {
            margin-bottom: 15px !important;
        }

        .u-bottom-margin-small {
            margin-bottom: 8px !important;
        }

        .doglove {
            display: flex;
            position: absolute;
            top: 25%;
            right: -350%;
            transform: translate(-25%, -25%);
            background-color: transparent;
            color: #fff;
            margin: 0 auto;
        }

        @media only screen and (max-width: 56.25em) {
            .doglove {
                display: none;
            }
        }
        
        .errMsg {
            color: white;
            text-weight: 700;
            font-size: 20px;
            background: rgba(255,255,255, .1);
            display: inline-block;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 2rem 5rem;
            border-radius: 5px;
            transition: all .3s ease-in-out;
        }
        
        .errMsg:hover{
            background: rgba(255,255,255, .2);
            transform: translate(-50%, -53%);
        }
    </style>

</head>

<body>
    <?php
        $selectQuery = "SELECT status FROM users WHERE token='$token'";
        $result = mysqli_query($conn, $selectQuery);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $status = $row['status'];
            if ($status === 'active') {
                echo '
                    <div id="center">
                        <div class="col-1-of-2 container">
                            <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_sabvcsrv.json" background="transparent" speed=".5" style="width: 250px; height: 250px;" loop autoplay></lottie-player>
                            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                            <div class="container__heading-secondary u-bottom-margin-medium">Account Verified!</div>
                            <div class="container__heading-tertiary u-bottom-margin-small" style="color: #fff;">Please sign in your account...</div>
                            <a href="https://sugamphirke.com/Projects/natours/accounts/login.php#login-form" class="container__btn-text">Redirect&nbsp;&rarr;</a>
                            <img src="images/logo-green-small-2x.png" class="container__logo">
                        </div>
                        <div class="col-1-of-2 doglove">
                            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                            <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_imcvpf0j.json" background="transparent" speed="1" style="width: 600px; height: 600px;" loop autoplay></lottie-player>
                        </div>
                    </div>
            ';
            }
        } 
        else {
            echo "
                <div class='errMsg'>
                    <center>
                        <script src='https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js'></script>
                        <lottie-player src='https://assets1.lottiefiles.com/packages/lf20_93iic18CHt.json'  background='transparent' speed='1' style='width: 200px; height: 200px;' loop autoplay></lottie-player>
                        <div style='color:red;font-size: 35px;margin-bottom: 1rem'>Something went wrong!</div>
                        <div>No user found</div> 
                        <div>Please try again later...</div>
                    </center>
                </div>
            ";
        }
    ?>
</body>

</html>