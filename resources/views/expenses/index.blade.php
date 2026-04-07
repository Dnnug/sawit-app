<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-slate-800 leading-tight">Riwayat Keuangan / Pengeluaran</h2>
            <a href="{{ route('expenses.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-blue-700 transition">
                + Catat Pengeluaran
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div
                class="mb-6 bg-white p-6 rounded-xl shadow-sm border border-slate-100 flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-500 font-medium uppercase italic">Total Pengeluaran Tercatat</p>
                    <h3 class="text-3xl font-extrabold text-red-600">Rp {{ number_format($total_expense, 0, ',', '.') }}
                    </h3>
                </div>
                <div class="p-3 bg-red-50 rounded-full text-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
                    </svg>
                </div>
            </div>

            <div class="bg-white shadow-sm sm:rounded-xl overflow-hidden border border-slate-200">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-slate-50 border-b border-slate-200">
                        <tr>
                            <th class="py-4 px-6 text-sm font-semibold text-slate-700">Tanggal</th>
                            <th class="py-4 px-6 text-sm font-semibold text-slate-700">Keterangan</th>
                            <th class="py-4 px-6 text-sm font-semibold text-slate-700 text-center">Kategori</th>
                            <th class="py-4 px-6 text-sm font-semibold text-slate-700">Blok Terkait</th>
                            <th class="py-4 px-6 text-sm font-semibold text-slate-700 text-right">Nominal</th>
                            <th class="py-4 px-6 text-sm font-semibold text-slate-700 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($expenses as $expense)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="py-4 px-6 text-sm text-slate-600">
                                    {{ \Carbon\Carbon::parse($expense->date)->format('d/m/Y') }}
                                </td>
                                <td class="py-4 px-6">
                                    <span class="font-bold text-slate-800 block">{{ $expense->title }}</span>
                                    <span
                                        class="text-xs text-slate-400">{{ Str::limit($expense->description, 40) }}</span>
                                </td>
                                <td class="py-4 px-6 text-center">
                                    @php
                                        $colors = [
                                            'Pupuk' => 'bg-green-100 text-green-700',
                                            'Gaji' => 'bg-blue-100 text-blue-700',
                                            'Pestidida' => 'bg-yellow-100 text-yellow-700',
                                            'Alat' => 'bg-purple-100 text-purple-700',
                                            'Lainnya' => 'bg-slate-100 text-slate-700',
                                        ];
                                        $colorClass = $colors[$expense->category] ?? 'bg-slate-100 text-slate-700';
                                    @endphp
                                    <span class="px-3 py-1 rounded-full text-xs font-bold {{ $colorClass }}">
                                        {{ $expense->category }}
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-sm font-medium text-slate-600">
                                    {{ $expense->block->name ?? 'Umum' }}
                                </td>
                                <td class="py-4 px-6 text-right font-mono font-bold text-slate-900">
                                    Rp {{ number_format($expense->amount, 0, ',', '.') }}
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('expenses.edit', $expense->id) }}"
                                            class="p-1 text-slate-400 hover:text-blue-600 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus catatan ini?')">
                                            @csrf @method('DELETE')
                                            <button class="p-1 text-slate-400 hover:text-red-600 transition">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-10 text-center text-slate-500 italic">Belum ada catatan
                                    pengeluaran.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
