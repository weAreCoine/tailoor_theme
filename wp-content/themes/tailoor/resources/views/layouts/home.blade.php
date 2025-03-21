<!doctype html>
<html @php(language_attributes())>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @php(do_action('get_header'))
  @php(wp_head())
  @yield('scripts', '')
  <x-hot-jar/>
  <x-google-tag-manager :head="true"/>
  <script charset="utf-8" type="text/javascript" src="//js-eu1.hsforms.net/forms/embed/v2.js"></script>

</head>

<body @php(body_class('bg-mirage font-header text-white'))>
@php(wp_body_open())
<x-google-tag-manager :head="false"/>

<div id="app">
  <a class="sr-only focus:not-sr-only" href="#main">
    <?= __('Skip to content') ?>
  </a>

  @include('sections.header-home')
  <main id="main" class="main scroll-smooth overflow-x-hidden">
    @yield('content')
  </main>
  <x-modal :visible="false" :name="'get__in__touch__form'">
    <p class="font-header text-4xl text-center font-bold"><?= __('Request a free demo', 'sage') ?></p>
    <p
      class="mb-12 text-center mt-2"><?= __('It only takes one step: fill out the form below and choose a free slot. During the 30-minute demo you\'ll discover all the features you can gain by integrating Tailoor into your business.', 'sage') ?></p>
    <x-request-form/>
  </x-modal>

  @hasSection('sidebar')
    <aside class="sidebar">
      @yield('sidebar')
    </aside>
  @endif
  <div class="@yield('footerWrapper.class', 'dark')">
    @include('sections.footer')
  </div>
</div>

@php(do_action('get_footer'))
@php(wp_footer())
</body>
</html>
