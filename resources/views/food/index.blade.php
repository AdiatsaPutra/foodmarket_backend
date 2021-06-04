<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Food') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{ route('food.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-5 rounded">Create Food</a>
            </div>
            <div class="p-5 bg-white">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <td class="border px-4 py-6">ID</td>
                            <td class="border px-4 py-6">Nama</td>
                            <td class="border px-4 py-6">Harga</td>
                            <td class="border px-4 py-6">Rating</td>
                            <td class="border px-4 py-6">Tipe</td>
                            <td class="border px-4 py-6">Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($food as $item)
                            <tr>
                                <td class="border px-4 py-6">{{ $item->id }}</td>
                                <td class="border px-4 py-6">{{ $item->name }}</td>
                                <td class="border px-4 py-6">{{ number_format($item->price) }}</td>
                                <td class="border px-4 py-6">{{ $item->rate }}</td>
                                <td class="border px-4 py-6">{{ $item->type }}</td>
                                <td class="border px-4 py-6">
                                    <a href="{{ route('food.edit', $item->id) }}" class="inline-block bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-5 rounded">Edit</a>
                                    <form action="{{ route('food.destroy', $item->id) }}" method="post" class="inline-block">
                                        @method('delete')
                                        @csrf
                                        <button onclick="return confirm('Anda yakin akan menghapus data ini?')" type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-5 rounded">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-center">
                                <td colspan="6" class="border py-6">Data Masih Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="text-center mt-5 p-5">
                    {{$food->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
