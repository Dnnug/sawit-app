<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            {{ __('Ringkasan Perkebunan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border-l-4 border-green-500 p-6">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-100 rounded-lg text-green-600 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-slate-500 font-medium uppercase">Total Blok</p>
                            <h3 class="text-2xl font-bold text-slate-800">12 Blok</h3>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border-l-4 border-emerald-500 p-6">
                    <div class="flex items-center">
                        <div class="p-3 bg-emerald-100 rounded-lg text-emerald-600 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 20l-5.447-2.724A2 2 0 013 15.488V5.512a2 2 0 011.553-1.954l5.447-1.362a2 2 0 011.002 0l5.447 1.362A2 2 0 0118 5.512v9.976a2 2 0 01-1.553 1.954L11 20a2 2 0 01-2 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-slate-500 font-medium uppercase">Luas Lahan</p>
                            <h3 class="text-2xl font-bold text-slate-800">250 Ha</h3>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border-l-4 border-yellow-500 p-6">
                    <div class="flex items-center">
                        <div class="p-3 bg-yellow-100 rounded-lg text-yellow-600 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-slate-500 font-medium uppercase">Produksi (Bulan Ini)</p>
                            <h3 class="text-2xl font-bold text-slate-800">45.2 Ton</h3>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border-l-4 border-blue-500 p-6">
                    <div class="flex items-center">
                        <div class="p-3 bg-blue-100 rounded-lg text-blue-600 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-slate-500 font-medium uppercase">Estimasi Hasil</p>
                            <h3 class="text-2xl font-bold text-slate-800">Rp 112M</h3>
                        </div>
                    </div>
                </div>

            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-8">
                <h4 class="text-lg font-bold text-slate-800 mb-4">Aktivitas Terakhir</h4>
                <div class="border-t border-slate-100">
                    <p class="py-4 text-slate-500 italic text-sm">Belum ada aktivitas terekam. Silahkan mulai input data
                        blok.</p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
