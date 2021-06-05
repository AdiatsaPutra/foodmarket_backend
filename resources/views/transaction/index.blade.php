<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-5 bg-white">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <td class="border px-4 py-6">ID</td>
                            <td class="border px-4 py-6">Food</td>
                            <td class="border px-4 py-6">User</td>
                            <td class="border px-4 py-6">Quantity</td>
                            <td class="border px-4 py-6">Total</td>
                            <td class="border px-4 py-6">Status</td>
                            <td class="border px-4 py-6">Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transaction as $item)
                            <tr>
                                <td class="border px-4 py-6">{{ $item->id }}</td>
                                <td class="border px-4 py-6">{{ $item->food->name }}</td>
                                <td class="border px-4 py-6">{{ $item->user->name }}</td>
                                <td class="border px-4 py-6">{{ $item->quantity }}</td>
                                <td class="border px-4 py-6">{{ number_format($item->total) }}</td>
                                <td class="border px-4 py-6">{{ $item->status }}</td>
                                <td class="border px-4 py-6">
                                    <a href="{{ route('transaction.show', $item->id) }}" class="inline-block bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-5 rounded">
                                        View
                                    </a>
                                    <form action="{{ route('transaction.destroy', $item->id) }}" method="post" class="inline-block">
                                        @method('delete')
                                        @csrf
                                        <button onclick="return confirm('Anda yakin akan menghapus data ini?')" type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-5 rounded">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-center">
                                <td colspan="7" class="border py-6">Data Masih Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="text-center mt-5 p-5">
                    {{$transaction->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
