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


@php(dynamic_sidebar('sidebar-footer'))

<footer class="content-info">
  <div class="colophon container-xl grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-12 gap-x-8 gap-y-16">
    <div class=" lg:col-span-4 order-4 sm:order-2 lg:order-1">
      <?= wp_get_attachment_image(574, [40, 40], true, ['alt' => $siteName, 'class' => 'footer__logo']) ?>
      <p
        class="mt-8 text-center sm:text-left"><?= __('13 Pietro Maroncelli Street, 20154, Milan, Italy', 'sage') ?></p>
      <p class="mt-1 text-center sm:text-left"><a href="mailto:commercial@tailoor.com">commercial@tailoor.com</a></p>
      <ul class="flex justify-center sm:justify-start items-center gap-6 text-md mt-6">
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
      <p class="text-xs text-center sm:text-left mt-12">©<?= date('Y') ?> Tailoor.com
        - <?= __('All Rights Reserved', 'sage') ?></p>
      <p class="text-2xs mt-2 text-center sm:text-left">Tailoor SPA, 25 Robiolio Street 13835 Valdilana Italy <br>VAT
        IT02804610026 |
        SDI: SN4CSRI</p>
    </div>
    <div class="hidden sm:block lg:col-span-2 order-2 sm:order-3 lg:order-2">
      <nav id="footer-nav">
        <?= wp_nav_menu(['theme_location' => apply_filters('tailoor_navigation', 'home_navigation', url()->current()), 'menu_class' => 'footer__menu', 'echo' => false]) ?>
      </nav>
    </div>
    <div class="lg:col-span-2 order-3 sm:order-4 lg:order-3">
      <nav id="privacy-nav">
        <ul class="flex flex-col items-center sm:items-start gap-2 sm:gap-6">
          <li class="m-0">
            <a href="https://grupporeda.factorial.it"
               class=""
               target="_blank"
               title="Lavora con noi"><?= __('Work with us', 'sage') ?></a>
          </li>
          <li class="m-0">
            <a href="#"
               class="iubenda-cs-preferences-link"
               title="Privacy Policy "><?= __('GDPR Settings', 'sage') ?></a>
          </li>
          <li class="m-0">
            <a href="<?=$privacyPolicy?>"
               target="_blank"
               class="no-brand iubenda-noiframe iubenda-embed iubenda-noiframe "
               title="Privacy Policy "><?= __('Privacy Policy', 'sage') ?></a>
          </li>
          <li class="m-0">
            <a href="<?=$cookiePolicy?>"
               target="_blank"
               class="no-brand iubenda-noiframe iubenda-embed iubenda-noiframe "
               title="Cookie Policy "><?= __('Cookie Policy', 'sage') ?></a>
          </li>
          <li class="m-0">
            <a href="<?=$termsAndConditions?>"
               target="_blank"
               class="no-brand iubenda-noiframe iubenda-embed iubenda-noiframe "
               title="Termini e Condizioni "><?= __('Terms & conditions', 'sage') ?></a>
          </li>
        </ul>
      </nav>
    </div>

    <div class="sm:col-span-3 lg:col-span-4 order-1 lg:order-4">
      <h2
        class="text-2xl font-medium text-center lg:text-left mb-8"><?= __('Subscribe to our newsletter', 'sage') ?></h2>
      @if(getCurrentLanguage() === 'it')
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
  </div>


</footer>
