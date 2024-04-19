<div class="text-lg subpixel tracking-wide font-header">
  <div
    class="relative flex items-center justify-center mt-2 lg:mt-20 scroll-mt-48 mb-32 min-h-[66vh]"
    id="request_demo">
    <div
      class="absolute top-0 left-0 h-full w-full mix-blend-lighten opacity-20">{!! wp_get_attachment_image(1974, 'full',false , ['alt'=>'Tailoor background', 'class'=>'object-cover w-full h-auto']) !!}</div>
    <div class="text-center container relative">
      <h1 class="text-4xl text-white uppercase mb-6"><?= __('What is Tailoor', 'sage') ?><span
          class="text-rose-200">?</span></h1>
      <p><?= __('Tailoor is the partner that allows you to sell your customized products by integrating an innovative 3D
        configurator into your website or e-commerce platform. We help grow your business and boost sales through
        technology support, harnessing the capabilities of= real-time 3D configuration.', 'sage') ?></p>
      <x-form-cta class="mt-12"/>
    </div>
  </div>
  <div class="my-32 container">
    {!! wp_get_attachment_image(1916, 'full', false , ['alt' => __('Tailoor preview screenshots','sage'), 'class'=> 'mx-auto']) !!}
  </div>
  <div class="my-32 boxed text-center wysiwyg scroll-mt-48" id="tailoor">
    <h2 class="uppercase text-4xl mb-12 text-white"><?= __('What is Tailoor', 'sage') ?><span
        class="text-rose-200">?</span>
    </h2>
    <div class="max-w-5xl mx-auto">
      <p><?= __('Tailoor is a platform that leverages 3D technology and artificial intelligence to provide innovative
        solutions for customization in the retail market.', 'sage') ?></p>
      <p><?= __('It can be easily integrated into your website or e-commerce, regardless of the platform you use. In case you
        do not have an online storefront for your business yet, we will assist you in creating one.', 'sage') ?></p>
      <p><?= __('Our goal is to help you ensure a unique and
        sustainable shopping experience for your customers, allowing them
        to customize your Made to Order and Made to Measure products online.', 'sage') ?></p>
      <p><?= __('With the 3D configurator, your customers will have access to an experience that combines physical and virtual
        elements: even if they start their configuration online, they will always have the option to visit your
        store to finalize the purchase and examine the details together.', 'sage') ?></p>
    </div>
  </div>
  <div class="py-32 scroll-mt-48 bg-gradient-to-b from-mirage to-slate-800" id="come_funziona">
    <div class="container">
      <h2 class="uppercase text-4xl mb-12 text-center text-white"><?= __('How does it work', 'sage') ?><span
          class="text-rose-200">?</span>
      </h2>
      <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($features as $index => $feature)
          <li class="border-4 border-white rounded-[2rem] px-6 py-8">
            <p class="text-4xl"><span><?= $index + 1 ?></span><span class="text-rose-200 text-6xl">.</span></p>
            <p class="text-base mt-8 leading-tight"><?= $feature ?></p>
          </li>
        @endforeach
      </ul>
    </div>
  </div>
  <div class="py-40 text-center bg-slate-800">
    <div class="boxed">
      <p class="uppercase text-2xl mb-8 text-white">{!! __('Request now your <span
          class="text-rose-200 font-bold">free demo</span><br>and make your business grow!', 'sage') !!}</p>
      <x-form-cta class="mt-12"/>
    </div>
  </div>
  <div class="py-20 relative scroll-mt-48 bg-gradient-to-b from-slate-800 to-mirage" id="integrazioni">
    <div
      class="hidden lg:block absolute top-0 left-0  w-1/2 h-full bg-[url('https://tailoor.com/wp-content/uploads/2024/04/tailoor_supported.png')] bg-no-repeat bg-right bg-contain"></div>
    <div class="container grid lg:grid-cols-2 gap-x-52 items-center">
      <div>
      </div>
      <div class="text-center lg:text-right">
        <h2 class="uppercase text-4xl mb-12 text-white">{!! __('How can I<br>integrate Tailoor', 'sage') !!}<span
            class="text-rose-200">?</span></h2>
        <p><?= __('Tailoor is an open API platform. This means that it can be easily integrated into any existing e-commerce
          seamlessly, fitting perfectly with what is already in place without requiring any manual intervention on
          your part. Alternatively, if you do not have an e-commerce yet, we will build it together. Don\'t worry –
          we will provide you with complete support for the integration process.', 'sage') ?></p>
      </div>
    </div>
  </div>
  <div class="container my-32 scroll-mt-48" id="attivazione" x-data="steps('<?=$steps?>')">
    <p
      class="text-center text-3xl text-white uppercase mb-12"><?= __('What happens after I have filled out the form', 'sage') ?>
      <span
        class="text-rose-200">?</span></p>
    <!--    STEP MOBILE-->
    <ul class="flex lg:hidden flex-col gap-16">
      <template :key="index" x-for="(content, index) in contents">
        <li class="">
          <div x-on:click="selected = index"
               class="flex justify-start items-center gap-x-6 group cursor-pointer lg:hidden max-w-lg mx-auto">
            <div :class="{'bg-rose-200':selected === index, 'bg-white':selected !== index}"
                 class="h-20 w-20 rounded-full flex items-center justify-center duration-500 group-hover:bg-rose-100"
            >
              <p class="text-3xl text-mirage" x-text="index+1"></p>
            </div>
            <p :class="{'text-rose-200':selected === index, 'text-white':selected !== index}"
               class="duration-500 group-hover:text-rose-100 uppercase"
               x-text="content.step"
            ></p>
          </div>
          <div class="max-w-lg mx-auto lg:text-center mt-10 lg:mt-0" x-show="index === selected" x-collapse>
            <p class="text-3xl uppercase" x-text="content.title"></p>
            <p class="mt-6" x-text="content.description"></p>
          </div>
        </li>
      </template>
    </ul>
    <!--    STEP DESKTOP-->
    <ul class="hidden lg:flex justify-center gap-x-6 items-center mb-12">
      <template :key="index" x-for="(content, index) in contents">
        <li class="flex justify-center items-center gap-x-6">
          <template x-if="index !== 0">
            <div :class="{
                        'from-white to-rose-200' : index - 1 === selected,
                        'to-white from-rose-200' : index === selected,
                        'from-white to-white': index - 1 !== selected && index !== selected
                    }"
                 class="w-12 h-[2px] duration-500 bg-gradient-to-l"
            >
            </div>
          </template>
          <div x-on:click="selected = index"
               class="flex justify-center items-center gap-x-6 group cursor-pointer"
          >
            <div :class="{'bg-rose-200':selected === index, 'bg-white':selected !== index}"
                 class="h-20 w-20 rounded-full flex items-center justify-center duration-500 group-hover:bg-rose-100"
            >
              <p class="text-3xl text-mirage" x-text="index+1"
              ></p>
            </div>
            <p :class="{'text-rose-200':selected === index, 'text-white':selected !== index}"
               class="duration-500 group-hover:text-rose-100 uppercase"
               x-text="content.step"
            ></p>
          </div>
        </li>
      </template>
    </ul>
    <ul class="hidden lg:flex flex-col gap-16">
      <template :key="index" x-for="(content, index) in contents">
        <li class="" x-show="index === selected ">
          <div class="max-w-lg mx-auto lg:text-center mt-10 lg:mt-0">
            <p class="text-3xl uppercase" x-text="content.title"></p>
            <p class="mt-6" x-text="content.description"></p>
          </div>
        </li>
      </template>
    </ul

  </div>
  <div class=" mt-32 pb-32 scroll-mt-48 bg-gradient-to-b from-transparent to-slate-800" id="faq">
    <div class="container">
      <h2 class="uppercase text-4xl mb-12 text-white text-center">Faq<span
          class="text-rose-200 text-5xl">.</span></h2>
      @foreach($faqs as $index => $contents)
        <x-faq :question="$contents['question']" :answer="$contents['answer']" :starts-open="$index === 0"/>
      @endforeach
    </div>
  </div>

  <div class="py-40 text-center bg-gradient-to-b from-slate-800 to-mirage">
    <div class="container">
      <p class="uppercase text-2xl mb-8 text-white">{!! __('Request now your <span
          class="text-rose-200 font-bold">free demo</span><br>and make your business grow!', 'sage') !!}</p>
      <x-form-cta class="mt-12"/>
    </div>

  </div>
