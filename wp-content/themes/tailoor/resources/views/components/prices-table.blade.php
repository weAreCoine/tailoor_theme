<div id="prices__table" x-data="{yearlyPrices: true}" <?= $attributes->only('class') ?>>
  <div class="container-xl">
    <div class="text-center">
      <ul
        class="my-12 inline-grid grid-cols-2 text-xs sm:text-base items-center p-1 border-2 border-mirage rounded-full w-[30rem] max-w-full relative">
        <li
          class="absolute m-0 bg-gradient-to-bl from-mirage to-slate-500 h-full w-1/2 rounded-full top-0 left-0 duration-300 ease-out border-2 border-white"
          :class="{'translate-x-full': yearlyPrices, 'translate-x-0': !yearlyPrices}"
        >
        </li>
        <li
          class="absolute text-black m-0 left-3/4 -translate-x-1/2 whitespace-nowrap font-header px-2 py-1 text-xs uppercase ease-in tracking-widest bottom-full duration-200"
          :class="{'rotate-0 -translate-y-1 bg-pink': yearlyPrices, 'rotate-2 bg-gray-300': !yearlyPrices}"
        ><?= __('Save 15%', 'sage') ?></li>
        <li
          class="sm:px-12 py-2 m-0 relative uppercase font-semibold font-header whitespace-nowrap rounded-full duration-500 select-none underline underline-offset-4 decoration-transparent"
          x-on:click="if(yearlyPrices) yearlyPrices = !yearlyPrices"
          :class="{'text-white': !yearlyPrices, 'hover:decoration-mirage cursor-pointer': yearlyPrices}"><?= __('Monthly Plans', 'sage') ?></li>
        <li
          class="sm:px-12 py-2 m-0 relative uppercase font-semibold whitespace-nowrap font-header rounded-full duration-500 select-none underline underline-offset-4 decoration-transparent"
          x-on:click="if(!yearlyPrices) yearlyPrices = !yearlyPrices"
          :class="{'text-white': yearlyPrices, 'hover:decoration-mirage cursor-pointer': !yearlyPrices}"><?= __('Annual Plans', 'sage') ?></li>
      </ul>
    </div>
    <div x-data="{visible: 0, showAll: window.innerWidth >= 768}"
         x-on:resize.window="showAll = window.innerWidth >= 768 " class="pricing__table">
      <ul class="grid grid-cols-4 items-center text-center uppercase mt-8 md:hidden">
        <li :class="{'active__plan': visible === 0}"
            x-on:click="visible = 0"><?= __('Starter', 'sage') ?>
        </li>
        <li :class="{'active__plan': visible === 1}"
            x-on:click="visible = 1"><?= __('Essential', 'sage') ?>
        </li>
        <li :class="{'active__plan': visible === 2}"
            x-on:click="visible = 2"><?= __('Professional', 'sage') ?>
        </li>
        <li :class="{'active__plan': visible === 3}"
            x-on:click="visible = 3"><?= __('Plus', 'sage') ?>
        </li>
      </ul>
      <div class="mt-4 lg:mt-16 mb-16 grid md:grid-cols-2 xl:grid-cols-4 items-start gap-6">
        <div x-show="visible === 0 || showAll" class="h-full">
          <x-price-card :title="'Starter'" :target="__('For solo entrepreneurs', 'sage')"/>
        </div>
        <div x-show="visible === 1 || showAll" class="h-full">
          <x-price-card :title="'Essential'" :target="__('For small business', 'sage')"/>
        </div>
        <div x-show="visible === 2 || showAll" class="h-full">
          <x-price-card :title="'Professional'" :target="__('For medium business', 'sage')"/>
        </div>
        <div x-show="visible === 3 || showAll" class="h-full">
          <x-price-card :title="'Plus'" :target="__('Custom for Enterprise', 'sage')"/>
        </div>
      </div>
      <x-comparison-table/>
    </div>
  </div>
</div>
