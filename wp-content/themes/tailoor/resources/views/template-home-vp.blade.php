<?php //Template Name: Home page New VP
$codeSnippets = [
  'javascript' => "
const requestOptions = {
  method: \"GET\",
  redirect: \"follow\"
};

fetch(\"https://api.tailoor.com/example\", requestOptions)
   .then((response) => response.text())
   .then((result) => console.log(result))
   .catch((error) => console.error(error));",
  'php' => "
\$client = new Client();
\$request = new Request('GET', 'https://api.tailoor.com/example');
\$res = \$client->sendAsync(\$request)->wait();
echo \$res->getBody();
",
  'c#' => "
var client = new HttpClient();
var request = new HttpRequestMessage(
   HttpMethod.Get, \"https://api.tailoor.com/example\"
);
var response = await client.SendAsync(request);
response.EnsureSuccessStatusCode();
Console.WriteLine(await response.Content.ReadAsStringAsync());
"
];
?>
@extends('layouts.new_home')
@section('footerWrapper.class', 'gradient')
@section('content')
  <section id="tailoor" aria-labelledby="pageTitle" class="mb-48 mt-32">
    <div class="container relative">
      <h1
        class="text-3xl sm:text-6xl !leading-tight text-center font-medium">
        <?= __('Make <span class="font-serif italic">personalization</span> easy', 'sage') ?><span
          class="text-pink">.</span><br>
        <?= __('Watch your sales grow', 'sage') ?><span class="text-pink">.</span>
      </h1>
      <p
        class="text-center max-w-5xl text-white/70 mx-auto mt-10"><?= __('Enable your customers to personalize your items thanks to our innovative 3D configurator powered by AI. Promote a <span class="font-serif italic whitespace-nowrap">made to order</span> and customized approach. Say goodbye to returns and warehouse problems.', 'sage') ?></p>
      <div x-data="{}" class="mt-20 text-center">
        <x-form-cta/>
        <div class="mx-auto mt-32 overflow-hidden relative rounded-3xl">
          <div class="relative group cursor-pointer"
               x-on:click="$dispatch('request-modal', {modalName: 'watch__video'})">
            <div
              class="bg-rose-200/30 blur-3xl w-[95%] h-full absolute top-0 left-1/2 -translate-x-1/2 rounded-full translate-y-2/3 group-hover:translate-y-[80%] duration-500"></div>
            <img src="https://dev.tailoor.com/wp-content/uploads/2024/04/calendar.png" alt="Tailoor Dashboard"
                 class="w-2/3 h-auto mx-auto relative translate-y-20 group-hover:translate-y-0 duration-200">
            <div
              class="absolute top-1/2 left-1/2 h-14 w-14 -translate-y-1/2 -translate-x-1/2 group-hover:opacity-75 duration-500">
              <div class="bg-mirage absolute top-0 left-0 w-full h-full animate-ping-custom rounded-full">
              </div>
              <i
                class="fa-solid fa-circle-play text-mirage absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-7xl bg-white rounded-full"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="container-xl relative">
    <div class="absolute h-full w-1/3 bg-gradient-to-r from-mirage to-transparent top-0 left-0 z-10"></div>
    <div class="absolute h-full w-1/3 bg-gradient-to-l from-mirage to-transparent top-0 right-0 z-10"></div>
    <x-clients-carousel class="bg-mirage mb-48" :add-padding="false"/>
  </div>
  <section class="container my-48">
    <h2
      class="font-medium text-3xl max-w-4xl mx-auto !leading-normal text-center mb-24"><?= sprintf(__('What products do you want your customers to customize? We\'ve got you %scovered%s.', 'sage'), '<span class="font-serif italic">', '</span>') ?></h2>
    <div class="grid grid-cols-3 items-center gap-32r">
      <div>
        <h3 class="font-medium text-xl mb-2 mt-12 first:mt-0">For every kind of products</h3>
        <p
          class="font-sans text-white/70"><?= __('Whatever product categories you manage, your clients will be able to quickly find the items, experiencing the customizations that most interest them.', 'sage') ?></p>
        <h3 class="font-medium text-xl mb-2 mt-12 first:mt-0">No hidden storage</h3>
        <p
          class="font-sans text-white/70"><?= __('No more hidden shelves or storage, no rifling through disorganized displays, or overwhelming arrangements.', 'sage') ?></p>
        <h3 class="font-medium text-xl mb-2 mt-12 first:mt-0">Encourage creativity</h3>
        <p
          class="font-sans text-white/70"><?= __('Simplify their evaluation and selection process, encouraging the creation of thousands of different configurations.', 'sage') ?></p>
      </div>
      <div class="col-span-2 overflow-hidden">
        <img src="https://dev.tailoor.com/wp-content/uploads/2024/04/calendar.png" alt="Tailoor Platform"
             class="w-full h-auto">
      </div>
    </div>
  </section>
  <div class="container my-48 relative grid grid-cols-2 gap-32 items-center">
    <div>
      <p class="text-xs text-amber-500 font-mono flex items-center gap-4 font-medium"><i class="fa-solid fa-code"></i>Developers
      </p>
      <h2
        class="font-medium text-3xl max-w-4xl mx-auto !leading-normal mb-6 relative"><?= sprintf(__('Get %sthe best%s out of your time.', 'sage'), '<span class="font-serif italic">', '</span>') ?></h2>
      <div class="max-w-4xl mx-auto relative">
        <p
          class="mb-2 text-white/70">{{__('The 3D configurator, as an open API platform, can be easily integrated into any e-commerce and/or website, and in-store as well, supporting your sales assistants.', 'sage')}}</p>
        <p
          class="text-white/70">{{__('You won\'t have to waste time or commitment: we\'ll take care of everything. We\'ll render your items, fabrics, materials and details in 3D, making the virtual experience faithful to the real one.',  'sage')}}</p>
      </div>

    </div>
    <div class="max-w-4xl mx-auto">
      <x-code-showcase :code-snippets="$codeSnippets"/>
    </div>
    <div class="col-span-2">
      <?= wp_get_attachment_image(1993, 'full', false, ['alt' => 'Tailoor showcase', 'class' => 'relative w-full h-auto object-contains mx-auto invert mix-blend-screen']) ?>
    </div>
  </div>
  <x-modal :visible="false" :name="'watch__video'" :title="__('Discover Tailoor', 'sage')">
    @if(GDPR()->marketing())
      <iframe title="vimeo-player" src="https://player.vimeo.com/video/862001692?h=23b06a6727" width="640"
              height="360"
              frameborder="0" allowfullscreen class="w-full h-auto aspect-video"></iframe>
    @else
      <div class="aspect-video w-full h-auto bg-mirage p-6 text-white flex justify-center items-center">
        <div>
          <p><?= __('The video embed has been removed to honor your cookie settings.', 'sage') ?></p>
          <div class="mt-12 flex gap-4 items-center">
            <a href="#"
               class="py-2 px-4 bg-rose-200 text-mirage uppercase inline-block text-sm iubenda-cs-preferences-link"
               title="Privacy Policy "><?= __('Update GDPR Settings', 'sage') ?></a>
              <?= __('or', 'sage') ?> <a href="#" x-on:click.prevent="visible = false"
                                         class="underline"><?= __('close', 'sage') ?></a>
          </div>
        </div>
      </div>
    @endif
  </x-modal>

@endsection
