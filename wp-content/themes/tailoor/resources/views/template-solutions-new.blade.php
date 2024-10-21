<?php
/**
 * Template Name: Solutions New Version
 */ ?>
@php($header = 'sections.header-dark')
@extends('layouts.app')
@section('app.classes', 'bg-mirage text-white overflow-x-hidden font-header')
@section('footerWrapper.class', 'dark')
@section('content')
  <section id="atf" class="lg:mt-32 mb-20 container"
           aria-labelledby="page-title">
    <div class="order-2 lg:order-1 text-center ">
      <h1
        id="pageTitle"
        class="text-3xl sm:text-6xl !leading-tight text-center font-medium">
        <?= sprintf(__('A new %sphygital%s approch', 'sage'), '<span class="font-serif italic">', '</span>') ?><br>
        <?= sprintf(__('to customer %sexperience%s', 'sage'), '<span class="font-serif italic">', '</span>') ?><span
          class="text-pink">.</span>
      </h1>
      <p
        class="text-center max-w-5xl text-white/70 mx-auto mt-10"><?= __('With the features provided by Tailoor, all easily integrable within your systems and in-store, you have the possibility of offering your customers a new, innovative and phygital customer experience. Blend the physical realms with the digital ones, and ensure a one-of-a-kind experience.', 'sage') ?></p>
    </div>
    <div class="mt-20 text-center">
      <x-form-cta/>
    </div>
  </section>
  <div class="container">
    <div class="overflow-hidden rounded-3xl relative ">
      <div
        class="bg-rose-200/30 blur-3xl w-[95%] h-full absolute top-0 left-1/2 -translate-x-1/2 rounded-full translate-y-2/3 group-hover:translate-y-[80%] duration-500"></div>
      <?= wp_get_attachment_image(2205, 'full', false, ['alt' => 'Decoration', 'class' => 'rounded-tl-3xl rounded-tr-3xl md:w-4/5 h-auto mx-auto relative md:translate-y-10 xl:translate-y-12 group-hover:translate-y-0 duration-200']) ?>
    </div>
  </div>

  <div class="container mt-32">
    <p class="text-xs justify-start text-green-300 font-mono flex items-center gap-4 font-medium mb-1"><i
        class="fa-solid fa-shirt"></i><?= __('Phygital', 'sage') ?>
    </p>
    <h2
      class="font-medium text-3xl max-w-4xl !leading-normal mb-12"><?= sprintf(__('%sAI-Powered%s 3D Configurator', 'sage'), '<span class="font-serif italic">', '</span>') ?></h2>
    <p
      class="font-medium text-xl mb-2 mt-12 first:mt-0"><?= __('The end-to-end solution for your products', 'sage') ?></p>
    <p
      class="font-sans text-white/70"><?= __('The innovative 3D Tailoor configurator seamlessly integrates into your e-commerce platform and can also be utilized in-store to enhance your customers\' shopping experience. Suitable for any product category, it enables a unique and \'phygital\' approach. Through its functionalities, your customers can customize every aspect and detail of their product, enabling a \'zero waste\' and zero inventory approach, where only what is ordered is actually produced.', 'sage') ?></p>
  </div>
  <div class="mb-32 container relative">
    <?= wp_get_attachment_image(2194, 'full', false, ['alt' => 'Decoration', 'class' => 'w-full h-auto hidden md:inline']) ?>
    <div class="md:w-1/2 md:top-16 md:absolute mt-16 md:mt-0">
      <h3 class="font-medium text-xl mb-2 mt-12 first:mt-0"><?= __('Customization', 'sage') ?></h3>
      <p
        class="font-sans text-white/70"><?= __('360-degree customization of products.', 'sage') ?></p>
      <h3 class="font-medium text-xl mb-2 mt-12 first:mt-0"><?= __('Digitalization services', 'sage') ?></h3>
      <p
        class="font-sans text-white/70"><?= __('Pattern-making, prototyping, and fabrics at your complete disposal.', 'sage') ?></p>
      <h3 class="font-medium text-xl mb-2 mt-12 first:mt-0"><?= __('Easy integration', 'sage') ?></h3>
      <p
        class="font-sans text-white/70"><?= __('Tailoor is an open API (Application Programming Interface) platform.', 'sage') ?></p>

    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-x-16 gap-y-24 container">
    <div class="">
      <p class="text-xs justify-start text-amber-300 font-mono flex items-center gap-4 font-medium mb-1"><i
          class="fa-solid fa-database"></i><?= __('CRM', 'sage') ?>
      </p>
      <h2 class="font-medium text-3xl max-w-4xl mx-auto !leading-normal mb-6 whitespace-balance">
        <?= sprintf(__('Collect %syour data%s<br>into a single hub', 'sage'), '<span class="font-serif italic">', '</span>') ?>
      </h2>

      <p
        class="font-sans text-white/70"><?= __('Harness the power of the data at your disposal, conveniently collected within the sophisticated CRM. Keep your customers\' data, orders, and store information always monitored.', 'sage') ?></p>
    </div>

    <div class="md:text-right">
      <p class="text-xs md:justify-end text-emerald-300 font-mono flex items-center gap-4 font-medium mb-1"><i
          class="fa-solid fa-magnifying-glass-chart"></i><?= __('AI data analysis', 'sage') ?>
      </p>
      <h2
        class="font-medium text-3xl max-w-4xl mx-auto !leading-normal mb-6 whitespace-balance"><?= sprintf(__('More %stargeted strategies%s with a comprehensive dashboard', 'sage'), '<span class="font-serif italic">', '</span>') ?></h2>
      <p
        class="font-sans text-white/70"><?= __('The data at your disposal are organized into concise graphs and tables, allowing you to easily analyze and leverage them to develop your future sales and marketing strategies, thereby increasing your revenue.', 'sage') ?></p>
    </div>
  </div>

  <div class="container my-48 relative grid grid-cols-1 md:grid-cols-2 gap-16 md:gap-32 items-center">
    <div class="order-2 md:order-1">
      <p class="text-xs text-indigo-300 font-mono flex items-center gap-4 font-medium mb-1"><i
          class="fa-solid fa-user-tie"></i><?= __('Total look', 'sage') ?>
      </p>
      <h2
        class="font-medium text-3xl max-w-4xl mx-auto !leading-normal mb-6 relative whitespace-balance"><?= sprintf(__('Reduce returns by creating the %sbest matches%s', 'sage'), '<span class="font-serif italic">', '</span>') ?></h2>
      <div class="max-w-4xl mx-auto relative">
        <p
          class="mb-2 text-white/70"><?= __('Finally, your customers won\'t be in doubt about product pairings anymore. Thanks to the \'total look\' feature, with just a simple click, they can create perfect matches, conveniently adding them to the cart in a few seconds, speeding up the purchasing process.', 'sage') ?></p>
        <x-form-cta class="mt-16"/>
      </div>

    </div>
    <div class="max-w-4xl mx-auto order-1 md:order-2">
      <?= wp_get_attachment_image(2346, 'full', false, ['alt' => 'Decoration', 'class' => 'w-full h-auto']) ?>
    </div>
  </div>

  <div class="container my-48 relative grid grid-cols-1 md:grid-cols-2 gap-16 md:gap-32 items-center">
    <div class="">
      <p class="text-xs justify-start text-sky-300 font-mono flex items-center gap-4 font-medium mb-1"><i
          class="fa-solid fa-comment"></i><?= __('AI powered speech items', 'sage') ?>
      </p>
      <h2
        class="font-medium text-3xl max-w-4xl mx-auto !leading-normal mb-6 whitespace-balance"><?= sprintf(__('Even closer to your customer<br>through %sgenerative AI%s', 'sage'), '<span class="font-serif italic">', '</span>') ?></h2>
      <p
        class="font-sans text-white/70"><?= __('Make your products "phygital" by integrating a unique Digital Twin. Make your products speak, send information about them, your brand: always keep in touch with your customers! AI-powered speech items is not only an informative tool, but also a marketing\'s one, both for online and offline.', 'sage') ?></p>
    </div>

    <div class="md:text-right">
      <p class="text-xs md:justify-end text-pink-300 font-mono flex items-center gap-4 font-medium mb-1"><i
          class="fa-solid fa-handshake-angle"></i><?= __('AI–powered Tailoor Assistant', 'sage') ?>
      </p>
      <h2
        class="font-medium text-3xl max-w-4xl mx-auto !leading-normal mb-6 whitespace-balance"><?= sprintf(__('Increase your sales with a personal %ssales assistant%s service', 'sage'), '<span class="font-serif italic">', '</span>') ?></h2>
      <p
        class="font-sans text-white/70"><?= __('Enable your customers to experience personalized consultation, even online, just like in your store. The virtual assistant will be able to address all their doubts and needs, encouraging cross-selling and increasing the sales rate of your product categories.', 'sage') ?></p>
    </div>
  </div>
  <div class="container">
    <?= wp_get_attachment_image(2230, 'full', false, ['alt' => 'Decoration', 'class' => 'w-4/5 h-auto mx-auto rounded-3xl']) ?>
  </div>
  <div class="container my-48 relative grid md:grid-cols-2 gap-16 md:gap-32 items-center">
    <div class="">
      <p class="text-xs justify-start text-green-300 font-mono flex items-center gap-4 font-medium mb-1"><i
          class="fa-solid fa-comment"></i><?= __('Virtual Try-on', 'sage') ?>
      </p>
      <h2
        class="font-medium text-3xl max-w-4xl mx-auto !leading-normal mb-6 whitespace-balance"><?= sprintf(__('A virtual access for a new %sPhygital Experience%s', 'sage'), '<span class="font-serif italic">', '</span>') ?></h2>
      <p
        class="font-sans text-white/70"><?= __('Thanks to the "virtual try-on" feature, your customers will have the opportunity to create their own virtual avatar, which they can dress in the products they have customized and wish to purchase. Make their digital shopping experience increasingly realistic!', 'sage') ?></p>
    </div>

    <div class="md:text-right">
      <p class="text-xs md:justify-end text-orange-300 font-mono flex items-center gap-4 font-medium mb-1"><i
          class="fa-solid fa-handshake-angle"></i><?= __('Virtual showroom', 'sage') ?>
      </p>
      <h2
        class="font-medium text-3xl max-w-4xl mx-auto !leading-normal mb-6 whitespace-balance"><?= sprintf(__('Online and offline %sexperience%s in one place', 'sage'), '<span class="font-serif italic">', '</span>') ?></h2>
      <p
        class="font-sans text-white/70"><?= __('Your customers will be able to immerse themselves in a virtual environment of their choice, where they can view their products in 3D and envision them realistically represented within a physical and real space.', 'sage') ?></p>
    </div>
  </div>
  <div class="container text-center my-48">
    <h2
      class="font-medium text-3xl max-w-4xl mx-auto !leading-normal mb-6"><?= sprintf(__('Try %sTailoor%s for free', 'sage'), '<span class="font-serif italic">', '</span>') ?></h2>
    <p
      class="font-sans text-white/70"><?= __('Find out how to make your online offer closer to your customers\' needs with Tailoor.', 'sage') ?></p>
    <div class="mt-20">
      <x-form-cta/>
    </div>
  </div>
@endsection
