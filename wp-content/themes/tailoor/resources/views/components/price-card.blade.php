<div x-data="JSON.parse('{{$prices}}')"
     class="bg-white rounded-3xl flex p-6 flex-col justify-between gap-20 shadow-xl overflow-hidden {{$accent ? 'lg:scale-105 lg:shadow-2xl' : ''}} h-full {{!$enabled ? 'grayscale opacity-50' : ''}}">
  <div class="relative">
    <div
      class="font-header flex flex-col justify-center items-center gap-2 bg-gray-50 rounded-2xl tailoor__outline {{$accent ? 'accent' : ''}}  px-4 py-10 border">
      <p class="text-2xl">{{strtoupper($translatedTitle)}}</p>
      <p class="text-5xl font-bold" x-text="yearlyPrices ? annual.price : monthly.price"></p>
      <p>€/month <span class="text-2xs text-gray-600"
                       x-text="yearlyPrices ? '({{__('yearly billed', 'sage')}})': ''"></span>

      @if($accent)
        <p
          class="bg-white border-2 text-pink-500 -rotate-1 shadow-lg border-pink rounded-lg font-header uppercase text-sm py-2 px-8 absolute top-full -translate-y-1/2 left-1/2 -translate-x-1/2">{{__('Best seller')}}</p>
      @endif
    </div>
    <ul class="px-4 mt-16 font-header">
      @foreach($features as $feature => $subfeatures)
        <li class="mb-4">
          <div class="flex items-center justify-start gap-x-6">
            <i class="fa-solid fa-check text-green-500 text-xl"></i>
            <p class="text-lg">{{$feature}}</p>
          </div>
          @if(is_array($subfeatures))
            <ul class="ml-10 mt-3 text-xs">
              @foreach($subfeatures as $subfeature)
                <li class="flex items-start gap-2 mb-0"><span>-</span><span>{{$subfeature}}</span></li>
              @endforeach
            </ul>
          @endif
        </li>
      @endforeach
    </ul>
  </div>


  <div class="text-center {{$hasOnboarding ?: 'demo_request'}}">
    <a :href="yearlyPrices ? annual.href : monthly.href"
       x-text="yearlyPrices ? annual.label : monthly.label"
       class="inline-block py-2 px-12 {{$accent ? 'bg-pink border-pink-400 hover:bg-pink-300': 'bg-gray-100 hover:bg-gray-50 border-gray-200'}} border duration-500 text-lg font-header uppercase rounded-lg">
    </a>
  </div>
</div>
