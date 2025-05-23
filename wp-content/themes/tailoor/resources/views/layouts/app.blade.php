<!doctype html>
<html @php(language_attributes()) class="scroll-smooth">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @php(do_action('get_header'))
  @php(wp_head())
  @yield('scripts', '')
  <x-google-tag-manager :head="true"/>
  <x-hot-jar/>
  <script charset="utf-8" type="text/javascript" src="//js-eu1.hsforms.net/forms/embed/v2.js"></script>
</head>

<body @php(body_class())>
<x-google-tag-manager :head="false"/>
@php(wp_body_open())
<div id="app" class="@yield('app.classes')">
  <a class="sr-only focus:not-sr-only" href="#main">
    {{ __('Skip to content') }}
  </a>
  @include($header ?? 'sections.header')

  <main id="main" class="main">
    @yield('content')
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
  <div class="@yield('footerWrapper.class')">
    @include('sections.footer')
  </div>

</div>
@php(do_action('get_footer'))
@php(wp_footer())

</body>
</html>
