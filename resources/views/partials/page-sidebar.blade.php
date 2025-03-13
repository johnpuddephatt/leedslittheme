@if ($sidebarMenu)
  <aside class="2xl:[w-24rem] pt-4 lg:w-[16rem] lg:pb-12 xl:w-[20rem]">
    <nav class="">
      <a class="@if ($section->permalink == get_permalink()) bg-opacity-100 @else bg-opacity-0 @endif container mb-4 block bg-pink py-4 text-xl hover:bg-opacity-50"
        href="{{ $section->permalink }}">
        {!! $section->title !!}

      </a>

      <ul class="page-sidebar-tree">
        {!! $sidebarMenu !!}
      </ul>
    </nav>
  </aside>
@endif
