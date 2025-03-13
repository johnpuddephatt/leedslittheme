@props(['post', 'show_image' => true, 'show_excerpt' => true, 'variant' => 'default'])

<a href="{{ get_permalink($post->ID) }}"
  class="not-prose rounded-medium group relative flex min-h-32 flex-row items-center overflow-hidden bg-black/5 font-normal after:absolute after:right-1 after:top-2 after:block after:size-6 after:rounded-full md:min-h-48 md:after:size-8">
  @if ($show_image ?? false)
    <div class="w-32 max-w-[30%] flex-none self-stretch overflow-hidden bg-black/20 md:w-48">
      {!! get_the_post_thumbnail($post->ID, 'square', [
          'sizes' => '25vw',
          'class' => ' aspect-square h-full w-full object-cover transition duration-1000 group-hover:scale-105',
      ]) !!}
    </div>
  @endif

  <div class="{{ $show_image ? 'pl-2' : '!px-8' }} flex-1 py-2 md:pl-4 lg:pl-8 lg:pr-12">
    <div class="mb-1 leading-snug">
      {{ get_the_date(null, $post->ID) }}</div>

    <h3 class="type-sm font-serif md:type-md text-balance">{{ $post->post_title }}
    </h3>
    @if ($show_excerpt)
      <p class="mt-3 hidden max-w-3xl md:block">{!! wp_trim_words(get_the_excerpt($post->ID), 15) !!}</p>
    @endif

  </div>
  {{-- 
  <x-icon.card-arrow
    class="!size-8 flex-none -translate-x-full opacity-0 transition group-hover:translate-x-0 group-hover:opacity-100" /> --}}

</a>
