<div x-data="homeHero"
  class="alignfull not-prose relative flex h-[90vh] w-screen flex-col items-center justify-center">
  <div class="absolute inset-0 -z-20 bg-blue"></div>
  <img src="{{ asset('images/bg.jpg') }} " id="fallback"
    class="fixed inset-0 -z-10 h-[90vh] w-screen object-cover opacity-0 transition-opacity delay-1000 duration-[3000ms]"
    loading="lazy" />

  <div id="hero-gradient-wrapper" class="fixed -z-10 h-[90vh] w-screen">
  </div>

  <canvas class="absolute h-[90vh] w-screen opacity-0 transition-opacity duration-[5000ms]" id="orbits"></canvas>

  <div id="halo"
    class="bg-radial pointer-events-none absolute inset-0 z-20 from-transparent from-50% to-white/30 opacity-0 delay-1000 duration-[3000ms]">
  </div>
  <div id="content"
    class="relative flex flex-col items-center justify-center opacity-0 transition-opacity duration-[4000ms]">
    <x-logo class="mb-12 w-24 md:w-40" />

    <h1 class="text-center font-serif text-3xl md:text-4xl lg:text-5xl">
      {{ $heading }}
    </h1>

    @if ($link)
      <x-button class="mt-8" :arrow="true" :invert="true" :label="$link['title']" :url="$link['url']"
        :target="$link['target']" />
    @endif
  </div>
</div>
