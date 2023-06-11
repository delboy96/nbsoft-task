<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NB Soft back-task</title>
    <?php if(basename($_SERVER['PHP_SELF']) == 'cv-template.php'): ?>
        <link rel="stylesheet" href="../assets/style.css">
    <?php elseif (basename($_SERVER['PHP_SELF']) == 'form.php'): ?>
        <link rel="stylesheet" href="../assets/form.css">
    <?php elseif (basename($_SERVER['PHP_SELF']) == 'slider.php'): ?>
        <link rel="stylesheet" href="../assets/slider.css">    
    <?php endif ?>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/slick-theme.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <?php if(basename($_SERVER['PHP_SELF']) == 'slider.php'): ?>
        <script src="../assets/slider.js"></script>
    <?php elseif (basename($_SERVER['PHP_SELF']) == 'form.php'): ?>
        <script src="../assets/main.js"></script>
    <?php endif ?>
</head>
<body class="bg-light my-5">