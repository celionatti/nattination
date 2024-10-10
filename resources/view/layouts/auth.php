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