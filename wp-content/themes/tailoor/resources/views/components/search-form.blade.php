<form role="search" action="<?=home_url()?>" method="GET" class="mt-12 mb-24 max-w-2xl mx-auto">
  <div class="flex">
    <input type="search" name="s" id="s" required aria-label="<?=__('Search', 'sage')?>"
           placeholder="<?=__('Search...')?>"
           class="border-t-2 border-b-2 focus:placeholder-transparent placeholder:duration-300 border-l-2 grow focus:outline-none duration-300 focus:border-mirage valid:border-mirage text-lg p-4">
    <button type="submit"
            class="bg-mirage text-white font-header tracking-widest py-4 uppercase text-sm font-semibold px-8">
      <?= __('Search', 'sage') ?>
    </button>
  </div>
</form>
