<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Papan Informasi | Taman Sekartaji</title>

    @vite('resources/css/app.css')

    <link rel="stylesheet" href="{{asset('css/output.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Font poppins -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <!-- Font Righteous -->
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet" />
</head>

<body>
    <!-- Slide Untuk transisi Barba.js -->
    <!-- Container pembungkus page transition barba -->
    <div class="wipe-container">
      <!-- child content untuk menampilkan transisi Barbanya -->
      <div class="wipe bg-ylow"></div>
      <div class="wipe bg-grass"></div>
      <div
        class="wipe bg-dgreen font-poppins font-semibold flex justify-center items-center"
      >
        <div>
          <h2 class="text-[6vw]">
            Taman <span class="inline-block w-[15vw] h-[1vw] bg-white"></span>
          </h2>
          <h1 class="-mt-[4vw] text-[10vw]">Sekartaji</h1>
        </div>
      </div>
      <!-- child content untuk menampilkan transisi Barbanya -->
    </div>
    <!-- Container pembungkus page transition barba -->

    <main id="headers"
      data-barba="wrapper"
      class="w-screen h-screen relative overflow-hidden bg-dgreen"
    >
        
        <section class="w-full h-full overflow-hidden" data-barba="container" data-barba-namespace="page-a">
            <h1 class="text-white text-[1.5vw] font-righteous font-light ms-[4vw] pt-[2vw]">
                Papan Informasi
            </h1>
            <span class="b-kediri text-[12vw] -mt-[2vw] tracking-wide z-0 font-poppins text-white font-bold absolute opacity-[.06]">Kediri</span>
            <span class="b-sekartaji text-[16vw] z-0 font-poppins text-white font-bold absolute opacity-[.06] bottom-[.3vw] left-[15vw]">Sekartaji</span>
            <div class="w-[50vw] relative z-[10] h-full flex items-center font-poppins">
                <div class="w-[80%] swipe-right h-[45vw] bg-elipse relative">
                    <span class="swipe-up inline-block absolute text-[6.5vw] sekartaji text-transparent font-bold bottom-[20vw] -left-[3vw]">Sekartaji</span
                    >
                    <div class="swipe-up ms-[4vw] w-[75%] mt-[10vw]">
                        <h2 class="text-[3vw] font-bold">Taman</h2>
                        <h1 class="text-[6.5vw] font-bold -mt-[2vw]">Sekartaji</h1>
                        <h2 class="text-[3vw] font-bold text-end">Kediri</h2>
                    </div>
                </div>
            </div>

            <img class="absolute top-0 right-0 w-1/2 h-full swipe-left" src="{{ asset('img/assets/img-welcome.png') }}" alt="" />
            <div class="absolute z-[99] w-full -bottom-[4.2vw] hover:-bottom-[2vw] duration-[.5s] transition-all flex justify-center">
                <a href="{{ url('home') }}" class="w-fit">
                    <img
                    src="{{asset('img/assets/Group 79 (7).svg')}}"
                    class="w-[50vw]"
                    alt=""
                    />
                </a>
            </div>
        </section>
        <!-- Navigasi Kustom -->
        <!-- Tombol Navigasi Kustom -->
        <div class="nex-prev absolute w-full top-[50%]">
        <div class="flex justify-between">
            <!-- Button Back/Previous -->
            <div
            class="custom-swiper-button-prev parent-prev opacity-0 -translate-x-[50px] transition-all duration-[.5s] hover:-translate-x-[20px] z-[55]"
            >
            <button class="p-2">
                <img
                src="{{ asset('img/assets/Group 81.svg') }}"
                class="-mt-[310px]"
                alt=""
                />
            </button>
            </div>
            <!-- Button Next -->
            <div
            class="custom-swiper-button-next opacity-100 translate-x-[50px] transition-all duration-[.5s] hover:translate-x-[20px] z-[55]"
            >
            <button class="p-2">
                <img
                src="{{ asset('img/assets/Group 80.svg') }}"
                class="-mt-[310px]"
                alt=""
                />
            </button>
            </div>
        </div>
        </div>
    </main>

    <!-- jsdelivr Barba -->
    <script src="https://cdn.jsdelivr.net/npm/@barba/core"></script>
    <!-- ========= load gsap animtion ========= -->
    <script src="https://unpkg.com/gsap@latest/dist/gsap.min.js"></script>
    <!-- GSAP -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"
      integrity="sha512-O+atZ/gABlcFlpIoLQR04f72qHqZWKwTVsQZHqk/8VE2nrzDlnqhXbnXP7Gh/TyhpPT8tEUm5A580GG8AloHTA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <!-- Custom Ease GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/CustomEase.min.js"></script>
    <!-- Kode Javascript -->
    @Vite('resources/js/app.js')
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
</body>

</html>