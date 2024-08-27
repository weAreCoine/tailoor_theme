<?php //Template Name: Home page New VP
$codeSnippets = [
  'go' => "
func main() {

  url := \"https://api.tailoor.com/example\"
method := \"POST\"
  payload := strings.NewReader(`[
     {
       \"code\": 2000010526697,
       \"discount\": 20
     }
  ]`)
  client := &http.Client {
}
req, err := http.NewRequest(method, url, payload)
  if err != nil {
    fmt.Println(err)
    return
  }
res, err := client.Do(req)
  if err != nil {
    fmt.Println(err)
    return
  }
defer res.Body.Close()
  body, err := ioutil.ReadAll(res.Body)
  if err != nil {
    fmt.Println(err)
    return
  }
  fmt.Println(string(body))
}
",

  'javascript' => "
const requestOptions = {
  method: \"GET\",
  redirect: \"follow\"
};

fetch(\"https://api.tailoor.com/example\", requestOptions)
   .then((response) => response.text())
   .then((result) => console.log(result))
   .catch((error) => console.error(error));",];
?>
@extends('layouts.new_home')
@section('footerWrapper.class', 'gradient')
@section('content')
  <section id="tailoor" aria-labelledby="pageTitle" class="mb-48 mt-32 relative">
    <div class="container relative">
      <h1
        id="pageTitle"
        class="text-3xl sm:text-6xl !leading-tight text-center font-medium">
        <?= sprintf(__('Make %spersonalization%s easy', 'sage'), '<span class="font-serif italic">', '</span>') ?><span
          class="text-pink">.</span><br>
        <?= sprintf(__('Watch your %ssales%s grow', 'sage'), '<span class="font-serif italic">', '</span>') ?><span
          class="text-pink">.</span>
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
            <img src="https://placehold.co/850x600?text=Frame+del+video+(1.4:1)" alt="Tailoor Dashboard"
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
  <div class="bg-gradient-to-b from-mirage to-mirage-900">
    <section class="container mt-64">
      <p class="text-xs justify-center text-sky-300 font-mono flex items-center gap-4 font-medium mb-1"><i
          class="fa-solid fa-shuffle"></i>{{__('Flexibility','sage')}}
      </p>
      <h2
        class="font-medium text-3xl max-w-4xl mx-auto !leading-normal text-center mb-24"><?= sprintf(__('What products do you want your customers to customize? We\'ve got you %scovered%s.', 'sage'), '<span class="font-serif italic">', '</span>') ?></h2>
      <div class="grid grid-cols-3 items-center gap-32">
        <div>
          <h3 class="font-medium text-xl mb-2 mt-12 first:mt-0"><?= __('For every kind of products', 'sage') ?></h3>
          <p
            class="font-sans text-white/70"><?= __('Whatever product categories you manage, your clients will be able to quickly find the items, experiencing the customizations that most interest them.', 'sage') ?></p>
          <h3 class="font-medium text-xl mb-2 mt-12 first:mt-0"><?= __('No Hidden Storage', 'sage') ?></h3>
          <p
            class="font-sans text-white/70"><?= __('No more hidden shelves or storage, no rifling through disorganized displays, or overwhelming arrangements.', 'sage') ?></p>
          <h3 class="font-medium text-xl mb-2 mt-12 first:mt-0"><?= __('Encourage Creativity', 'sage') ?></h3>
          <p
            class="font-sans text-white/70"><?= __('Simplify their evaluation and selection process, encouraging the creation of thousands of different configurations.', 'sage') ?></p>
          <h3 class="font-medium text-xl mb-2 mt-12 first:mt-0"><?= __('Enhance Engagement', 'sage') ?></h3>
          <p
            class="font-sans text-white/70"><?= __('Enhance customer engagement by offering a complete, interactive shopping experience online and in-store, allowing customers to configure products independently from their smartphone or PC in a few simple steps.', 'sage') ?></p>
        </div>
        <div class="col-span-2 overflow-hidden">
          <img src="https://placehold.co/800x800?text=Esprimere+la+versatilità+di+Tailoor+(1:1)"
               alt="Tailoor Platform"
               class="w-full h-auto">
        </div>
      </div>
    </section>
  </div>
  <div class="bg-gradient-to-b from-mirage-900 to-mirage">
    <div class="container py-48 relative grid grid-cols-2 gap-32 items-center ">
      <div>
        <p class="text-xs text-amber-500 font-mono flex items-center gap-4 font-medium mb-1"><i
            class="fa-solid fa-code"></i>{{__('Developers', 'sage')}}
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
      <div class="col-span-2 text-center">
        <?= wp_get_attachment_image(1993, 'full', false, ['alt' => 'Tailoor showcase', 'class' => 'relative w-full h-auto object-contains mx-auto invert mix-blend-screen']) ?>
        <x-form-cta class="mt-16"/>
      </div>
    </div>
  </div>
  <section id="phygital" class="mb-48 flex items-center">
    <div class="container text-center">
      <p class="text-xs justify-center text-emerald-400 font-mono flex items-center gap-4 font-medium mb-1"><i
          class="fa-solid fa-shuffle"></i>{{__('Easiness', 'sage')}}
      </p>

      <h2
        class="font-medium text-3xl max-w-4xl mx-auto !leading-normal mb-6 relative"><?= sprintf(__('How does it %swork%s?', 'sage'), '<span class="font-serif italic">', '</span>') ?></h2>
      <p
        class="text-white/60 max-w-3xl mx-auto"><?= __('Build customer loyalty by offering your clients the opportunity to have a complete and interactive shopping experience, both online and in-store. They can configure their own products independently from their smartphone or PC in just a few simple steps.', 'sage') ?></p>
      <x-vertical-tabs
        :labels="apply_filters('get_home_tabs_labels', [])"
        :tabs-content="apply_filters('get_home_tabs_contents', [])"
      />
    </div>
  </section>
  <section class="container my-48">
    <p class="text-xs justify-center text-purple-300 font-mono flex items-center gap-4 font-medium mb-1"><i
        class="fa-solid fa-layer-group"></i>{{__('Features','sage')}}
    </p>
    <h2
      class="font-medium text-3xl max-w-4xl mx-auto !leading-normal text-center"><?= sprintf(__('%sWhat\'s in it%s for me?', 'sage'), '<span class="font-serif italic">', '</span>') ?></h2>
    <p
      class="text-white/60 text-center mb-24">{{__('Just in case you\'re wondering, we\'ve got a quick list for you.','sage')}}</p>
    <div class="grid grid-cols-3 items-center gap-32">
      <div class="col-span-2 overflow-hidden h-full">
        <img src="https://placehold.co/800x800?text=Esprimere+la+diversità+rispetto+ai+competitor+(1:1)"
             alt="Tailoor Platform"
             class="h-full w-auto object-cover">
      </div>

      <div>
        <h3 class="font-medium text-xl mb-2 mt-12 first:mt-0">{{__('Sales Performance', 'sage')}}</h3>
        <p
          class="font-sans text-white/70"><?= __('Increase your sales performance, thanks to the creation of a new revenue stream.', 'sage') ?></p>
        <h3 class="font-medium text-xl mb-2 mt-12 first:mt-0">{{__('Costs Reduction', 'sage')}}</h3>
        <p
          class="font-sans text-white/70"><?= __('Reduce your costs, by producing only what gets sold and eliminating the problems of inventory and returns.', 'sage') ?></p>
        <h3 class="font-medium text-xl mb-2 mt-12 first:mt-0">{{__('Distinguish from Competitors', 'sage')}}</h3>
        <p
          class="font-sans text-white/70"><?= __('Step into innovation and distinguish your offer from the one of your competitors. Gain a competitive advantage and earn your customers\' trust.', 'sage') ?></p>
        <h3 class="font-medium text-xl mb-2 mt-12 first:mt-0">{{__('Customer Dashboard', 'sage')}}</h3>
        <p
          class="font-sans text-white/70"><?= __('Collect all of your data in a single hub. The already integrated Customer Dashboard allows you to always be on track with every insight, so that you can easily manage your sales and marketing strategies.', 'sage') ?></p>
      </div>
    </div>
  </section>
  <div class="container my-48 grid grid-cols-2 gap-16">
    <div class="border border-white/10 rounded p-12 bg-white/5">
      <p class="text-xs  text-green-500 font-mono flex items-center gap-4 font-medium mb-1"><i
          class="fa-solid fa-ruler"></i>{{__('Measure','sage')}}
      </p>
      <h2
        class="font-medium text-3xl max-w-4xl mx-auto !leading-normal "><?= sprintf(__('Guarantee your clients %sthe right measurements%s and dimensions.', 'sage'), '<span class="font-serif italic">', '</span>') ?></h2>
      <p
        class="text-white/60  max-w-2xl mx-auto mt-4">{{__('Worried about how your customers will be able to identify their anatomical measurments or the dimensions of a physical space? You don\'t have the worry: our technology includes an AI-powered application that, thanks to a few shots, allows to take precise measures.','sage')}}</p>

    </div>
    <div class="border border-white/10 rounded p-12 bg-white/5">
      <p class="text-xs  text-orange-400 font-mono flex items-center gap-4 font-medium mb-1"><i
          class="fa-solid fa-chart-line"></i>{{__('Track','sage')}}
      </p>
      <h2
        class="font-medium text-3xl max-w-4xl mx-auto !leading-normal "><?= sprintf(__('%sNo more loss of data%s. Get the best out of your analytics.', 'sage'), '<span class="font-serif italic">', '</span>') ?></h2>
      <p
        class="text-white/60  max-w-2xl mx-auto mt-4">{{__('The Customer Dashboard helps you manage your stores and client appointments. It gathers all client data and orders, allowing for better business management. You can see which products are selling the most, spot sales trends, adjust prices, and improve your sales and marketing strategies. This also helps you reduce waste by sourcing raw materials more efficiently.','sage')}}</p>

    </div>

  </div>
  <div class="text-center">
    <x-form-cta/>
  </div>
  <div class="container my-48 ">
    <div class="mx-auto mt-32 overflow-hidden relative rounded-3xl">
      <div class="relative group">
        <div
          class="bg-fuchsia-300/30 blur-3xl w-[95%] h-full absolute top-0 left-1/2 -translate-x-1/2 rounded-full translate-y-2/3 group-hover:translate-y-[80%] duration-500"></div>
        <img src="https://placehold.co/1600x900?text=Transizione+di+un+prodotto+da+reale+a+digitale+(16:9)"
             alt="Tailoor Dashboard"
             class="w-2/3 h-auto mx-auto relative">
      </div>
    </div>
    <p class="text-xs justify-center text-fuchsia-300 font-mono flex items-center gap-4 font-medium mb-1 mt-12"><i
        class="fa-solid fa-qrcode"></i>{{__('Phygital','sage')}}
    </p>
    <h2
      class="font-medium text-3xl max-w-4xl mx-auto !leading-normal text-center"><?= sprintf(__('%sBridge the gap%s between online and offline', 'sage'), '<span class="font-serif italic">', '</span>') ?></h2>
    <p
      class="text-white/60 text-center max-w-2xl mx-auto mb-24 mt-4">{{__('Make your products real with Tailoor: customers can configure and visualize them in a realistic virtual environment of their choice.','sage')}}</p>

    <div class="grid grid-cols-2 gap-32 text-center max-w-4xl mx-auto">
      <div class="">
        <i class="fa-solid text-2xl mb-6 text-white/80 fa-user-tie"></i>
        <p class="font-bold text-white/80 mb-2">{{__('Virtual Tailor')}}</p>
        <p
          class="text-sm text-white/60">{{__('Integrate our "AI-powered Virtual Tailor" feature to enable customer chat support for product configuration.','sage')}}</p>
      </div>
      <div class="">
        <i class="fa-solid text-2xl mb-6 text-white/80 fa-user-group"></i>
        <p class="font-bold text-white/80 mb-2">{{__('Digital Twin')}}</p>
        <p
          class="text-sm text-white/60">{{__('Incorporate a generative AI-powered digital twin into your products through NFC technology for interactive customer engagement and valuable data generation.','sage')}}</p>
      </div>
    </div>
  </div>
  <section class="bg-gradient-to-b from-mirage to-mirage-900">
    <div class="container grid xl:grid-cols-3 text-white gap-8 py-32">
      <div class="py-12 relative">
        <h2
          class="text-3xl mb-4"><?= sprintf(__('Frequently Asked%s%sQuestions%s', 'sage'), '<br>', '<span class="font-serif italic">', '</span>') ?></h2>
        <p class="text-white/60 mb-16"><?= __('Haven\'t found what you were looking for?', 'sage') ?></p>
        <?= wp_get_attachment_image(2021, 'full', false, ['alt' => 'Tailoor decoration', 'class' => 'absolute top-0 translate-y-full']) ?>
      </div>
      <div class="xl:col-span-2">
        <div>
          <?php foreach (\App\Services\FaqService::generalFaqs() as $key => $value) : ?>
          <x-faq :question="$value['question']" :answer="$value['answer']" :starts-open="$key === 0"/>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <x-modal :visible="false" :name="'watch__video'" :title="__('Discover Tailoor', 'sage')">
    @if(GDPR()->marketing())
      <iframe title="vimeo-player" src="https://player.vimeo.com/video/862001692?h=23b06a6727" width="640"
              height="360"
              frameborder="0" allowfullscreen class="w-full h-auto aspect-video"></iframe>
    @else
      <div class="aspect-video w-full h-auto bg-mirage p-6 text-white flex justify-center items-center">
        <div>
          <p>The video embed has been removed to honor your cookie settings . ', 'sage</p>
          <div class="mt-12 flex gap-4 items-center">
            <a href="#"
               class="py-2 px-4 bg-rose-200 text-mirage uppercase inline-block text-sm iubenda-cs-preferences-link"
               title="Privacy Policy ">Update GDPR Settings', 'sage</a>
            or ', 'sage<a href="#" x-on:click.prevent="visible = false"
                          class="underline">close', 'sage</a>
          </div>
        </div>
      </div>
    @endif
  </x-modal>

@endsection
