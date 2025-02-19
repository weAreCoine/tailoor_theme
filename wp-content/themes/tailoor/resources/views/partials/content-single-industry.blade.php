
<?php
$metas = get_post_meta(get_the_ID());
$content = collect($metas)
  ->filter(fn(mixed $value, string $key) => \Illuminate\Support\Str::startsWith($key, 'page_structure_') && \Illuminate\Support\Str::contains($key, '_section_'))
  ->reduceWithKeys(function (array $carry, mixed $value, string $key) {
    preg_match('/page_structure_(\d+)_(.+)/', $key, $matches);
    $key = \Illuminate\Support\Str::remove('section_', $matches[2]);
    if ($key === 'image') {
      $value[0] = (int)$value[0];
    }
    $carry[(int)$matches[1]][$key] = $value[0] ?? null;
    return $carry;
  }, []);

$callToAction = [
  'label' => $metas['cta_group_call_to_action_label'][0] ?? '',
  'url' => $metas['cta_group_call_to_action'][0] ?? ''
];
?>
<article @php(post_class('h-entry'))>
  <header
    class="py-6 lg:py-12 relative min-h-[300px] lg:min-h-[600px] grid grid-cols-1 md:grid-cols-2 items-center mb-12 container gap-24">
    <div class="max-w-2xl">
      <h1 class="p-name font-header font-bold text-5xl mb-8">
        {!! $title !!}
      </h1>
      @php(the_content())
      @if(!empty($callToAction['url']))
        <div class="mt-8">
          <a href="<?= $callToAction['url'] ?>"
             target="_blank"
             class="inline-block whitespace-nowrap button bg-pink border-pink-400 hover:bg-pink-300 border text-lg text-mirage font-semibold tracking-wide hover:translate-y-[-2px]"><?= $callToAction['label'] ?? __('Discover more', 'sage') ?></a>
        </div>
      @endif
    </div>
    <div
      class="rounded-2xl overflow-hidden aspect-square">{!! wp_get_attachment_image(get_post_thumbnail_id(), 'full', false, ['alt' => get_the_title(), 'class'=>'aspect-square w-full h-auto']) !!}</div>
  </header>
  <div class="e-content">
    @foreach($content as $section)
      @switch($section['template'])
        @case('l')
        @case('r')
          <div class="py-32 @if($section['bg_gray']) bg-gray-50 @endif">
            <div class="container mx-auto grid grid-cols-2 gap-8 items-center">
              <div @class(['order-2'=>$section['template'] === 'l'])>
                <h2 class="mb-4">{{$section['title']}}</h2>
                  <?= wpautop($section['content']) ?>
              </div>
              <div @class(['order-1'=>$section['template'] === 'l', 'overflow-hidden'])>
                @unless(empty($section['video']))
                  <figure>
                    <video autoplay muted loop playsinline class="w-full h-auto block">
                      <source src="<?= $section['video'] ?>" type="video/mp4">
                        <?= __('Your browser does not support the playback of this video.', 'sage') ?>
                    </video>
                  </figure>
                @else
                    <?= wp_get_attachment_image($section['image'], 'full', false, ['class' => 'object-cover w-full h-auto', 'alt' => $section['title']]) ?>
                @endunless
              </div>
            </div>
          </div>
          @break
        @case('b')
          <div class="py-24 bg-gradient-to-b from-mirage-900 to-mirage-950 text-white">
            <div class="container text-center">
              <h2 class="mb-4">{{$section['title']}}</h2>
                <?php
                $demoClass = '';
                if (empty($section['url'])) {
                  $demoClass = 'demo_request';
                }
                ?>
              <div class="mt-6 text-center <?= $demoClass ?>">
                <a href="{{(empty($section['url']) ? '#' : $section['url'])}}"
                   target="_blank"
                   class="inline-block whitespace-nowrap button bg-pink border-pink-400 hover:bg-pink-300 border text-lg text-mirage font-semibold tracking-wide hover:translate-y-[-2px]">{{$section['call_to_action']}}</a>
              </div>
            </div>
          </div>
          @break
        @case('c')
          <div class="py-32 text-center @if($section['bg_gray']) bg-gray-50 @endif ">
            <div class="container">
              <div>
                <h2 class="mb-4">{{$section['title']}}</h2>
                  <?= wpautop($section['content']) ?>
              </div>
              <div class="overflow-hidden max-w-4xl mx-auto">
                @unless(empty($section['video']))
                  <figure>
                    <video autoplay muted loop playsinline class="w-full h-auto block">
                      <source src="<?= $section['video'] ?>" type="video/mp4">
                        <?= __('Your browser does not support the playback of this video.', 'sage') ?>
                    </video>
                  </figure>
                @else
                    <?= wp_get_attachment_image($section['image'], 'full', false, ['class' => 'object-cover w-full h-auto', 'alt' => $section['title']]) ?>
                @endunless
              </div>
            </div>
          </div>
          @break
        @case('f')
          <div class="my-32 @if($section['bg_gray']) bg-gray-50 @endif">
            <div class="container">
              <h2 class="text-center">{{$section['title']}}</h2>
              <div class="text-center">
                  <?= wpautop($section['content']) ?>
              </div>
              <div class="grid grid-cols-2 lg:grid-cols-4 gap-16 items-center mt-16">
                @foreach(range(1,4) as $i)
                  @if(!empty($section['banners_image_' . $i]))
                    <div
                      class="aspect-square lg:aspect-[9/16] overflow-hidden rounded-lg lg:odd:translate-y-4 lg:even:-translate-y-4 md:block hidden [&:nth-child(-n+2)]:block">
                        <?= wp_get_attachment_image($section['banners_image_' . $i], 'full', false, ['class' => 'h-full w-auto object-cover', 'alt' => $section['title']]) ?>
                    </div>
                  @endif
                @endforeach
              </div>
            </div>
          </div>
          @break
        @default
          @dump($section)
      @endswitch
    @endforeach
  </div>
  @if ($pagination)
    <footer>
      <nav class="page-nav" aria-label="Page">
        {!! $pagination !!}
      </nav>
    </footer>
  @endif

  @php(comments_template())
</article>
