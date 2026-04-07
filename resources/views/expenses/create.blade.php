<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">Catat Pengeluaran Baru</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('expenses.store') }}" method="POST"
                class="bg-white p-8 shadow-sm sm:rounded-xl space-y-6 border border-slate-100">
                @csrf

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="date" value="Tanggal" />
                        <x-text-input id="date" name="date" type="date" class="mt-1 block w-full" required />
                    </div>
                    <div>
                        <x-input-label for="category" value="Kategori" />
                        <select name="category" id="category"
                            class="mt-1 block w-full border-slate-300 focus:border-green-500 focus:ring-green-500 rounded-lg shadow-sm">
                            <option value="Pupuk">Pupuk</option>
                            <option value="Gaji">Gaji / Upah</option>
                            <option value="Pestidida">Pestisida</option>
                            <option value="Alat">Peralatan</option>
                            <option value="Lainnya">Lain-lain</option>
                        </select>
                    </div>
                </div>

                <div>
                    <x-input-label for="title" value="Keterangan Singkat" />
                    <x-text-input id="title" name="title" type="text"
                        placeholder="Contoh: Beli 10 Karung Pupuk NPK" class="mt-1 block w-full" required />
                </div>

                <div>
                    <x-input-label for="block_id" value="Tautkan ke Blok (Opsional)" />
                    <select name="block_id" id="block_id"
                        class="mt-1 block w-full border-slate-300 focus:border-green-500 focus:ring-green-500 rounded-lg shadow-sm">
                        <option value="">-- Pengeluaran Umum (Tanpa Blok) --</option>
                        @foreach (\App\Models\Block::all() as $block)
                            <option value="{{ $block->id }}">{{ $block->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <x-input-label for="amount" value="Jumlah Nominal (Rp)" />
                    <x-text-input id="amount" name="amount" type="number" class="mt-1 block w-full" required />
                </div>

                <div class="flex justify-end pt-4">
                    <x-primary-button>Simpan Pengeluaran</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
