<?php
/**
 * Template Name: About Us
 */
?>
@php($header = 'sections.header-dark')
@extends('layouts.app')
@section('app.classes', 'bg-mirage text-white overflow-x-hidden font-header')
@section('footerWrapper.class', 'gradient')
@section('content')
  <section id="atf" class="my-32 container grid lg:grid-cols-2 gap-16 items-center"
           aria-labelledby="page-title">
    <div class="order-2 lg:order-1 text-center lg:text-left">
      <h1
        id="page-title"
        class="text-3xl sm:text-5xl uppercase leading-tight">
        <?= __('ALL ABOUT TAILOOR', 'sage') ?><span
          class="text-pink text-2x">.</span><br>
        <?= __('WE EMPOWER PEOPLE TO EXPRESS THEIR UNIQUENESS', 'sage') ?><span
          class="text-pink text-2x">.</span>
      </h1>
      <p
        class="text-lg sm:text-xl mt-6"><?= __('We are the partner that allows you to offer your customers unique and personalized experience through AI-powered technologies.', 'sage') ?></p>
    </div>
    <div class="order-1 lg:order-2">
      <?= wp_get_attachment_image(2153, 'full', false, ['alt' => 'Tailoor screenshots', 'class' => 'mx-auto']) ?>
    </div>
  </section>
  <div class="bg-gradient-to-b from-mirage to-mirage-900 py-3">
    <div class="relative container grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
      <div class="xl:absolute xl:left-0 xl:top-1/2 xl:-translate-y-1/2">
        <?= wp_get_attachment_image(2144, 'full', false, ['alt' => 'Prototyping Tailoor', 'class' => 'w-full h-auto']) ?>
      </div>
      <div class="xl:col-start-2 relative text-center lg:text-right">
        <h2 class="uppercase text-4xl mb-16"><?= __('WHO WHE ARE', 'sage') ?><span
            class="text-pink text-2x">.</span></h2>
        <p
          class="text-lg mt-6"><?= __('We are Tailoor: an innovative AI - powered platform that uses 3D technology to facilitate unique and personalized phygital experiences . By integrating physical and virtual elements, we ensure phygital experiences through a 3D configurator and AI solutions tailored to leverage the opportunities of the market . ', 'sage') ?></p>
        <p
          class="text-lg mt-6"><?= __('The platform emerged from a vision to revolutionize the fashion industry by advancing its digitalization . Motivated by the objective of crafting customer - centric experiences tailored to their specific needs and preferences, we facilitate the creation of unique products capable of authentically reflecting an individual\'s uniqueness.', 'sage') ?></p>
        <p
          class="text-lg mt-6"><?= __('In the past, consumers relied on trends to define their personality and style, while today, empowered by the platform\'s immersive experience, customers themselves shape their identity.', 'sage') ?></p>
        <p
          class="text-lg mt-6"><?= __('Then, we broadened out horizons to many other product categories, from design to accessories, extending to live experiences, such as concerts.', 'sage') ?></p>
      </div>
    </div>
  </div>
  <div class="bg-gradient-to-b to-mirage from-mirage-900 py-32">
    <div class="container grid grid-cols-1 md:grid-cols-5 gap-36 items-center relative">
      <div class="absolute right-0 top-1/2 -translate-y-1/2">
        <?= wp_get_attachment_image(2146, 'full', false, ['alt' => 'Decoration', 'class' => 'w-full h-auto']) ?>
      </div>
      <div class="relative col-span-3">
        <h2 class="uppercase text-4xl mb-16"><?= __('OUR MISSION', 'sage') ?><span
            class="text-pink text-2x">.</span></h2>
        <p
          class="text-lg mt-6"><?= __('In our continuous pursuit of innovation, we are committed to ensuring that every individual has the freedom to express their uniqueness through the products they use or the experiences they engage in.', 'sage') ?></p>
        <p
          class="text-lg mt-6"><?= __('Our dedication extends beyond mere facilitation of the creative process. We firmly believe that diversity is a source of enrichment, and that the inclusion of diverse perspectives is imperative for genuine innovation. That\'s why our platform not only furnishes the requisite tools for expressing uniqueness but also celebrates the array of human experiences.', 'sage') ?></p>
        <p
          class="text-lg mt-6"><?= __('With steadfast commitment to quality and excellence, we work to cultivate an ecosystem where the distinctiveness of everyone is not only valued but also amplified. We firmly hold that when people are free to express their true selves, the world becomes a more enriched and vibrant place for all. Our mission transcends the creation of a platform; it\'s about fostering an environment where customization drives customer consumption choices.', 'sage') ?></p>
      </div>
      <div class="relative col-span-2">
        <p class="uppercase text-4xl tracking-wide">
          <?= __('"In everything we do, we believe that every individual should be able to express their uniqueness"', 'sage') ?></p>
      </div>
    </div>
  </div>
  <div class="container text-center my-32">
    <h2 class="uppercase text-4xl"><?= __('OUR TEAM', 'sage') ?><span
        class="text-pink text-2x">.</span></h2>
    <p
      class="text-lg mt-6"><?= __('Our team fully embodies the creative and innovative approach of the company, with a special focus on enhancing individual uniqueness. We carry out our work with passion and daily dedication, guided by our leadership, boasting a decade of experience in digitalization. The over 40 professional figures comprising our team are committed to realizing ideas capable of meeting market needs, leading change through the power of human relationships.', 'sage') ?></p>
    <div class="mt-16">
      <?= wp_get_attachment_image(2148, 'full', false, ['alt' => 'Tailoor Team', 'class' => 'w-full h-auto']) ?>
    </div>
  </div>
  <div class="container text-center my-32">
    <h2 class="uppercase text-4xl"><?= __('OUR COMMITMENT TO SUSTAINABILITY ', 'sage') ?><span
        class="text-pink text-2x">.</span></h2>
    <p
      class="text-lg mt-6"><?= __('Our approach to sustainability goes beyond mere actions and activities; it\'s a way of interpreting and shaping our way of living and our future. We are actively committed to promoting more mindful and conscious consumption choices, guided by a \'Made to Order\' business model where only what is purchased is actually produced. Our goal is to return to a more \'slow\' and attentive lifestyle, driven by attention to detail and quality.', 'sage') ?></p>
  </div>
  <x-press-carousel/>
  <div class="bg-gradient-to-b from-mirage to-mirage-900 py-32">
    <div class="container text-center">
      <h2 class="uppercase text-4xl"><?= __('Can\'t wait to get into the game', 'sage') ?><span
          class="text-pink">?</span></h2>
      <x-form-cta class="mt-16"/>
    </div>
  </div>
@endsection
