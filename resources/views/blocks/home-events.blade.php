@if (count($events))
  <div class="alignfull not-prose bg-gray py-16">
    <div class="container">
      <h2 class="skip-none type-2xl mt-0 font-serif text-white underline decoration-1">{{ $heading ?: 'Events' }}</h2>

      <div class="my-12 grid grid-cols-1 gap-x-8 gap-y-8 md:grid-cols-2 lg:grid-cols-3 lg:gap-y-12">
        @foreach ($events as $event)
          <x-event-card bg="bg-white" :variant="$loop->first ? 'large' : 'default'" :event="$event" />
        @endforeach
      </div>

      @if ($link)
        <div class="flex justify-center">
          <x-button class="text-white" :invert="true" :arrow="true" :label="$link['title']" :url="$link['url']"
            :target="$link['target']" />
        </div>
      @endif

    </div>
  </div>
@endif
