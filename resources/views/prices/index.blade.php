<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight italic">
            Manajemen Harga TBS (Tandan Buah Segar)
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Notifikasi -->
            @if (session('success'))
                <div class="bg-emerald-100 border-l-4 border-emerald-500 text-emerald-700 p-4 rounded shadow-sm mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Form Section -->
                <div class="md:col-span-1">
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                        <h3 class="text-lg font-bold text-slate-800 mb-4">Input Harga Baru</h3>
                        <form action="{{ route('prices.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <x-input-label for="date" value="Pilih Tanggal" />
                                <x-text-input id="date" name="date" type="date" class="mt-1 block w-full"
                                    value="{{ date('Y-m-d') }}" required />
                                <p class="text-[10px] text-slate-400 mt-1">*Jika tanggal sama, harga lama akan
                                    diperbarui.</p>
                            </div>

                            <div>
                                <x-input-label for="price_per_kg" value="Harga (Rp / Kg)" />
                                <div class="relative mt-1">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-slate-500 sm:text-sm font-bold">Rp</span>
                                    </div>
                                    <input type="number" name="price_per_kg" id="price_per_kg"
                                        class="pl-10 block w-full border-slate-300 focus:border-green-500 focus:ring-green-500 rounded-lg shadow-sm"
                                        placeholder="Contoh: 2500" value="{{ $latest_price->price_per_kg ?? '' }}"
                                        required>
                                </div>
                            </div>

                            <x-primary-button class="w-full justify-center py-3 bg-green-700 hover:bg-green-800">
                                Simpan / Update Harga
                            </x-primary-button>
                        </form>
                    </div>
                </div>

                <!-- History Table Section -->
                <div class="md:col-span-2">
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                        <div class="p-6 border-b border-slate-50 flex justify-between items-center">
                            <h3 class="text-lg font-bold text-slate-800">Riwayat Harga Terakhir</h3>
                            <span class="text-xs font-medium text-slate-500 uppercase tracking-wider">Urutan
                                Terbaru</span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left">
                                <thead class="bg-slate-50">
                                    <tr>
                                        <th class="py-4 px-6 text-xs font-bold text-slate-500 uppercase">Tanggal</th>
                                        <th class="py-4 px-6 text-xs font-bold text-slate-500 uppercase text-right">
                                            Harga Per Kg</th>
                                        <th class="py-4 px-6 text-xs font-bold text-slate-500 uppercase text-center">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100">
                                    @forelse($prices as $price)
                                        <tr class="hover:bg-slate-50/80 transition">
                                            <td class="py-4 px-6 text-slate-700 font-medium">
                                                {{ \Carbon\Carbon::parse($price->date)->translatedFormat('d F Y') }}
                                            </td>
                                            <td class="py-4 px-6 text-right font-mono font-bold text-green-600">
                                                Rp {{ number_format($price->price_per_kg, 0, ',', '.') }}
                                            </td>
                                            <td class="py-4 px-6 text-center">
                                                <form action="{{ route('prices.destroy', $price->id) }}" method="POST"
                                                    onsubmit="return confirm('Hapus data harga ini?')">
                                                    @csrf @method('DELETE')
                                                    <button class="text-red-400 hover:text-red-600">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="py-10 text-center text-slate-400 italic">Belum ada
                                                riwayat harga.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="p-4 bg-slate-50">
                            {{ $prices->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
