@php
    $initials = strtoupper(substr($user->name, 0, 1) . (str_contains($user->name, ' ') ? substr($user->name, strpos($user->name, ' ') + 1, 1) : ''));
@endphp

<x-dashboard-layout
    title="Admin Dashboard – PlatePal"
    heading="Admin Dashboard"
    :username="$user->name"
    :initials="$initials"
>
    <x-slot:sidebar>
        <a href="#" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg bg-[#FDF6EE] text-[#E8642A] font-bold text-sm">
            <svg class="size-4 stroke-[#E8642A]" fill="none" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            Overview
        </a>
        <a href="#" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-[#1C1A17] hover:bg-[#FDF6EE] transition-colors text-sm font-medium">
            <svg class="size-4 stroke-[#8A7F72]" fill="none" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            Users
        </a>
        <a href="#" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-[#1C1A17] hover:bg-[#FDF6EE] transition-colors text-sm font-medium">
            <svg class="size-4 stroke-[#8A7F72]" fill="none" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
            Caterers
        </a>
        <a href="#" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-[#1C1A17] hover:bg-[#FDF6EE] transition-colors text-sm font-medium">
            <svg class="size-4 stroke-[#8A7F72]" fill="none" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h18M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            Bookings
        </a>
        <a href="#" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-[#1C1A17] hover:bg-[#FDF6EE] transition-colors text-sm font-medium">
            <svg class="size-4 stroke-[#8A7F72]" fill="none" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
            Reports
        </a>
    </x-slot:sidebar>

    <x-slot:sidebarFooter>
        <div class="border-t border-[#EDE4D8] pt-3 mt-3">
            <a href="#" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-[#1C1A17] hover:bg-[#FDF6EE] transition-colors text-sm font-medium">
                <svg class="size-4 stroke-[#8A7F72]" fill="none" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Settings
            </a>
        </div>
    </x-slot:sidebarFooter>

    {{-- Stats --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3.5 mb-5">
        @foreach([
            ['icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z', 'value' => '320', 'label' => 'Total Users'],
            ['icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4', 'value' => '48',  'label' => 'Active Caterers'],
            ['icon' => 'M8 7V3m8 4V3m-9 8h18M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z', 'value' => '156', 'label' => 'Total Bookings'],
            ['icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'value' => '₱890K', 'label' => 'Total Revenue'],
        ] as $stat)
        <div class="bg-white rounded-2xl p-5 border border-[#EDE4D8]">
            <div class="w-11 h-11 rounded-xl bg-[#FDF6EE] flex items-center justify-center mb-3.5">
                <svg class="w-[22px] h-[22px]" fill="none" stroke="#E8642A" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $stat['icon'] }}"/>
                </svg>
            </div>
            <div class="text-[30px] font-black text-[#1C1A17] leading-none mb-1">{{ $stat['value'] }}</div>
            <div class="text-xs text-[#8A7F72]">{{ $stat['label'] }}</div>
        </div>
        @endforeach
    </div>

    {{-- Recent Users + Recent Caterers --}}
    <div class="grid lg:grid-cols-2 gap-5 mb-5">
        <div class="bg-white rounded-2xl p-[22px] border border-[#EDE4D8]">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-base font-black text-[#1C1A17]">Recent Users</h3>
                <a href="#" class="text-xs font-bold text-[#E8642A] hover:text-[#F07C42] transition-colors">View All</a>
            </div>
            <div class="flex flex-col gap-2.5">
                @foreach([
                    ['name' => 'Juan Dela Cruz', 'email' => 'juan@example.com', 'role' => 'client',  'date' => 'Apr 26, 2026'],
                    ['name' => 'Maria Santos',   'email' => 'maria@example.com', 'role' => 'client',  'date' => 'Apr 25, 2026'],
                    ['name' => 'Pedro Reyes',    'email' => 'pedro@example.com', 'role' => 'caterer', 'date' => 'Apr 24, 2026'],
                ] as $u)
                <div class="flex items-center justify-between px-3.5 py-3 border border-[#EDE4D8] rounded-xl">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-[#E8642A] text-white text-xs font-bold flex items-center justify-center">
                            {{ strtoupper(substr($u['name'], 0, 1)) }}
                        </div>
                        <div>
                            <div class="text-sm font-bold text-[#1C1A17]">{{ $u['name'] }}</div>
                            <div class="text-xs text-[#8A7F72]">{{ $u['email'] }}</div>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="text-xs font-bold px-2 py-0.5 rounded-full {{ $u['role'] === 'caterer' ? 'bg-[#FFF8E1] text-[#F57F17]' : 'bg-[#EAF5E9] text-[#2E7D32]' }}">
                            {{ ucfirst($u['role']) }}
                        </span>
                        <div class="text-xs text-[#8A7F72] mt-1">{{ $u['date'] }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="bg-white rounded-2xl p-[22px] border border-[#EDE4D8]">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-base font-black text-[#1C1A17]">Pending Caterer Approvals</h3>
                <span class="text-xs font-bold text-[#E8642A]">{{ $pendingCaterers->count() }} pending</span>
            </div>
            @if($pendingCaterers->isEmpty())
                <p class="text-sm text-[#8A7F72] text-center py-6">No pending approvals.</p>
            @else
                <div class="flex flex-col gap-2.5">
                    @foreach($pendingCaterers as $caterer)
                    <div class="flex items-center justify-between px-3.5 py-3 border border-[#EDE4D8] rounded-xl">
                        <div>
                            <div class="text-sm font-bold text-[#1C1A17]">{{ $caterer->business_name ?? $caterer->name }}</div>
                            <div class="text-xs text-[#8A7F72]">📍 {{ $caterer->barangay }} · {{ $caterer->cuisine ?? 'No cuisine set' }}</div>
                            <div class="text-xs text-[#8A7F72]">{{ $caterer->email }}</div>
                        </div>
                        <div class="flex items-center gap-2">
                            <form method="POST" action="{{ route('admin.caterer.approve', $caterer) }}">
                                @csrf
                                <button class="px-3 py-1 rounded-lg bg-[#EAF5E9] text-[#2E7D32] text-xs font-bold hover:bg-green-200 transition-colors">Approve</button>
                            </form>
                            <form method="POST" action="{{ route('admin.caterer.reject', $caterer) }}">
                                @csrf
                                <button class="px-3 py-1 rounded-lg bg-red-50 text-red-500 text-xs font-bold hover:bg-red-100 transition-colors">Reject</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    {{-- Recent Bookings --}}
    <div class="bg-white rounded-2xl p-[22px] border border-[#EDE4D8]">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-base font-black text-[#1C1A17]">Recent Bookings</h3>
            <a href="#" class="text-xs font-bold text-[#E8642A] hover:text-[#F07C42] transition-colors">View All</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-[#EDE4D8]">
                        <th class="text-left text-xs font-bold text-[#8A7F72] uppercase pb-3">Client</th>
                        <th class="text-left text-xs font-bold text-[#8A7F72] uppercase pb-3">Caterer</th>
                        <th class="text-left text-xs font-bold text-[#8A7F72] uppercase pb-3">Event</th>
                        <th class="text-left text-xs font-bold text-[#8A7F72] uppercase pb-3">Date</th>
                        <th class="text-left text-xs font-bold text-[#8A7F72] uppercase pb-3">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#EDE4D8]">
                    @foreach([
                        ['client' => 'Juan Dela Cruz', 'caterer' => "Lola Maria's Kitchen", 'event' => 'Birthday Party',   'date' => 'Apr 20, 2026', 'status' => 'Confirmed', 'color' => 'bg-[#EAF5E9] text-[#2E7D32]'],
                        ['client' => 'Maria Santos',   'caterer' => 'Kusina ni Aling Nena',  'event' => 'Graduation Party', 'date' => 'May 5, 2026',  'status' => 'Confirmed', 'color' => 'bg-[#EAF5E9] text-[#2E7D32]'],
                        ['client' => 'Ana Cruz',       'caterer' => 'TasteBuds Catering',    'event' => 'Corporate Event',  'date' => 'Apr 28, 2026', 'status' => 'Pending',   'color' => 'bg-[#FFF8E1] text-[#F57F17]'],
                    ] as $b)
                    <tr>
                        <td class="py-3 font-medium text-[#1C1A17]">{{ $b['client'] }}</td>
                        <td class="py-3 text-[#8A7F72]">{{ $b['caterer'] }}</td>
                        <td class="py-3 text-[#8A7F72]">{{ $b['event'] }}</td>
                        <td class="py-3 text-[#8A7F72]">{{ $b['date'] }}</td>
                        <td class="py-3"><span class="text-xs font-bold px-2.5 py-1 rounded-full {{ $b['color'] }}">{{ $b['status'] }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-dashboard-layout>
