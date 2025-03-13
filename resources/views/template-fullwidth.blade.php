{{--
  Template Name: Fullwidth Template
--}}

@extends('layouts.app')

@section('content')
  <div class="page-content prose relative">
    @while (have_posts())
      @php(the_post())
      @php(the_content())
    @endwhile
  </div>
@endsection
