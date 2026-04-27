@props(['caterers' => []])

<section class="bg-[linear-gradient(#F1DEC5_30%,#F4EEEE_100%)] py-12 sm:py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">

        <div class="flex flex-col sm:flex-row items-start sm:items-end justify-between mb-6 sm:mb-8 gap-3 sm:gap-4">
            <h2 class="font-display text-2xl sm:text-3xl md:text-4xl font-black text-brand-dark">
                Featured Local Caterers
            </h2>
            <a href="#" class="group flex items-center gap-1 text-xs sm:text-sm font-bold text-brand-orange hover:text-brand-orange-light transition-colors">
                View All
                <svg class="size-3 sm:size-4 transition-transform group-hover:translate-x-1"
                     fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
            @foreach($caterers as $index => $caterer)
                <x-home.card
                    :name="$caterer['name']"
                    :location="$caterer['location']"
                    :cuisine="$caterer['cuisine']"
                    :rating="$caterer['rating']"
                    :reviews="$caterer['reviews']"
                    :price="$caterer['price']"
                    :image="$caterer['image']"
                    :delay="number_format(0.05 + $index * 0.07, 2) . 's'"
                />
            @endforeach
        </div>

    </div>
</section>
