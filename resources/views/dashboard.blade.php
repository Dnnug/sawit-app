<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">Ringkasan Performa Perkebunan</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                <div class="bg-white p-6 rounded-2xl shadow-sm border-b-4 border-orange-500">
                    <p class="text-xs font-bold text-slate-400 uppercase">Total Produksi</p>
                    <h3 class="text-2xl font-black text-slate-800">{{ number_format($total_weight / 1000, 2) }} <span
                            class="text-sm font-normal">Ton</span></h3>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border-b-4 border-blue-500">
                    <p class="text-xs font-bold text-slate-400 uppercase">Estimasi Omzet</p>
                    <h3 class="text-2xl font-black text-blue-600">Rp {{ number_format($total_revenue, 0, ',', '.') }}
                    </h3>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border-b-4 border-red-500">
                    <p class="text-xs font-bold text-slate-400 uppercase">Total Biaya</p>
                    <h3 class="text-2xl font-black text-red-600">Rp {{ number_format($total_expense, 0, ',', '.') }}
                    </h3>
                </div>

                <div
                    class="bg-white p-6 rounded-2xl shadow-sm border-b-4 border-green-500 {{ $net_profit < 0 ? 'border-red-500' : '' }}">
                    <p class="text-xs font-bold text-slate-400 uppercase">Laba Bersih (Estimasi)</p>
                    <h3 class="text-2xl font-black {{ $net_profit < 0 ? 'text-red-600' : 'text-green-600' }}">
                        Rp {{ number_format($net_profit, 0, ',', '.') }}
                    </h3>
                </div>

            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-6 border-b border-slate-50">
                    <h3 class="font-bold text-slate-800">Log Panen Terbaru</h3>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
