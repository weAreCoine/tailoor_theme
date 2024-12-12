<?php
$lang = getCurrentLanguage();
$privacyPolicy = match ($lang) {
  'it' => 'https://www.iubenda.com/privacy-policy/12894242',
  default => 'https://www.iubenda.com/privacy-policy/45370256'
};
$cookiePolicy = match ($lang) {
  'it' => 'https://www.iubenda.com/privacy-policy/12894242/cookie-policy',
  default => 'https://www.iubenda.com/privacy-policy/45370256/cookie-policy'
};
$termsAndConditions = match ($lang) {
  'it' => 'https://www.iubenda.com/termini-e-condizioni/12894242',
  default => 'https://www.iubenda.com/terms-and-conditions/45370256'
};
?>

<footer class="content-info">
  <div class="colophon">
    <div class="mb-16">
      <h2 class="text-2xl font-medium"><?= __('Subscribe to our newsletter', 'sage') ?></h2>
      @if(getCurrentLanguage()==='it')
        <script>
          hbspt.forms.create({
            portalId: "26570211",
            formId: "e079f158-5f28-46aa-a7be-55860d68566e"
          });
        </script>
      @else
        <script>
          hbspt.forms.create({
            portalId: "26570211",
            formId: "99d47dcc-5ae7-47cd-84ad-54ef40ef23e3"
          });
        </script>
      @endif
    </div>
    <div class="">
      {!! wp_get_attachment_image(574, [40,40], true, ['alt' => $siteName, 'class'=> 'footer__logo']) !!}
      <nav id="footer-nav" class="my-12">
        {!! wp_nav_menu(['theme_location' => apply_filters('tailoor_navigation', 'home_navigation', url()->current()), 'menu_class' => 'footer__menu', 'echo' => false]) !!}

      </nav>
      <p class="mt-8">{{__('13 Pietro Maroncelli Street, 20154, Milan, Italy', 'sage')}}</p>
      <p class="mt-1"><a href="mailto:commercial@tailoor.com">commercial@tailoor.com</a></p>
      <ul class="flex justify-center items-center gap-6 text-md mt-6">
        <li>
          <a target="_blank" rel="nofollow" href="https://www.linkedin.com/company/tailoor/">
            <i class="fa-brands fa-linkedin-in"></i>
          </a>
        </li>
        <li>
          <a target="_blank" rel="nofollow" href="https://www.facebook.com/tailoorofficial">
            <i class="fa-brands fa-facebook-f"></i>
          </a>
        </li>
        <li>
          <a target="_blank" rel="nofollow" href="https://www.instagram.com/tailoor_official/">
            <i class="fa-brands fa-instagram"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>

  <div class="credits">
    <div class="container text-center text-sm text-white">
      <p class="font-bold">©{{date('Y')}} Tailoor.com - {{__('All Rights Reserved', 'sage')}}</p>
      <p class="text-xs mt-2">Tailoor SPA, 25 Robiolio Street 13835 Valdilana ITALY | VAT IT02804610026 |
        SDI: SN4CSRI</p>
      <ul class="grid grid-cols-2 sm:flex items-center justify-center gap-2 sm:gap-6 mt-8">
        <li class="m-0">
          <a href="#"
             class="iubenda__button iubenda-cs-preferences-link"
             title="Privacy Policy ">{{__('GDPR Settings', 'sage')}}</a>
        </li>
        <li class="m-0">
          <a href="{{$privacyPolicy}}"
             target="_blank"
             class="iubenda__button iubenda-black no-brand iubenda-noiframe iubenda-embed iubenda-noiframe "
             title="Privacy Policy ">Privacy
            Policy</a>
        </li>
        <li class="m-0">
          <a href="{{$cookiePolicy}}"
             target="_blank"
             class="iubenda__button iubenda-black no-brand iubenda-noiframe iubenda-embed iubenda-noiframe "
             title="Cookie Policy ">Cookie
            Policy</a>
        </li>
        <li class="m-0">
          <a href="{{$termsAndConditions}}"
             target="_blank"
             class="iubenda__button iubenda-black no-brand iubenda-noiframe iubenda-embed iubenda-noiframe "
             title="Termini e Condizioni ">Terms & conditions</a>
        </li>
      </ul>
    </div>
  </div>
  @php(dynamic_sidebar('sidebar-footer'))
</footer>
