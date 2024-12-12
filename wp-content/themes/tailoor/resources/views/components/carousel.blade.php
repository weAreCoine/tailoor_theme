<div class="@if($addPadding) py-32 @endif <?=$attributes->get('class', 'bg-mirage')?>">
  <section id="{{$id}}" class="splide" aria-label="<?=__('Clients')?>"
           x-data="bindSlider('<?=$id?>','4rem', <?= $pauseOnHover ? 'true': 'false' ?>)">
    <div class="splide__track">
      <ul class="splide__list">
        @foreach($filenames as $filename)
          @if(str_starts_with($filename, '.'))
            @continue
          @endif
          <li class="splide__slide">
            <div @class(['p-2 bg-white overflow-hidden rounded hover:scale-110 duration-300' => $background])>
              @if($hasLinks && !empty($links[$filename]))
                <a href="{{$links[$filename]}}" rel="noopener" target="_blank">
                  @endif
                  <img src="<?=asset("$imagesFolderPath/$filename")?>"
                       class="h-12 w-auto"
                       alt="<?=\Illuminate\Support\Str::replace(['-','_'], ' ', $filename)?>"
                  >
                  @if($hasLinks && !empty($links[$filename]))
                </a>
              @endif
            </div>
          </li>
        @endforeach
      </ul>
    </div>
  </section>
</div>
