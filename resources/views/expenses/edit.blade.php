<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">Edit Catatan Pengeluaran</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('expenses.update', $expenses->id) }}" method="POST"
                class="bg-white p-8 shadow-sm sm:rounded-xl space-y-6 border border-slate-100">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="date" value="Tanggal" />
                        <x-text-input id="date" name="date" type="date" class="mt-1 block w-full"
                            value="{{ old('date', $expenses->date) }}" required />
                    </div>
                    <div>
                        <x-input-label for="category" value="Kategori" />
                        <select name="category" id="category"
                            class="mt-1 block w-full border-slate-300 focus:border-green-500 focus:ring-green-500 rounded-lg shadow-sm">
                            @foreach (['Pupuk', 'Gaji', 'Pestidida', 'Alat', 'Lainnya'] as $cat)
                                <option value="{{ $cat }}"
                                    {{ old('category', $expenses->category) == $cat ? 'selected' : '' }}>
                                    {{ $cat == 'Gaji' ? 'Gaji / Upah' : $cat }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <x-input-label for="title" value="Keterangan Singkat" />
                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                        value="{{ old('title', $expenses->title) }}" required />
                </div>

                <div>
                    <x-input-label for="block_id" value="Tautkan ke Blok (Opsional)" />
                    <select name="block_id" id="block_id"
                        class="mt-1 block w-full border-slate-300 focus:border-green-500 focus:ring-green-500 rounded-lg shadow-sm">
                        <option value="">-- Pengeluaran Umum (Tanpa Blok) --</option>
                        @foreach ($blocks as $block)
                            <option value="{{ $block->id }}"
                                {{ old('block_id', $expenses->block_id) == $block->id ? 'selected' : '' }}>
                                {{ $block->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <x-input-label for="amount" value="Jumlah Nominal (Rp)" />
                    <x-text-input id="amount" name="amount" type="number" class="mt-1 block w-full"
                        value="{{ old('amount', $expenses->amount) }}" required />
                </div>

                <div>
                    <x-input-label for="description" value="Catatan Tambahan" />
                    <textarea name="description"
                        class="mt-1 block w-full border-slate-300 focus:border-green-500 focus:ring-green-500 rounded-lg shadow-sm">{{ old('description', $expenses->description) }}</textarea>
                </div>

                <div class="flex justify-between items-center pt-4">
                    <a href="{{ route('expenses.index') }}" class="text-slate-500 hover:underline">Batal</a>
                    <x-primary-button>Update Pengeluaran</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
