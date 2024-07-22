<?php
/**
 * Template Name: Solutions
 */ ?>
@php($header = 'sections.header-dark')
@extends('layouts.app')
@section('app.classes', 'bg-mirage text-white overflow-x-hidden font-header')
@section('footerWrapper.class', 'dark')
@section('content')
  <section id="atf" class="mt-32 mb-20 container"
           aria-labelledby="page-title">
    <div class="order-2 lg:order-1 text-center ">
      <h1
        id="page-title"
        class="text-3xl sm:text-5xl uppercase leading-tight">
        <?= __('Customer Experience', 'sage') ?><span
          class="text-pink text-2x">.</span>
      </h1>
      <p class="uppercase text-2xl"><?= __('A new, phygital approach to customer experience', 'sage') ?></p>
      <p
        class="text-lg sm:text-xl mt-6"><?= __('With the features provided by Tailoor, all easily integrable within your systems and in-store, you have the possibility of offering your customers a new, innovative and phygital customer experience. Blend the physical realms with the digital ones, and ensure a one-of-a-kind experience.', 'sage') ?></p>
    </div>
  </section>
  <div class="mx-auto max-w-[2560px]">
    <?= wp_get_attachment_image(2203, 'full', false, ['class' => 'w-full h-auto']) ?>
  </div>
  <div class="my-32 container grid grid-cols-1 md:grid-cols-5 gap-8 lg:gap-36 items-center xl:items-start">
    <div class="md:col-span-3">
      <?= wp_get_attachment_image(2184, 'full', false, ['class' => 'w-full h-auto']) ?>
    </div>
    <div class="md:col-span-2 text-right">
      <h2 class="uppercase text-3xl"><?= __('AI–powered speech items', 'sage') ?><span
          class="text-pink text-2x">.</span></h2>
      <p class="uppercase text-xl mt-2"><?= __('Even closer to your customers through generative AI', 'sage') ?></p>

      <p
        class="mt-8"><?= __('Make your products "phygital" by integrating a unique Digital Twin. Make your products speak, send information about them, your brand: always keep in touch with your customers! AI-powered speech items is not only an informative tool, but also a marketing’s one, both for online and offline.', 'sage') ?></p>
    </div>
  </div>
  <div class="xl:-mt-40 mb-32 container grid grid-cols-1 md:grid-cols-5 gap-8 lg:gap-36 items-center xl:items-end">
    <div class="order-2 md:order-1 md:col-span-2">
      <h2 class="uppercase text-3xl"><?= __('AI–powered Tailoor Assistant', 'sage') ?><span
          class="text-pink text-2x">.</span></h2>
      <p
        class="uppercase text-xl mt-2"><?= __('Increase your sales with a personal sales assistant service', 'sage') ?></p>

      <p
        class="mt-8"><?= __('Enable your customers to experience personalized consultation, even online, just like in your store. The virtual assistant will be able to address all their doubts and needs, encouraging cross-selling and increasing the sales rate of your product categories.', 'sage') ?></p>
    </div>
    <div class="md:col-span-3 order-1 md:order-2">
      <?= wp_get_attachment_image(2186, 'full', false, ['class' => 'w-full h-auto']) ?>
    </div>
  </div>
  <div class="my-32 container grid grid-cols-1 md:grid-cols-5 gap-8 lg:gap-36 items-center xl:items-start">
    <div class="md:col-span-3">
      <?= wp_get_attachment_image(2188, 'full', false, ['class' => 'w-full h-auto']) ?>
    </div>
    <div class="md:col-span-2 text-right">
      <h2 class="uppercase text-3xl"><?= __('Virtual try-on', 'sage') ?><span
          class="text-pink text-2x">.</span></h2>
      <p class="uppercase text-xl mt-2"><?= __('A virtual access for a new and phygital experience', 'sage') ?></p>

      <p
        class="mt-8"><?= __('Thanks to the \'virtual try-on\' feature, your customers will have the opportunity to create their own virtual avatar, which they can dress in the products they have customized and wish to purchase. Make their digital shopping experience increasingly realistic!', 'sage') ?></p>
    </div>
  </div>
  <div class="xl:-mt-48 mb-32 container grid grid-cols-1 md:grid-cols-5 gap-8 lg:gap-36 items-center xl:items-end">
    <div class="order-2 md:order-1 md:col-span-2">
      <h2 class="uppercase text-3xl"><?= __('Virtual Showroom', 'sage') ?><span
          class="text-pink text-2x">.</span></h2>
      <p class="uppercase text-xl mt-2"><?= __('Online and offline experience in one place', 'sage') ?></p>

      <p
        class="mt-8"><?= __('Your customers will be able to immerse themselves in a virtual environment of their choice, where they can view their products in 3D and envision them realistically represented within a physical and real space.', 'sage') ?></p>
    </div>
    <div class="md:col-span-3 order-1 md:order-2">
      <?= wp_get_attachment_image(2190, 'full', false, ['class' => 'w-full h-auto']) ?>
    </div>
  </div>
  <div class="container text-center">
    <x-form-cta/>
  </div>


  <div class="container mb-32 mt-48">
    <div
      class="bg-rose-200/15 p-8 rounded-3xl text-right grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-16 lg:gap-32 relative items-center">
      <div class="lg:col-span-3">
        <?= wp_get_attachment_image(2192, 'full', false, ['alt' => 'Decoration', 'class' => 'w-full h-auto']) ?>
      </div>
      <div class="lg:col-span-2">
        <h2 class="uppercase text-3xl"><?= __('Total look', 'sage') ?><span
            class="text-pink text-2x">.</span></h2>
        <p class="uppercase text-xl mt-2"><?= __('Reduce returns by creating the best matches', 'sage') ?></p>
        <p
          class="text-lg mt-8"><?= __('Finally, your customers won\'t be in doubt about product pairings anymore. Thanks to the \'total look\' feature, with just a simple click, they can create perfect matches, conveniently adding them to the cart in a few seconds, speeding up the purchasing process.', 'sage') ?></p>
      </div>
    </div>
  </div>

  <div class="my-32 container"
       aria-labelledby="page-title">
    <div class="order-2 lg:order-1 text-center ">
      <h2
        id="page-title"
        class="text-3xl sm:text-5xl uppercase leading-tight">
        <?= __('3D EXPERIENCE', 'sage') ?><span
          class="text-pink text-2x">.</span>
      </h2>
      <p class="uppercase text-2xl"><?= __('AMAZE YOUR CUSTOMERS WITH 3D CUSTOMIZATION', 'sage') ?></p>
      <p
        class="text-lg sm:text-xl mt-6"><?= __('Take your customization to the next level. With our 3D configurator you have the possibility of widening your customer base, while working with a sustainable approach. Don’t miss the chance of putting the creativity and the uniqueness of your customers first!', 'sage') ?></p>
    </div>
  </div>
  <div class="mb-32 mx-auto max-w-[2560px]">
    <?= wp_get_attachment_image(2205, 'full', false, ['alt' => 'Decoration', 'class' => 'w-full h-auto']) ?>
  </div>
  <div class="container mt-32 text-center">
    <h2
      id="page-title"
      class="text-3xl sm:text-5xl uppercase leading-tight">
      <?= __('AI-powered 3D configurator', 'sage') ?><span
        class="text-pink text-2x">.</span>
    </h2>
    <p class="uppercase text-2xl"><?= __('The end-to-end solution for your products', 'sage') ?></p>
    <p
      class="text-lg sm:text-xl mt-6"><?= __('The innovative 3D Tailoor configurator seamlessly integrates into your e-commerce platform and can also be utilized in-store to enhance your customers\' shopping experience. Suitable for any product category, it enables a unique and \'phygital\' approach. Through its functionalities, your customers can customize every aspect and detail of their product, enabling a \'zero waste\' and zero inventory approach, where only what is ordered is actually produced.', 'sage') ?></p>
  </div>
  <div class="mb-32 container relative">
    <?= wp_get_attachment_image(2194, 'full', false, ['alt' => 'Decoration', 'class' => 'w-full h-auto hidden md:inline']) ?>
    <div class="md:w-1/2 md:top-16 md:absolute mt-16 md:mt-0">
      <h2 class="uppercase text-3xl"><?= __('CUSTOMIZATION', 'sage') ?><span
          class="text-pink text-2x">.</span></h2>
      <p
        class="text-md mt-4"><?= __('360-degree customization of products.', 'sage') ?></p>
      <h2 class="uppercase text-3xl mt-20"><?= __('DIGITALIZATION SERVICES', 'sage') ?><span
          class="text-pink text-2x">.</span></h2>
      <p
        class="text-md mt-4"><?= __('Pattern-making, prototyping, and fabrics at your complete disposal.', 'sage') ?></p>
      <h2 class="uppercase text-3xl mt-20"><?= __('EASY INTEGRATION', 'sage') ?><span
          class="text-pink text-2x">.</span></h2>
      <p
        class="text-md mt-4"><?= __('Tailoor is an open API (Application Programming Interface) platform.', 'sage') ?></p>

    </div>
  </div>

  <div class="my-32 container"
       aria-labelledby="page-title">
    <div class="order-2 lg:order-1 text-center ">
      <h1
        id="page-title"
        class="text-3xl sm:text-5xl uppercase leading-tight">
        <?= __('DATA ANALYSIS', 'sage') ?><span
          class="text-pink text-2x">.</span>
      </h1>
      <p
        class="uppercase text-2xl"><?= __('GET THE BEST OUT OF YOUR INSIGHTS THROUGH A FULL DATA ANALYSIS ', 'sage') ?></p>
      <p
        class="text-lg sm:text-xl mt-6"><?= __('Have you ever wondered how to fully take advantages of your data? With these tools, included in our plans, you’ll no longer have to struggle. Discover how to maximize their potentialities!', 'sage') ?></p>
      <x-form-cta class="mt-12"/>
    </div>
  </div>
  <div class="mb-32 mx-auto max-w-[2560px]">
    <?= wp_get_attachment_image(2207, 'full', false, ['alt' => 'Decoration', 'class' => 'w-full h-auto']) ?>
  </div>

  <div class="my-32 container grid grid-cols-1 md:grid-cols-5 gap-8 lg:gap-36 items-center xl:items-start">
    <div class="md:col-span-3">
      <?= wp_get_attachment_image(2209, 'full', false, ['alt' => 'Decoration', 'class' => 'w-full h-auto']) ?>
    </div>
    <div class="md:col-span-2">
      <h2 class="uppercase text-3xl"><?= __('CRM', 'sage') ?><span
          class="text-pink text-2x">.</span></h2>
      <p class="uppercase text-xl mt-2"><?= __('Collect your data into a single hub', 'sage') ?></p>

      <p
        class="mt-8"><?= __('Harness the power of the data at your disposal, conveniently collected within the sophisticated CRM. Keep your customers\' data, orders, and store information always monitored.', 'sage') ?></p>
    </div>
  </div>

  <div class="xl:-mt-48 mb-32 container grid grid-cols-1 md:grid-cols-5 gap-8 lg:gap-36 items-center xl:items-end">
    <div class="order-2 md:order-1 md:col-span-2">
      <h2 class="uppercase text-3xl"><?= __('AI DATA ANALYSIS', 'sage') ?><span
          class="text-pink text-2x">.</span></h2>
      <p
        class="uppercase text-xl mt-2"><?= __('More targeted strategies with a comprehensive data analysis dashboard.', 'sage') ?></p>

      <p
        class="mt-8"><?= __('The data at your disposal are organized into concise graphs and tables, allowing you to easily analyze and leverage them to develop your future sales and marketing strategies, thereby increasing your revenue.', 'sage') ?></p>
    </div>
    <div class="md:col-span-3 order-1 md:order-2">
      <?= wp_get_attachment_image(2211, 'full', false, ['alt' => 'Decoration', 'class' => 'w-full h-auto']) ?>
    </div>
  </div>
@endsection
