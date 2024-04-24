<div class="my-24 relative overflow-hidden" id="products__carousel__container">
  <div id="screen__carousel" class="relative">
    {!! wp_get_attachment_image(1947, 'full', false, ['alt'=>'Tailoor Screens', 'class'=>'h-full w-auto object-cover max-h-[473px]']) !!}
    <div class="absolute bg-mirage h-full w-2/5 left-0 top-0"></div>
    <div class="absolute bg-mirage h-full w-2/5 right-0 top-0"></div>
  </div>
  <div id="products__carousel__1"
       class="hidden sm:block absolute top-1/2 w-2/5 left-0 h-1/2 -translate-y-1/2 overflow-x-scroll">
    {!! wp_get_attachment_image(1945, 'full', false, ['alt'=>'Tailoor Products', 'class'=>'h-full w-full object-left object-cover']) !!}
  </div>
  <div class="hidden sm:block  absolute top-1/2 w-2/5 right-0 h-1/2 -translate-y-1/2">
    {!! wp_get_attachment_image(1945, 'full', false, ['alt'=>'Tailoor Products', 'class'=>'h-full w-auto  object-right object-cover']) !!}
  </div>
</div>
