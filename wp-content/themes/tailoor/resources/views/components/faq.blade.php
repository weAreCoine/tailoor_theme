<div x-data="{open: <?= $startsOpen ? 'true' : 'false' ?>}" x-on:click="open = !open"
     class="border-b border-slate-700 py-12 cursor-pointer"
>
  <div
    class="flex items-center justify-between gap-x-8  duration-500">
    <p class="text-2xl md:text-3xl text-white duration-500">{{$question}}</p>
    <div class="relative">
      <div class="h-[3px] w-6 bg-white"></div>
      <div :class="{'rotate-0': open, 'rotate-90':!open}"
           class=" absolute duration-500 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 h-[3px] w-6 bg-white"
      ></div>
    </div>
  </div>
  <p x-show="open" x-collapse.duration.500ms class="leading-loose pt-8">{{$answer}}</p>
</div>
