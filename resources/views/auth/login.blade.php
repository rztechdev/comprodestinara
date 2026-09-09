<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Destinara Admin</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700;800&family=Newsreader:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Work Sans', system-ui, sans-serif; }
        .font-serif-hero { font-family: 'Newsreader', Georgia, serif; }
    </style>
</head>
<body class="min-h-screen bg-[#392e2b] flex">

    {{-- Left panel — branding --}}
    <div class="hidden lg:flex lg:w-1/2 flex-col justify-between p-12 relative overflow-hidden bg-[#392e2b]">
        {{-- Ambient decorative background --}}
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-[#703a3a]/20 rounded-full blur-2xl"></div>
            <div class="absolute bottom-0 left-0 w-72 h-72 bg-[#51634b]/20 rounded-full blur-2xl"></div>
        </div>

        <div class="relative flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-[#703a3a] text-white flex items-center justify-center font-bold text-xl shadow-md">
                D
            </div>
            <span class="text-white font-extrabold text-xl tracking-wider">DESTINARA</span>
        </div>

        <div class="relative">
            <p class="text-[#ffb3b2] text-xs font-semibold uppercase tracking-widest mb-4">Ruang Kurator &amp; Fasilitator</p>
            <h1 class="font-serif-hero text-4xl lg:text-5xl text-white leading-tight mb-5">
                Menghidupkan Ruang Belajar Nyata di Tapak Nusantara
            </h1>
            <p class="text-white/70 leading-relaxed max-w-md text-sm">
                Dashboard terpusat untuk mengelola katalog tapak studi, warta lapangan, modul pembelajaran kontekstual, dan permohonan konsultasi sekolah serta gugus riset.
            </p>

            <div class="mt-10 flex gap-8">
                <div>
                    <div class="text-2xl font-bold text-white">14+</div>
                    <div class="text-white/50 text-xs mt-0.5">Tapak Terkurasi</div>
                </div>
                <div>
                    <div class="text-2xl font-bold text-white">1.200+</div>
                    <div class="text-white/50 text-xs mt-0.5">Peneliti Lapangan</div>
                </div>
                <div>
                    <div class="text-2xl font-bold text-white">100%</div>
                    <div class="text-white/50 text-xs mt-0.5">Etika Asas FPIC</div>
                </div>
            </div>
        </div>

        <div class="relative text-white/40 text-xs">
            &copy; {{ date('Y') }} Destinara Nusantara. Hak Cipta Dilindungi.
        </div>
    </div>

    {{-- Right panel — login form --}}
    <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12 bg-white">
        <div class="w-full max-w-sm">

            {{-- Mobile branding --}}
            <div class="flex items-center gap-2.5 mb-8 lg:hidden">
                <div class="w-9 h-9 rounded-lg bg-[#703a3a] text-white flex items-center justify-center font-bold text-lg">
                    D
                </div>
                <span class="text-gray-900 font-extrabold text-lg">DESTINARA</span>
            </div>

            <div class="mb-7">
                <h2 class="text-2xl font-bold text-gray-900">Masuk ke Panel</h2>
                <p class="text-gray-500 text-xs mt-1">Masukkan email dan password akun administrator Destinara</p>
            </div>

            @if($errors->any())
                <div class="mb-5 p-3.5 rounded-lg bg-red-50 border border-red-200 text-red-700 text-xs">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-semibold text-gray-700 mb-1.5">Alamat Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                           placeholder="kemitraan@destinara.id"
                           class="w-full px-3.5 py-2.5 rounded-lg border border-gray-300 text-xs focus:outline-none focus:border-[#703a3a] focus:ring-1 focus:ring-[#703a3a] transition-all">
                </div>

                <div>
                    <label for="password" class="block text-xs font-semibold text-gray-700 mb-1.5">Kata Sandi</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                           placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;"
                           class="w-full px-3.5 py-2.5 rounded-lg border border-gray-300 text-xs focus:outline-none focus:border-[#703a3a] focus:ring-1 focus:ring-[#703a3a] transition-all">
                </div>

                <div class="flex items-center justify-between pt-1">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-[#703a3a] focus:ring-0">
                        <span class="text-xs text-gray-600">Ingat sesi ini</span>
                    </label>
                </div>

                <button type="submit"
                        class="w-full py-2.5 px-4 rounded-lg bg-[#703a3a] hover:bg-[#582d2d] text-white font-semibold text-xs transition-colors shadow-sm mt-2">
                    Masuk ke Dashboard
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                <a href="{{ route('home') }}" class="text-xs text-[#703a3a] hover:underline font-medium">&larr; Kembali ke Halaman Depan</a>
            </div>

        </div>
    </div>

</body>
</html>
