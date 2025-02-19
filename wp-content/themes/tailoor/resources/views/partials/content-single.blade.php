<article @php(post_class('h-entry'))>
  <header
    class="py-6 lg:py-12 relative overflow-hidden min-h-[300px] lg:min-h-[600px] flex flex-col items-center justify-center bg-center bg-cover mb-12"
    style="background-image: url('<?= wp_get_attachment_image_url( get_post_thumbnail_id(), 'full' ) ?>')">
    <div class="max-w-2xl text-center">
      @include('partials.entry-tags')
      <h1 class="p-name font-header font-bold text-white z-10 text-3xl">
        {!! $title !!}
      </h1>
      <div class="text-white mt-6">
        @include('partials.entry-meta')
      </div>
    </div>
  </header>
  <div class="e-content container">
    @php(the_content())
  </div>
  @if ($pagination)
    <footer>
      <nav class="page-nav" aria-label="Page">
        {!! $pagination !!}
      </nav>
    </footer>
  @endif

  @php(comments_template())
</article>
@if(is_singular('post'))
  <x-trial-banner/>
@endif
