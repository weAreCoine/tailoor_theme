@extends('layouts.app')

@section('content')

  @if (! have_posts())
    <div class="container max-w-2xl min-h-[70vh] text-center">
      <h1 class="text-center text-6xl font-semibold font-header mt-24">{{__('Nothing here', 'sage')}}</h1>
      <p class="text-2xl mt-12">{{__('It looks like nothing was found at this location.')}}</p>
      <p class="text-2xl mt-2">{{__('Maybe try a search?')}}</p>
      <x-search-form/>
    </div>

    {{--    {!! get_search_form(false) !!}--}}
  @endif
@endsection
