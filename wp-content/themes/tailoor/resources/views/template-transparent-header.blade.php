{{--
  Template Name: Transparent Header
--}}
@php($header = 'sections.header-dark')
@extends('layouts.app')
@section('app.classes', 'bg-mirage text-white overflow-x-hidden')
@section('footerWrapper.class', 'gradient')
@section('content')
  @while(have_posts())
    @php(the_post())
    @include('partials.content-page')
  @endwhile
@endsection
