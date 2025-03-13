@props(['event', 'variant' => 'default', 'show_date' => true])

<div
  {{ $attributes->merge([
      'class' =>
          'not-prose group  relative flex   ' .
          match ($variant) {
              'horizontal' => ' flex-row-reverse gap-4 border-b items-center  ',
              'large' => ' flex-col md:flex-row-reverse md:col-span-2 lg:col-span-3  ',
              default => ' flex-col gap-4 ',
          },
  ]) }}>

  @if (has_post_thumbnail($event->ID, 'wide'))
    <div
      class="{{ match ($variant) {
          'horizontal' => ' w-1/3  ',
          'large' => ' md:w-1/2  md:-ml-28 md:my-4 ',
          default => ' w-full ',
      } }} overflow-hidden">

      {!! get_the_post_thumbnail($event->ID, 'wide', [
          'sizes' => '25vw',
          'class' => '  h-full w-full object-cover transition duration-1000 group-hover:scale-105',
      ]) !!}
      @if ($variant === 'horizontal')
        <x-button :cover="true" :arrow="true" url="{{ get_permalink($event->ID) }}"
          label="Find out more"></x-button>
      @endif
    </div>
  @endif
  <div class="flex flex-grow flex-col">
    <div
      class="{{ $variant == 'large' ? 'bg-white my-auto flex-grow flex flex-col justify-center pr-28 md:pr-32 px-4 py-6 md:p-8 lg:p-12 text-black' : null }}">
      <div class="mb-2 leading-snug">
        @if ($show_date)
          {{ get_the_date(get_option('date_format'), $event->ID) . '  –  ' }}
        @endif
        {{ get_the_date(get_option('time_format'), $event->ID) }}
      </div>
      <h2
        class="{{ $variant == 'default' ? ' type-md md:type-lg ' : ' type-lg md:type-xl ' }} mb-2 text-balance font-serif">
        {!! $event->post_title !!}</h2>
      @if ($event->subtitle)
        <p class="type-sm mb-4">{!! $event->subtitle !!}</p>
      @endif
      <div class="max-w-md">
        {!! $event->post_excerpt !!}
      </div>
    </div>
    @if ($variant !== 'horizontal')
      <div class="{{ $variant == 'default' ? 'mt-auto pt-6' : null }}">
        <x-button :cover="true" :arrow="true" url="{{ get_permalink($event->ID) }}"
          label="Read more"></x-button>
      </div>
    @endif
  </div>

</div>
