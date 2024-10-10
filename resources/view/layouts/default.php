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

    <title>Natti Nation | Home</title>
    <?php $this->content('header') ?>
</head>

<body class="bg-body-tertiary">
    <?= BootstrapFlashMessage::alert(); ?>
    <!-- Your Content goes in here. -->
    <?= renderComponent(HeaderComponent::class); ?>

        <?php $this->content('content'); ?>

    <?= renderComponent(FooterComponent::class); ?>

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
    	<div class="spinner-border text-primary" role="status">
    		<span class="visually-hidden">Loading...</span>
    	</div>
    </div>


    <script src="<?= asset('dist/js/jquery-3.7.0.min.js'); ?>"></script>
    <script src="<?= asset('packages/toastr/toastr.min.js'); ?>"></script>
    <script src="<?= asset("dist/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>

    <?php $this->content('script') ?>
</body>

</html>