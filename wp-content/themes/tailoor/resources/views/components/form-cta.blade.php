<div
  class="<?= $attributes->merge(['class'=>'relative inline-flex flex-col-reverse sm:flex-col sm:items-center gap-y-2'])->get('class') ?>">
  <a href="<?=url()->to('pricing')?>"
     class="inline-block whitespace-nowrap button border-t-neutral-600 bg-pink border-pink-400 hover:bg-pink-300 border text-lg text-mirage"
  ><?= __('Get a free demo', 'sage') ?>
  </a>
  <p
    class="text-xs"><?= __('No credit card required', 'sage') ?></p>
</div>
