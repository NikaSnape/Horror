<?php
require_once 'QuizController.php';
$quiz = new QuizController();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Quiz</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<header id="header">
    <div class="container">
        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li><a href="index.php">Kalambury</a></li>
                <li><a href="resetQuiz.php">Restart</a></li>
            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header><!-- #header -->
<!--==========================
  Hero Section
============================-->
<section id="hero">
    <div class="hero-container">
        <h1><?=$quiz->getQuestion(); ?></h1>
        <p><img src="<?=$quiz->getImage()?>"></p>
        <a href="#" id="show" class="btn btn-info">Pokaż odpowiedź</a><br>
        <h3 id="answer"><b>Odpowiedź:</b> <?=$quiz->getAnswer() ?></h3>
        <a href="#" class="btn-get-started" onclick="window.location.reload(true);">Następne Pytanie</a>

    </div>
</section><!-- #hero -->



<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript Libraries -->
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/jquery/jquery-migrate.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/counterup/counterup.min.js"></script>
<script src="lib/superfish/hoverIntent.js"></script>
<script src="lib/superfish/superfish.min.js"></script>

<!-- Contact Form JavaScript File -->
<script src="contactform/contactform.js"></script>

<!-- Template Main Javascript File -->
<script src="js/main.js"></script>



<!--<script src="onclick.js"></script>-->
<script>
    $(document).ready(function(){
        $("#show").click(function(){
            $("#answer").toggle();
        });
    });
</script>

</body>
</html>




