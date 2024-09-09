<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Papan Informasi | Taman Sekartaji</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/output.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Font poppins -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <!-- Font Righteous -->
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="wipe-container">
        <!-- <div class="wipe2">
        <img
          class="w-full"
          src="../public/img/assets/wipe-container.svg"
          alt=""
        />
      </div> -->
        <div class="wipe"></div>
        <div class="wipe"></div>
        <div class="wipe"></div>
        <div class="wipe"></div>
        <div class="wipe"></div>
        <div class="wipe"></div>
    </div>
    <main id="headers" data-barba="wrapper"
        class="relative w-screen h-screen overflow-hidden bg-gradient-to-br from-green-900 to-dgreen">
        <section class="w-full h-full overflow-hidden" data-barba="container" data-barba-namespace="page-a">
            <h1 class="pt-10 text-3xl font-light text-white papan-info font-righteous ms-16">
                Papan Informasi
            </h1>
            <span
                class="absolute z-0 -mt-2 font-bold tracking-wide text-white b-kediri text-10xl latter-name font-poppins -left-8 opacity-10">Kediri</span>
            <span
                class="absolute z-0 font-bold text-white b-sekartaji text-10xl latter-name font-poppins opacity-10 bottom-1 left-1/4">Sekartaji</span>
            <div class="relative flex w-1/2 text-white swipe-right font-poppins mt-7">
                <img class="absolute left-0 inset-4" src="{{ asset('img/assets/Ellipse.png') }}" alt="" srcset="" />
                <div class="relative ms-[8%] mt-60 flex-col flex justify-center">
                    <h2 class="text-4xl font-bold swipe-up">Taman</h2>
                    <b class="swipe-up font-bold text-[125px] leading-none">Sekartaji</b>
                    <span
                        class="absolute font-bold text-transparent swipe-up sekartaji opacity-70 text-8xl bottom-8 -left-24">Sekartaji</span>
                    <h3 class="mt-5 text-5xl font-bold text-right swipe-up">Kediri</h3>
                </div>
            </div>

            <img class="absolute top-0 right-0 object-cover w-1/2 h-full swipe-left"
                src="{{ asset('img/assets/img-welcome.png') }}" alt="" loading="lazy" />


            <a href="/home">
                <img class="absolute left-[25%] w-1/2 -bottom-7 transition-all ease-in-out duration-300 hover:bottom-0 z-10 cursor-pointer"
                    src="{{ asset('img/assets/button-to-bottom.svg') }}" alt="down" />
            </a>

        </section>
        <div class="nex-prev absolute w-full top-[50%] z-[99]">
            <div class="flex justify-between">
                <div
                    class="custom-swiper-button-prev opacity-0 -translate-x-[50px] transition-all duration-[.5s] hover:-translate-x-[20px]">
                    <button class="p-2">
                        <img src="{{ asset('img/asset/Group 79 (2).svg') }}" class="-mt-[310px]" alt="" />
                    </button>
                </div>
                <div
                    class="custom-swiper-button-next opacity-100 translate-x-[50px] transition-all duration-[.5s] hover:translate-x-[20px]">
                    <button class="p-2">
                        <img src="{{ asset('img/asset/Group 80.svg') }}" class="-mt-[310px]" alt="" />
                    </button>
                </div>
            </div>
        </div>
    </main>

    <!-- ========= barba js ======= -->
    <script src="https://unpkg.com/@barba/core"></script>
    <!-- ========= load gsap animtion ========= -->
    <script src="https://unpkg.com/gsap@latest/dist/gsap.min.js"></script>
    <!-- CustomEase Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/CustomEase.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"
        integrity="sha512-O+atZ/gABlcFlpIoLQR04f72qHqZWKwTVsQZHqk/8VE2nrzDlnqhXbnXP7Gh/TyhpPT8tEUm5A580GG8AloHTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="module" src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>

</html>