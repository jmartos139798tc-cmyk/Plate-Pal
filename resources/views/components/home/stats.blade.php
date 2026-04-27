@props([
    'stats' => [
        ['value' => '48+',  'label' => 'Home caterers'],
        ['value' => '12',   'label' => 'Barangays Covered'],
        ['value' => '320+', 'label' => 'Events Served'],
    ]
])

<div class="animate-fade-up flex justify-center mt-10" style="animation-delay: .25s">
    @foreach($stats as $index => $stat)
        <div class="{{ $index > 0 ? 'border-l border-[color-mix(in_srgb,#6B5E4E_25%,transparent)] pl-8 md:pl-12' : '' }} px-8 md:px-12 text-center">
            <p class="font-display text-3xl md:text-4xl font-black text-brand-dark">
                {{ $stat['value'] }}
            </p>
            <p class="text-xs md:text-sm text-brand-muted font-medium mt-0.5">
                {{ $stat['label'] }}
            </p>
        </div>
    @endforeach
</div>
