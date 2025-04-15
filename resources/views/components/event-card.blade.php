@props(['event', 'bg' => null, 'variant' => 'default', 'show_date' => true])

<div
  {{ $attributes->merge([
      'class' =>
          'not-prose group  relative flex   ' .
          match ($variant) {
              'horizontal' => ' flex-col md:flex-row-reverse gap-4 border-b items-center  ',
              'large' => ' flex-col md:flex-row-reverse md:col-span-2 lg:col-span-3  ',
              default => ' flex-col ',
          },
  ]) }}>

  <div
    class="{{ match ($variant) {
        'horizontal' => ' w-full md:w-1/3  ',
        'large' => ' md:w-1/2  md:-ml-28 md:my-4 ',
        default => ' w-full ',
    } }} flex-none overflow-hidden">
    @if (has_post_thumbnail($event->ID, 'wide'))
      {!! get_the_post_thumbnail($event->ID, 'wide', [
          'sizes' => '25vw',
          'class' => '  h-full w-full object-cover transition duration-1000 group-hover:scale-105',
      ]) !!}
    @else
      <div class="flex aspect-[2] h-full w-full items-center justify-center bg-pink/30">
        <x-logo class="h-auto w-8" />
      </div>
    @endif
    @if ($variant === 'horizontal')
      <x-button class="hidden md:block" :cover="true" :arrow="true" url="{{ get_permalink($event->ID) }}"
        label="Find out more"></x-button>
    @endif
  </div>

  <div class="{{ $bg }} flex w-full flex-grow flex-col">
    <div
      class="{{ match ($variant) {
          'large' => 'my-auto flex-grow flex flex-col justify-center md:pr-32 px-4 py-6 md:p-8 lg:p-12 text-black',
          'horizontal' => ' w-full md:w-auto',
          default => ' py-6 ',
      } }} {{ $bg ? 'px-4' : '' }}">
      <div class="mb-2 leading-snug">
        @if ($show_date)
          {{ wp_date(get_option('date_format'), strtotime(get_field('date', $event->ID))) }}
          @if (get_field('start_time', $event->ID))
            &mdash;
          @endif
        @endif
        @if (get_field('start_time', $event->ID))
          {{ get_field('start_time', $event->ID) }}
        @endif

      </div>
      <h2 class="{{ $variant == 'default' ? ' type-lg ' : ' type-lg md:type-xl ' }} mb-2 text-balance font-serif">
        {!! $event->post_title !!}</h2>
      @if ($event->subtitle)
        <p class="type-sm mb-4">{!! $event->subtitle !!}</p>
      @endif
      <div class="max-w-md">
        {!! $event->post_excerpt !!}
      </div>
    </div>
    <div
      class="{{ $variant == 'default' ? 'mt-auto ' : null }} {{ $variant == 'horizontal' ? 'mt-4 md:hidden' : null }}">
      <x-button :cover="true" :arrow="true" url="{{ get_permalink($event->ID) }}" label="Read more"></x-button>
    </div>

  </div>

</div>
