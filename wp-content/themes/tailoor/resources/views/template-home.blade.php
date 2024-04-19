{{--
  Template Name: Home page
--}}
@extends('layouts.home')
@section('content')
  <section id="tailoor" aria-labelledby="pageTitle" class="min-h-screen py-32 flex items-center">
    <div class="container">
      <h1
        class="text-5xl uppercase leading-tight">
        {{__('Elevate your business with 3D Technology to offer unique, personalized products', 'sage')}}<span
          class="text-pink text-2x">.</span></h1>
      <p
        class="text-xl mt-6">{{__('Offer a unique and personalized experience to your customers: we are the partner that allow you to offer your products through the integration of an innovative AI-powered 3D configurator.', 'sage')}}</p>
      <div class="mt-12 flex items-center gap-4">
        <x-form-cta/>
        <p>{{__('or')}}</p>
        <a href="#" class="underline inline-block">{{__('watch the video', 'sage')}}</a>
      </div>
    </div>
  </section>
  <section id="carousel" class="min-h-screen py-32 flex items-center">
    <div class="container text-center">
      <h2 class="uppercase text-4xl">{{__('The perfect solution for every product category', 'sage')}}<span
          class="text-pink text-2x">.</span></h2>
      <div class="my-24">
      </div>
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
      <div>{!! wp_get_attachment_image(1929, 'full', false, ['alt' => 'Tailoor benefits']) !!}</div>
      <div>{!! wp_get_attachment_image(1931, 'full', false, ['alt' => 'Tailoor benefits']) !!}</div>
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
  <section id="experience" class="min-h-screen py-32 flex items-center">
    <div class="container grid grid-cols-4">
      <div>
        <h2 class="uppercase text-4xl">{{__('Make the experience even more real', 'sage')}}<span
            class="text-pink text-2x">.</span></h2>
        <p
          class="text-xl mt-8">{{__('Make your products real with Tailoor: your customers can configure and visualize them even within a real environment of their choice, bridging the boundaries between virtual and physical experience.', 'sage')}}</p>
        <x-form-cta class="mt-16"/>
      </div>
    </div>
  </section>
  <section id="twins" class="min-h-screen py-32 flex items-center">
    <div class="container grid grid-cols-2">
      <div class="border-2 border-white p-6 rounded-2xl grid grid-cols-2">
        <div>
          <h2 class="uppercase text-4xl">{{__('Unique products through digital twins', 'sage')}}<span
              class="text-pink text-2x">.</span></h2>
          <p
            class="text-xl mt-8">{{__('A digital twin can be integrated into your products. You can instruct it with any information, for example telling your product & brand, so that your customers can interact with it.', 'sage')}}</p>
          <x-form-cta class="mt-16"/>
        </div>
      </div>
    </div>
  </section>
  <section id="virtual" class="min-h-screen py-32 flex items-center">
    <div class="container grid grid-cols-2 gap-32">
      <div class="col-span-2 text-center">
        <h2 class="uppercase text-5xl">{{__('Unique products through digital twins', 'sage')}}<span
            class="text-pink text-2x">.</span></h2>
        <p
          class="text-xl mt-4">{{__('Your customers can chat with a virtual tailor, ready to answer any style or pairing doubts they may have, supporting them in the product configuration.', 'sage')}}</p>
      </div>
      <div>
        <h2 class="uppercase text-3xl">{!! __('Easily manage<br>your appointments', 'sage') !!}<span
            class="text-pink text-2x">.</span></h2>
        <p
          class="text-lg mt-4">{{__('Your customers can chat with a virtual tailor, ready to answer any style or pairing doubts they may have, supporting them in the product configuration.', 'sage')}}</p>
      </div>
      <div class="text-right">
        <h2 class="uppercase text-3xl">{!! __('Taking measurements...<br>in a few clicks', 'sage') !!}<span
            class="text-pink text-2x">.</span></h2>
        <p
          class="text-lg mt-4">{{__('Your customers can chat with a virtual tailor, ready to answer any style or pairing doubts they may have, supporting them in the product configuration.', 'sage')}}</p>
      </div>
      <div class="col-span-2 text-center">
        {!! wp_get_attachment_image(1929, 'full', false, ['alt' => 'Tailoor benefits', 'class' => 'mx-auto']) !!}
        <x-form-cta class="mt-32"/>
      </div>
    </div>
  </section>
  <section id="window" class="min-h-screen py-32 flex items-center flex-col">
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

@endsection
