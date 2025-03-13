<div class="not-prose wp-block {{ $block->classes }} relative mx-auto" style="{{ $block->inlineStyle }}">

  <div
    class="bg-{{ $behind_color ?? 'transparent' }} absolute -top-16 left-1/2 -z-10 h-[calc(50%+4rem)] w-screen !max-w-none -translate-x-1/2 2xl:-top-24 2xl:h-[calc(50%+6rem)]">
  </div>

  {!! $block->preview || ($type == 'link' && !$link) ? '<div' : '<a' !!} href="{{ $type == 'page' ? get_the_permalink($page) : $link }}"
  class="bg-{{ $background_colour ?? 'white' }} {{ $block->block->align == 'full' ? 'my-12 2xl:my-16' : 'my-8 mx-4  rounded-medium ' }} relative z-10 block cursor-pointer overflow-hidden border !font-normal">
  <div class="group relative flex items-center">
    <div class="hidden w-64 max-w-[50%] self-stretch overflow-hidden bg-black/5 md:block">
      @if ($type == 'page')
        {!! get_the_post_thumbnail($page, 'landscape', [
            'sizes' => '16rem',
            'class' =>
                ' h-auto group-hover:scale-105 ease-in-out transition-transform duration-1000' .
                ($block->block->align ? ' w-96' : ' w-64'),
        ]) !!}
      @elseif ($image)
        {!! wp_get_attachment_image($image, 'landscape', false, [
            'sizes' => '16rem',
            'class' => ' h-auto group-hover:scale-105 ease-in-out transition-transform duration-1000 w-96',
        ]) !!}
      @endif
    </div>
    <div class="{{ $block->block->align == 'full' ? 'max-w-xl text-xl' : 'max-w-lg' }} px-6 py-4">
      <h2 class="{{ $block->block->align == 'full' ? 'type-lg mb-2 md:mb-4' : 'type-md mb-1 md:mb-2' }}">
        {{ $type == 'page' ? get_the_title($page) : $heading }}
      </h2>
      <div class="leading-snug">{!! $type == 'page' ? get_the_excerpt($page) : $content !!}</div>
      @if ($type == 'page' || $link)
        <div class="{{ $block->block->align == 'full' ? 'mt-4' : 'mt-2' }} font-semibold">Read more</div>
      @endif

    </div>
  </div>
  {!! $block->preview || ($type == 'link' && !$link)
      ? '
                  </div>'
      : '</a>' !!}
</div>
