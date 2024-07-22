@extends('home.index')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg mt-14">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-bold">Metode Pembayaran</h2>
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
                            <a class="active text-sm font-medium text-gray-500 dark:text-gray-400">Metode Pembayaran</a>
                        </div>
                    </li>
                </ol>
            </div>
            <div class="bg-white rounded-lg shadow p-6 mt-4">
                <form class="space-y-4 md:space-y-6 needs-validation" novalidate action="{{ route('process.payment') }}"
                    method="POST">
                    @csrf
                    <div>
                        <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                            Uang</label>
                        <input type="text" name="harga" id="harga" placeholder="Jumlah Uang..."
                            value="{{ old('harga') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full px-1 py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        @error('harga')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div id="status-container">
                        <div class="status-item grid grid-cols-2 gap-2 mb-3">
                            <div>
                                <label for="status_info"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                                    Metode</label>
                                <select name="status_info[0]" id="status_info"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full px-1 py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="Bayar" {{ old('status') == 'Bayar' ? 'selected' : '' }}>Bayar</option>
                                    <option value="Buwuh" {{ old('status') == 'Buwuh' ? 'selected' : '' }}>Buwuh</option>
                                </select>
                                @error('status_info')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                            <div>
                                <label for="catatan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan</label>
                                <textarea style="resize: none;" placeholder="Masukkan Catatan..." name="catatan[0]" id="catatan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                @error('catatan')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="flex items-end">
                                <button type="button" onclick="addStatusItem()" id="add-button"
                                    class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm p-2 text-center mr-2"><i
                                        class="bi bi-plus-circle"></i> Tambah</button>
                            </div>
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mt-4">Bayar</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        let statusItemAdded = false;

        function addStatusItem() {
            if (statusItemAdded) {
                alert('Anda hanya dapat menambahkan satu inputan tambahan.');
                return;
            }

            const container = document.getElementById('status-container');
            const newItem = document.createElement('div');
            newItem.classList.add('status-item', 'grid', 'grid-cols-2', 'gap-2');
            newItem.innerHTML = `
                <div>
                    <label for="status_info"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Metode</label>
                    <select name="status_info[]" id="status_info"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full px-1 py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="Bayar">Bayar</option>
                        <option value="Buwuh">Buwuh</option>
                    </select>
                    @error('status_info[]')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div>
                    <label for="catatan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan</label>
                    <textarea style="resize: none;" placeholder="Masukkan Catatan..." name="catatan[]" id="catatan" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                    @error('catatan[]')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="flex items-end">
                    <button type="button" onclick="removeStatusItem(this)"
                        class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm p-2 text-center"><i class="bi bi-dash-circle"></i> Delete</button>
                </div>
            `;
            container.appendChild(newItem);
            statusItemAdded = true;
        }

        function removeStatusItem(button) {
            const item = button.parentNode.parentNode;
            item.remove();
            statusItemAdded = false;
        }
    </script>
@endsection
