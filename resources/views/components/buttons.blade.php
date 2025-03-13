@props(['buttons' => null, 'invert' => false])

@if ($buttons)
  <div class="mt-6 flex flex-col items-start gap-2 lg:mt-8">
    @foreach ($buttons as $button)
      @php($page = get_post($button['page']))

      @if ($page)
        <a href="{{ get_permalink($page) }}"
          class="{{ $invert ? 'bg-black text-white' : 'bg-white' }} inline-block rounded-full bg-opacity-80 px-10 py-2.5 font-semibold transition duration-300 hover:bg-opacity-100">{{ $button['text'] ?: $page->post_title }}</a>
      @endif
    @endforeach
  </div>
@endif
