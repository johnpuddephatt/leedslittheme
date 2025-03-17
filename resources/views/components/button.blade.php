@props(['label', 'url', 'invert' => false, 'arrow' => false, 'big' => false, 'cover' => false])

<a href="{{ $url }}"
  {{ $attributes->merge([
      'class' => ($cover ? ' after:block after:absolute after:inset-0 ' : '') . ' not-prose  group',
  ]) }}>

  <div
    class="{{ ($invert ? 'border-2 border-white  ' : 'bg-pink text-black') . ($big ? ' type-md px-6 py-4 h-16' : ' px-4 py-2 h-12 ') }} relative flex items-center justify-between overflow-hidden text-center !no-underline transition-all duration-1000">
    <div
      class="absolute left-0 top-0 h-full w-[300%] -translate-x-full bg-gradient-to-r from-blue via-pink to-transparent duration-1000 will-change-transform group-hover:translate-x-0">
    </div>
    <div class="@if ($arrow) pr-4 @endif relative z-10">
      {{ $label }}
    </div>
    @if ($arrow)
      @svg('arrow-right', 'size-8 relative z-10 group-hover:translate-x-1 transition  duration-500')
    @endif

  </div>
</a>
