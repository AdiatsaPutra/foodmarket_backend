<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Transaction &raquo; {{ $transaction->food->name }} by {{ $transaction->user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full rounded overflow-hidden shadow-lg p-6 bg-white">
                <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
                    <div class="w-full md:w-1 px-4 mb-4 md:mb-0">
                        <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.wisataliburan.com%2Fmakanan-malaysia%2F&psig=AOvVaw1TGyh-RWXa4u1aKKC2PF72&ust=1622947194560000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCID42cy7__ACFQAAAAAdAAAAABAJ" alt="" class="w-full rounded">
                        {{-- <img src="{{ $transaction->food->picturePath }}" alt="" class="w-full rounded"> --}}
                    </div>
                    <div class="w-full md-w-5 px-4 mb-4 md:mb-0">
                        <div class="flex flex-wrap mb-3">
                             <div class="w-3/6">
                                 <div class="text-sm">Nama Makanan</div>
                                 <div class="text-xl font-bold">{{ $transaction->food->name }}</div>
                             </div>
                             <div class="w-1/6">
                                 <div class="text-sm">Quantity</div>
                                 <div class="text-xl font-bold">{{ number_format($transaction->quantity) }}</div>
                             </div>
                             <div class="w-1/6">
                                 <div class="text-sm">Total</div>
                                 <div class="text-xl font-bold">{{ number_format($transaction->total) }}</div>
                             </div>
                             <div class="w-1/6">
                                 <div class="text-sm">Status</div>
                                 <div class="text-xl font-bold">{{ $transaction->status }}</div>
                             </div>
                        </div>
                        <div class="flex flex-wrap mb-3">
                             <div class="w-2/6">
                                 <div class="text-sm">Username</div>
                                 <div class="text-xl font-bold">{{ $transaction->user->name }}</div>
                             </div>
                             <div class="w-3/6">
                                 <div class="text-sm">Email</div>
                                 <div class="text-xl font-bold">{{ $transaction->user->email }}</div>
                             </div>
                             <div class="w-1/6">
                                 <div class="text-sm">City</div>
                                 <div class="text-xl font-bold">{{ $transaction->user->city }}</div>
                             </div>
                        </div>
                        <div class="flex flex-wrap mb-3">
                             <div class="w-4/6">
                                 <div class="text-sm">Alamat</div>
                                 <div class="text-xl font-bold">{{ $transaction->user->address }}</div>
                             </div>
                             <div class="w-1/6">
                                 <div class="text-sm">Nomor Rumah</div>
                                 <div class="text-xl font-bold">{{ $transaction->user->housenumber }}</div>
                             </div>
                             <div class="w-1/6">
                                 <div class="text-sm">Nomor HP</div>
                                 <div class="text-xl font-bold">{{ $transaction->user->phoneNumber }}</div>
                             </div>
                        </div>
                        <div class="flex flex-wrap mb-3">
                             <div class="w-5/6">
                                 <div class="text-sm">Payment URL</div>
                                 <a href="{{ $transaction->payment_url }}">{{ $transaction->payment_url }}</a>
                             </div>
                             <div class="w-1/6">
                                 <div class="text-sm mb-1">Change Status</div>
                                 <a href="{{ route('transactions.changeStatus', [$transaction->id, 'status' => 'ON_DELIVERY']) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-2 rounded block text-center w-full mb-1">
                                     On Delivery
                                 </a>
                                 <a href="{{ route('transactions.changeStatus', [$transaction->id, 'status' => 'DELIVERED']) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold px-2 rounded block text-center w-full mb-1">
                                     Delivered
                                 </a>
                                 <a href="{{ route('transactions.changeStatus', [$transaction->id, 'status' => 'CANCELED']) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold px-2 rounded block text-center w-full mb-1">
                                     Canceled
                                 </a>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
