<?php

declare(strict_types=1);

/**
 * ===================================
 * ==========
 * Component View
 * ==========       ==================
 * ===================================
 */

use celionatti\Bolt\Illuminate\Utils\StringUtils;

?>

<div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
    <div class="col-lg-6 px-0">
      <h1 class="display-4 fst-italic"><?= $this->data['title'] ?></h1>
      <p class="lead my-3"><?= StringUtils::create(htmlspecialchars_decode(nl2br($this->data['content'])))->excerpt(150) ?></p>
      <p class="lead mb-0"><a href="<?= URL_ROOT . "/articles/{$this->data['article_id']}" ?>" class="text-body-emphasis fw-bold">Continue reading...</a></p>
    </div>
</div>