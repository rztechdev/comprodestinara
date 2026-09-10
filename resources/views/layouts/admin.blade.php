<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin — @yield('title', 'Destinara Panel')</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..24,400,0..1,0" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100 antialiased font-normal text-gray-700 text-xs" x-data="{ sidebarOpen: false }">

<div class="flex h-screen overflow-hidden">
    {{-- Sidebar --}}
    <aside class="fixed inset-y-0 left-0 z-50 w-72 bg-[#392e2b] transform transition-transform duration-300 lg:translate-x-0 lg:static lg:inset-0 flex flex-col justify-between"
           :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
        <div>
            <div class="flex items-center justify-between h-14 px-5">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3" title="Destinara Admin">
                    <img src="{{ asset('assets/img/logo-mark-tight.png') }}" alt="Logo Destinara" class="h-8 w-auto object-contain drop-shadow-sm flex-shrink-0">
                    <div>
                        <span class="text-white font-bold text-sm tracking-wider uppercase">DESTINARA</span>
                        <span class="block text-[10px] text-white/50 tracking-normal">Panel Kurator &amp; Admin</span>
                    </div>
                </a>
                <button @click="sidebarOpen = false" class="lg:hidden text-white/60 hover:text-white">
                    <span class="material-symbols-outlined text-sm">close</span>
                </button>
            </div>

            <nav class="mt-2 px-3.5 space-y-1">
                @php
                    $unreadMessagesCount = \App\Models\ContactMessage::where('is_read', false)->count();
                    $navItems = [
                        ['route' => 'admin.dashboard', 'icon' => 'dashboard', 'label' => 'Dashboard'],
                        ['route' => 'admin.pages.index', 'prefix' => 'admin.pages.', 'icon' => 'web', 'label' => 'Konten Halaman'],
                        ['route' => 'admin.destinations.index', 'prefix' => 'admin.destinations.', 'icon' => 'explore', 'label' => 'Tapak Destinasi'],
                        ['route' => 'admin.stories.index', 'prefix' => 'admin.stories.', 'icon' => 'auto_stories', 'label' => 'Cerita Lapangan'],
                        ['route' => 'admin.programs.index', 'prefix' => 'admin.programs.', 'icon' => 'school', 'label' => 'Program & Layanan'],
                        ['route' => 'admin.team.index', 'prefix' => 'admin.team.', 'icon' => 'groups', 'label' => 'Dewan Kurator'],
                        ['route' => 'admin.stats.index', 'prefix' => 'admin.stats.', 'icon' => 'bar_chart', 'label' => 'Statistik Dampak'],
                        ['route' => 'admin.testimonials.index', 'prefix' => 'admin.testimonials.', 'icon' => 'format_quote', 'label' => 'Catatan & Testimoni'],
                        ['route' => 'admin.messages.index', 'prefix' => 'admin.messages.', 'icon' => 'mail', 'label' => 'Pesan Masuk', 'badge' => $unreadMessagesCount],
                        ['route' => 'admin.settings.index', 'icon' => 'settings', 'label' => 'Pengaturan Web'],
                    ];
                @endphp

                @foreach($navItems as $item)
                    @php $active = request()->routeIs($item['route']) || (isset($item['prefix']) && request()->routeIs($item['prefix'].'*')); @endphp
                    <a href="{{ route($item['route']) }}"
                       class="flex items-center justify-between px-3 py-2 rounded-lg text-xs transition-all
                              {{ $active ? 'bg-[#703a3a] text-white font-medium shadow-sm' : 'text-white/70 hover:bg-white/10 hover:text-white font-normal' }}">
                        <div class="flex items-center gap-2.5">
                            <span class="material-symbols-outlined text-[18px] flex-shrink-0 text-white/80">{{ $item['icon'] }}</span>
                            <span>{{ $item['label'] }}</span>
                        </div>
                        @if(!empty($item['badge']) && $item['badge'] > 0)
                            <span class="px-2 py-0.5 text-[10px] font-semibold bg-[#ffb3b2] text-[#392e2b] rounded-full">
                                {{ $item['badge'] }}
                            </span>
                        @endif
                    </a>
                @endforeach
            </nav>
        </div>

        <div class="p-3 border-t border-white/10 space-y-1">
            <a href="{{ route('admin.clear-cache') }}" class="flex items-center gap-2 text-white/60 hover:text-white text-xs transition-colors px-2 py-1 rounded hover:bg-white/5">
                <span class="material-symbols-outlined text-[16px]">cached</span>
                <span>Bersihkan Cache</span>
            </a>
            <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-2 text-white/60 hover:text-white text-xs transition-colors px-2 py-1 rounded hover:bg-white/5">
                <span class="material-symbols-outlined text-[16px]">open_in_new</span>
                <span>Lihat Website</span>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center gap-2 text-red-300 hover:text-red-100 text-xs transition-colors w-full px-2 py-1 rounded hover:bg-white/5 text-left">
                    <span class="material-symbols-outlined text-[16px]">logout</span>
                    <span>Keluar (Logout)</span>
                </button>
            </form>
        </div>
    </aside>

    {{-- Overlay --}}
    <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 z-40 bg-black/50 lg:hidden"></div>

    {{-- Main Container --}}
    <div class="flex-1 flex flex-col overflow-hidden">
        <header class="h-14 bg-white border-b border-gray-200 flex items-center justify-between px-5 flex-shrink-0">
            <div class="flex items-center gap-3">
                <button @click="sidebarOpen = true" class="lg:hidden text-gray-500 hover:text-gray-700">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center lg:hidden" title="Destinara Admin">
                    <img src="{{ asset('assets/img/logo-mark-tight.png') }}" alt="Logo Destinara" class="h-7 w-auto object-contain">
                </a>
                <h1 class="text-xs uppercase tracking-wider font-semibold text-gray-700">@yield('title', 'Dashboard')</h1>
            </div>
            <div class="flex items-center gap-3">
                <div class="text-right hidden sm:block">
                    <div class="text-xs font-medium text-gray-800">{{ auth()->user()?->name ?? 'Admin Destinara' }}</div>
                    <div class="text-[10px] text-gray-400">{{ auth()->user()?->email ?? 'admin@destinara.id' }}</div>
                </div>
                <div class="w-8 h-8 rounded-full bg-[#703a3a] flex items-center justify-center text-white text-xs font-semibold shadow-sm">
                    {{ strtoupper(substr(auth()->user()?->name ?? 'D', 0, 1)) }}
                </div>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto bg-gray-50 p-6">
            @if(session('success'))
                <div class="mb-4 p-3.5 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-lg text-xs flex items-center gap-2">
                    <span class="material-symbols-outlined text-emerald-600 text-[18px]">check_circle</span>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-4 p-3.5 bg-rose-50 border border-rose-200 text-rose-800 rounded-lg text-xs flex items-center gap-2">
                    <span class="material-symbols-outlined text-rose-600 text-[18px]">error</span>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-4 p-3.5 bg-rose-50 border border-rose-200 text-rose-800 rounded-lg text-xs">
                    <div class="font-medium mb-1">Mohon periksa kembali formulir:</div>
                    <ul class="list-disc pl-4 space-y-0.5">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>

</body>
</html>