<header class="banner flex items-center justify-between px-12 py-6 mb-12">
  <a class="brand inline-block" href="{{ home_url('/') }}">
    {!! wp_get_attachment_image(572, [240, 80], false, ['alt' => $siteName, 'class'=> 'site__logo']) !!}
  </a>

  @if (has_nav_menu('primary_navigation'))
    <nav x-data="mainNavigation()"
         x-init="bind($el)"
         x-on:resize.window="isLargeScreen = window.innerWidth >= 1024; open = false;"
         class="nav-primary"
         aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
      <div :class="{'open': open}" x-on:click="open = !open" class="burger__icon dark z-30">
        <div class="first__row "></div>
        <div class="second__row"></div>
        <div class="third__row"></div>
      </div>
      <div
        x-show="open || isLargeScreen"
        x-on:click="open = false"
        x-transition.opacity.duration.500ms
        class="nav__container dark">
        <div x-on:click.stop>
          {!! wp_nav_menu(['theme_location' => 'home_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
        </div>
      </div>
    </nav>
  @endif
</header>
