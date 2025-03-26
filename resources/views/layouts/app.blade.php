@if (!isset($_SERVER['HTTP_X_BARBA']))
  <!doctype html>
  <html @php(language_attributes()) x-data="{ menuOpen: false }" :class="{ 'overflow-hidden': menuOpen }">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php(do_action('get_header'))
    @php(wp_head())

  </head>

  <body @php(body_class('bg-pink-light'))>
    @include('svg')

    @php(wp_body_open())

    <div id="app" data-barba="wrapper" role="document">

      <a class="sr-only focus:not-sr-only" href="#main">
        {{ __('Skip to content') }}
      </a>

      @include('sections.header')
    @else
      <!doctype html>
      <html>

      <head>
        <title>{!! $title !!}</title>
      </head>

      <body @php(body_class('bg-pink-light opacity-0'))>
@endif

@include('partials.loading')

<div data-barba-class="{{ join(' ', get_body_class('bg-pink-light transition duration-500')) }}" data-barba="container"
  data-barba-namespace="{{ basename(get_permalink()) }}">

  <main id="main" class="main">
    @yield('content')
  </main>

  @hasSection('sidebar')
    <aside class="sidebar">
      @yield('sidebar')
    </aside>
  @endif
</div>

@if (!isset($_SERVER['HTTP_X_BARBA']))
  </div>
  @include('sections.footer')

  @php(do_action('get_footer'))
  @php(wp_footer())

  </body>

  </html>
@else
  </body>

  </html>
@endif
