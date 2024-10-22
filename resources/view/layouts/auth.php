<?php

use celionatti\Bolt\Helpers\FlashMessages\BootstrapFlashMessage;


?>

<!DOCTYPE html>
<html lang="en_us">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= asset("dist/css/style.css") ?>" rel="stylesheet">
    <link href="<?= asset("dist/bootstrap/css/bootstrap.min.css") ?>" rel="stylesheet">

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

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Black overlay with 50% opacity */
        }
    </style>

    <title>Natti Nation | Home</title>
    <?php $this->content('header') ?>
</head>

<body class="container-fluid">
    <?= BootstrapFlashMessage::alert(); ?>
    <!-- Your Content goes in here. -->
    <?php $this->content('content'); ?>

    <script src="<?= asset("dist/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
    <?php $this->content('script') ?>
</body>

</html>