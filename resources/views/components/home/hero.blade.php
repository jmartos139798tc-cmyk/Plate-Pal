<section class="relative overflow-hidden min-h-150 flex items-center bg-[linear-gradient(#E3BC8C_0%,#F1DEC5_70%)]">

    @php
        $heroPancit = asset('assets/Pancit.png');
        $heroGuisado = asset('assets/Guisado.png');
    @endphp

    {{-- Decorative food images --}}
    <div class="absolute left-0 bottom-0 w-56 lg:w-72 pointer-events-none select-none">
        <img
            src={{ $heroPancit }}
            alt=""
            class="w-full h-80 object-cover rounded-tr-3xl block"
        >
    </div>
    <div class="absolute right-0 top-0 w-48 lg:w-67 pointer-events-none select-none z-10">
        <img
            src={{ $heroGuisado }}
            alt=""
            class="w-full h-auto object-cover rounded-bl-3xl block"
        >
    </div>

    <div class="relative max-w-7xl mx-auto px-6 lg:px-8 py-20 text-center w-full">

        {{-- Pill badge --}}
        <div class="animate-fade-in inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-brand-orange/40 bg-white/60 backdrop-blur-sm mb-6">
            <span class="text-[0.7rem] font-bold tracking-[.12em] text-brand-orange uppercase">
                Tagum City's Home Kitchen Marketplace
            </span>
        </div>

        {{-- Headline --}}
        <h1
            class="animate-fade-up font-display text-4xl md:text-5xl lg:text-6xl font-black leading-tight mb-4"
            style="animation-delay: .05s"
        >
            Find <em class="text-brand-orange not-italic">authentic</em> home<br>
            cooking for your next event
        </h1>

        {{-- Subheading --}}
        <p
            class="animate-fade-up text-brand-muted text-base md:text-lg max-w-md mx-auto mb-10"
            style="animation-delay: .12s"
        >
            Connect with talented home-based caterers right in your barangay —
            real food, real people, no middlemen.
        </p>

        {{-- Search box --}}
        <x-home.search-box />

        {{-- Stats --}}
        <x-home.stats />

    </div>
</section>
