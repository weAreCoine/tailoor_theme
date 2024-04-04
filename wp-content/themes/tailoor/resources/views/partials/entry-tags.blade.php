<ul class="flex items-center justify-center gap-y-1 gap-x-2 flex-wrap">
  @foreach(get_the_tags() as $tag)
      <?php
      /**
       * @var WP_Term $tag
       */
      ?>
    <li class="mb-0">
      <a href="{{get_term_link($tag)}}"
         class="bg-pink inline-block px-2.5 py-2 text-xs uppercase duration-500 hover:bg-pink-100">{{$tag->name}}</a>
    </li>
  @endforeach
</ul>
