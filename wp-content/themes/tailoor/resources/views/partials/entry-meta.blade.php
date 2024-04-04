<div class="flex items-center gap-2 text-sm justify-center">
  <p class="text-gray-400">
    {{__('published on')}}
  </p>
  <time class="dt-published " datetime="{{ get_post_time('c', true) }}">
    {{ \Carbon\Carbon::createFromTimestamp(get_post_time())->format(getCurrentLanguage() === 'en' ? 'Y.m.d' : 'd.m.Y') }}
  </time>
</div>


