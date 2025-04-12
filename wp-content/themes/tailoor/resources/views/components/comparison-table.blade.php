<div class="my-32" x-show="visible !== 3 || showAll" x-collapse.duration.300ms>
  <h2 class="text-3xl mb-16"><?= __('Compare all plan features', 'sage') ?></h2>
  <div x-data="{index: 0}" class="comparison__table">
    <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mt-8 text-2xl font-medium">
      <p></p>
      <p class="text-center" x-show="visible === 0 || showAll"><?= __('Starter', 'sage') ?></p>
      <p class="text-center" x-show="visible === 1 || showAll"><?= __('Essential', 'sage') ?></p>
      <p class="text-center" x-show="visible === 2 || showAll"><?= __('Professional', 'sage') ?></p>
      <p class="text-center" x-show="visible === 3 || showAll"><?= __('Unlimited', 'sage') ?></p>
    </div>
    <ul>
      @foreach($plans as $section => $values)
        <li x-data="{ open: index === 0, collapsible: index++ !== 0}">
          <div
            x-on:open-features.window="open = true"
            x-on:close-features.window="open = !collapsible"
            x-on:click="open = collapsible? !open : true"
            x-bind:class="{'cursor-pointer': collapsible}"
            class="flex justify-between items-center bg-gradient-to-r from-gray-200 my-4 to-transparent border-b px-4 py-2 rounded-l-md"
          >
            <p class="text-lg font-medium">
                <?= $section ?>
            </p>
            <template x-if="collapsible">
              <i class="fa-solid fa-chevron-down duration-300"
                 x-bind:class="{'rotate-0': open, 'rotate-90': !open}"></i>
            </template>
          </div>
          <ul class="grid grid-cols-2 md:grid-cols-5 gap-4 px-4" x-show="open" x-collapse.duration.300ms>
            @foreach($values as $feature => $featureValues)
              <li>
                <p class="font-medium"><?= $feature ?></p>
                @php($description = \App\Models\PricePlan::getDescriptionFor($feature))
                @unless(empty($description))
                  <p class="text-sm text-gray-400 "><?= $description ?></p>
                @endunless
              </li>
              @foreach($featureValues as $index => $value)
                <li x-data="{i: <?= $index ?>}"
                    x-show="i === visible || showAll || (i===2 && visible===3)"
                    class="<?=$section === 'Pricing'? 'text-xl font-semibold': ''?>> text-center">
                  @if(is_bool($value))
                    @if($value)
                      <i class="fa-solid fa-check text-green-500"></i>
                    @else
                      <i class="fa-solid fa-x text-red-500"></i>
                    @endif
                  @elseif(is_float($value))
                    <p><?= sprintf('%s <span class="text-sm">/%s</span>', formatPrice($value), __('month', 'sage')) ?></p>
                  @else
                      <?= $value ?>
                  @endif
                </li>
              @endforeach
            @endforeach
          </ul>
        </li>
      @endforeach
    </ul>
  </div>
  <div class="text-center mt-16">
    <a href="#" x-data="{allOpen:false}"
       x-on:click.prevent="$dispatch(!allOpen? 'open-features': 'close-features'); allOpen = !allOpen"
       class="border-2 border-mirage  inline-block px-4 py-2 rounded-md font-medium bg-transparent hover:bg-mirage hover:text-white duration-300"
       x-text="allOpen? '<?=__('Hide all Features', 'sage')?>' : '<?= __('Show all Features', 'sage')?>'">
    </a>
  </div>
</div>
