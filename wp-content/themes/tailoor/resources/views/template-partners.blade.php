<?php
/**
 * Template Name: Partners
 */ ?>
@php($header = 'sections.header-dark')
@extends('layouts.app')
@section('app.classes', 'bg-mirage text-white overflow-x-hidden font-header')
@section('footerWrapper.class', 'dark')
@section('content')
  <section id="atf" class="lg:mt-32 mb-20 container text-center"
           aria-labelledby="page-title">
    <div class="order-2 lg:order-1 max-w-5xl mx-auto">
      <h1
        id="pageTitle"
        class="text-3xl sm:text-6xl !leading-tight font-medium text-balance">
        <?= sprintf(__('Become a Tailoor %spartner%s', 'sage'), '<span class="font-serif italic">', '</span>') ?><span
          class="text-pink">.</span>
      </h1>
      <p
        class="text-white/70 mx-auto mt-10"><?= __('Increase your business opportunities with us: we are the innovative AI-powered platform that leverages 3D technology to enable unique and personalized phygital experiences. Join us on this journey to the future of innovation and take full advantage of our team\'s support.', 'sage') ?></p>
    </div>
    <div class="mt-20">
      <a href="#onboarding"
         class="inline-block whitespace-nowrap button border-t-neutral-600 bg-pink border-pink-400 hover:bg-pink-300 border text-lg text-mirage font-semibold tracking-wide hover:translate-y-[-2px]"
      ><?= __('Become Tailoor Partner', 'sage') ?>
      </a>
    </div>
  </section>
  <section class="container my-48">
    <p class="text-xs justify-center text-blue-300 font-mono flex items-center gap-4 font-medium mb-1"><i
        class="fa-solid fa-rocket"></i><?= __('Benefits', 'sage') ?>
    </p>
    <h2
      class="font-medium text-3xl max-w-4xl mx-auto !leading-normal text-center"><?= sprintf(__('%sWhat\'s in it%s for me?', 'sage'), '<span class="font-serif italic">', '</span>') ?></h2>
    <p
      class="text-white/60 text-center mb-24"><?= __('Just in case you\'re wondering, we\'ve got a quick list for you.', 'sage') ?></p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 items-center gap-32">
      <div class="lg:col-span-2 overflow-hidden h-full">
        <?= wp_get_attachment_image(2332, 'full', false, ['class' => 'w-full h-auto object-cover mix-blend-lighten', 'alt' => 'Tailoor Platform']) ?>
      </div>

      <div>
        <h3 class="font-medium text-xl mb-2 mt-12 first:mt-0"><?= __('Portfolio', 'sage') ?></h3>
        <p
          class="font-sans text-white/70"><?= __('Expanding your portfolio of products and services.', 'sage') ?></p>

        <h3 class="font-medium text-xl mb-2 mt-12 first:mt-0"><?= __('Experience', 'sage') ?></h3>
        <p
          class="font-sans text-white/70"><?= __('Through AI-enhanced solutions aimed at creating unique, personalized experiences.', 'sage') ?></p>

        <h3 class="font-medium text-xl mb-2 mt-12 first:mt-0"><?= __('Business opportunities', 'sage') ?></h3>
        <p
          class="font-sans text-white/70"><?= __('Through the integration of new products and services into your portfolio, you will generate additional revenue ', 'sage') ?></p>

        <h3 class="font-medium text-xl mb-2 mt-12 first:mt-0"><?= __('Industry Pioneer', 'sage') ?></h3>
        <p
          class="font-sans text-white/70"><?= __('Be among the early adopters of cutting-edge technologies becoming a pioneer in your industry and for your customers.', 'sage') ?></p>
      </div>
    </div>
  </section>

  <div class="container my-48 grid grid-cols-1 md:grid-cols-2 gap-16">
    <div class="border border-white/10 rounded p-12 bg-white/5">
      <p class="text-xs  text-green-500 font-mono flex items-center gap-4 font-medium mb-1"><i
          class="fa-solid fa-rectangle-ad"></i><?= __('Marketing', 'sage') ?>
      </p>
      <h2
        class="font-medium text-3xl max-w-4xl mx-auto !leading-normal "><?= sprintf(__('Accelerate your %sMarketing%s Reach.', 'sage'), '<span class="font-serif italic">', '</span>') ?></h2>
      <p
        class="text-white/60  max-w-2xl mx-auto mt-4"><?= __('Join the Tailoor Partnership Program and tap into powerful marketing tools, strategic co-marketing opportunities, and exclusive promotional support to amplify your brand visibility. Partner with Tailoor to leverage professional marketing materials, event participation, and much more, ensuring that you stand out in a competitive marketplace.', 'sage') ?></p>
      <p class="font-medium mt-6 text-lg"><?= __('Key benefits', 'sage') ?></p>
      <ul class="text-white/60 list-disc ml-2 pl-2 mt-3 flex flex-col gap-2 text-sm">
        <li><?= __('Publication as an Authorized Partner on Tailoor’s Official Website', 'sage') ?></li>
        <li><?= __('Access to Exclusive Tailoor Marketing Materials', 'sage') ?></li>
        <li><?= __('Tailored Additional Marketing Support', 'sage') ?></li>
        <li><?= __('Invitations to Participate in High-Profile Events', 'sage') ?></li>
        <li><?= __('Strategic Co-Marketing Initiatives for Enhanced Visibility', 'sage') ?></li>
      </ul>

    </div>
    <div class="border border-white/10 rounded p-12 bg-white/5">
      <p class="text-xs  text-orange-400 font-mono flex items-center gap-4 font-medium mb-1"><i
          class="fa-solid fa-circle-info"></i><?= __('Sales support', 'sage') ?>
      </p>
      <h2
        class="font-medium text-3xl max-w-4xl mx-auto !leading-normal "><?= sprintf(__('Elevate your %sSales Performances%s.', 'sage'), '<span class="font-serif italic">', '</span>') ?></h2>
      <p
        class="text-white/60  max-w-2xl mx-auto mt-4"><?= __('Become a Tailoor partner and tap into exceptional sales support designed to help you close more deals and grow your customer base. From direct access to qualified leads to specialized training and dedicated pre-sales assistance, our comprehensive sales enablement resources ensure you stay ahead of the competition.', 'sage') ?></p>
      <p class="font-medium mt-6 text-lg"><?= __('Key benefits', 'sage') ?></p>
      <ul class="text-white/60 list-disc ml-2 pl-2 mt-3 flex flex-col gap-2 text-sm">
        <li><?= __('Leads (direct access to Tailoor’s partner network)', 'sage') ?></li>
        <li><?= __('Pre-sales support for major projects', 'sage') ?></li>
        <li><?= __('Additional training (sales and technical)', 'sage') ?></li>
        <li><?= __('Dedicated technical sales support', 'sage') ?></li>
      </ul>
    </div>

  </div>

  <div class="container my-48">
    <p class="text-xs justify-center text-fuchsia-300 font-mono flex items-center gap-4 font-medium mb-1 mt-12"><i
        class="fa-solid fa-handshake"></i><?= __('Partnership', 'sage') ?>
    </p>
    <h2
      class="font-medium text-3xl max-w-4xl mx-auto !leading-normal text-center"><?= sprintf(__('Who can %sjoin%s?', 'sage'), '<span class="font-serif italic">', '</span>') ?></h2>
    <p
      class="text-white/60 text-center max-w-2xl mx-auto mb-24 mt-4"><?= __('We offer a partnership program that provides so many benefits beyond just membership. As a partner you will have immediate access to a host of benefits that not only improve your business prospects but also contribute to your growth, from exclusive support of innovative technologies and customized solutions, to a dedicated support network.', 'sage') ?></p>

    <div class="grid grid-cols-2 gap-8 md:gap-32 text-center max-w-4xl mx-auto">
      <div>
        <i class="fa-solid text-2xl mb-6 text-white/80 fa-store"></i>
        <p class="font-bold text-white/80 mb-2"><?= __('Agency Partners') ?></p>
        <p
          class="text-sm text-white/60"><?= __('Integrate our "AI-powered Virtual Assistant" feature to enable customer chat support for product configuration.', 'sage') ?></p>
      </div>
      <div>
        <i class="fa-solid text-2xl mb-6 text-white/80 fa-tablet-screen-button"></i>
        <p class="font-bold text-white/80 mb-2"><?= __('App Partners') ?></p>
        <p
          class="text-sm text-white/60"><?= __('Incorporate a generative AI-powered digital twin into your products through NFC technology for interactive customer engagement and valuable data generation.', 'sage') ?></p>
      </div>
      <div>
        <i class="fa-solid text-2xl mb-6 text-white/80 fa-people-arrows"></i>
        <p class="font-bold text-white/80 mb-2"><?= __('Consulting Partners') ?></p>
        <p
          class="text-sm text-white/60"><?= __('Integrate our "AI-powered Virtual Assistant" feature to enable customer chat support for product configuration.', 'sage') ?></p>
      </div>
      <div>
        <i class="fa-solid text-2xl mb-6 text-white/80 fa-microchip"></i>
        <p class="font-bold text-white/80 mb-2"><?= __('Technology Partners') ?></p>
        <p
          class="text-sm text-white/60"><?= __('Incorporate a generative AI-powered digital twin into your products through NFC technology for interactive customer engagement and valuable data generation.', 'sage') ?></p>
      </div>
    </div>
  </div>
  <div id="onboarding" class="container my-48">
    <p class="text-xs justify-center text-emerald-300 font-mono flex items-center gap-4 font-medium mb-1 mt-12"><i
        class="fa-solid fa-door-open"></i><?= __('Onboarding', 'sage') ?>
    </p>
    <h2
      class="font-medium text-3xl max-w-4xl mx-auto !leading-normal text-center"><?= sprintf(__('How does the %sOnboarding Process%s work?', 'sage'), '<span class="font-serif italic">', '</span>') ?></h2>
    <p
      class="text-white/60 text-center max-w-2xl mx-auto mb-24 mt-4"><?= __('What happens once I become a Tailoor partner? Our teams will always be fully available to support you in your onboarding process, identifying work areas and activities together.', 'sage') ?></p>

    <div>
      <div class="meetings-iframe-container"
           data-src="https://meetings-eu1.hubspot.com/vincenzo-longo/partnership-program-demo?embed=true"></div>
      <script type="text/javascript"
              src="https://static.hsappstatic.net/MeetingsEmbed/ex/MeetingsEmbedCode.js"></script>
    </div>
    <p
      class="text-white/60 text-center mt-8"><?= sprintf(__('For more information you can write to %spartnership@tailoor.com%s', 'sage'), '<a href="mailto:partnership@tailoor.com" class="underline underline-offset-2 hover:text-white duration-300">', '</a>') ?></p>
  </div>

@endsection
