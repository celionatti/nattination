<?php

use celionatti\Bolt\Helpers\FlashMessages\BootstrapFlashMessage;
use PhpStrike\app\components\FooterComponent;
use PhpStrike\app\components\HeaderComponent;


?>

<!DOCTYPE html>
<html lang="en_us">

<head>
    <script src="<?= asset("dist/bootstrap/js/color-modes.js") ?>"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= asset("dist/css/all.min.css") ?>">

    <link rel="stylesheet" href="<?= asset("dist/bootstrap/css/bootstrap.min.css") ?>">

    <style>
      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= asset("dist/css/style.css") ?>">

    <title>Natti Nation | Home</title>
    <?php $this->content('header') ?>
</head>

<body class="">
    <?= BootstrapFlashMessage::alert(); ?>
    <!-- Your Content goes in here. -->
    <?= renderComponent(HeaderComponent::class); ?>

        <?php $this->content('content'); ?>

    <?= renderComponent(FooterComponent::class); ?>

    <script src="<?= asset('dist/js/jquery-3.7.0.min.js'); ?>"></script>
    <script src="<?= asset('packages/toastr/toastr.min.js'); ?>"></script>
    <script src="<?= asset("dist/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>

    <?php $this->content('script') ?>
</body>

</html>