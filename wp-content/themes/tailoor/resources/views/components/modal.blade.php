<div x-data="modal({{sprintf('%s, "%s"', json_encode($visible), $name)}})">
  <div
    x-init="$watch('visible', value => onChangeVisibility(value)); body = document.querySelector('body')"
    data-name="{{$name}}"
    x-on:request-modal.window="visible = visible || $event.detail?.modalName === name"
    x-on:click="visible = false"
    x-show="visible"
    x-cloak
    x-transition:enter.opacity.duration.300ms
    x-transition:leave.opacity.delay.300ms.duration.300ms
    class="fixed z-[9999] top-0 left-0 h-screen w-screen bg-mirage/40 backdrop-blur flex flex-col justify-start items-center cursor-pointer sm:p-6 duration-300">
    <div
      class="bg-white sm:rounded-3xl px-6 pb-12 pt-6 mt-12 text-mirage w-[48rem] max-w-full cursor-default overflow-y-auto"
      x-show="visible"
      x-transition:enter.delay.300ms.duration.300ms
      x-transition:leave.duration.300ms
      x-cloak
      x-on:click.stop>
      <div class="flex justify-between items-center gap-6 mb-4">
        <div>
          @unless(empty($title))
            <p class="text-xl uppercase">{{$title}}</p>
          @endunless
        </div>
        <div class="text-right">
          <div class="inline-block w-8 h-8 relative group cursor-pointer hover:bg-pink-100 duration-500 rounded"
               x-on:click="visible = false">
        <span
          class="absolute h-[2px] w-6 bg-mirage left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 -rotate-45 group-hover:rotate-0 duration-500"></span>
            <span
              class="absolute h-[2px] w-6 bg-mirage left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 rotate-45 duration-500 group-hover:rotate-0"></span>
          </div>
        </div>

      </div> {!! $slot !!}
    </div>
  </div>
</div>
