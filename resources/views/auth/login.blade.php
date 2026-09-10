<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('site.auth.login_title') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Anti-FOUC Theme Script: Synchronized with Public & Admin Theme -->
    <script>
        (function() {
            try {
                var storedTheme = localStorage.getItem('destinara-theme');
                var systemPrefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
                if (storedTheme === 'dark' || (!storedTheme && systemPrefersDark)) {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            } catch (e) {}
        })();
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700;800&family=Newsreader:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..24,400,0..1,0" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#703a3a',
                    }
                }
            }
        };
    </script>
    <style>
        body { font-family: 'Work Sans', system-ui, sans-serif; }
        .font-serif-hero { font-family: 'Newsreader', Georgia, serif; }
    </style>
</head>
<body class="min-h-screen bg-[#392e2b] flex transition-colors duration-200">

    {{-- Left panel — branding --}}
    <div class="hidden lg:flex lg:w-1/2 flex-col justify-between p-12 relative overflow-hidden bg-[#392e2b]">
        {{-- Ambient decorative background --}}
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-[#703a3a]/20 rounded-full blur-2xl"></div>
            <div class="absolute bottom-0 left-0 w-72 h-72 bg-[#51634b]/20 rounded-full blur-2xl"></div>
        </div>

        <div class="relative flex items-center">
            <a href="{{ route('home') }}" class="inline-block" title="Destinara">
                <img src="{{ asset('assets/img/logo-mark-tight.png') }}" alt="Logo Destinara" class="h-14 w-auto object-contain drop-shadow-md">
            </a>
        </div>

        <div class="relative">
            <p class="text-[#ffb3b2] text-xs font-semibold uppercase tracking-widest mb-4">{{ __('site.auth.panel_title') }}</p>
            <h1 class="font-serif-hero text-4xl lg:text-5xl text-white leading-tight mb-5">
                {{ __('site.auth.hero_title') }}
            </h1>
            <p class="text-white/70 leading-relaxed max-w-md text-sm">
                {{ __('site.auth.hero_desc') }}
            </p>

            <div class="mt-10 flex gap-8">
                <div>
                    <div class="text-2xl font-bold text-white">14+</div>
                    <div class="text-white/50 text-xs mt-0.5">{{ __('site.auth.stat_destinations') }}</div>
                </div>
                <div>
                    <div class="text-2xl font-bold text-white">1.200+</div>
                    <div class="text-white/50 text-xs mt-0.5">{{ __('site.auth.stat_researchers') }}</div>
                </div>
                <div>
                    <div class="text-2xl font-bold text-white">100%</div>
                    <div class="text-white/50 text-xs mt-0.5">{{ __('site.auth.stat_ethics') }}</div>
                </div>
            </div>
        </div>

        <div class="relative text-white/40 text-xs">
            &copy; {{ date('Y') }} {{ __('site.auth.copyright') }}
        </div>
    </div>

    {{-- Right panel — login form --}}
    <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12 bg-white dark:bg-[#181211] text-gray-900 dark:text-[#ede0dc] transition-colors duration-200 relative">

        {{-- Floating Controls: Language Switcher & Theme Toggle Button --}}
        <div class="absolute top-5 right-5 z-20 flex items-center gap-2">
            <!-- Language Dropdown/Switcher -->
            <div class="relative" id="loginLangDropdownContainer">
                <button type="button" 
                        id="loginLangDropdownBtn" 
                        aria-expanded="false" 
                        aria-label="{{ __('site.nav.language') }}"
                        class="flex items-center gap-1.5 px-2.5 py-1.5 rounded-lg border border-gray-200 dark:border-[#382e2c] bg-gray-50 dark:bg-[#241c1a] text-gray-700 dark:text-[#ede0dc] hover:bg-gray-100 dark:hover:bg-[#2d2220] transition-all text-xs font-semibold uppercase tracking-wider cursor-pointer shadow-xs">
                    <span class="material-symbols-outlined text-[16px] text-[#703a3a] dark:text-[#ffb3b2]">translate</span>
                    <span>
                        @if(app()->getLocale() === 'en')
                            EN
                        @elseif(app()->getLocale() === 'zh')
                            中文
                        @elseif(app()->getLocale() === 'ja')
                            日本語
                        @elseif(app()->getLocale() === 'de')
                            DE
                        @elseif(app()->getLocale() === 'fr')
                            FR
                        @elseif(app()->getLocale() === 'nl')
                            NL
                        @else
                            ID
                        @endif
                    </span>
                    <span class="material-symbols-outlined text-[14px]">expand_more</span>
                </button>
                <div id="loginLangDropdownMenu" class="hidden absolute right-0 mt-1 w-36 rounded-lg bg-white dark:bg-[#241c1a] border border-gray-200 dark:border-[#382e2c] shadow-lg py-1 z-30">
                    <a href="{{ route('lang.switch', 'id') }}" class="flex items-center justify-between px-3 py-1.5 text-xs text-gray-700 dark:text-[#ede0dc] hover:bg-gray-100 dark:hover:bg-[#2d2220] {{ app()->getLocale() === 'id' ? 'font-bold text-[#703a3a] dark:text-[#ffb3b2]' : '' }}">
                        <span>🇮🇩 Indonesia</span>
                        @if(app()->getLocale() === 'id')<span class="material-symbols-outlined text-xs">check</span>@endif
                    </a>
                    <a href="{{ route('lang.switch', 'en') }}" class="flex items-center justify-between px-3 py-1.5 text-xs text-gray-700 dark:text-[#ede0dc] hover:bg-gray-100 dark:hover:bg-[#2d2220] {{ app()->getLocale() === 'en' ? 'font-bold text-[#703a3a] dark:text-[#ffb3b2]' : '' }}">
                        <span>🇬🇧 English</span>
                        @if(app()->getLocale() === 'en')<span class="material-symbols-outlined text-xs">check</span>@endif
                    </a>
                    <a href="{{ route('lang.switch', 'zh') }}" class="flex items-center justify-between px-3 py-1.5 text-xs text-gray-700 dark:text-[#ede0dc] hover:bg-gray-100 dark:hover:bg-[#2d2220] {{ app()->getLocale() === 'zh' ? 'font-bold text-[#703a3a] dark:text-[#ffb3b2]' : '' }}">
                        <span>🇨🇳 中文</span>
                        @if(app()->getLocale() === 'zh')<span class="material-symbols-outlined text-xs">check</span>@endif
                    </a>
                    <a href="{{ route('lang.switch', 'ja') }}" class="flex items-center justify-between px-3 py-1.5 text-xs text-gray-700 dark:text-[#ede0dc] hover:bg-gray-100 dark:hover:bg-[#2d2220] {{ app()->getLocale() === 'ja' ? 'font-bold text-[#703a3a] dark:text-[#ffb3b2]' : '' }}">
                        <span>🇯🇵 日本語</span>
                        @if(app()->getLocale() === 'ja')<span class="material-symbols-outlined text-xs">check</span>@endif
                    </a>
                    <a href="{{ route('lang.switch', 'de') }}" class="flex items-center justify-between px-3 py-1.5 text-xs text-gray-700 dark:text-[#ede0dc] hover:bg-gray-100 dark:hover:bg-[#2d2220] {{ app()->getLocale() === 'de' ? 'font-bold text-[#703a3a] dark:text-[#ffb3b2]' : '' }}">
                        <span>🇩🇪 Deutsch</span>
                        @if(app()->getLocale() === 'de')<span class="material-symbols-outlined text-xs">check</span>@endif
                    </a>
                    <a href="{{ route('lang.switch', 'fr') }}" class="flex items-center justify-between px-3 py-1.5 text-xs text-gray-700 dark:text-[#ede0dc] hover:bg-gray-100 dark:hover:bg-[#2d2220] {{ app()->getLocale() === 'fr' ? 'font-bold text-[#703a3a] dark:text-[#ffb3b2]' : '' }}">
                        <span>🇫🇷 Français</span>
                        @if(app()->getLocale() === 'fr')<span class="material-symbols-outlined text-xs">check</span>@endif
                    </a>
                    <a href="{{ route('lang.switch', 'nl') }}" class="flex items-center justify-between px-3 py-1.5 text-xs text-gray-700 dark:text-[#ede0dc] hover:bg-gray-100 dark:hover:bg-[#2d2220] {{ app()->getLocale() === 'nl' ? 'font-bold text-[#703a3a] dark:text-[#ffb3b2]' : '' }}">
                        <span>🇳🇱 Nederlands</span>
                        @if(app()->getLocale() === 'nl')<span class="material-symbols-outlined text-xs">check</span>@endif
                    </a>
                </div>
            </div>

            <!-- Theme Toggle Button -->
            <button id="loginThemeToggleBtn" 
                    type="button" 
                    aria-label="Ganti Tema Tampilan" 
                    title="Ganti Mode Tampilan" 
                    class="theme-toggle-btn flex items-center justify-center p-2 rounded-lg border border-gray-200 dark:border-[#382e2c] bg-gray-50 dark:bg-[#241c1a] text-gray-700 dark:text-[#ede0dc] hover:bg-gray-100 dark:hover:bg-[#2d2220] transition-all cursor-pointer shadow-xs">
                <span class="theme-icon-light material-symbols-outlined text-[18px] text-amber-600 dark:hidden">light_mode</span>
                <span class="theme-icon-dark material-symbols-outlined text-[18px] text-amber-200 hidden dark:inline-flex">dark_mode</span>
            </button>
        </div>

        <div class="w-full max-w-sm">

            <div class="mb-7">
                <div class="mb-5">
                    <a href="{{ route('home') }}" class="inline-block" title="Destinara">
                        <img src="{{ asset('assets/img/logo-mark-tight.png') }}" alt="Logo Destinara" class="h-12 w-auto object-contain">
                    </a>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ __('site.auth.login_heading') }}</h2>
                <p class="text-gray-500 dark:text-[#d5c2be] text-xs mt-1">{{ __('site.auth.login_subheading') }}</p>
            </div>

            @if($errors->any())
                <div class="mb-5 p-3.5 rounded-lg bg-red-50 dark:bg-rose-950/40 border border-red-200 dark:border-rose-900/50 text-red-700 dark:text-rose-300 text-xs">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-semibold text-gray-700 dark:text-[#ede0dc] mb-1.5">{{ __('site.auth.email_label') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                           placeholder="{{ __('site.auth.email_placeholder') }}"
                           class="w-full px-3.5 py-2.5 rounded-lg border border-gray-300 dark:border-[#4a3c39] bg-white dark:bg-[#221817] text-gray-900 dark:text-[#ede0dc] placeholder:text-gray-400 dark:placeholder:text-[#7d6b67] text-xs focus:outline-none focus:border-[#703a3a] dark:focus:border-[#ffb3b2] focus:ring-1 focus:ring-[#703a3a] dark:focus:ring-[#ffb3b2] transition-all">
                </div>

                <div>
                    <label for="password" class="block text-xs font-semibold text-gray-700 dark:text-[#ede0dc] mb-1.5">{{ __('site.auth.password_label') }}</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                           placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;"
                           class="w-full px-3.5 py-2.5 rounded-lg border border-gray-300 dark:border-[#4a3c39] bg-white dark:bg-[#221817] text-gray-900 dark:text-[#ede0dc] placeholder:text-gray-400 dark:placeholder:text-[#7d6b67] text-xs focus:outline-none focus:border-[#703a3a] dark:focus:border-[#ffb3b2] focus:ring-1 focus:ring-[#703a3a] dark:focus:ring-[#ffb3b2] transition-all">
                </div>

                <div class="flex items-center justify-between pt-1">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 dark:border-[#4a3c39] dark:bg-[#221817] text-[#703a3a] focus:ring-0">
                        <span class="text-xs text-gray-600 dark:text-[#c4b3af]">{{ __('site.auth.remember_me') }}</span>
                    </label>
                </div>

                <button type="submit"
                        class="w-full py-2.5 px-4 rounded-lg bg-[#703a3a] hover:bg-[#582d2d] dark:bg-[#8C5151] dark:hover:bg-[#703a3a] text-white font-semibold text-xs transition-colors shadow-sm mt-2 cursor-pointer">
                    {{ __('site.auth.submit_button') }}
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-gray-100 dark:border-[#382e2c] text-center">
                <a href="{{ route('home') }}" class="text-xs text-[#703a3a] dark:text-[#ffb3b2] hover:underline font-medium">&larr; {{ __('site.auth.back_to_home') }}</a>
            </div>

        </div>
    </div>

    {{-- Script Sinkronisasi Tema & Bahasa --}}
    <script>
        (function() {
            // Theme toggle
            const toggleBtn = document.getElementById('loginThemeToggleBtn');
            function isDarkMode() {
                return document.documentElement.classList.contains('dark');
            }
            function applyTheme(theme) {
                if (theme === 'dark') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('destinara-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('destinara-theme', 'light');
                }
            }
            if (toggleBtn) {
                toggleBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    applyTheme(isDarkMode() ? 'light' : 'dark');
                });
            }
            window.addEventListener('storage', function(e) {
                if (e.key === 'destinara-theme') {
                    applyTheme(e.newValue);
                }
            });

            // Language dropdown toggle
            const langBtn = document.getElementById('loginLangDropdownBtn');
            const langMenu = document.getElementById('loginLangDropdownMenu');
            if (langBtn && langMenu) {
                langBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    langMenu.classList.toggle('hidden');
                });
                document.addEventListener('click', function(e) {
                    if (!langBtn.contains(e.target) && !langMenu.contains(e.target)) {
                        langMenu.classList.add('hidden');
                    }
                });
            }
        })();
    </script>

</body>
</html>
