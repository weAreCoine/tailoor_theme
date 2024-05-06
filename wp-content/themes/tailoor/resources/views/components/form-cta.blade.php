<div class="<?= $attributes->merge(['class'=>'relative inline-block'])->get('class') ?>">
  <a href="<?=url()->to('pricing')?>"
     class="inline-block whitespace-nowrap button border-t-neutral-600 bg-pink border-pink-400 hover:bg-pink-300 border text-lg text-mirage"
  ><?= __('Get a free demo', 'sage') ?>
  </a>
  <p
    class="absolute top-full pt-2 left-1/2 -translate-x-1/2 text-xs w-full text-center"><?= __('No credit card required', 'sage') ?></p>
</div>
