<div class="alignfull not-prose bg-gray py-16">
  <div class="container">
    <h2 class="type-xl mt-0 font-serif text-white">{{ $heading ?: 'Events' }}</h2>

    <div class="mt-12 grid grid-cols-1 gap-8 text-white md:grid-cols-2 lg:grid-cols-3">
      @foreach ($events as $event)
        <x-event-card :variant="$loop->first ? 'large' : 'default'" :event="$event" />
      @endforeach

    </div>
  </div>
</div>
