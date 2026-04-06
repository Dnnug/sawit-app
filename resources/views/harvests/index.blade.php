<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-slate-800 leading-tight">Log Aktivitas Panen</h2>
            <a href="{{ route('harvests.create') }}"
                class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-bold shadow-sm hover:bg-green-700 transition">
                + Catat Panen Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-emerald-100 border-l-4 border-emerald-500 text-emerald-700">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-xl overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-slate-50 border-b border-slate-200">
                        <tr>
                            <th class="py-4 px-6 text-sm font-semibold text-slate-700">Tanggal</th>
                            <th class="py-4 px-6 text-sm font-semibold text-slate-700">Blok Kebun</th>
                            <th class="py-4 px-6 text-sm font-semibold text-slate-700 text-right">Berat (Kg)</th>
                            <th class="py-4 px-6 text-sm font-semibold text-slate-700 text-center">Pekerja</th>
                            <th class="py-4 px-6 text-sm font-semibold text-slate-700">Catatan</th>
                            <th class="py-4 px-6 text-sm font-semibold text-slate-700 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($harvests as $harvest)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="py-4 px-6 text-sm text-slate-600">
                                    {{ \Carbon\Carbon::parse($harvest->harvest_date)->format('d M Y') }}
                                </td>
                                <td class="py-4 px-6">
                                    <span class="font-bold text-slate-800">{{ $harvest->block->name }}</span>
                                    <p class="text-xs text-slate-500">{{ $harvest->block->area }} Ha</p>
                                </td>
                                <td class="py-4 px-6 text-right font-mono font-bold text-green-700">
                                    {{ number_format($harvest->weight_count, 1, ',', '.') }} Kg
                                </td>
                                <td class="py-4 px-6 text-center text-sm text-slate-600">
                                    {{ $harvest->worker_count }} Orang
                                </td>
                                <td class="py-4 px-6 text-sm text-slate-500 italic">
                                    {{ Str::limit($harvest->notes, 30) ?? '-' }}
                                </td>
                                <td class="py-4 px-6 text-center flex justify-center space-x-3">
                                    <a href="{{ route('harvests.edit', $harvest->id) }}"
                                        class="text-blue-500 hover:text-blue-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('harvests.destroy', $harvest->id) }}" method="POST"
                                        onsubmit="return confirm('Hapus log panen ini?')">
                                        @csrf @method('DELETE')
                                        <button class="text-red-500 hover:text-red-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-10 text-center text-slate-500 italic">
                                    Belum ada data panen yang tercatat.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
