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
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-slate-200">
                            <th class="py-3 px-4">Nama Blok</th>
                            <th class="py-3 px-4">Luas (Ha)</th>
                            <th class="py-3 px-4">Tahun Tanam</th>
                            <th class="py-3 px-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blocks as $block)
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 px-4 font-medium">{{ $block->name }}</td>
                                <td class="py-3 px-4">{{ $block->area }} Ha</td>
                                <td class="py-3 px-4">{{ $block->year_planted }}</td>
                                <td class="py-3 px-4">
                                    <a href="{{ route('blocks.edit', $block->id) }}"
                                        class="text-blue-600 hover:underline">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
