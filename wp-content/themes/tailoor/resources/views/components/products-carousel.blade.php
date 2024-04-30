@if(false)
  <div class="my-24 relative overflow-hidden" id="products__carousel__container">
    <div id="screen__carousel" class="relative">
      {!! wp_get_attachment_image(1985, 'full', false, ['alt'=>'Tailoor Screens', 'class'=>'h-full w-auto object-cover max-h-[473px]']) !!}
      <div class="absolute bg-mirage h-full w-2/5 left-0 top-0"></div>
      <div class="absolute bg-mirage h-full w-2/5 right-0 top-0"></div>
    </div>
    <div id="products__carousel__1"
         class="hidden sm:block absolute top-1/2 w-2/5 left-0 h-1/2 -translate-y-1/2 overflow-x-scroll">
      {!! wp_get_attachment_image(2007, 'full', false, ['alt'=>'Tailoor Products', 'class'=>'h-full w-full object-left object-cover']) !!}
    </div>
    <div class="hidden sm:block  absolute top-1/2 w-2/5 right-0 h-1/2 -translate-y-1/2">
      {!! wp_get_attachment_image(2007, 'full', false, ['alt'=>'Tailoor Products', 'class'=>'h-full w-auto  object-right object-cover']) !!}
    </div>
  </div>
@else
  <div x-data="carouselData" class="my-24 relative" id="products__carousel__container"
       x-on:home-product-new-tab.window="setCurrent($event.detail.currentTab)">
    <div class="sm:w-1/4 mx-auto">
      {!! $phoneMask !!}
    </div>
    <div class="absolute w-full top-1/4 -translate-y-1/3">
      <div id="products__carousel" class="splide" aria-labelledby="carousel-heading">
        <div class="splide__track">
          <ul class="splide__list">
            @foreach($productsImages as $image)
              <li class="splide__slide">
                {!! $image !!}
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
    <div x-html="models[current]" class="sm:w-[15%] absolute bottom-1/4 translate-y-1/4 left-1/2 -translate-x-1/2">

    </div>
  </div>
  <script>
    const images = JSON.parse('<?= $data ?>');
    const carouselData = {
      current: 0,
      /**
       * Chiavi:
       * - products :array
       * - models :array
       * - phoneMasks :string
       */
      ...images,
      productSlider: null,
      setCurrent(currentTab) {
        if (currentTab !== this.current) {
          // this.current = currentTab;
          this.productSlider.go(currentTab);
        }
      },
      init() {
        this.productSlider = new Splide('#products__carousel', {
          type: 'loop',
          perPage: 1,
          drag: false,
          perMove: 1,
          gap: 150,
          pagination: false,
          arrows: false,
          focus: 'center',
          mediaQuery: 'min',
          breakpoints: {
            768: {
              perPage: 5,
              gap: 100
            },
            640: {
              perPage: 3,
              gap: 150,
            }
          }
        }).mount().on('active', (slide) => {
          if (slide.slideIndex >= 0) {
            this.current = slide.slideIndex;
          }
        });
      },
    };
  </script>
@endif
