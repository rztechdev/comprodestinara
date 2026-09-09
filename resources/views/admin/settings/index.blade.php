@extends('layouts.admin')

@section('title', 'Pengaturan Website')

@section('content')
<div class="max-w-3xl mx-auto space-y-4">
    <h2 class="text-base font-semibold text-gray-800">Pengaturan Profil &amp; Narahubung Destinara</h2>

    <form action="{{ route('admin.settings.update') }}" method="POST" class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm space-y-5 text-xs">
        @csrf
        @method('PUT')

        <div class="space-y-4">
            <h3 class="font-bold text-gray-800 text-xs uppercase tracking-wider text-[#703a3a] border-b pb-1">Identitas Inisiatif</h3>
            <div>
                <label class="block font-medium text-gray-700 mb-1">Nama Brand</label>
                <input type="text" name="site_name" value="{{ $settings['site_name'] ?? 'Destinara' }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[#703a3a]">
            </div>
            <div>
                <label class="block font-medium text-gray-700 mb-1">Nama Legal Perusahaan (PT)</label>
                <input type="text" name="company_legal_name" value="{{ $settings['company_legal_name'] ?? 'PT DESTINARA CHAKRAWAL ARTHA' }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[#703a3a]">
            </div>
            <div>
                <label class="block font-medium text-gray-700 mb-1">Tagline Slogan</label>
                <input type="text" name="site_tagline" value="{{ $settings['site_tagline'] ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[#703a3a]">
            </div>
            <div>
                <label class="block font-medium text-gray-700 mb-1">Deskripsi Ringkas (SEO)</label>
                <textarea name="site_description" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[#703a3a]">{{ $settings['site_description'] ?? '' }}</textarea>
            </div>
        </div>

        <div class="space-y-4 pt-2">
            <h3 class="font-bold text-gray-800 text-xs uppercase tracking-wider text-[#703a3a] border-b pb-1">Narahubung &amp; Kantor</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium text-gray-700 mb-1">Surel (Email) Kemitraan</label>
                    <input type="email" name="contact_email" value="{{ $settings['contact_email'] ?? 'kemitraan@destinara.id' }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[#703a3a]">
                </div>
                <div>
                    <label class="block font-medium text-gray-700 mb-1">Nomor WhatsApp</label>
                    <input type="text" name="contact_whatsapp" value="{{ $settings['contact_whatsapp'] ?? '6281288904411' }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[#703a3a]">
                </div>
            </div>
            <div>
                <label class="block font-medium text-gray-700 mb-1">Alamat Sleman</label>
                <input type="text" name="address_sleman" value="{{ $settings['address_sleman'] ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[#703a3a]">
            </div>
            <div>
                <label class="block font-medium text-gray-700 mb-1">Alamat Jakarta</label>
                <input type="text" name="address_jakarta" value="{{ $settings['address_jakarta'] ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[#703a3a]">
            </div>
        </div>

        <div class="space-y-4 pt-2">
            <h3 class="font-bold text-gray-800 text-xs uppercase tracking-wider text-[#703a3a] border-b pb-1">Piagam Manifesto</h3>
            <div>
                <label class="block font-medium text-gray-700 mb-1">Kutipan</label>
                <textarea name="manifesto_quote" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[#703a3a]">{{ $settings['manifesto_quote'] ?? '' }}</textarea>
            </div>
            <div>
                <label class="block font-medium text-gray-700 mb-1">Atribusi</label>
                <input type="text" name="manifesto_author" value="{{ $settings['manifesto_author'] ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[#703a3a]">
            </div>
        </div>

        <div class="pt-4 border-t border-gray-100 flex justify-end">
            <button type="submit" class="px-6 py-2.5 bg-[#703a3a] hover:bg-[#582d2d] text-white font-medium rounded-lg shadow-sm">
                Simpan Semua Pengaturan
            </button>
        </div>
    </form>
</div>
@endsection
