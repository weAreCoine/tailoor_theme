<?php
$meta = \App\Services\CaseStudyService::getMeta();
?>
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
  <div class="e-content container flex flex-col gap-6">
    <div id="client-details">
      @include('partials.client-details')
    </div>

    <div class="border p-6 rounded-lg">
      <p class="font-mono lowercase text-xl text-slate-600 flex items-center gap-4"><i
          class="fa-solid fa-diagram-project"></i><?= __('Project description', 'sage') ?></p>
      @php(the_content())
    </div>
    <div class="border p-6 rounded-lg">
      <p class="font-mono lowercase text-xl text-slate-600 flex items-center gap-4">
        <i class="fa-solid fa-bullseye"></i>
        <?= __('Project Goals', 'sage') ?></p>
      <?= wpautop($meta->get('project_goals', '')) ?>
    </div>
    <div class="border p-6 rounded-lg">
      <p class="font-mono lowercase text-xl text-slate-600 flex items-center gap-4">
        <i class="fa-solid fa-microscope"></i>
        <?= __('Project Features', 'sage') ?></p>
      <?= wpautop($meta->get('project_features', '')) ?>
    </div>
    <div class="border p-6 rounded-lg">
      <p class="font-mono lowercase text-xl text-slate-600 flex items-center gap-4">
        <i class="fa-solid fa-chart-pie"></i>
        <?= __('Project Results', 'sage') ?></p>
      <?= wpautop($meta->get('project_results', '')) ?>
    </div>

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
<x-trial-banner/>
