<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-slate-800 leading-tight">Daftar Blok Kebun</h2>
            <a href="{{ route('blocks.create') }}"
                class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-bold">+ Tambah Blok</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-xl p-6">
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-slate-200">
                            <th class="py-3 px-4">Nama Blok</th>
                            <th class="py-3 px-4">Luas (Ha)</th>
                            <th class="py-3 px-4">Tahun Tanam</th>
                            <th class="py-3 px-4">Deskripsi</th>
                            <th class="py-3 px-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blocks as $block)
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 px-4 font-medium">{{ $block->name }}</td>
                                <td class="py-3 px-4">{{ $block->area }} Ha</td>
                                <td class="py-3 px-4">{{ $block->year_planted }}</td>
                                <td class="py-3 px-4">{{ $block->description }}</td>
                                <td class="py-3 px-4">
                                    <a href="{{ route('blocks.edit', $block->id) }}"
                                        class="text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ route('blocks.destroy', $block->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus blok ini? Semua data terkait mungkin akan hilang.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 font-medium">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
