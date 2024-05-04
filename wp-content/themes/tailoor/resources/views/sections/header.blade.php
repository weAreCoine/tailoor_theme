<header class="banner flex items-center justify-between px-12 py-6 mb-12">
  <a class="brand inline-block" href="{{ home_url('/') }}">
    {!! wp_get_attachment_image(831, [240, 80], false, ['alt' => $siteName, 'class'=> 'site__logo']) !!}
  </a>

  @if (has_nav_menu('primary_navigation'))
    <nav x-data="mainNavigation()"
         x-cloak
         x-init="bind($el)"
         x-on:resize.window="isLargeScreen = window.innerWidth >= 1024; open = false;"
         class="nav-primary"
         aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
      <div :class="{'open': open}" x-on:click="open = !open" class="burger__icon z-30">
        <div class="first__row"></div>
        <div class="second__row"></div>
        <div class="third__row"></div>
      </div>
      <div
        x-show="open || isLargeScreen"
        x-transition.opacity.duration.500ms
        class="nav__container">
        {!! wp_nav_menu(['theme_location' => apply_filters('tailoor_navigation', 'primary_navigation', url()->current()), 'menu_class' => 'nav', 'echo' => false]) !!}
      </div>
    </nav>
  @endif
</header>
