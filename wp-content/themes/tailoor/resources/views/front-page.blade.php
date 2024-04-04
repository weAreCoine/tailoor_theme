@extends('layouts.home')
@php($fields = get_fields())
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollToPlugin.min.js"></script>
@endsection

@section('content')
  <div id="home-one-page">
    <section class="tlr tlr-head" id="tlr-head">
      <div class="tlr-container">
        <div class="text-part">
          <h1><?php echo $fields['section_1']['intestazione'] ?><span class="punto">.</span></h1>
          <p><?php echo $fields['section_1']['paragrafo'] ?></p>
          <a class="btn-tlr watch_video"><?php echo $fields['section_1']['link']['title'] ?></a>
        </div>
        <canvas id="main"></canvas>
      </div>
      <div></div>
      <video autoplay muted loop id="video-slider">
        <source src="{{asset('images/test_scarpe.mp4')}}" type="video/mp4">
      </video>
    </section>
    <section id="prod-scroll" class="tlr prod-scroll">
      <div class="bg-redmid"></div>
      <h2><?php echo $fields['section_2']['intestazione'] ?><span class="punto">.</span></h2>
      <div class="cont-prod">
        <div class="tlr-container">
          <div id="swipe-single-desk">
            <div id='tlr-single-desk'></div>
          </div>

          <div id="swipe-desk-products">
            <div id='tlr-desk'></div>
          </div>
          <div class="text-desc">
            <p><?php echo $fields['section_2']['paragrafo'] ?></p>
            <a class="btn-tlr demo_request"><?php echo $fields['section_2']['link']['title'] ?></a>
          </div>
        </div>
        <!--<div class="bg-prod"></div>-->
      </div>

    </section>

    <section id="block3" class="block3 tlr">
      <div class="wrap-block3">
        <div class="block3-1"></div>
        <div class="block3-2"></div>
        <div class="block3-3"></div>
        <div class="left-text tlr-container">
          <h2><?php echo $fields['section_3']['left_part']['intestazione'] ?><span class="punto">.</span></h2>
          <p><?php echo $fields['section_3']['left_part']['paragrafo'] ?></p>
          <a class="btn-tlr demo_request"><?php echo $fields['section_3']['left_part']['link']['title'] ?></a>

          @if(wp_is_mobile())
            <img src="{{asset('images/blocco-3/layer_1_mobile.png')}}" alt="" style="margin-top:30px;">
          @endif
        </div>
        <div class="right-text tlr-container">
          <h2><?php echo $fields['section_3']['right_part']['intestazione'] ?><span class="punto">.</span></h2>
          <p><?php echo $fields['section_3']['right_part']['paragrafo'] ?></p>
          <a class="btn-tlr demo_request"><?php echo $fields['section_3']['right_part']['link']['title'] ?></a>
          @if(wp_is_mobile())
            <img src="{{asset('images/blocco-3/layer_2_mobile.png')}}" alt="" style="margin-top:30px;">
          @endif
        </div>
      </div>
      <div id='make-phygital' class="foot-text tlr-container">
        <h2><?php echo $fields['section_3']['bottom_part']['intestazione'] ?><span class="punto">.</span></h2>
        <h4><?php echo $fields['section_3']['bottom_part']['intestazione_2'] ?></h4>
        <p><?php echo $fields['section_3']['bottom_part']['paragrafo'] ?></p>
      </div>
    </section>

    <section id="block4" class="block4 tlr on-demand-block">
      <div class="tlr-container wrap">
        <div class="left-part">
          <div class="block-left-text  on-demand content-1">
            <h2><?php echo $fields['section_4']['left_part']['slide_1']['intestazione'] ?><span class="punto">.</span>
            </h2>
            <p><?php echo $fields['section_4']['left_part']['slide_1']['paragrafo'] ?></p>
            <a
              class="btn-tlr black watch_video"><?php echo $fields['section_4']['left_part']['slide_1']['link']['title'] ?></a>
          </div>
          <div class="block-left-text  on-demand content-2">
            <h2><?php echo $fields['section_4']['left_part']['slide_2']['intestazione'] ?><span class="punto">.</span>
            </h2>
            <p><?php echo $fields['section_4']['left_part']['slide_2']['paragrafo'] ?></p>
            <a
              class="btn-tlr black watch_video"><?php echo $fields['section_4']['left_part']['slide_2']['link']['title'] ?></a>
          </div>
          <div class="block-left-text  on-demand content-3">
            <h2><?php echo $fields['section_4']['left_part']['slide_3']['intestazione'] ?><span class="punto">.</span>
            </h2>
            <p><?php echo $fields['section_4']['left_part']['slide_3']['paragrafo'] ?></p>
            <a
              class="btn-tlr black watch_video"><?php echo $fields['section_4']['left_part']['slide_3']['link']['title'] ?></a>
          </div>
          <div class="block-left-text  on-demand content-4">
            <h2><?php echo $fields['section_4']['left_part']['slide_4']['intestazione'] ?><span class="punto">.</span>
            </h2>
            <p><?php echo $fields['section_4']['left_part']['slide_4']['paragrafo'] ?></p>
            <a
              class="btn-tlr black watch_video"><?php echo $fields['section_4']['left_part']['slide_4']['link']['title'] ?></a>
          </div>
        </div>
        <div class="center-part">
          <div class="center-image on-demand content-1">
            <img src="{{asset('images/blocco-4/ipad_configuratore.jpg')}}"/>
          </div>
          <div class="center-image on-demand content-2">
            <img src="{{asset('images/blocco-4/ipad_materiale.jpg')}}"/>
          </div>
          <div class="center-image on-demand content-3">
            <img src="{{asset('images/blocco-4/modello.jpg')}}">
          </div>
          <div class="center-image on-demand content-4">
            <img src="{{asset('images/blocco-4/riepilogo.jpg')}}"/>
          </div>
        </div>
        <div class="right-part">
          <div data-target="content-1" class="block-right-text content-1 active">
            <h3><?php echo $fields['section_4']['right_part']['slide_1']['intestazione'] ?></h3>
          </div>
          <div data-target="content-2" class="block-right-text content-2">
            <h3><?php echo $fields['section_4']['right_part']['slide_2']['intestazione'] ?></h3>
          </div>
          <div data-target="content-3" class="block-right-text content-3">
            <h3><?php echo $fields['section_4']['right_part']['slide_3']['intestazione'] ?></h3>
          </div>
          <div data-target="content-4" class="block-right-text content-4">
            <h3><?php echo $fields['section_4']['right_part']['slide_4']['intestazione'] ?></h3>
          </div>
        </div>
      </div>
    </section>

    <section id="block5" class="block5 tlr txt-white">
      <div class="tlr-container wrap">
        <div class="text-part">
          <h2><?php echo $fields['section_5']['intestazione'] ?><span class="punto">.</span></h2>
          <p><?php echo $fields['section_5']['paragrafo'] ?></p>
          <a class="btn-tlr demo_request"><?php echo $fields['section_5']['link']['title'] ?></a>
        </div>
        <div></div>
      </div>
      <div class="layer-1" style="background-image: url({{asset('images/blocco-5/Layer_1.png')}});">

      </div>
      <div class="layer-2" style="background-image: url({{asset('images/blocco-5/Layer_2.png')}};">

      </div>
      <div class="layer-3" style="background-image: url({{asset('images/blocco-5/Layer_3.png')}};">

      </div>
    </section>

    <section id="block6" class="block6 tlr txt-white">
      <div class="tlr-container wrap">
        <div class="left-block text-part">
          <h2><?php echo $fields['section_6']['left_part']['intestazione'] ?><span class="punto">.</span></h2>
          <p><?php echo $fields['section_6']['left_part']['paragrafo'] ?></p>
          <a class="btn-tlr demo_request"><?php echo $fields['section_6']['left_part']['link']['title'] ?></a>
          <div class="man-out">
            <img src="{{asset('images/blocco-6/layer_3.png')}}"/>
          </div>
        </div>
        <div class="right-block text-part">
          <?php
          if ( wp_is_mobile() ){ ?>
          <img src="<?php echo $template_path."img/blocco-6/layer_2.png"; ?>"/>
          <?php } ?>
        </div>
        <div class="macchia">
          <img src="{{asset('images/blocco-6/layer_1.png')}}"/>
        </div>
        <div class="spiral">
          <img src="{{asset('images/blocco-6/layer_4.png')}}"/>
        </div>
      </div>

    </section>

    <section id="block7" class="block7 tlr txt-white">
      <div class="tlr-container wrap">
        <div class="center-block text-part">
          <h2 class="txt-center"><?php echo $fields['section_7']['top_part']['intestazione'] ?><span
              class="punto">.</span></h2>
          <p class="txt-center"><?php echo $fields['section_7']['top_part']['paragrafo'] ?></p>
        </div>

        <div class="tlr-elements">
          <div class="left-block text-part">
            <h2><?php echo $fields['section_7']['left_part']['intestazione'] ?><span class="punto">.</span></h2>
            <p><?php echo $fields['section_7']['left_part']['paragrafo'] ?></p>
            <a class="btn-tlr demo_request"><?php echo $fields['section_7']['left_part']['link']['title'] ?></a>
            <img src="{{asset('images/blocco-7/layer_4.jpg')}}"/>
          </div>

          <div class="right-block text-part">
            <h2 class="txt-right"><?php echo $fields['section_7']['right_part']['intestazione'] ?><span
                class="punto">.</span></h2>
            <p class="txt-right"><?php echo $fields['section_7']['right_part']['paragrafo'] ?></p>
            <a class="btn-tlr demo_request"
               class="txt-right"><?php echo $fields['section_7']['right_part']['link']['title'] ?></a>
          </div>

        </div>
      </div>
      <div class="last_elem tlr-container">
      </div>
    </section>

    <section id="block8" class="block8 tlr txt-white">
      <div class="tlr-container wrap">
        <div class="elem-bef"></div>
        <?php
        if ( wp_is_mobile() ) {
          echo "<img src='" . $template_path . "img/blocco-8/m_layer_1.png' />";
        }
        ?>
        <div class="left-block text-part">
          <h2><?php echo $fields['section_8']['intestazione'] ?><span class="punto">.</span></h2>
          <p><?php echo $fields['section_8']['paragrafo'] ?></p>
          <a class="btn-tlr dark demo_request"><?php echo $fields['section_8']['link']['title'] ?></a>
        </div>
      </div>
    </section>

    <section id="block9" class="block9 tlr flex-center">
      <h2><?php echo $fields['section_9']['intestazione'] ?><span class="punto">.</span></h2>
      <p><?php echo $fields['section_9']['paragrafo'] ?></p>
    </section>
    <section id="block9-2" class="block9-2 tlr flex-center">
      <div class="tlr-container wrap">
        <div class="over-man"></div>
      </div>
    </section>
    <section id="block9-3" class="block9-3 tlr flex-center">
      <div class="text-part txt-center">
        <a class="btn-tlr btn-center demo_request"><?php echo $fields['section_10']['link']['title'] ?></a>
        <h2><?php echo $fields['section_10']['intestazione'] ?><span class="punto">.</span></h2>
        <p><?php echo $fields['section_10']['paragrafo'] ?></p>
      </div>
    </section>

    <section id="block10" class="block10 txt-center tlr">
      <div class="tlr-container wrap">
        <img src="{{asset('images/blocco-10/layer_1.png')}}"/>
        <div class="elements">
          <img src="{{asset('images/blocco-10/layer_2.png')}}"/>
        </div>
      </div>
    </section>

    <section class="container grid xl:grid-cols-3 text-white gap-8 py-32">
      <div class="py-12 relative">
        <h2 class="text-4xl font-header mb-4"><?php echo $fields['faq']['title']; ?></h2>
        <p class="text-lg font-header mb-16"><?php echo $fields['faq']['subtitle']; ?></p>
        <a
          class='font-header border-2 border-white rounded-full py-2 px-8 hover:bg-white hover:text-mirage duration-300 inline-block text-lg demo_request cursor-pointer'><?php echo $fields['faq']['contact_url']['title']; ?></a>
        <img class="absolute top-0 translate-y-full" src="{{asset('images/gradient-abstract-one.svg')}}"/>
      </div>
      <div class="xl:col-span-2">
        <div>
          <?php foreach ( $fields['faq']['faq_questions'] as $key => $value ) : ?>
          <x-faq :question="$value['domanda']" :answer="$value['risposta']" :starts-open="$key === 0"/>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <x-clients-carousel class="bg-mirage"/>
  </div>

  S
  <div class="modal-tlr-video tlr">
    <div class="modal-tlr-container">
      <iframe
        data-src='https://player.vimeo.com/video/862001692?loop=1&autoplay=1&title=0&byline=0&portrait=0&background=0&player_id=iframe86315'></iframe>
    </div>
  </div>
@endsection
