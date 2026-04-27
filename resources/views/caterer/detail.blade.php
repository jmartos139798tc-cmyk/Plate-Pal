@php
    $initials = strtoupper(substr($user?->name ?? 'U', 0, 1) . (str_contains($user?->name ?? 'U', ' ') ? substr($user?->name ?? 'U', strpos($user?->name ?? 'U', ' ') + 1, 1) : ''));
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $caterer->business_name }} – PlatePal</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,800;0,900;1,700&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-body antialiased">
    <div class="flex flex-col min-h-screen">
        {{-- NAVBAR --}}
        <nav class="sticky top-0 z-40 bg-white border-b border-white shadow-sm">
            <div class="px-6 lg:px-8 py-4 flex items-center justify-between">
                {{-- Logo --}}
                <a href="{{ route('client.browse') }}" class="flex items-center gap-2">
                    <img src="/assets/PlatePal_logo.jpg" alt="PlatePal" class="size-8 rounded-lg object-cover">
                    <div class="flex flex-col">
                        <span class="text-sm font-display tracking-tight text-gray-900 leading-none">PLATE<span class="text-[#f44e08]">PAL</span></span>
                    </div>
                </a>

                {{-- Right side --}}
                <div class="flex items-center gap-6">
                    <a href="{{ route('client.browse') }}" class="text-sm font-medium text-[#8A7F72] hover:text-[#1C1A17] transition-colors flex items-center gap-1">
                        <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                        Back to Browse
                    </a>
                    @if($user)
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center gap-2.5 px-3 py-1.5 rounded-full border border-[#EDE4D8] bg-white hover:bg-[#FDF6EE] transition-colors">
                            <div class="w-[34px] h-[34px] rounded-full bg-[#E8642A] text-white text-xs font-bold flex items-center justify-center shrink-0">{{ $initials }}</div>
                            <svg class="size-3.5 text-[#8A7F72]" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                        </button>

                        {{-- Dropdown Menu --}}
                        <div x-show="open" @click.outside="open = false" x-transition
                            class="absolute right-0 mt-2 w-48 bg-white border border-[#EDE4D8] rounded-2xl shadow-lg py-1.5 z-50">
                            <a href="{{ route('client.dashboard') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-[#1C1A17] hover:bg-[#FDF6EE] transition-colors">
                                Dashboard
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-2.5 px-4 py-2.5 text-sm text-red-500 hover:bg-red-50 transition-colors">
                                    Sign Out
                                </button>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </nav>

        {{-- MAIN CONTENT --}}
        <main class="flex-1 py-8">
            <div class="max-w-6xl mx-auto px-4">
                {{-- Back Link --}}
                <a href="{{ route('client.browse') }}" class="text-sm font-medium text-[#E8642A] hover:text-[#F07C42] transition-colors inline-flex items-center gap-1 mb-6">
                    <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                    Back to Browse
                </a>

                {{-- Header Section --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                    {{-- Image --}}
                    <div class="rounded-2xl overflow-hidden h-80 lg:h-96 bg-[#FDF6EE] flex items-center justify-center">
                        @if($caterer->profile_image)
                            <img src="{{ $caterer->profile_image }}" alt="{{ $caterer->business_name }}" class="w-full h-full object-cover">
                        @else
                            <svg class="size-32 text-[#D3CCBE]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12c0-1.89.713-3.633 1.878-4.948M15.75 12A6.75 6.75 0 006.75 12m6 0a6.75 6.75 0 11-13.5 0m13.5 0h1.5m-1.5 6.75h.008v.008h-.008v-.008zM2.25 12c0 1.89.713 3.633 1.878 4.948M3.75 12H3m4.47-4.47a2.25 2.25 0 1 1 3.182 3.182m-3.182-3.182l-3.5 3.5a2.25 2.25 0 0 1 3.182-3.182m0 0l3.5-3.5m-3.5 3.5l3.5 3.5"/></svg>
                        @endif
                    </div>

                    {{-- Info Section --}}
                    <div>
                        <div class="flex items-start justify-between mb-2">
                            <div>
                                <h1 class="text-3xl font-black text-[#1C1A17] mb-1">{{ $caterer->business_name }}</h1>
                                <p class="text-sm text-[#8A7F72] flex items-center gap-1">
                                    <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    {{ $caterer->barangay }}, Tagum City
                                </p>
                            </div>
                            <button class="p-3 rounded-full border border-[#EDE4D8] text-[#E8642A] hover:bg-[#FDF6EE] transition-colors">
                                <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                            </button>
                        </div>

                        {{-- Rating & Reviews --}}
                        <div class="flex items-center gap-4 mb-4">
                            <div class="flex items-center gap-1">
                                <svg class="size-5 fill-[#F59E0B]" viewBox="0 0 24 24"><path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <span class="text-lg font-black text-[#1C1A17]">{{ number_format($caterer->rating ?? 0, 1) }}</span>
                                <span class="text-sm text-[#8A7F72]">(127 reviews)</span>
                            </div>
                        </div>

                        {{-- Details Grid --}}
                        <div class="grid grid-cols-2 gap-4 mb-6 pb-6 border-b border-[#EDE4D8]">
                            <div>
                                <p class="text-xs text-[#8A7F72] mb-1">Price Range</p>
                                <p class="text-lg font-bold text-[#E8642A]">₱{{ $caterer->price_min }}-{{ $caterer->price_max }}/head</p>
                            </div>
                            <div>
                                <p class="text-xs text-[#8A7F72] mb-1">Serving Capacity</p>
                                <p class="text-lg font-bold text-[#1C1A17]">{{ $caterer->min_guest }}-{{ $caterer->max_guest }} guests</p>
                            </div>
                        </div>

                        {{-- Contact Info --}}
                        <div class="space-y-3 mb-6">
                            <div class="flex items-center gap-3 text-sm">
                                <svg class="size-5 stroke-[#8A7F72]" fill="none" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                <span>{{ $caterer->phone }}</span>
                            </div>
                            @if($caterer->email)
                            <div class="flex items-center gap-3 text-sm">
                                <svg class="size-5 stroke-[#8A7F72]" fill="none" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                <span>{{ $caterer->email }}</span>
                            </div>
                            @endif
                        </div>

                        {{-- Action Buttons --}}
                        <div class="grid grid-cols-2 gap-3">
                            <button class="px-6 py-3 rounded-xl bg-[#E8642A] text-white font-bold hover:bg-[#F07C42] transition-colors">
                                Book Now
                            </button>
                            <button class="px-6 py-3 rounded-xl border border-[#E8642A] text-[#E8642A] font-bold hover:bg-[#FDF6EE] transition-colors">
                                Send Message
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Description --}}
                @if($caterer->description)
                <div class="mb-8 p-6 bg-[#FDF6EE] rounded-2xl border border-[#EDE4D8]">
                    <p class="text-[#1C1A17] leading-relaxed">{{ $caterer->description }}</p>
                </div>
                @endif

                {{-- Packages Section --}}
                <div class="mb-8">
                    <h2 class="text-2xl font-black text-[#1C1A17] mb-6">Our Packages</h2>

                    @if($packages->isEmpty())
                        <div class="bg-white rounded-2xl p-12 border border-[#EDE4D8] text-center">
                            <svg class="size-16 text-[#D3CCBE] mx-auto mb-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.5v2.25m3-6v6m3-6v2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125V4.875c0-.621-.504-1.125-1.125-1.125H2.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/></svg>
                            <p class="text-[#8A7F72] font-medium">No packages available yet</p>
                        </div>
                    @else
                        <div class="space-y-4">
                            @foreach($packages as $package)
                            <div class="bg-white rounded-2xl p-6 border border-[#EDE4D8] hover:shadow-lg transition-shadow">
                                <div class="flex items-start justify-between mb-4">
                                    <div>
                                        <h3 class="text-lg font-bold text-[#1C1A17]">{{ $package->name }}</h3>
                                        @if($package->description)
                                        <p class="text-sm text-[#8A7F72] mt-1">{{ $package->description }}</p>
                                        @endif
                                    </div>
                                    <div class="text-right">
                                        <p class="text-2xl font-black text-[#E8642A]">₱{{ number_format($package->price, 0) }}/head</p>
                                        <p class="text-xs text-[#8A7F72]">Min: {{ $package->min_guests }} guests</p>
                                    </div>
                                </div>

                                @if($package->includes && is_array($package->includes))
                                <div class="mb-4">
                                    <p class="text-sm font-bold text-[#1C1A17] mb-2">Package Includes:</p>
                                    <ul class="space-y-1 text-sm text-[#8A7F72]">
                                        @foreach($package->includes as $item)
                                        <li class="flex items-center gap-2">
                                            <svg class="size-4 text-[#E8642A]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                            {{ $item }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <div class="flex gap-3 pt-4 border-t border-[#EDE4D8]">
                                    <button class="flex-1 px-4 py-2.5 rounded-lg bg-[#E8642A] text-white text-sm font-bold hover:bg-[#F07C42] transition-colors">
                                        Select Package
                                    </button>
                                    <button class="px-4 py-2.5 rounded-lg border border-[#EDE4D8] text-[#1C1A17] text-sm font-medium hover:bg-[#FDF6EE] transition-colors">
                                        Customize
                                    </button>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </main>
    </div>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
