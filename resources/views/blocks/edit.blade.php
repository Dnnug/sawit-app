<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">Edit Blok: {{ $block->name }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('blocks.update', $block->id) }}" method="POST"
                class="bg-white p-8 shadow-sm sm:rounded-xl space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <x-input-label for="name" value="Nama Blok" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                        value="{{ old('name', $block->name) }}" required />
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="area" value="Luas (Hektar)" />
                        <x-text-input id="area" name="area" type="number" step="0.1"
                            class="mt-1 block w-full" value="{{ old('area', $block->area) }}" required />
                    </div>
                    <div>
                        <x-input-label for="year_planted" value="Tahun Tanam" />
                        <x-text-input id="year_planted" name="year_planted" type="number" class="mt-1 block w-full"
                            value="{{ old('year_planted', $block->year_planted) }}" required />
                    </div>
                </div>

                <div>
                    <x-input-label for="tree_count" value="Jumlah Pohon (Opsional)" />
                    <x-text-input id="tree_count" name="tree_count" type="number" class="mt-1 block w-full"
                        value="{{ old('tree_count', $block->tree_count) }}" />
                </div>

                <div>
                    <x-input-label for="description" value="Keterangan" />
                    <textarea id="description" name="description"
                        class="mt-1 block w-full border-slate-300 focus:border-green-500 focus:ring-green-500 rounded-lg shadow-sm">{{ old('description', $block->description) }}</textarea>
                </div>

                <div class="flex justify-between items-center">
                    <a href="{{ route('blocks.index') }}" class="text-slate-600 hover:underline text-sm">Batal</a>
                    <x-primary-button>Update Data</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
