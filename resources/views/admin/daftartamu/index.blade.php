@extends('admin.index')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg mt-14">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-bold">Tamu Undangan</h2>
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
                                    <a class="active text-sm font-medium text-gray-500 dark:text-gray-400">Tamu Undangan</a>
                                </div>
                            </li>
                        </ol>
                    </div>
                </ol>
            </div>
            <div class="bg-white rounded-lg shadow p-6 mt-4">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead
                            class="text-center text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-6 py-3">NO</th>
                                <th class="px-6 py-3">Nama Tamu</th>
                                <th class="px-6 py-3">Alamat</th>
                                <th class="px-6 py-3">Uang</th>
                                <th class="px-6 py-3">Status</th>
                                <th class="px-6 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($tamus as $tamu)
                                <tr class="text-center border-b border-gray-200 hover:bg-gray-100">
                                    <td class="px-6 py-4">
                                        {{ $loop->iteration + ($tamus->currentPage() - 1) * $tamus->perPage() }}</td>
                                    <td class="px-6 py-4">{{ $tamu->user->name }}</td>
                                    <td class="px-6 py-4">{{ $tamu->user->alamat }}</td>
                                    <td class="px-6 py-4">Rp {{ number_format($tamu->uang, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4 text-green-500 font-semibold">{{ $tamu->status }}</td>
                                    <td class="px-6 py-4">
                                        <a data-modal-target="default-modal{{ $tamu->id }}"
                                            data-modal-toggle="default-modal{{ $tamu->id }}"
                                            class="cursor-pointer p-2 bg-indigo-600 rounded text-white"><i
                                                class="bi bi-eye"></i></a>
                                        <a class="cursor-pointer p-2 bg-red-500 rounded text-white"
                                            onclick="confirmDelete({{ $tamu->id }})"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>

                                <div id="default-modal{{ $tamu->id }}" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Detail Tamu
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="default-modal{{ $tamu->id }}">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-4 md:p-5 space-y-4">
                                                <div class="grid grid-cols-2">
                                                    <div>
                                                        {{-- NAMA TAMU --}}
                                                        <div class="mb-3">
                                                            <label
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                                            <p
                                                                class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                                {{ $tamu->user->name }}</p>
                                                        </div>
                                                        {{-- UANG TAMU --}}
                                                        <div class="mb-3">
                                                            <label
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Uang</label>
                                                            <p
                                                                class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                                Rp {{ number_format($tamu->uang, 0, ',', '.') }}</p>
                                                        </div>
                                                        {{-- CATATAN TAMU BAYAR DAN BUWUH --}}
                                                        <div>
                                                            <label
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan
                                                                Tamu Bayar dan Buwuh</label>
                                                            <p
                                                                class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                                @if ($tamu->statuses->isEmpty())
                                                                    Belum ada catatan
                                                                @else
                                                                    @foreach ($tamu->statuses as $status)
                                                                        {{ $status->catatan }}@if (!$loop->last)
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        {{-- ALAMAT TAMU --}}
                                                        <div class="mb-3">
                                                            <label
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                                            <p
                                                                class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                                {{ $tamu->user->alamat }}</p>
                                                        </div>
                                                        {{-- STATUS TAMU --}}
                                                        <div class="mb-3">
                                                            <label
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                                            <p
                                                                class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                                @if ($tamu->statuses->isEmpty())
                                                                    Belum ada status
                                                                @else
                                                                    @foreach ($tamu->statuses as $status)
                                                                        {{ $status->status }}@if (!$loop->last)
                                                                            ,
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $tamus->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(tamuId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan bisa mengembalikan data ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${tamuId}`).submit();
                }
            })
        }
    </script>

    @foreach ($tamus as $tamu)
        <form id="delete-form-{{ $tamu->id }}" action="{{ route('admin.tamu.delete', $tamu->id) }}" method="POST"
            style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    @endforeach
@endsection
