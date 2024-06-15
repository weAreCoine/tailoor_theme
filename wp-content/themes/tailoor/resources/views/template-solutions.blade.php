<?php
/**
 * Template Name: Solutions
 */ ?>
@php($header = 'sections.header-dark')
@extends('layouts.app')
@section('app.classes', 'bg-mirage text-white overflow-x-hidden font-header')
@section('footerWrapper.class', 'dark')
@section('content')
  <section id="atf" class="my-32 container"
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
        class="text-lg sm:text-xl mt-6"><?= __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa id incidunt itaque nemo nisi possimus, quidem repellendus ullam velit voluptatibus. Aliquid animi beatae deserunt ea eligendi in quo saepe voluptatem.', 'sage') ?></p>
    </div>
  </section>
  <div>
    <?= wp_get_attachment_image(2101, 'full',) ?>
  </div>
  <div class="my-32 container grid grid-cols-1 md:grid-cols-5 gap-8 lg:gap-36 items-center xl:items-start">
    <div class="md:col-span-3">
      <?= wp_get_attachment_image(2144, 'full') ?>
    </div>
    <div class="md:col-span-2">
      <h2 class="uppercase text-4xl"><?= __('OUR MISSION', 'sage') ?><span
          class="text-pink text-2x">.</span></h2>
      <p class="uppercase text-2xl mt-2"><?= __('A new, phygital approach to customer experience', 'sage') ?></p>

      <p
        class="text-lg mt-16"><?= __('In our continuous pursuit of innovation, we are committed to ensuring that every individual has the freedom to express their uniqueness through the products they use or the experiences they engage in.', 'sage') ?></p>
    </div>
  </div>
  <div class="xl:-mt-48 mb-32 container grid grid-cols-1 md:grid-cols-5 gap-8 lg:gap-36 items-center xl:items-end">
    <div class="order-2 md:order-1 md:col-span-2">
      <h2 class="uppercase text-4xl"><?= __('OUR MISSION', 'sage') ?><span
          class="text-pink text-2x">.</span></h2>
      <p class="uppercase text-2xl mt-2"><?= __('A new, phygital approach to customer experience', 'sage') ?></p>

      <p
        class="text-lg mt-16"><?= __('In our continuous pursuit of innovation, we are committed to ensuring that every individual has the freedom to express their uniqueness through the products they use or the experiences they engage in.', 'sage') ?></p>
    </div>
    <div class="md:col-span-3 order-1 md:order-2">
      <?= wp_get_attachment_image(2144, 'full') ?>
    </div>
  </div>
  <div class="my-32 container grid grid-cols-1 md:grid-cols-5 gap-8 lg:gap-36 items-center xl:items-start">
    <div class="md:col-span-3">
      <?= wp_get_attachment_image(2144, 'full') ?>
    </div>
    <div class="md:col-span-2">
      <h2 class="uppercase text-4xl"><?= __('OUR MISSION', 'sage') ?><span
          class="text-pink text-2x">.</span></h2>
      <p class="uppercase text-2xl mt-2"><?= __('A new, phygital approach to customer experience', 'sage') ?></p>

      <p
        class="text-lg mt-16"><?= __('In our continuous pursuit of innovation, we are committed to ensuring that every individual has the freedom to express their uniqueness through the products they use or the experiences they engage in.', 'sage') ?></p>
    </div>
  </div>
  <div class="xl:-mt-48 mb-32 container grid grid-cols-1 md:grid-cols-5 gap-8 lg:gap-36 items-center xl:items-end">
    <div class="order-2 md:order-1 md:col-span-2">
      <h2 class="uppercase text-4xl"><?= __('OUR MISSION', 'sage') ?><span
          class="text-pink text-2x">.</span></h2>
      <p class="uppercase text-2xl mt-2"><?= __('A new, phygital approach to customer experience', 'sage') ?></p>

      <p
        class="text-lg mt-16"><?= __('In our continuous pursuit of innovation, we are committed to ensuring that every individual has the freedom to express their uniqueness through the products they use or the experiences they engage in.', 'sage') ?></p>
    </div>
    <div class="md:col-span-3 order-1 md:order-2">
      <?= wp_get_attachment_image(2144, 'full') ?>
    </div>
  </div>
  <div class="container mb-32">

    <div class="bg-rose-200/15 p-8 rounded-3xl text-right grid grid-cols-4 relative">
      <div class="absolute w-3/4 left-8 bottom-8 h-[120%]">
        <?= wp_get_attachment_image(2146, 'full', false, ['alt' => 'Decoration', 'class' => 'h-full w-auto']) ?>
      </div>
      <div class="col-start-4">
        <h2 class="uppercase text-4xl"><?= __('OUR MISSION', 'sage') ?><span
            class="text-pink text-2x">.</span></h2>
        <p class="uppercase text-2xl mt-2"><?= __('A new, phygital approach to customer experience', 'sage') ?></p>

        <p
          class="text-lg mt-8"><?= __('In our continuous pursuit of innovation, we are committed to ensuring that every individual has the freedom to express their uniqueness through the products they use or the experiences they engage in.', 'sage') ?></p>
      </div>
    </div>
  </div>

  <div class="my-32 container"
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
        class="text-lg sm:text-xl mt-6"><?= __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa id incidunt itaque nemo nisi possimus, quidem repellendus ullam velit voluptatibus. Aliquid animi beatae deserunt ea eligendi in quo saepe voluptatem.', 'sage') ?></p>
    </div>
  </div>
  <div class="mb-32">
    <?= wp_get_attachment_image(2013, 'full', false, ['alt' => 'Decoration', 'class' => 'w-full h-auto']) ?>
  </div>

  <div class="my-32 container relative">
    <?= wp_get_attachment_image(2094, 'full', false, ['alt' => 'Decoration', 'class' => 'w-full h-auto']) ?>
    <div class="w-1/2 top-0 absolute">
      <h2 class="uppercase text-4xl"><?= __('OUR MISSION', 'sage') ?><span
          class="text-pink text-2x">.</span></h2>
      <p
        class="text-md mt-4"><?= __('In our continuous pursuit of innovation, we are committed to ensuring that.', 'sage') ?></p>
      <h2 class="uppercase text-4xl mt-20"><?= __('OUR MISSION', 'sage') ?><span
          class="text-pink text-2x">.</span></h2>
      <p
        class="text-md mt-4"><?= __('In our continuous pursuit of innovation, we are committed to ensuring that.', 'sage') ?></p>
      <h2 class="uppercase text-4xl mt-20"><?= __('OUR MISSION', 'sage') ?><span
          class="text-pink text-2x">.</span></h2>
      <p
        class="text-md mt-4"><?= __('In our continuous pursuit of innovation, we are committed to ensuring that.', 'sage') ?></p>

    </div>
  </div>

  <div class="my-32 container"
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
        class="text-lg sm:text-xl mt-6"><?= __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa id incidunt itaque nemo nisi possimus, quidem repellendus ullam velit voluptatibus. Aliquid animi beatae deserunt ea eligendi in quo saepe voluptatem.', 'sage') ?></p>
    </div>
  </div>
  <div class="mb-32">
    <?= wp_get_attachment_image(2013, 'full', false, ['alt' => 'Decoration', 'class' => 'w-full h-auto']) ?>
  </div>
  <div class="my-32 container grid grid-cols-1 md:grid-cols-5 gap-8 lg:gap-36 items-center xl:items-start">
    <div class="md:col-span-3">
      <?= wp_get_attachment_image(2144, 'full') ?>
    </div>
    <div class="md:col-span-2">
      <h2 class="uppercase text-4xl"><?= __('OUR MISSION', 'sage') ?><span
          class="text-pink text-2x">.</span></h2>
      <p class="uppercase text-2xl mt-2"><?= __('A new, phygital approach to customer experience', 'sage') ?></p>

      <p
        class="text-lg mt-16"><?= __('In our continuous pursuit of innovation, we are committed to ensuring that every individual has the freedom to express their uniqueness through the products they use or the experiences they engage in.', 'sage') ?></p>
    </div>
  </div>
  <div class="xl:-mt-48 mb-32 container grid grid-cols-1 md:grid-cols-5 gap-8 lg:gap-36 items-center xl:items-end">
    <div class="order-2 md:order-1 md:col-span-2">
      <h2 class="uppercase text-4xl"><?= __('OUR MISSION', 'sage') ?><span
          class="text-pink text-2x">.</span></h2>
      <p class="uppercase text-2xl mt-2"><?= __('A new, phygital approach to customer experience', 'sage') ?></p>

      <p
        class="text-lg mt-16"><?= __('In our continuous pursuit of innovation, we are committed to ensuring that every individual has the freedom to express their uniqueness through the products they use or the experiences they engage in.', 'sage') ?></p>
    </div>
    <div class="md:col-span-3 order-1 md:order-2">
      <?= wp_get_attachment_image(2144, 'full') ?>
    </div>
  </div>

@endsection
