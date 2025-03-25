{{--
  Template Name: Events Template
--}}

@extends('layouts.app')

@section('content')

  <div class="container my-32 2xl:my-48" x-data="{ layout: '{{ $_GET['layout'] ?? 'list' }}' }">
    <div class="flex flex-col justify-between md:flex-row md:items-end">
      <h1 class="type-2xl">
        What’s On</h1>

      <div class="mt-4 flex items-center gap-2 self-end">
        <div>Display:</div>
        <a href="?layout=list" class="rounded-full px-6 py-0.5"
          :class="layout === 'list' ? 'bg-black text-white' : 'bg-pink bg-opacity-15'">List</a>
        <a href="?layout=grid" class="rounded-full px-6 py-0.5"
          :class="layout === 'grid' ? 'bg-black text-white' : 'bg-pink bg-opacity-15'">Grid</a>
      </div>

    </div>

    @if (($_GET['layout'] ?? false) === 'grid')
      <div class="mt-36 grid grid-cols-1 gap-8 md:grid-cols-2 md:gap-x-12 md:gap-y-24 lg:grid-cols-3">
        @foreach ($events as $event)
          <x-event-card :event="$event" />
        @endforeach
      </div>
    @else
      @foreach ($events as $event)
        @if ($loop->first || get_field('date', $event->ID) !== get_field('date', $events[$loop->index - 1]->ID))
          <h2 class="type-lg border-b pb-8 pt-16">
            {{ wp_date(get_option('date_format'), strtotime(get_field('date', $event->ID))) }}</h2>
        @endif
        <x-event-card variant="horizontal" :event="$event" />
      @endforeach
    @endif
  </div>
  </div>

@endsection
