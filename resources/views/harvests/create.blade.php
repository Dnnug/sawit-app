<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">Input Hasil Panen</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('harvests.store') }}" method="POST"
                class="bg-white p-8 shadow-sm sm:rounded-xl space-y-6">
                @csrf

                <div>
                    <x-input-label for="block_id" value="Pilih Blok" />
                    <select name="block_id" id="block_id"
                        class="mt-1 block w-full border-slate-300 focus:border-green-500 focus:ring-green-500 rounded-lg shadow-sm">
                        <option value="">-- Pilih Blok --</option>
                        @foreach ($blocks as $block)
                            <option value="{{ $block->id }}">{{ $block->name }} ({{ $block->area }} Ha)</option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="harvest_date" value="Tanggal Panen" />
                        <x-text-input id="harvest_date" name="harvest_date" type="date" class="mt-1 block w-full"
                            required />
                    </div>
                    <div>
                        <x-input-label for="weight_count" value="Berat TBS (Kg)" />
                        <x-text-input id="weight_count" name="weight_count" type="number" step="0.1"
                            class="mt-1 block w-full" required />
                    </div>
                </div>

                <div>
                    <x-input-label for="worker_count" value="Jumlah Pekerja" />
                    <x-text-input id="worker_count" name="worker_count" type="number" class="mt-1 block w-full"
                        required />
                </div>

                <div class="mt-4">
                    <x-input-label for="notes" value="Catatan" />
                    <textarea id="notes" name="notes"
                        class="mt-1 block w-full border-slate-300 focus:border-green-500 focus:ring-green-500 rounded-lg shadow-sm"></textarea>
                </div>

                <div class="flex justify-end">
                    <x-primary-button>Simpan Log Panen</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
