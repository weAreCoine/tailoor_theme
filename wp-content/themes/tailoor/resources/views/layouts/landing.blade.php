<!doctype html>
<html @php(language_attributes())>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @php(do_action('get_header'))
  @php(wp_head())
  @yield('scripts', '')
</head>

<body @php(body_class('bg-mirage text-white '))>
@php(wp_body_open())
<div id="app">
  <a class="sr-only focus:not-sr-only" href="#main">
    {{ __('Skip to content') }}
  </a>

  @include($header ?? 'sections.header')
  <main id="main" class="main">
    @php(the_content())
  </main>
  <x-modal :visible="false" :name="'get__in__touch__form'">
    <p class="font-header text-4xl text-center font-bold">{{__('Request a free demo', 'sage')}}</p>
    <p
      class="mb-12 text-center mt-2">{{__('It only takes one step: fill out the form below and choose a free slot. During the 30-minute demo you\'ll discover all the features you can gain by integrating Tailoor into your business.', 'sage')}}</p>
    <x-request-form/>
  </x-modal>

  @hasSection('sidebar')
    <aside class="sidebar">
      @yield('sidebar')
    </aside>
  @endif
  <div class="dark">
    @include('sections.footer')
  </div>
</div>

@php(do_action('get_footer'))
@php(wp_footer())
</body>
</html>
