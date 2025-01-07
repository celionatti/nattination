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

<footer class="py-5 text-center text-body-secondary bg-body-tertiary">
  <div class="d-flex justify-content-evenly align-items-center">
    <a href="<?= URL_ROOT . "/privacy-policy" ?>" class="text-body-emphasis text-decoration-none">Privacy Policy</a>
    <a href="<?= URL_ROOT . "/contact-us" ?>" class="text-body-emphasis text-decoration-none">Contact Us</a>
    <a href="<?= URL_ROOT . "/terms-and-conditions" ?>" class="text-body-emphasis text-decoration-none">Terms of Use</a>
  </div>
  <p class="m-0 text-body-emphasis"><i class="fa-regular fa-copyright"></i> <span class="text-danger"> Natti</span>Nation<span class="text-danger">.</span><span class="px-1"><?= date("Y") ?> - </span> All Rights Reserved.</p>
  <p class="mb-0">
    <a href="#" class="text-body-emphasis">Back to top</a>
  </p>
</footer>