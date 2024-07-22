@extends('admin.index')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg mt-14">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-bold">Pembayaran Tamu</h2>
            </div>
            <div>
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <div>
                        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                            <li class="inline-flex items-center">
                                <a href="{{ route('dashboard.tamu') }}"
                                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                    Main
                                </a>
                            </li>
                            <span class="mx-2 text-gray-400">/</span>
                            <li>
                                <div class="flex items-center">
                                    <a class="active text-sm font-medium text-gray-500 dark:text-gray-400">Pembayaran Tamu</a>
                                </div>
                            </li>
                        </ol>
                    </div>
                </ol>
            </div>
            <div class="bg-white rounded-lg shadow p-6 mt-4">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-center text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <td class="px-6 py-3">No</td>
                                <td class="px-6 py-3">Name</td>
                                <td class="px-6 py-3">Metode Pembayaran</td>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach($tamus as $index => $tamu)
                                <tr class="text-center border-b border-gray-200 hover:bg-gray-100">
                                    <td class="px-6 py-4">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4">{{ $tamu->user->name }}</td>
                                    <td class="px-6 py-4">{{ $tamu->payment_method }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
