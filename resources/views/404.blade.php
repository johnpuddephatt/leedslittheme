@extends('layouts.app')

@section('content')
  <div class="container my-24">
    @if (!have_posts())
      <x-alert type="warning">
        <h1 class="type-xl mb-2 text-center">Page not found</h1>
        <p class="text-center">{!! __('Sorry, but the page you are trying to view does not exist.', 'sage') !!}</p>
        {!! get_search_form(false) !!}

      </x-alert>
    @endif
  </div>
@endsection
