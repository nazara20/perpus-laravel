<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Halaman Rak Buku
        </h2>
        <div class="text-sm text-gray-500">Halaman untuk memanajemen Data Rak Buku</div>
    </x-slot>
    
    <div class="py-12">
        @if (session('success'))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-3">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Berhasil!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-md p-4 mb-4">
                <div class="flex justify-between mb-3">
                    <div class="mb-2 font-bold">Data Rak Buku</div>
                    <a href="{{ route('bookshelf.create') }}" class="bg-blue-950 text-white rounded-md text-sm py-2 px-3">Tambah Data Rak Buku</a>
                </div>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th class="px-6 py-3">
                                    No                                
                                </th>
                                <th class="px-6 py-3">
                                    Kode Rak
                                </th>
                                <th class="px-6 py-3">
                                    Nama Rak
                                </th>
                                <th class="px-6 py-3">
                                    Tanggal Dibuat
                                </th>
                                <th class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookshelfs as $item)
                                <tr class="bg-white border-b">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $loop->iteration }}
                                    </th>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->code }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $item->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->created_at }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('bookshelf.edit', $item->id) }}" class="text-blue-950 hover:underline">Edit</a>
                                        <form action="{{ route('bookshelf.destroy', $item->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


