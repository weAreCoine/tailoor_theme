@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  <div class="container mb-12">

    @if ( ! have_posts())
      <p class="text-2xl mt-12 text-center">{{__('It seems that this search yielded no results.')}}</p>
      <p class="text-2xl mt-2 text-center">{{__('Want to try a new search?')}}</p>
      <x-search-form/>
    @else
      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-x-5 gap-y-20">
        @while(have_posts())
          @php(the_post())
          @include('partials.content-search')
        @endwhile
      </div>
      {!! get_the_posts_navigation() !!}
    @endif
  </div>
@endsection
