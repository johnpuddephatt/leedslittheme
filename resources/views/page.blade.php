@extends('layouts.app') @section('content')
  @while (have_posts())
    @php(the_post())
    <div x-data="header" class="container relative my-20 min-h-screen">

      @if (has_post_thumbnail($post->ID))
        <div class="relative">

          {!! get_the_post_thumbnail($post->ID, 'wide-3xl', [
              'class' => ' block w-full mb-8  h-auto',
              'sizes' => '100vw',
          ]) !!}
          <canvas
            class="pointer-events-none absolute left-0 top-0 hidden h-full w-full opacity-0 transition duration-1000 md:block"
            id="header-orbits"></canvas>
        </div>
      @endif

      @includeFirst(['partials.content-page-' . get_post_type(), 'partials.content-page'])

    </div>
  @endwhile
@endsection
