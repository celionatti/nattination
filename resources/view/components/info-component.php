<?php

declare(strict_types=1);

/**
 * ===================================
 * ==========
 * Component View
 * ==========       ==================
 * ===================================
 */


 ?>

<div class="contact-info">

    <div class="address mt-2">
        <i class="icon-room"></i>
        <h4 class="mb-2">Location:</h4>
        <p><?= setting("address", "378 Lagos Abeokuta express-way,<br> Abule Egba, Nigeria.") ?></p>
    </div>

    <div class="open-hours mt-4">
        <i class="icon-clock-o"></i>
        <h4 class="mb-2">Open Hours:</h4>
        <p>
            Monday-Friday:<br>
            08:00 AM - 10:00 PM
        </p>
    </div>

    <div class="email mt-4">
        <i class="icon-envelope"></i>
        <h4 class="mb-2">Email:</h4>
        <p class="m-0 lh-1"><?= setting("mail", "info@nattination.com.ng") ?></p>
    </div>

    <div class="phone mt-4">
        <i class="icon-phone"></i>
        <h4 class="mb-2">Call:</h4>
        <p class="m-0 lh-1"><?= setting('phone', "(+234) 805 7417 398") ?></p>
    </div>

</div>