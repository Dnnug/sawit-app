<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">Edit Log Panen</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('harvests.update', $harvests->id) }}" method="POST"
                class="bg-white p-8 shadow-sm sm:rounded-xl space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <x-input-label for="block_id" value="Pilih Blok" />
                    <select name="block_id" id="block_id"
                        class="mt-1 block w-full border-slate-300 focus:border-green-500 focus:ring-green-500 rounded-lg shadow-sm">
                        @foreach ($blocks as $block)
                            <option value="{{ $block->id }}"
                                {{ $harvests->block_id == $block->id ? 'selected' : '' }}>
                                {{ $block->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="harvest_date" value="Tanggal Panen" />
                        <x-text-input id="harvest_date" name="harvest_date" type="date" class="mt-1 block w-full"
                            value="{{ $harvests->harvests_date }}" required />
                    </div>
                    <div>
                        <x-input-label for="weight_count" value="Berat TBS (Kg)" />
                        <x-text-input id="weight_count" name="weight_count" type="number" step="0.1"
                            class="mt-1 block w-full" value="{{ $harvests->weight_count }}" required />
                    </div>
                </div>

                <div>
                    <x-input-label for="worker_count" value="Jumlah Pekerja" />
                    <x-text-input id="worker_count" name="worker_count" type="number" class="mt-1 block w-full"
                        value="{{ $harvests->worker_count }}" required />
                </div>

                <div>
                    <x-input-label for="notes" value="Catatan" />
                    <textarea name="notes"
                        class="mt-1 block w-full border-slate-300 focus:border-green-500 focus:ring-green-500 rounded-lg shadow-sm">{{ $harvests->notes }}</textarea>
                </div>

                <div class="flex justify-between items-center">
                    <a href="{{ route('harvests.index') }}" class="text-slate-500 hover:underline">Batal</a>
                    <x-primary-button>Update Log Panen</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
