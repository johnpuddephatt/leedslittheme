<header
  class="fixed left-0 right-0 top-4 z-20 before:fixed before:inset-0 before:-z-10 before:bg-black/80 before:transition before:duration-1000"
  :class="{
      '': menuOpen,
      'before:pointer-events-none before:opacity-0': !menuOpen
  }">

  <div class="container">
    <div class="relative flex max-w-none items-center justify-between bg-opacity-95 shadow-lg"
      :class="{ 'bg-pink-light': menuOpen, 'bg-white': !menuOpen }">
      <a label="Go to homepage" class="flex flex-row items-center gap-1.5 uppercase" href="{{ home_url('/') }}">

        <x-logo-simple class="" />

      </a>

      <button @click="menuOpen = true" :class="{ 'hidden': menuOpen }"
        class="flex items-center gap-1 px-6 py-1.5 text-sm uppercase lg:hidden" aria-label="Open navigation menu"
        title="Open navigation menu">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
          stroke="currentColor" class="size-5 -translate-y-0.5">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>

        Menu
      </button>

      <button @click="menuOpen = false" :class="{ 'hidden': !menuOpen }"
        class="flex items-center gap-1 px-6 py-1.5 text-sm uppercase lg:hidden" aria-label="Close navigation menu"
        title="Close navigation menu"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
          stroke-width="1.5" stroke="currentColor" class="size-5 -translate-y-0.5">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
        Menu
      </button>

      @if ($primaryNavigation)

        <nav x-cloak :class="{ 'max-lg:-translate-y-12 max-lg:opacity-0 max-lg:pointer-events-none': !menuOpen }"
          class="flex flex-col justify-center overflow-y-auto transition duration-500 max-lg:absolute max-lg:left-0 max-lg:right-0 max-lg:top-full max-lg:-z-10 max-lg:max-h-[75vh] max-lg:w-full max-lg:bg-white max-lg:py-12">

          <ul :class="{ 'max-lg:-translate-y-6 max-lg:opacity-0': !menuOpen }"
            class="flex flex-col gap-4 pr-8 transition delay-200 duration-500 max-lg:container lg:flex-row lg:gap-8">
            @foreach ($primaryNavigation as $item)
              <li>
                <a class="inline-block lg:p-2" href="{{ $item->url }}">{!! $item->label !!}</a>
              </li>
            @endforeach
          </ul>

          @if ($secondaryNavigation)
            <nav :class="{ 'max-lg:-translate-y-6 max-lg:opacity-0': !menuOpen }"
              class="container mt-6 border-t border-opacity-30 pt-6 lg:hidden">
              <ul class="flex flex-col gap-2 font-semibold lg:text-lg">
                @foreach ($secondaryNavigation as $item)
                  <li>
                    <a class="inline-block lg:p-3" href="{{ $item->url }}">{!! $item->label !!}</a>
                  </li>
                @endforeach
              </ul>
            </nav>
          @endif
        </nav>
      @endif
    </div>
  </div>
</header>
