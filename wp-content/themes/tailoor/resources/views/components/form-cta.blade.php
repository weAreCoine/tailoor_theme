<div
  class="<?= $attributes->merge(['class'=>'relative inline-flex flex-col-reverse sm:flex-col sm:items-center gap-y-2'])->get('class') ?>">
  <a href="<?= $url ?>"
     class="inline-block whitespace-nowrap button border-t-neutral-600 bg-pink border-pink-400 hover:bg-pink-300 border text-lg text-mirage font-semibold tracking-wide hover:translate-y-[-2px]"
  ><?= __('Start free trial', 'sage') ?>
  </a>
</div>
