@extends('admin.index')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg mt-14">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-bold">Dashboard</h2>
            </div>
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
                            <a class="active text-sm font-medium text-gray-500 dark:text-gray-400">Dashboard</a>
                        </div>
                    </li>
                </ol>
            </div>
            <div class="bg-white rounded-lg shadow p-6 mt-4">
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-blue-100 p-4 rounded-lg shadow-md">
                        <h3 class="text-lg font-semibold mb-2">Total Tamu</h3>
                        <p class="text-xl text-blue-600">{{ $totalTamu }}</p>
                    </div>
                    <div class="bg-green-100 p-4 rounded-lg shadow-md">
                        <h3 class="text-lg font-semibold mb-2">Total Uang</h3>
                        <p class="text-xl text-green-600">Rp {{ number_format($totalUang, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="mt-8">
                    <canvas id="alamatChartTamus" width="400" height="200"></canvas>
                </div>
                <div class="mt-8">
                    <canvas id="alamatChartUsers" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Data untuk grafik alamat dari tabel tamus
        var tamusAddressLabels = @json($tamusAddressLabels);
        var tamusAddressCounts = @json($tamusAddressCounts);

        var ctxTamus = document.getElementById('alamatChartTamus').getContext('2d');
        var alamatChartTamus = new Chart(ctxTamus, {
            type: 'bar',
            data: {
                labels: tamusAddressLabels,
                datasets: [{
                    label: 'Jumlah Tamu yang sudah Amplop dan Buwuh',
                    data: tamusAddressCounts,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0
                    }
                }
            }
        });

        // Data untuk grafik alamat dari tabel users
        var usersAddressLabels = @json($usersAddressLabels);
        var usersAddressCounts = @json($usersAddressCounts);

        var ctxUsers = document.getElementById('alamatChartUsers').getContext('2d');
        var alamatChartUsers = new Chart(ctxUsers, {
            type: 'bar',
            data: {
                labels: usersAddressLabels,
                datasets: [{
                    label: 'Jumlah Tamu yang kondangan',
                    data: usersAddressCounts,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0
                    }
                }
            }
        });
    </script>
@endsection
