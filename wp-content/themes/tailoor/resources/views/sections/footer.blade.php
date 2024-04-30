<footer class="content-info">
  <div class="colophon">
    <div class="">
      {!! wp_get_attachment_image(574, [40,40], true, ['alt' => $siteName, 'class'=> 'footer__logo']) !!}
      <p class="mt-8">{{__('13 Pietro Maroncelli Street, 20154, Milan, Italy', 'sage')}}</p>
      <p class="mt-4"><a href="tel:00393461208478">+39 346 – 1208478</a></p>
      <p class="mt-1"><a href="mailto:info@tailoor.com">info@tailoor.com</a></p>
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
      <p class="text-xs mt-2">Reda Industries Srl, 25 Robiolio Street 13835 Valdilana ITALY | VAT IT01686900026 |
        SDI:
        A4707H7</p>
      <ul class="grid grid-cols-2 sm:flex items-center justify-center gap-2 sm:gap-6 mt-8">
        <li class="m-0">
          <a href="#"
             class="iubenda__button iubenda-cs-preferences-link "
             title="Privacy Policy ">{{__('GDPR Settings', 'sage')}}</a>
        </li>
        <li class="m-0">
          <a href="https://www.iubenda.com/privacy-policy/23976788"
             class="iubenda__button iubenda-black no-brand iubenda-noiframe iubenda-embed iubenda-noiframe "
             title="Privacy Policy ">Privacy
            Policy</a>
        </li>
        <li class="m-0">
          <a href="https://www.iubenda.com/privacy-policy/23976788/cookie-policy"
             class="iubenda__button iubenda-black no-brand iubenda-noiframe iubenda-embed iubenda-noiframe "
             title="Cookie Policy ">Cookie
            Policy</a>
        </li>
        <li class="m-0">
          <a href="https://www.iubenda.com/terms-and-conditions/23976788"
             class="iubenda__button iubenda-black no-brand iubenda-noiframe iubenda-embed iubenda-noiframe "
             title="Termini e Condizioni ">Terms & conditions</a>

        </li>
      </ul>
    </div>
  </div>
  @php(dynamic_sidebar('sidebar-footer'))
</footer>
