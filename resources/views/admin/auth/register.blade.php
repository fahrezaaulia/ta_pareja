<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>E-Hajatan</title>
    <style>
        .fade-in {
            animation: fadeInAnimation ease 1s;
            animation-iteration-count: 1;
            animation-fill-mode: forwards;
        }

        @keyframes fadeInAnimation {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }
    </style>
</head>

<body style="background-color: #EEDDCC">
    <div class="container p-3 mx-auto">
        <div id="particles-js" class="absolute top-0 left-0 w-full h-full"></div>
        @if (session('success'))
            <script>
                Swal.fire({
                    title: "Success",
                    text: "{{ session('success') }}",
                    icon: "success",
                    confirmButtonColor: "#3085d6",
                });
            </script>
        @endif
        <section class="fade-in">
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen md:h-screen lg:py-0">
                <div class="w-full rounded-lg shadow md:mt-0 max-w-md sm:max-w-md xl:p-0 shadow text-white"
                    style="background-color:#D9AD81;">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <a href="{{ route('login') }}"
                            class="flex flex-col items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                            <img src="{{ asset('img/kawin.png') }}" style="width: 50%" alt="logo">
                        </a>
                        <h1 class="text-5xl text-center md:text-2xl" style="font-family: 'Italianno', cursive">
                            Registrasi Akun
                        </h1>
                        <form action="{{ route('register.store') }}" method="POST" class="space-y-4 md:space-y-6">
                            @csrf
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <label for="name" class="block mb-2 text-sm font-medium">Nama Lengkap</label>
                                    <input type="text" name="name" id="name"
                                        placeholder="Masukkan Nama Lengkap Anda"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('name')
                                        <div class="flex mt-1 items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                            role="alert">
                                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                            </svg>
                                            <span class="sr-only">Info</span>
                                            <div>
                                                <span class="font-medium">{{ $message }}</span>
                                            </div>
                                        </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="alamat" class="block mb-2 text-sm font-medium">Alamat</label>
                                    <input type="text" name="alamat" id="alamat"
                                        placeholder="Masukkan Alamat Anda"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('alamat')
                                        <div class="flex mt-1 items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                            role="alert">
                                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                            </svg>
                                            <span class="sr-only">Info</span>
                                            <div>
                                                <span class="font-medium">{{ $message }}</span>
                                            </div>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <label for="password" class="block mb-2 text-sm font-medium">Password</label>
                                    <input type="password" name="password" id="password" placeholder="Buat Password"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('password')
                                        <div class="flex mt-1 items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                            role="alert">
                                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                            </svg>
                                            <span class="sr-only">Info</span>
                                            <div>
                                                <span class="font-medium">{{ $message }}</span>
                                            </div>
                                        </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="password_confirmation"
                                        class="block mb-2 text-sm font-medium">Konfirmasi</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        placeholder="Konfirmasi Password"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                            </div>
                            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                            <button type="submit" class="w-full p-1 rounded-lg text-2xl font-semibold"
                                style="background-color: #926537; color: #D9D9D9;">Register</button>
                        </form>
                        <a href="{{ route('login') }}">
                            <div class="w-full p-1 text-center mt-2 rounded-lg text-2xl font-semibold"
                                style="background-color: #926537; color: #D9D9D9;">Login</div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        particlesJS("particles-js", {
            particles: {
                number: {
                    value: 400,
                    density: {
                        enable: true,
                        value_area: 800
                    }
                },
                color: {
                    value: "#fff"
                },
                shape: {
                    type: "circle",
                    stroke: {
                        width: 0,
                        color: "#000000"
                    },
                    polygon: {
                        nb_sides: 5
                    },
                    image: {
                        src: "img/github.svg",
                        width: 100,
                        height: 100
                    }
                },
                opacity: {
                    value: 0.5,
                    random: true,
                    anim: {
                        enable: false,
                        speed: 1,
                        opacity_min: 0.1,
                        sync: false
                    }
                },
                size: {
                    value: 10,
                    random: true,
                    anim: {
                        enable: false,
                        speed: 40,
                        size_min: 0.1,
                        sync: false
                    }
                },
                line_linked: {
                    enable: false,
                    distance: 500,
                    color: "#ffffff",
                    opacity: 0.4,
                    width: 2
                },
                move: {
                    enable: true,
                    speed: 6,
                    direction: "bottom",
                    random: false,
                    straight: false,
                    out_mode: "out",
                    bounce: false,
                    attract: {
                        enable: false,
                        rotateX: 600,
                        rotateY: 1200
                    }
                }
            },
            interactivity: {
                detect_on: "canvas",
                events: {
                    onhover: {
                        enable: true,
                        mode: "bubble"
                    },
                    onclick: {
                        enable: true,
                        mode: "repulse"
                    },
                    resize: true
                },
                modes: {
                    grab: {
                        distance: 400,
                        line_linked: {
                            opacity: 0.5
                        }
                    },
                    bubble: {
                        distance: 400,
                        size: 4,
                        duration: 0.3,
                        opacity: 1,
                        speed: 3
                    },
                    repulse: {
                        distance: 200,
                        duration: 0.4
                    },
                    push: {
                        particles_nb: 4
                    },
                    remove: {
                        particles_nb: 2
                    }
                }
            },
            retina_detect: true
        });
        var count_particles, stats, update;
        stats = new Stats();
        stats.setMode(0);
        stats.domElement.style.position = "absolute";
        stats.domElement.style.left = "0px";
        stats.domElement.style.top = "0px";
        document.body.appendChild(stats.domElement);
        count_particles = document.querySelector(".js-count-particles");
        update = function() {
            stats.begin();
            stats.end();
            if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
                count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
            }
            requestAnimationFrame(update);
        };
        requestAnimationFrame(update);
    </script>
</body>

</html>
