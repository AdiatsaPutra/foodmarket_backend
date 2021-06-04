<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {!! __('Food &raquo; Create') !!}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto p-10 bg-white rounded-md">
            @if ($errors->any())
                <div>
                    <div class="mb-5" role="alert">
                        <div class="font-bold bg-red-500 text-white rounded px-6 py-4">
                            Terjadi kesalahan
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            <form action="{{ route('food.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-span-6 sm:col-span-3 my-5">
                    <label for="name" class="block text-lg font-medium text-gray-700">Nama</label>
                    <input  value="{{ old('name') }}" type="text" name="name" id="name" placeholder="Masukkan Nama" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="col-span-6 sm:col-span-3 my-5">
                    <label for="foto" class="block text-lg font-medium text-gray-700">Foto</label>
                    <input  value="{{ old('foto') }}" type="file" name="picturePath" id="foto" placeholder="Foto" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block text-lg font-medium text-gray-700" for="grid-last-name">
                            Deskripsi
                        </label>
                        <input value="{{ old('description') }}" name="description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" type="text" placeholder="Deskripsi">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block text-lg font-medium text-gray-700" for="grid-last-name">
                            Bahan
                        </label>
                        <input value="{{ old('ingredients') }}" name="ingredients" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" type="text" placeholder="Bahan">
                        <p class="text-gray-600 text-xs italic">Dipisahkan dengan koma, contoh: Bawang Merah, Bawang Paprika, Bawang Bombai.</p>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block text-lg font-medium text-gray-700" for="grid-last-name">
                            Harga
                        </label>
                        <input value="{{ old('price') }}" name="price" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" type="number" placeholder="Harga">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block text-lg font-medium text-gray-700" for="grid-last-name">
                            Rating
                        </label>
                        <input value="{{ old('rate') }}" name="rate" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" type="number", step="0.01" max="5" placeholder="Rating">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block text-lg font-medium text-gray-700" for="grid-last-name">
                            Tipe
                        </label>
                        <input value="{{ old('type') }}" name="type" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" type="text" placeholder="Tipe Makanan">
                        <p class="text-gray-600 text-xs italic">Dipisahkan dengan koma, contoh: recommended, popular, new_food</p>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                      Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
