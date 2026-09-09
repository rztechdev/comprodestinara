@extends('layouts.admin')

@section('title', 'Kelola Destinasi')

@section('content')
<div class="space-y-4">
    <div class="flex items-center justify-between">
        <h2 class="text-base font-semibold text-gray-800">Daftar Tapak Destinasi ({{ $destinations->total() }})</h2>
        <a href="{{ route('admin.destinations.create') }}" class="px-4 py-2 bg-[#703a3a] hover:bg-[#582d2d] text-white rounded-lg text-xs font-medium flex items-center gap-1.5 shadow-sm transition-colors">
            <span class="material-symbols-outlined text-[18px]">add</span>
            <span>Tambah Destinasi Baru</span>
        </a>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-gray-50 text-gray-500 uppercase text-[10px] border-b border-gray-200">
                    <tr>
                        <th class="p-3.5">Tapak</th>
                        <th class="p-3.5">Kategori</th>
                        <th class="p-3.5">Lokasi</th>
                        <th class="p-3.5">Kapasitas</th>
                        <th class="p-3.5">Status</th>
                        <th class="p-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($destinations as $dest)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="p-3.5">
                                <div class="flex items-center gap-3">
                                    <img src="{{ $dest->image_url }}" alt="{{ $dest->name }}" class="w-12 h-9 rounded-lg object-cover flex-shrink-0">
                                    <div>
                                        <div class="font-semibold text-gray-800 text-xs">{{ $dest->name }}</div>
                                        <div class="text-[11px] text-gray-400">{{ $dest->badge ?? '-' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="p-3.5 uppercase font-medium text-[11px] text-amber-800">{{ $dest->category }}</td>
                            <td class="p-3.5 text-gray-600">{{ $dest->location }}</td>
                            <td class="p-3.5 text-gray-600">{{ $dest->capacity ?? '-' }}</td>
                            <td class="p-3.5">
                                @if($dest->is_active)
                                    <span class="px-2 py-0.5 bg-emerald-100 text-emerald-800 rounded-full text-[10px] font-medium">Aktif</span>
                                @else
                                    <span class="px-2 py-0.5 bg-gray-100 text-gray-600 rounded-full text-[10px] font-medium">Nonaktif</span>
                                @endif
                            </td>
                            <td class="p-3.5 text-right space-x-2">
                                <a href="{{ route('admin.destinations.edit', $dest->id) }}" class="text-blue-600 hover:text-blue-800 font-medium">Edit</a>
                                <form action="{{ route('admin.destinations.destroy', $dest->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus destinasi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-600 hover:text-rose-800 font-medium">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-6 text-center text-gray-400">Belum ada destinasi tersimpan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-gray-100">
            {{ $destinations->links() }}
        </div>
    </div>
</div>
@endsection
