@extends('home.index')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg mt-14">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-bold">Pembayaran</h2>
            </div>
            <div>
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="{{ route('dashboard.tamu') }}"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            Tamu
                        </a>
                    </li>
                    <span class="mx-2 text-gray-400">/</span>
                    <li>
                        <div class="flex items-center">
                            <a class="active text-sm font-medium text-gray-500 dark:text-gray-400">Pembayaran</a>
                        </div>
                    </li>
                </ol>
            </div>
        </div>

        <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
        <script type="text/javascript">
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    console.log(result);
                    window.location.href = '/home/history-transaction';
                },
                onPending: function(result) {
                    console.log(result);
                    window.location.href = '/home/history-transaction';
                },
                onError: function(result) {
                    console.log(result);
                    window.location.href = '/home/history-transaction';
                }
            });
        </script>
    </div>
@endsection
