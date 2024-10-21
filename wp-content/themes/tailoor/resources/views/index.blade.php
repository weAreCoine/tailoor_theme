@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  <?php
  $featuredCategories = (new WP_Term_Query([
    'taxonomy' => 'category',
    'orderby' => 'name',
    'order' => 'ASC',
    'hide_empty' => true,
    'number' => 4,
    'meta_key' => 'featured',
    'meta_value' => '1'
  ]))->get_terms();
  ?>
  @if(!empty($featuredCategories))
    <div class=" bg-gradient-to-b from-white to-gray-50 p-6 mb-8">
      <div class="container">
        <p class="uppercase text-xs text-center font-semibold mb-2 font-title"><?= __('Featured', 'sage') ?></p>
        <ul class="flex justify-center gap-x-4 gap-y-2 uppercase flex-wrap">
          @foreach($featuredCategories as $featuredCategory)
            <li>
              <a class="px-8 py-2 bg-pink text-mirage hover:bg-pink-100 duration-300 text-xs sm:font-sm inline-block"
                 href="{{get_term_link($featuredCategory)}}" rel="bookmark">{{$featuredCategory->name}}</a>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  @endif

  <div class="container">
    @if (! have_posts())
      <x-alert type="warning">
        {!! __('Sorry, no results were found.', 'sage') !!}
      </x-alert>

      {!! get_search_form(false) !!}
    @endif
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-x-5 gap-y-20">
      @while(have_posts())
        @php(the_post())
        @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
      @endwhile
    </div>
    {!! get_the_posts_navigation() !!}
  </div>
@endsection

@section('sidebar')
  @include('sections.sidebar')
@endsection
