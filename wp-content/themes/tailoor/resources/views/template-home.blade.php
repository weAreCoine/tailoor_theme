{{--
  Template Name: Home page
--}}
@extends('layouts.home')
@section('content')
  <section id="tailoor" aria-labelledby="pageTitle"
           class="min-h-screen py-32 flex items-center relative overflow-hidden">
    <video autoplay muted loop class="absolute min-h-full min-w-full top-0 left-0 max-w-none opacity-20">
      <source src="https://dev.tailoor.com/wp-content/uploads/2024/04/test_scarpe.mp4"
              type="video/mp4">
    </video>
    <div class="absolute top-0 left-0 min-h-full min-w-full bg-gradient-to-b from-transparent to-mirage"></div>
    <div class="container relative">
      <h1
        class="text-5xl uppercase leading-tight">
        {{__('Elevate your business with 3D Technology to offer unique, personalized products', 'sage')}}<span
          class="text-pink text-2x">.</span></h1>
      <p
        class="text-xl mt-6">{{__('Offer a unique and personalized experience to your customers: we are the partner that allow you to offer your products through the integration of an innovative AI-powered 3D configurator.', 'sage')}}</p>
      <div x-data="{}" class="mt-12 flex items-center gap-4">
        <x-form-cta/>
        <p>{{__('or')}}</p>
        <a href="#" x-on:click.prevent="$dispatch('request-modal', {modalName: 'watch__video'})"
           class="underline inline-block">{{__('watch the video', 'sage')}}</a>
      </div>
    </div>
  </section>
  <section id="carousel" class="min-h-screen py-32 flex items-center">
    <div class="container text-center">
      <h2 class="uppercase text-4xl">{{__('The perfect solution for every product category', 'sage')}}<span
          class="text-pink text-2x">.</span></h2>
      <x-products-carousel/>
      <p
        class="text-xl">{{__('Make your offer ever closer to the needs of your customers. Thanks to our 3D configurator, integrated directly into your website and/or e-commerce, your customers will be able to choose from your entire catalog of models and materials. We will take care of rendering them in 3D, making the virtual experience faithful to the real one.')}}</p>
      <x-form-cta class="mt-12"/>
    </div>
  </section>
  <section id="features" class="min-h-screen py-32 flex items-center">
    <div class="container grid grid-cols-2 gap-x-32 gap-y-48 items-center">
      <div>
        <h2 class="uppercase text-4xl">{{__('Manage your store whenever and however you want', 'sage')}}<span
            class="text-pink text-2x">.</span></h2>
        <p
          class="text-xl mt-4">{{__('Tailoor is also a Customer Dashboard that helps you manage all your stores and appointments with your clients. It also collects all their data and orders for a comprehensive and optimized management of your business.')}}</p>
        <x-form-cta class="mt-12"/>
      </div>
      <div id="benefits__img"> {!! wp_get_attachment_image(1929, 'full', false, ['alt' => 'Tailoor benefits']) !!}</div>
      <div id="reports__img">{!! wp_get_attachment_image(1931, 'full', false, ['alt' => 'Tailoor reports']) !!}</div>
      <div class="text-right">
        <h2 class="uppercase text-4xl">{{__('Monitor your performance in real time', 'sage')}}<span
            class="text-pink text-2x">.</span></h2>
        <p
          class="text-xl mt-4">{{__('Thanks to Business Intelligence tools, you can verify which materials and products you are selling the most, allowing you to adjust sales prices and refine your strategy.')}}</p>
        <x-form-cta class="mt-12"/>
      </div>
    </div>
  </section>
  <section id="phygital" class="min-h-screen py-32 flex items-center">
    <div class="container text-center">
      <p class="uppercase text-xl">{{ __('Tailor made solutions for your business', 'sage') }}</p>
      <h2 class="uppercase text-6xl">{{__('Make it phygital', 'sage')}}<span
          class="text-pink text-2x">.</span></h2>
      <p
        class="text-xl max-w-3xl mx-auto mt-8">{{__('Build customer loyalty by offering your clients the opportunity to have a complete and interactive shopping experience, both online and in-store. They can configure their own products independently from their smartphone or PC in just a few simple steps.')}}</p>
      <x-vertical-tabs
        :labels="apply_filters('get_home_tabs_labels', [])"
        :tabs-content="apply_filters('get_home_tabs_contents', [])"
      />
      <x-form-cta class="mt-16"/>
    </div>
  </section>
  <section id="experience" class="min-h-screen py-32 flex items-center bg-mirage">
    <div class="container grid grid-cols-4 items-center">
      <div>
        <h2 class="uppercase text-4xl">{{__('Make the experience even more real', 'sage')}}<span
            class="text-pink text-2x">.</span></h2>
        <p
          class="text-xl mt-8">{{__('Make your products real with Tailoor: your customers can configure and visualize them even within a real environment of their choice, bridging the boundaries between virtual and physical experience.', 'sage')}}</p>
        <x-form-cta class="mt-16"/>
      </div>
      <div
        class="col-span-3 text-right relative">
        <div class="absolute top-0 left-0 w-full h-full">
          {!! wp_get_attachment_image(1951, 'full', false, ['alt' => 'Tailoor Touch', 'class'=> 'h-full w-auto object-contain', 'x-data'=> sprintf('animateOnMouseMove($el, %s, %s)', json_encode(fake()->boolean()),json_encode(fake()->boolean()))]) !!}
        </div>
        {!! wp_get_attachment_image(1949, 'full', false, ['alt' => 'Tailoor Touch', 'class'=> 'ml-auto relative tailoor__touch']) !!}
      </div>
    </div>
  </section>
  <section id="twins" class="min-h-screen py-32 flex items-center bg-mirage">
    <div class="container relative grid grid-cols-2">
      <div
        class="absolute bottom-3/4 left-1/2 ">
        {!! wp_get_attachment_image(1959, 'full', false, ['alt' => 'Tailoor Touch', 'class'=> 'ml-auto relative', 'x-data'=> sprintf('animateOnMouseMove($el, %s, %s)', json_encode(fake()->boolean()),json_encode(fake()->boolean()))]) !!}
      </div>

      <div class="border-2 border-white p-6 rounded-2xl grid grid-cols-2 ">
        <div>
          <h2 class="uppercase text-4xl">{{__('Unique products through digital twins', 'sage')}}<span
              class="text-pink text-2x">.</span></h2>
          <p
            class="text-xl mt-8">{{__('A digital twin can be integrated into your products. You can instruct it with any information, for example telling your product & brand, so that your customers can interact with it.', 'sage')}}</p>
          <x-form-cta class="mt-16"/>
        </div>
        <div>
          {!! wp_get_attachment_image(1955, 'full', false, ['alt' => 'Tailoor Touch', 'class'=> 'ml-auto relative scale-125 translate-x-1/4']) !!}
        </div>
      </div>
      <div>
        {!! wp_get_attachment_image(1957, 'full', false, ['alt' => 'Tailoor Touch', 'class'=> 'ml-auto relative']) !!}
      </div>
    </div>
  </section>
  <section id="virtual" class="min-h-screen py-32 flex items-center bg-gradient-to-b from-transparent to-mirage-900">
    <div class="container relative grid grid-cols-2 gap-32">
      <div class="absolute top-0 left-0 w-full h-full ">
        {!! wp_get_attachment_image(1961, 'full', false, ['alt' => 'Tailoor Touch', 'class'=> 'h-full w-auto object-contains mx-auto', 'x-data'=> sprintf('animateOnMouseMove($el, %s, %s)', json_encode(fake()->boolean()),json_encode(fake()->boolean()))]) !!}
      </div>
      <div class="col-span-2 text-center relative z-10">
        <h2
          class="uppercase text-5xl">{{__('Enhance your customers\' experience with the advice of he virtual tailor', 'sage')}}
          <span
            class="text-pink text-2x">.</span></h2>
        <p
          class="text-xl mt-4">{{__('Your customers can chat with a virtual tailor, ready to answer any style or pairing doubts they may have, supporting them in the product configuration.', 'sage')}}</p>
      </div>
      <div class="relative z-10">
        <h2 class="uppercase text-3xl">{!! __('Easily manage<br>your appointments', 'sage') !!}<span
            class="text-pink text-2x">.</span></h2>
        <p
          class="text-lg mt-4">{{__('Your customers can chat with a virtual tailor, ready to answer any style or pairing doubts they may have, supporting them in the product configuration.', 'sage')}}</p>
      </div>
      <div class="text-right relative">
        <h2 class="uppercase text-3xl">{!! __('Taking measurements...<br>in a few clicks', 'sage') !!}<span
            class="text-pink text-2x">.</span></h2>
        <p
          class="text-lg mt-4">{{__('Your customers can chat with a virtual tailor, ready to answer any style or pairing doubts they may have, supporting them in the product configuration.', 'sage')}}</p>
      </div>
      <div class="col-span-2 text-center relative">
        {!! wp_get_attachment_image(1953, 'full', false, ['alt' => 'Tailoor benefits', 'class' => 'mx-auto shadow-2xl']) !!}
        <x-form-cta class="mt-32 relative"/>
      </div>
    </div>
  </section>
  <section id="window" class="min-h-screen py-32 flex items-center flex-col bg-gradient-to-b from-mirage-900 to-mirage">
    <div class="container">
      <div
        class="grid z-10 grid-cols-3 gap-16 bg-rose-100 px-8 pt-16 rounded-t-[4rem] border-rose-200 border-x-[1.5rem] border-t-[1.5rem] text-mirage">
        <div>
          <p class="uppercase text-4xl">
            {!! __('Your library of fabrics and materials in a digital format', 'sage') !!}<span
              class="text-pink text-2x">.</span></p>
          <p
            class="text-lg mt-4">{{__('Thanks to the digitization of all your products, models, and materials, it will be much easier for your customers to access your entire catalog. Simplify their evaluation and selection process, encouraging the creation of thousands of different configurations.', 'sage')}}</p>
        </div>
        <div class="col-span-2 overflow-hidden shadow-solid mb-[1.5rem]">
          {!! wp_get_attachment_image(1939, 'full', false, ['alt' => 'Tailoor showcase', 'class' => 'w-full h-auto object-cover']) !!}
        </div>
      </div>
    </div>
    <div class="bg-rose-100 py-32 w-full border-y-[1.5rem] border-rose-200 -mt-[1.5rem] mix-blend-lighten">
      <div class="container text-mirage max-w-5xl">
        <p class="uppercase text-4xl text-center">
          {!! __('Manage your marketing strategy<br>like never before', 'sage') !!}<span
            class="text-pink text-2x">.</span></p>
        <p
          class="text-xl mt-6 text-center">{{ __('With Tailoor, you have a powerful ally on your side: data. Thanks to the Customer Dashboard, you\'ll have all your customer data, both online and in-store, in one place. You can analyze them to create targeted offers and business strategies, reduce waste through more efficient sourcing of raw materials, and identify sales trends', 'sage') }}</p>
      </div>
    </div>
  </section>
  <section class="container min-h-screen overflow-hidden text-white gap-8 py-32">
    <div class=" max-h-screen overflow-hidden relative">
      <div class="absolute top-0 left-0 w-full h-auto aspect-video mix-blend-lighten">
        {!! wp_get_attachment_image(1965, 'full', false, ['alt' => 'Tailoor showcase', 'class' => 'h-auto w-full object-contains']) !!}
      </div>
      {!! wp_get_attachment_image(1963, 'full', false, ['alt' => 'Tailoor showcase', 'class' => 'relative h-full w-auto object-contains']) !!}
      <div class="absolute bottom-0 left-0 h-1/3 w-full bg-gradient-to-b from-transparent to-mirage"></div>
    </div>
    <h2
      class="uppercase text-5xl text-center">
      {{__('Simple & Fast integration', 'sage')}}<span
        class="text-pink text-2x">.</span></h2>
    <p
      class="text-xl mt-4 text-center">{{__('Tailoor is an open API platform and is easily integrable with any e-commerce platform.', 'sage')}}</p>
    {!! wp_get_attachment_image(1967, 'full', false, ['alt' => 'Tailoor showcase', 'class' => 'relative h-full w-auto object-contains mx-auto invert mix-blend-screen']) !!}

  </section>
  <section class="container grid xl:grid-cols-3 text-white gap-8 py-32">
    <div class="py-12 relative">
      <h2 class="text-4xl font-header mb-4">{{ __('Frequently Asked Questions', 'sage') }}</h2>
      <p class="text-lg font-header mb-16">{{ __('Haven\'t found what you were looking for?', 'sage') }}</p>
      {!! wp_get_attachment_image(1941, 'full', false, ['alt' => 'Tailoor decoration', 'class' => 'absolute top-0 translate-y-full']) !!}
    </div>
    <div class="xl:col-span-2">
      <div>
        <?php foreach (\App\Services\FaqService::generalFaqs() as $key => $value) : ?>
        <x-faq :question="$value['question']" :answer="$value['answer']" :starts-open="$key === 0"/>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <x-modal :visible="false" :name="'watch__video'" :title="__('Discover Tailoor', 'sage')">
    @if(GDPR()->marketing())
      <iframe title="vimeo-player" src="https://player.vimeo.com/video/862001692?h=23b06a6727" width="640" height="360"
              frameborder="0" allowfullscreen class="w-full h-auto aspect-video"></iframe>
    @else
      <div class="aspect-video w-full h-auto bg-mirage p-6 text-white flex justify-center items-center">
        <div>
          <p>{{__('The video embed has been removed to honor your cookie settings.', 'sage')}}</p>
          <div class="mt-12 flex gap-4 items-center">
            <a href="#"
               class="py-2 px-4 bg-rose-100 text-mirage uppercase inline-block text-sm iubenda-cs-preferences-link"
               title="Privacy Policy ">{{__('Update GDPR Settings', 'sage')}}</a>
            {{__('or', 'sage')}} <a href="#" x-on:click.prevent="visible = false"
                                    class="underline">{{__('close', 'sage')}}</a>
          </div>
        </div>
      </div>
    @endif
  </x-modal>
@endsection
