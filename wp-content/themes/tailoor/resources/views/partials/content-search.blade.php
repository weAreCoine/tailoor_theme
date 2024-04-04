<article @php(post_class())>
  {!! get_the_post_thumbnail(null, 'post-thumbnail',['alt' => get_the_title(),'class'=>'aspect-video']) !!}
  <div class="-translate-y-1/4">
    @include('partials.entry-tags')
  </div>
  <header>
    <h2 class="entry-title font-header text-center text-2xl font-bold">
      <a href="{{ get_permalink() }}">
        {!! $title !!}
      </a>
    </h2>
    <div class="mt-2">
      @include('partials.entry-meta')
    </div>
  </header>
</article>
