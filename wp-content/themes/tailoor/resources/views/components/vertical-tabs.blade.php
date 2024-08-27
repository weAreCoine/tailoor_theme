<div x-data="{visible:0}" x-on:home-new-tab.window="visible = $event.detail.currentTab"
     class="grid md:grid-cols-3 gap-6 text-left my-24 items-center">
  <div
    class="hidden md:block md:col-span-2 h-full relative rounded-l md:rounded-br rounded-r md:rounded-r-none p-6 border-2 border-white/50 duration-300 !box-border"
    :class="{'md:rounded-tr': visible !== 0}">
    @foreach($tabsContent as $index => $tabContent)
      <div x-show="visible === <?= $index ?>"
           class=" grid grid-cols-1 gap-y-8 lg:grid-cols-2 gap-8 items-center md:text-xl md:leading-relaxed">
        {!! $tabContent !!}
      </div>
    @endforeach
  </div>
  {{--  TABS--}}
  <ul class="flex flex-col h-full justify-start text-lg gap-y-6 mt-0">
    @foreach($labels as $index => $label)
      <li
        x-data="{open: <?= $index?> === 0 }"
        x-on:click="visible = <?= $index ?>; open = true;"
        class="mb-0 rounded-r p-6 border-2 duration-300 select-none"
        :class="{'border-white/20 rounded-l -translate-x-0 md:hover:-translate-x-2 md:hover:border-white bg-transparent hover:bg-white/5 cursor-pointer before__border__label text-white/60 hover:text-white': visible !== <?= $index ?>, 'border-white/50 rounded-l md:rounded-l-none relative cursor-default md:-translate-x-6 md:before__border__label active': visible === <?= $index ?>}"
      >
        <p
          class="duration-500"
          :class="{'uppercase text-xl md:normal-case': visible === <?= $index ?> || open }">{{ $label }}</p>
        <div class="mt-8 md:hidden" x-show="visible === <?= $index ?> || open"
             x-collapse.duration.300ms>
          {!! $tabsContent[$index] !!}
        </div>
      </li>
    @endforeach
  </ul>
</div>
