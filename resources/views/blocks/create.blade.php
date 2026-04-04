<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight italic">Tambah Data Blok</h2>
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
            <form action="{{ route('blocks.store') }}" method="POST"
                class="bg-white p-8 shadow-sm sm:rounded-xl space-y-6">
                @csrf
                <div>
                    <x-input-label for="name" value="Nama Blok" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required />
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="area" value="Luas (Hektar)" />
                        <x-text-input id="area" name="area" type="number" step="0.1"
                            class="mt-1 block w-full" required />
                    </div>
                    <div>
                        <x-input-label for="year_planted" value="Tahun Tanam" />
                        <x-text-input id="year_planted" name="year_planted" type="number" class="mt-1 block w-full"
                            required />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="tree_count" value="Jumlah Pohon (Opsional)" />
                        <x-text-input id="tree_count" name="tree_count" type="number" class="mt-1 block w-full" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="description" value="Keterangan / Lokasi Detail" />
                        <textarea id="description" name="description"
                            class="mt-1 block w-full border-slate-300 focus:border-green-500 focus:ring-green-500 rounded-lg shadow-sm"></textarea>
                    </div>
                </div>
                <div class="flex justify-end">
                    <x-primary-button>Simpan Data Blok</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
