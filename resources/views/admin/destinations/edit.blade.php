@extends('layouts.admin')

@section('title', 'Edit Destinasi')

@section('content')
<div class="max-w-4xl mx-auto space-y-4">
    <div class="flex items-center justify-between">
        <h2 class="text-base font-semibold text-gray-800">Edit Tapak Destinasi: {{ $destination->name }}</h2>
        <a href="{{ route('admin.destinations.index') }}" class="text-xs text-gray-500 hover:underline flex items-center gap-1">
            <span class="material-symbols-outlined text-sm">arrow_back</span>
            <span>Kembali ke Daftar</span>
        </a>
    </div>

    <form action="{{ route('admin.destinations.update', $destination->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm space-y-4 text-xs">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-medium text-gray-700 mb-1">Nama Tapak Destinasi *</label>
                <input type="text" name="name" value="{{ old('name', $destination->name) }}" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[#703a3a]">
            </div>

            <div>
                <label class="block font-medium text-gray-700 mb-1">Kategori Wilayah / Lanskap *</label>
                <select name="category" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[#703a3a]">
                    <option value="budaya" {{ old('category', $destination->category) === 'budaya' ? 'selected' : '' }}>Budaya &amp; Tradisi</option>
                    <option value="ekologi" {{ old('category', $destination->category) === 'ekologi' ? 'selected' : '' }}>Ekologi &amp; Hutan</option>
                    <option value="pangan" {{ old('category', $destination->category) === 'pangan' ? 'selected' : '' }}>Kemandirian Pangan</option>
                    <option value="bahari" {{ old('category', $destination->category) === 'bahari' ? 'selected' : '' }}>Lanskap Bahari</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-medium text-gray-700 mb-1">Lokasi Administratif *</label>
                <input type="text" name="location" value="{{ old('location', $destination->location) }}" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[#703a3a]">
            </div>

            <div>
                <label class="block font-medium text-gray-700 mb-1">Label / Badge</label>
                <input type="text" name="badge" value="{{ old('badge', $destination->badge) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[#703a3a]">
            </div>
        </div>

        <div>
            <label class="block font-medium text-gray-700 mb-1">Ringkasan Pembuka (Lead)</label>
            <textarea name="lead" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[#703a3a]">{{ old('lead', $destination->lead) }}</textarea>
        </div>

        <div>
            <label class="block font-medium text-gray-700 mb-1">Deskripsi Narasi Lengkap</label>
            <textarea name="description" rows="5" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[#703a3a]">{{ old('description', $destination->description) }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-medium text-gray-700 mb-1">Nama Modul Pembelajaran</label>
                <input type="text" name="module_name" value="{{ old('module_name', $destination->module_name) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[#703a3a]">
            </div>

            <div>
                <label class="block font-medium text-gray-700 mb-1">Kapasitas Maksimal Rombongan</label>
                <input type="text" name="capacity" value="{{ old('capacity', $destination->capacity) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[#703a3a]">
            </div>
        </div>

        <div>
            <label class="block font-medium text-gray-700 mb-1">Fokus Riset Pembelajaran</label>
            <textarea name="research_focus" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[#703a3a]">{{ old('research_focus', $destination->research_focus) }}</textarea>
        </div>

        <div>
            <label class="block font-medium text-gray-700 mb-1">Foto Utama (Upload / Ganti)</label>
            <input type="file" name="image" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-lg">
            @if($destination->image_path)
                <div class="mt-2 flex items-center gap-2">
                    <span class="text-gray-400 text-[11px]">Foto saat ini:</span>
                    <img src="{{ $destination->image_url }}" alt="Preview" class="h-10 w-16 object-cover rounded">
                </div>
            @endif
        </div>

        <div class="flex items-center gap-6 pt-2">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $destination->is_featured) ? 'checked' : '' }} class="rounded text-[#703a3a] focus:ring-0">
                <span class="font-medium text-gray-700">Tampilkan di Beranda (Featured)</span>
            </label>

            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $destination->is_active) ? 'checked' : '' }} class="rounded text-[#703a3a] focus:ring-0">
                <span class="font-medium text-gray-700">Status Aktif</span>
            </label>
        </div>

        <div class="pt-4 border-t border-gray-100 flex justify-end gap-3">
            <a href="{{ route('admin.destinations.index') }}" class="px-4 py-2 border border-gray-300 text-gray-600 rounded-lg hover:bg-gray-50">Batal</a>
            <button type="submit" class="px-5 py-2 bg-[#703a3a] text-white font-medium rounded-lg hover:bg-[#582d2d] shadow-sm">
                Perbarui Destinasi
            </button>
        </div>
    </form>
</div>
@endsection
