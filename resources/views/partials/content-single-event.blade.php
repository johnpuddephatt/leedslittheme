<article @php(post_class('overflow-hidden relative'))>
  <div x-data="eventHeader" class="container my-24 md:my-32">

    <canvas
      class="pointer-events-none absolute hidden aspect-square w-full translate-x-3/4 opacity-0 transition duration-1000 md:block md:aspect-[2] md:-translate-y-1/2 md:translate-x-1/2"
      id="event-orbits"></canvas>

    <a href="{{ get_permalink(get_option('page_for_events ')) }}" class="type-md">What’s On</a>

    <h1 class="type-2xl skip-none my-4 w-full text-balance underline decoration-1 md:my-6 md:w-2/3 md:pl-8 md:-indent-8">
      {!! $event->post_title !!}</h1>

    @if ($event->subtitle)
      <p class="type-md mb-8">{!! $event->subtitle !!}</p>
    @endif

    {!! $event->featured_image !!}

    <div class="mt-12 flex flex-col-reverse gap-12 lg:flex-row">
      <div class="flex-1">
        <div class="page-content prose xl:prose-lg">
          {!! $event->post_content !!}
        </div>
      </div>

      @if ($event->date || $event->venue || $event->address || $event->cost || $event->ticket_url)
        <div class="w-full flex-none lg:max-w-sm">
          <h2 class="mb-4 text-xl">Key information</h2>
          <table class="mb-4 w-full divide-y-2">
            @if ($event->date)
              <tr>
                <td class="border-b py-3 align-top md:px-4">Date</td>
                <td class="border-b px-4 py-3 align-top">{!! $event->date !!}
                  @if ($event->start_time)
                    <br> {!! $event->start_time !!}
                    @if ($event->end_time)
                      &mdash; {!! $event->end_time !!}
                    @endif
                  @endif

                </td>
              </tr>
            @endif
            @if ($event->venue)
              <tr>
                <td class="border-b py-3 align-top md:px-4">Venue</td>
                <td class="border-b px-4 py-3 align-top">{!! $event->venue !!}</td>
              </tr>
            @endif
            @if ($event->address)
              <tr>
                <td class="border-b py-3 align-top md:px-4">Address</td>
                <td class="border-b px-4 py-3 align-top">{!! nl2br($event->address) !!}</td>
              </tr>
            @endif
            @if ($event->cost)
              <tr>
                <td class="border-b py-3 align-top md:px-4">Cost</td>
                <td class="border-b px-4 py-3 align-top">{!! nl2br($event->cost) !!}</td>
              </tr>
            @endif
          </table>

          @if ($event->ticket_url)
            <x-button :big="true" :url="$event->ticket_url" :arrow="true" class="mt-12 w-full" target="_blank"
              rel="noopener noreferrer" label="Book now"></x-button>
          @endif
        </div>
      @endif
    </div>

</article>
