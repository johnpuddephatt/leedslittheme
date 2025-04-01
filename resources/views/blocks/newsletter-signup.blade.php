<div class="alignfull overflow-hidden bg-white py-24" x-data="newsletter">
  <div class="container grid grid-cols-1 items-center gap-8 md:grid-cols-2 md:gap-0">
    <div>
      <h2 class="type-xl mb-4 mt-0 text-balance font-serif">{{ $heading }}</h2>
      <p>{{ $subheading }}</p>

      <form class="js-cm-form max-w-md pt-4" " id="subForm" action="https://www.createsend.com/t/subscribeerror?description="
          method="post"
          data-id="191722FC90141D02184CB1B62AB3DC2699088582091C04B7DEDD82E079F655BBD450ABBB81806B3CD2F2F79BFD0911B1CAACC8618D469C8584375502C56AF069">
          <div>
            <div><input placeholder="Your email address"  aria-label="Email address" autocomplete="Email"
                class="js-cm-email-input email qa-input-email block w-full border bg-transparent px-4 py-2" id="fieldEmail" maxlength="200"
                

                name="cm-tjjllul-tjjllul"
                required="" type="email"></div>
          </div>
          
          <button class="group relative mt-4 block w-full" type="submit">
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
      <script type="text/javascript" src="https://js.createsend1.com/javascript/copypastesubscribeformlogic.js"></script>
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
</div>
