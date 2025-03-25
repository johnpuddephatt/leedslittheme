<div class="alignfull overflow-hidden bg-white py-24" x-data="newsletter">
  <div class="container grid grid-cols-1 items-center gap-8 md:grid-cols-2 md:gap-0">
    <div>
      <h2 class="type-xl mb-4 mt-0 text-balance font-serif">{{ $heading }}</h2>
      <p>{{ $subheading }}</p>

      <form id="mc-embedded-subscribe-form" class="validate max-w-md pt-4" action="{{ $mailchimp_form_url }}" method="post"
        name="mc-embedded-subscribe-form" novalidate="" target="_blank">
        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input tabindex="-1"
            name="b_27860ab2b8185d0189fb1222c_b2ae2b005f" type="text" value=""></div>

        <input id="mce-EMAIL" class="email block w-full border bg-transparent px-4 py-2" name="EMAIL" required=""
          type="email" value="" placeholder="Your Email Address">

        <button type="submit" class="group relative mt-4 block w-full">

          <div
            class="relative flex h-12 items-center justify-between overflow-hidden bg-pink px-4 py-2 text-center text-black !no-underline transition-all duration-1000">
            <div
              class="absolute left-0 top-0 h-full w-[150%] -translate-x-full bg-gradient-to-r from-blue to-transparent duration-1000 will-change-transform group-hover:translate-x-0">
            </div>
            <div class="relative z-10">
              Subscribe
            </div>
            @svg('arrow-right', 'ml-4 size-8 relative z-10 group-hover:translate-x-1 transition  duration-500')

          </div>
        </button>

      </form>
    </div>

    <div class="relative z-10">
      <canvas
        class="pointer-events-none absolute -inset-24 z-20 h-[calc(100%+12rem)] w-[calc(100%+12rem)] opacity-0 transition duration-1000"
        id="newsletter-orbits"></canvas>
      <div class="animate-float">
        <div class="absolute inset-0.5 -z-10 bg-blue" id="newsletter-canvas-wrapper">
        </div>
        @svg('cutout-2', ' w-full h-auto text-white')
        @svg('cutout-1', ' absolute inset-0 w-full h-auto text-white')
      </div>
    </div>
  </div>
