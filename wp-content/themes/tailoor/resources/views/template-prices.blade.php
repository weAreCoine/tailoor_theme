<?php
//Template Name: Prices
?>
@php($header = 'sections.header-dark')
@extends('layouts.app')
@section('app.classes', 'bg-mirage text-white overflow-x-hidden')
@section('footerWrapper.class', 'gradient')
@section('content')
  <div class="bg-gradient-to-b from-mirage to-mirage-900 ">
    <section class="container text-center py-12 relative"
             aria-label="<?=__('Tailoor Prices page')?>">
      <p class="uppercase text-4xl relative z-10"><?= __('Enhance your business with 3D customization', 'sage') ?><span
          class="text-pink">!</span>
      </p>
      <h1 class="text-2xl mt-4 text-pink-100">
        <?= __('Choose the best plan for your business. Change plans as you grow.', 'sage') ?>
      </h1>
    </section>
  </div>
  <x-prices-table class="bg-gray-100 text-black py-16"/>
  <div class="py-20 bg-gradient-to-b from-mirage-900 to-mirage ">
    <div class="container">
      <div class="relative">
        <img x-data="animateOnMouseMove($el, true, false)"
             src="<?=asset('/images/prices-page/torus_half_blue.png')?>" alt="cylinder curve"
             class="absolute bottom-[70%] left-0 z-0 duration-75">
        <img x-data="animateOnMouseMove($el, false, true)"
             src="<?=asset('/images/prices-page/cylinder_curve_blue.png')?>" alt="cylinder curve"
             class="absolute top-[-200%] left-[80%] z-0 duration-75">
        <h2 class="font-header text-4xl uppercase text-center"><?= __('What every plan gets you', 'sage') ?><span
            class="text-pink">?</span></h2>
      </div>
      <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8 mt-20 z-10">
        <div class="rounded-2xl relative border-4 p-6 border-white">
          <h3 class="uppercase text-3xl font-header"><?= __('Dashboard CRM', 'sage') ?><span
              class="text-pink">.</span></h3>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
               stroke="currentColor" class="w-16 h-16 stroke-1 mt-4 mb-8">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6"/>
          </svg>
          <p
            class="text-rose-100 font-header text-base"><?= __('A unique hub powered by AI where you can collect all the information related to your clients. Easily manage it all, optimizing your sales strategy.', 'sage') ?></p>
        </div>
        <div class="rounded-2xl relative border-4 p-6 border-white">
          <h3 class="uppercase text-3xl font-header"><?= __('3D technology', 'sage') ?><span
              class="text-pink">.</span></h3>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
               stroke="currentColor" class="w-16 h-16 stroke-1 mt-4 mb-8">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9"/>
          </svg>
          <p
            class="text-rose-100 font-header text-base"><?= __('Exploit 3D technology to render your entire catalogue. Offer your customers a unique, immersive experience through innovative technologies.', 'sage') ?></p>
        </div>
        <div class="rounded-2xl relative border-4 p-6 border-white">
          <h3 class="uppercase text-3xl font-header"><?= __('Virtual Assistant', 'sage') ?><span
              class="text-pink">.</span></h3>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
               stroke="currentColor" class="w-16 h-16 stroke-1 mt-4 mb-8">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155"></path>
          </svg>
          <p
            class="text-rose-100 font-header text-base"><?= __('Provide your customers with a phygital experience, made possible by the Virtual Assistant, ready to solve every doubt they may have, as in a one to one consultancy.', 'sage') ?></p>
        </div>
        <div class="rounded-2xl relative border-4 p-6 border-white">
          <h3 class="uppercase text-3xl font-header">{!! __('Digital<br>Twin', 'sage') !!}<span
              class="text-pink">.</span></h3>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
               stroke="currentColor" class="w-16 h-16 stroke-1 mt-4 mb-8">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"></path>
          </svg>
          <p
            class="text-rose-100 font-header text-base"><?= __('Make the best of your opportunities through AI-Powered Digital Twin technology. Instruct it with every information about your brand and products, increasing your customers engagement rate.', 'sage') ?></p>
        </div>
      </div>
    </div>
  </div>
  <div class="my-32 container">
    <p
      class="uppercase text-3xl font-header text-center mb-20"><?= __('Alternative solutions for established business', 'sage') ?>
      <span
        class="text-pink">.</span></p>

    <div class="grid gap-16 max-w-4xl mx-auto">
      <div class="relative">

        <img x-data="animateOnMouseMove($el, true, true)"
             src="<?=asset('/images/prices-page/torus_pink.png')?>" alt="cylinder curve"
             class="absolute bottom-[-40%] left-[-15%] duration-75">

        <img x-data="animateOnMouseMove($el, false, false)"
             src="<?=asset('/images/prices-page/Torus_pink_2.png')?>" alt="cylinder curve"
             class="absolute top-[-20%] right-[-10%] z-30 duration-75">

        <div class="rounded-3xl p-6 bg-white text-mirage overflow-hidden">
          <div class="bg-gray-100 py-10 px-4 rounded-2xl tailoor__outline accent border">
            <p
              class="text-xl lg:text-2xl font-header text-center uppercase "><?= __('Seeking a more tailored approach for your business needs?', 'sage') ?></p>
          </div>
          <div class="mt-8">
            <p
              class="text-center"><?= __('Are you in need of a customized plan? Fill out the form with your information, and our team of experts will contact you to define the best solution together with a tailored plan designed to achieve your goals.', 'sage') ?>
            </p>
          </div>
          <div class="mt-12 text-center demo_request">
            <a href="#"
               class="inline-block py-2 px-12 bg-pink border-pink-400 hover:bg-pink-300 border duration-500 text-lg font-header uppercase rounded-lg"
            ><?= __('Get started', 'sage') ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-gradient-to-b from-mirage to-mirage-900">
    <div class="py-32 container font-header">
      <h2 class="font-header text-4xl uppercase text-center"><?= __('FAQ', 'sage') ?><span
          class="text-pink">.</span></h2>
      @foreach(\app\Services\PricesService::faq() as $index => $contents)
        <x-faq :question="$contents['question']" :answer="$contents['answer']" :starts-open="$index === 0"/>
      @endforeach
    </div>
  </div>
  <x-clients-carousel class="bg-mirage-900"/>
@endsection
