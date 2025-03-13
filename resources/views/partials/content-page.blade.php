<article @php(post_class())>
  <div class="flex flex-col-reverse gap-12 lg:flex-row">
    @include('partials.page-sidebar')

    <div>
      <h2 class="type-2xl mb-4 max-w-3xl lg:mb-8">
        {!! $post->post_title !!}
      </h2>
      <div class="page-content prose xl:prose-lg" id="overview">
        {!! $content !!}
      </div>
    </div>
  </div>
</article>
