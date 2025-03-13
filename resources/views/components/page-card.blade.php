  <a href="{{ $url }}" class="group mx-auto block w-full max-w-md border-b-2">
    <div class="mb-4 overflow-hidden md:mb-6">
      @if ($image)
        {!! wp_get_attachment_image($image, 'landscape', false, [
            'sizes' => '25vw',
            'class' =>
                ' object-cover aspect-[2] md:aspect-auto w-full block h-auto group-hover:scale-105 transition-transform duration-1000',
        ]) !!}
      @else
        <div
          class="block aspect-[2] h-auto w-full bg-black/10 transition-transform duration-1000 group-hover:scale-105 md:aspect-[3/2]">
        </div>
      @endif
    </div>
    <div class="flex justify-between pb-2">
      <h3 class="type-md">{!! $title !!}</h3>
      <x-icon.card-arrow
        class="mt-1 flex-none -translate-x-1/2 opacity-0 transition group-hover:translate-x-0 group-hover:opacity-100" />
    </div>
  </a>
