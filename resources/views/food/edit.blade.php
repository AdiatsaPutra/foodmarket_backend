<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Users &raquo; {{ $user->name }} &raquo; Update
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto p-10 bg-white rounded-md">
            @if ($errors->any())
                <div>
                    <div class="mb-5" role="alert">
                        <div class="font-bold bg-red-500 text-white rounded px-6 py-4">
                            Terjadi kesalahan
                        </div>
                        <div class="font-bold bg-red-500 text-white rounded px-6 py-4">
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            <form action="{{ route('users.update', $user->id ) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="col-span-6 sm:col-span-3 my-5">
                    <label for="name" class="block text-lg font-medium text-gray-700">First name</label>
                    <input  value="{{ old('name') ?? $user->name }}" type="text" name="name" id="name" placeholder="Masukkan Nama" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="col-span-6 sm:col-span-3 my-5">
                    <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
                    <input  value="{{ old('email') ?? $user->email }}" type="email" name="email" id="email" placeholder="Masukkan Email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="col-span-6 sm:col-span-3 my-5">
                    <label for="foto" class="block text-lg font-medium text-gray-700">Foto</label>
                    <input  value="{{ old('foto') }}" type="file" name="profile_photo_path" id="foto" placeholder="Foto" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block text-lg font-medium text-gray-700">
                            Password
                        </label>
                        <input value="{{ old('password') }}" name="password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="grid-last-name" type="password" placeholder="User Password Confirmation">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block text-lg font-medium text-gray-700">
                            Konfirmasi Password
                        </label>
                        <input value="{{ old('password_confirmation') }}" name="password_confirmation" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="grid-last-name" type="password" placeholder="User Password Confirmation">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block text-lg font-medium text-gray-700">
                            Alamat
                        </label>
                        <input value="{{ old('address') ?? $user->address }}" name="address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="grid-last-name" type="text" placeholder="User Address">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block text-lg font-medium text-gray-700">
                            Roles
                        </label>
                        <select name="roles" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="grid-last-name">
                            <option value="{{ old('roles') ?? $user->roles }}">{{ old('roles') ?? $user->roles }}</option>
                            <option value="USER">User</option>
                            <option value="ADMIN">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block text-lg font-medium text-gray-700">
                            House Number
                        </label>
                        <input value="{{ old('houseNumber') ?? $user->houseNumber }}" name="houseNumber" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="grid-last-name" type="text" placeholder="User House Number">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block text-lg font-medium text-gray-700">
                            Phone Number
                        </label>
                        <input value="{{ old('phoneNumber') ?? $user->phoneNumber }}" name="phoneNumber" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="grid-last-name" type="text" placeholder="User Phone Number">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block text-lg font-medium text-gray-700">
                            City
                        </label>
                        <input value="{{ old('city') ?? $user->city }}" name="city" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="grid-last-name" type="text" placeholder="User City">
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                      Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
