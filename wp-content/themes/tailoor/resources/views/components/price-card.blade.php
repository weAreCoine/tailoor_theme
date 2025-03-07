<div x-data="JSON.parse('{{$prices}}')"
     class="bg-white text-black rounded-3xl flex p-6 flex-col justify-between gap-20 shadow-xl overflow-hidden h-full {{!$enabled ? 'grayscale opacity-50' : ''}}">
  <div class="relative">
    <div
      class="font-header flex flex-col justify-center items-center gap-2 bg-gray-50 rounded-2xl tailoor__outline {{$accent ? 'accent' : ''}}  px-4 py-10 border">
      <p class="text-2xl leading-[0] mb-2"><?= strtoupper($translatedTitle) ?></p>
      @unless(empty($target))
        <p class="text-xs uppercase font-medium price__description">{{$target}}</p>
      @endunless
      <p class="text-5xl font-bold"
         x-text="yearlyPrices ? (annual.price ?? 'Let\'s talk') : (monthly.price ?? 'Let\'s talk')"></p>
      <template x-if="monthly.price && annual.price">
        <p>€/<?= __('month', 'sage') ?>
          <span class="text-2xs text-gray-600"
                x-text="yearlyPrices ? '(<?= __('yearly billed', 'sage') ?>)': ''">

        </span>
        </p>
      </template>
      <template x-if="!monthly.price || !annual.price">
        <p class="text-transparent select-none">€/<?= __('month', 'sage') ?>
          <span class="text-2xs"
                x-text="yearlyPrices ? '(<?= __('yearly billed', 'sage') ?>)': ''">

        </span>
        </p>
      </template>
      @if($callToActionOnTop)
        <div
          class="text-center mt-8 {{$hasOnboarding ? 'inline-flex flex-col items-center justify-center gap-y-2 r' : 'demo_request'}}">
          <a :href="yearlyPrices ? annual.href : monthly.href"
             x-text="yearlyPrices ? annual.label : monthly.label"
             class="inline-block py-2 px-12 {{$accent ? 'bg-pink border-pink-400 hover:bg-pink-300': 'bg-mirage hover:bg-mirage-900 border-mirage-900 text-white'}} border duration-500 text-base font-header uppercase rounded-lg">
          </a>
        </div>
      @endif
      @if($accent && !$callToActionOnTop)
        <p
          class="bg-white border-2 text-pink-500 -rotate-1 shadow-lg border-pink whitespace-nowrap rounded-lg font-header uppercase text-xs sm:text-sm py-2 px-8 absolute top-full -translate-y-1/2 left-1/2 -translate-x-1/2"><?= __('Best seller', 'sage') ?></p>
      @endif
    </div>
    <ul class=" mt-16 font-header">
      @foreach($features as $feature => $subfeatures)
        <li class="mb-4">
          <div class="flex items-center justify-start gap-x-6">
            <p class="text-lg">{{$feature}}</p>
          </div>
          @if(is_array($subfeatures))
            <ul class="mt-3 text-sm flex flex-col gap-2">
              @foreach($subfeatures as $subfeature)
                <li class="flex items-center gap-2 mb-0">
                  <i class="fa-solid fa-check text-green-500 text-xl"></i>
                  <span>{{$subfeature}}</span>
                </li>
              @endforeach
            </ul>
          @endif
        </li>
      @endforeach
    </ul>
  </div>

  @unless($callToActionOnTop)
    <div
      class="text-center {{$hasOnboarding ? 'inline-flex flex-col items-center justify-center gap-y-2' : 'demo_request'}}">
      <a :href="yearlyPrices ? annual.href : monthly.href"
         x-text="yearlyPrices ? annual.label : monthly.label"
         class="inline-block py-2 px-12 {{$accent ? 'bg-pink border-pink-400 hover:bg-pink-300': 'bg-gray-100 hover:bg-gray-50 border-gray-200'}} border duration-500 text-lg font-header uppercase rounded-lg">
      </a>
      @if($hasOnboarding)
        <span class="text-xs"><?= __('No credit card required', 'sage') ?></span>
      @endif
    </div>
  @endunless
</div>
