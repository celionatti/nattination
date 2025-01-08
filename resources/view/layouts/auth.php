<?php

use celionatti\Bolt\Helpers\FlashMessages\BootstrapFlashMessage;


?>

<!DOCTYPE html>
<html lang="en_us">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= asset("dist/bootstrap/css/bootstrap.min.css") ?>" rel="stylesheet">

    <link rel="stylesheet" href="<?= asset("dist/css/all.min.css") ?>">

    <link rel="stylesheet" href="<?= asset("packages/toastr/toastr.min.css") ?>">

    <style type="text/css">
        body {
            position: relative;
            background-image: url('/assets/img/background-auth.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            margin: 0;
        }
    </style>

    <title>Natti Nation | Home</title>
    <?php $this->content('header') ?>
</head>

<body class="container-fluid">
    <?= BootstrapFlashMessage::alert(); ?>
    <!-- Your Content goes in here. -->
    <?php $this->content('content'); ?>

    <script src="<?= asset('dist/js/jquery-3.7.0.min.js'); ?>"></script>
    <script src="<?= asset('packages/toastr/toastr.min.js'); ?>"></script>
    <script src="<?= asset("dist/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>

    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        <?php if (isset($_SESSION['__bv_flash_toastr'])) : ?>
            <?php
            $toastr = $_SESSION['__bv_flash_toastr'];
            unset($_SESSION['__bv_flash_toastr']); // Remove the toastr from the session
            ?>
            toastr.<?= $toastr['type'] ?>("<?= $toastr['message'] ?>");
        <?php endif; ?>
    </script>
    <?php $this->content('script') ?>
</body>

</html>