<footer class="bg-brand-dark text-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-14">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mb-10">

            {{-- Brand --}}
            <div>
                <div class="flex items-center gap-2 mb-4">
                    <img src="/assets/PlatePal_logo.jpg" alt="PlatePal" class="size-7 rounded-lg object-cover">
                    <span class="text-lg font-black tracking-wider">PLATEPAL</span>
                </div>
                <p class="text-sm text-white/45 leading-relaxed max-w-xs">
                    Connecting Tagum City's best home-based caterers with the community since 2026.
                </p>
            </div>

            {{-- For Clients --}}
            <div>
                <p class="text-xs font-bold uppercase tracking-widest text-white/80 mb-4">For Clients</p>
                <ul class="flex flex-col gap-2.5">
                    @foreach(['Browse Caterers', 'How It Works', 'Client Reviews'] as $link)
                        <li>
                            <a href="#" class="text-sm text-white/45 hover:text-white transition-colors">
                                {{ $link }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- For Caterers --}}
            <div>
                <p class="text-xs font-bold uppercase tracking-widest text-white/80 mb-4">For Caterers</p>
                <ul class="flex flex-col gap-2.5">
                    @foreach(['Join as Caterer', 'Pricing', 'Success Stories'] as $link)
                        <li>
                            <a href="#" class="text-sm text-white/45 hover:text-white transition-colors">
                                {{ $link }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>

        <div class="border-t border-white/10 pt-6 text-center text-xs text-white/25">
            © {{ date('Y') }} PlatePal Tagum City. All rights reserved.
        </div>

    </div>
</footer>
