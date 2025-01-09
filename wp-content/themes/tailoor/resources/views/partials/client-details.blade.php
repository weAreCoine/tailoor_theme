<?php
/**
 * @var \Illuminate\Support\Collection $meta
 */
?>
<div class="case__study__card">
  <p class="text-slate-600"><i class="fa-solid fa-user"></i> <?= __('Client', 'sage') ?></p>
  <p class="text-3xl"><?= $meta->get('client_name', '') ?></p>
</div>
<div class="border p-6 rounded-lg">
  <p class="text-slate-600">
    <i class="fa-solid fa-binoculars"></i>
    <?= __('overview', 'sage') ?>
  </p>
  <div class="text-sm">
    <?= wpautop($meta->get('client_overview', '')) ?>
  </div>
</div>


