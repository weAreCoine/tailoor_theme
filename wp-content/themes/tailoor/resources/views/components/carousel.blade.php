<div class="@if($addPadding) py-32 @endif <?=$attributes->get('class', 'bg-mirage')?>">
  <section id="tailoor__carousel" class="splide" aria-label="<?=__('Clients')?>" x-data="bindSlider()">
    <div class="splide__track">
      <ul class="splide__list">
        @foreach($filenames as $filename)
          @if(str_starts_with($filename, '.'))
            @continue
          @endif
          <li class="splide__slide">
            <img src="<?=asset("$imagesFolderPath/$filename")?>"
                 class="h-12 w-auto"
                 alt="<?=\Illuminate\Support\Str::replace(['-','_'], ' ', $filename)?>">
          </li>
        @endforeach
      </ul>
    </div>
  </section>
</div>
