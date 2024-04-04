<div x-data="getInTouchForm(JSON.parse('{{ $formFields }}'))" class="relative">
  @unless(empty($errors))
    <ul class="errors__bag" x-show="!submitting" x-collapse.duration.300ms
        x-init="$dispatch('request-modal', {modalName: 'get__in__touch__form'})">
      @foreach($errors as $error)
        <li><p>{{$error}}</p></li>
      @endforeach
    </ul>
  @endunless
  <div
    x-show="submitting"
    x-transition.opacity.duration.300ms
    class="absolute top-0 left-0 bg-white/80 backdrop-blur scale-105 w-full h-full flex justify-center items-center">
    <div>
      <i class="fa-solid fa-spinner animate-spin text-3xl text-pink"></i>
    </div>
  </div>
  <form action="{{route('requestForm.submit')}}" method="POST" class="tailoor__form">
    {!! wp_nonce_field('requestForm_submit', 'requestForm_nonce') !!}
    <label for="first_name">
      <span>{{__('First name', 'sage')}}</span>
      <input name="first_name"
             id="first_name"
             type="text"
             required
             autofocus
             autocomplete="given_name"
             x-model="formFields.firstName"
             placeholder="{{__('Insert your first name...', 'sage')}}">
    </label>
    <label for="last_name">
      <span>{{__('Last name', 'sage')}}</span>
      <input name="last_name"
             id="last_name"
             type="text"
             required
             autocomplete="family_name"
             x-model="formFields.lastName"
             placeholder="{{__('Insert your last name...', 'sage')}}">
    </label>
    <label for="phone">
      <span>{{__('Phone', 'sage')}}</span>
      <input name="phone"
             id="phone"
             type="text"
             required
             autocomplete="tel"
             x-model="formFields.phone"
             placeholder="{{__('Insert your phone number...', 'sage')}}">
    </label>
    <label for="email">
      <span>{{__('Email', 'sage')}}</span>
      <input name="email"
             id="email"
             type="text"
             required
             autocomplete="email"
             x-model="formFields.email"
             placeholder="{{__('Insert your email address...', 'sage')}}">
    </label>
    <label for="company">
      <span>{{__('Company', 'sage')}}</span>
      <input name="company"
             id="company"
             type="text"
             required
             autocomplete="organization"
             x-model="formFields.company"
             placeholder="{{__('Insert your company...', 'sage')}}">
    </label>
    <label for="website">
      <span>{{__('Website', 'sage')}}</span>
      <input name="website"
             id="website"
             type="text"
             required
             autocomplete="url"
             x-model="formFields.website"
             placeholder="{{__('Insert your website...', 'sage')}}">
    </label>
    <label for="platform">
      <span>{{__('E-Commerce Platform', 'sage')}}</span>
      <select name="platform" required id="platform" x-model="formFields.platform"
              :class="{'placeholder__shown': formFields.platform.length === 0}"
      >
        <option value>{{__('Select your platform...','sage')}}</option>
        @foreach($platforms as $value => $key)
          <option value="{{$value}}">{{$key}}</option>
        @endforeach
      </select>
    </label>
    <label for="business">
      <span>{{__('Business Type', 'sage')}}</span>
      <select name="business" required id="business" x-model="formFields.business"
              :class="{'placeholder__shown': formFields.business.length === 0}"
      >
        <option value>{{__('Select your business type...','sage')}}</option>
        @foreach($businessType as $value => $key)
          <option value="{{$value}}">{{$key}}</option>
        @endforeach
      </select>
    </label>
    <label for="city">
      <span>{{__('City', 'sage')}}</span>
      <input name="city"
             id="city"
             type="text"
             autocomplete="url"
             x-model="formFields.city"
             placeholder="{{__('Insert your city...', 'sage')}}">
    </label>

    <label for="country">
      <span>{{__('Country', 'sage')}}</span>
      <select name="country" required id="country" x-model="formFields.country"
              :class="{'placeholder__shown': formFields.country.length === 0}">
        <option value>{{__('Select your country...','sage')}}</option>
        @foreach($countries as $value => $key)
          <option value="{{$value}}">{{$key}}</option>
        @endforeach
      </select>
    </label>

    <label for="note" class="sm:col-span-2">
      <span>{{__('Note', 'sage')}}</span>
      <textarea id="note" name="note" rows="5" placeholder="{{__('Insert your notes here...')}}"
                x-model="formFields.note"
      ></textarea>
    </label>

    <div class="sm:col-span-2 text-sm">
      <p
        class="mb-6">{{__('Tailoor is committed to protecting and respecting your privacy and we\'ll use your personal information only to administer your account and to provide the products and services you requested from us.', 'sage')}}</p>
      <div x-cloak x-init="$watch('formFields.privacy', _ => termsError = false)"
           class="cursor-pointer flex items-center justify-start gap-4">
        <input type="checkbox" name="privacy" id="privacy" x-model="formFields.privacy" required
               class="appearance-none">
        <div class="h-6 w-6 shrink-0 bg-slate-300  cursor-pointer flex justify-center items-center"
             x-on:click="formFields.privacy = !formFields.privacy">
          <i class="fa-solid fa-check duration-300" x-show="formFields.privacy" x-transition.opacity.duration.300ms></i>
        </div>
        <label for="privacy" class="cursor-pointer">
        <span
          class="normal-case">{!! sprintf(__('I confirm that I have read and understood the %s', 'sage'), '<a class="underline" href="https://www.iubenda.com/privacy-policy/65011295/legal">Privacy Policy</a>') !!}<span
            class="inline-block !ml-1 text-pink-500">*</span>
        </span>
        </label>
      </div>
      <p
        class="text-white mt-2 mb-4 text-sm py-2 rounded text-center bg-pink-500"
        x-show="termsError"
        x-collapse.duration.300ms>{{__('You must accept our Privacy Policy in order to continue.', 'sage')}}</p>
      <div x-cloak class="cursor-pointer flex items-center justify-start gap-4 mt-3">
        <input type="checkbox" name="newsletter" id="newsletter" x-model="formFields.newsletter"
               class="appearance-none">
        <div class="h-6 w-6 shrink-0 bg-slate-300  cursor-pointer flex justify-center items-center"
             x-on:click="formFields.newsletter = !formFields.newsletter">
          <i class="fa-solid fa-check duration-300" x-show="formFields.newsletter"
             x-transition.opacity.duration.300ms></i>
        </div>
        <label for="newsletter" class="cursor-pointer">
        <span
          class="normal-case">{{__('I agree to receive other communications from Tailoor','sage')}}</span>
        </label>
      </div>

      <p class="mt-4">{{__('You can unsubscribe from these communications at any time.')}}</p>
    </div>

    <div class="sm:col-span-2 text-center mt-8">
      <button type="submit"
              x-on:click.prevent="submit($el)"
              class="inline-block py-2 px-12 bg-pink border-pink-400 hover:bg-pink-300 border duration-500 text-lg font-header uppercase rounded-lg">{{__('Submit', 'sage')}}</button>
    </div>
  </form>
</div>


