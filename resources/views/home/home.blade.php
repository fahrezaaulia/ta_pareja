@extends('home.index')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg mt-14">
            <div class="p-6">
                <div id="controls-carousel" class="relative w-full mb-3" data-carousel="static">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-full border">
                        <!-- Item 1 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('img/cincin.png') }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                    </div>
                </div>

                <div>
                    <h1 class="text-6xl md:text-2xl" style="font-family: 'Italianno', cursive; color: #926537">Selamat
                        Datang</h1>
                </div>

                <div class="mb-5">
                    <p class="font-semibold text-3xl">E-Hajatan</p>
                </div>
                <div>
                    <p>
                        E-Hajatan adalah platform digital inovatif yang mengubah cara Anda mengelola dan menghadiri
                        acara kondangan. Kami memanfaatkan teknologi terbaru untuk menyederhanakan pembayaran dan
                        pengelolaan tamu, sehingga setiap acara dapat berjalan lebih efisien, aman, dan modern.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
