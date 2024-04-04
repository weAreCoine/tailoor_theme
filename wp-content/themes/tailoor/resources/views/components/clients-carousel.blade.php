<div class="py-32 {{$attributes->get('class', 'bg-mirage')}}">
  <section class="splide" aria-label="{{__('Clients')}}" x-data="bindSlider()">
    <div class="splide__track">
      <ul class="splide__list">
        @foreach(collect(scandir(resource_path('images/clients-logos')))->except([0,1]) as $filename)
          <li class="splide__slide">
            <img src="{{asset("/images/clients-logos/$filename")}}"
                 class="h-12 w-auto"
                 alt="{{\Illuminate\Support\Str::replace(['-','_'], ' ', $filename)}}">
          </li>
        @endforeach
      </ul>
    </div>
  </section>
</div>
