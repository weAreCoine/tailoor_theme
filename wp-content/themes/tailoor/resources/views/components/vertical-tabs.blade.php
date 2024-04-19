<div x-data="{visible:0}" class="grid grid-cols-3 gap-6 text-left my-24 items-center ">
  <p
    class="uppercase text-4xl text-center mb-6 col-span-3">{{__('How does it works', 'sage')}}
    <span
      class="text-pink">?</span></p>
  <div class="col-span-2 h-full relative rounded-l-2xl p-6 border-2 border-rose-200 duration-300"
       :class="{'rounded-tr-2xl': visible !== 0, 'rounded-br-2xl': visible !== 3}">
    @foreach($tabsContent as $index => $tabContent)
      <div x-show="visible === <?= $index ?>" x-transition.opacity.duration.500ms
           class="absolute top-6 left-6 right-12 bottom-6 grid grid-cols-2 gap-8 items-center">
        {!! $tabContent !!}
      </div>
    @endforeach

  </div>
  <ul class="flex flex-col text-lg gap-y-6">
    @foreach($labels as $index => $label)
      <li
        x-on:click="visible = <?= $index ?>"
        class="mb-0 rounded-r-2xl p-6 border-2 duration-300 select-none"
        :class="{'border-white/20 rounded-l-2xl -translate-x-0 hover:-translate-x-2 hover:border-white bg-transparent hover:bg-white/5 cursor-pointer before__border__label text-white/60 hover:text-white': visible !== <?= $index ?>, 'border-rose-200 relative cursor-default -translate-x-6 bg-mirage before__border__label active': visible === <?= $index ?>}"
      >{{ $label }}</li>
    @endforeach
  </ul>
</div>
