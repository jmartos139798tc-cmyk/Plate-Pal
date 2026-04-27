<div
    class="animate-fade-up shadow-[0_8px_40px_rgba(26,18,8,0.10)] max-w-xl mx-auto bg-white rounded-2xl p-4 md:p-5"
    style="animation-delay: .18s"
>
    {{-- Top row: text input + location pill --}}
    <div class="flex flex-col sm:flex-row gap-3 mb-3">
        <input
            type="text"
            placeholder="Search native chicken, lechon, kare-kare..."
            class="flex-1 text-sm px-4 py-3 rounded-xl border border-brand-cream-dark bg-brand-cream/40 placeholder:text-brand-muted/60 text-brand-dark focus:outline-none focus:ring-2 focus:ring-brand-orange/30"
        >
        <div class="flex items-center gap-2 px-4 py-3 rounded-xl bg-green-50 border border-green-200 whitespace-nowrap">
            <span class="size-2 rounded-full bg-green-500 animate-pulse"></span>
            <span class="text-sm font-bold text-green-700">Tagum City</span>
        </div>
    </div>

    {{-- Bottom row: barangay select + CTA --}}
    <div class="flex flex-col sm:flex-row gap-3">
        <div class="relative flex-1">
            <select class="w-full appearance-none text-sm px-4 py-3 pr-10 rounded-xl border border-brand-cream-dark bg-white text-brand-muted focus:outline-none focus:ring-2 focus:ring-brand-orange/30 cursor-pointer">
                <option>All Barangays</option>
                <option>Magugpo Poblacion</option>
                <option>Apokon</option>
                <option>Visayan Village</option>
                <option>Mankilam</option>
                <option>New Balamban</option>
                <option>Pagsabangan</option>
                <option>Magugpo East</option>
                <option>Magugpo West</option>
                <option>San Isidro</option>
                <option>San Miguel</option>
                <option>San Agustin</option>
                <option>Nueva Fuerza</option>
                <option>Bincungan</option>
                <option>Busaon</option>
                <option>Canocotan</option>
                <option>La Filipina</option>
                <option>Liboganon</option>
                <option>Madaum</option>
                <option>Magugpo North</option>
                <option>Magugpo South</option>
                <option>Pandapan</option>
                <option>Pagsabangan</option>
                <option>Cuambogan</option>
            </select>
            <svg class="size-4 absolute right-3 top-1/2 -translate-y-1/2 text-brand-muted pointer-events-none"
                 fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
            </svg>
        </div>

        <button class="px-7 py-3 rounded-xl bg-brand-orange text-white text-sm font-bold whitespace-nowrap hover:bg-brand-orange-light active:scale-95 transition-all shadow-md shadow-brand-orange/30">
            Find Caterers
        </button>
    </div>
</div>
