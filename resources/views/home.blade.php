<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Papan Informasi | Taman Sekartaji</title>

    <!-- Menggunakan Vite untuk mengelola CSS -->
    @vite('resources/css/app.css')

    <!-- Komentar atau hapus jika tidak diperlukan -->
    <!-- <link rel="stylesheet" href="/public/css/output.css" />
    <link rel="stylesheet" href="/public/css/style.css" /> -->

    <!-- Swiper CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />

    <!-- Font Poppins -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;700&display=swap"
      rel="stylesheet"
    />

    <!-- Font Righteous -->
    <link
      href="https://fonts.googleapis.com/css2?family=Righteous&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/output.css') }}">
  </head>
  <body>
    <main id="headers" class="relative w-full h-screen overflow-hidden g-dgreen bg-dgreen">
      <div class="w-full h-full swiper">
        <div class="swiper-wrapper">
          <section class="swiper-slide">
            <div class="flex justify-between w-screen h-screen font-poppins">
              <!-- Bagian Kiri -->
              <div class="basis-[50%] relative bg-grass overflow-hidden">
                <div class="img-sekartaji w-full h-[50%] bg-center bg-no-repeat bg-cover" style="background-image: url('{{ Storage::url($img) }}');">
                </div>
                
                <div class="w-full relative h-[50%]">
                  <div class="fasilitas relative z-10 bg-contain bg-no-repeat overflow-hidden w-full h-[28%]"></div>
                  <div class="bg-sekartaji w-full absolute h-[40%] start-0 bg-start bg-[length:100%_100%] bg-no-repeat top-0"></div>
                  <div class="bg-sekartaji2 w-[45%] h-[30%] absolute bottom-[5%] bg-start bg-[length:100%_100%] bg-no-repeat right-[5%]"></div>
                  <div class="relative">
                    <div class="w-fit mt-[3%] mx-[8%] me-[13%] gap-3 flex font-righteous">
                      <div class="flex flex-col gap-3">
                        <div class="px-5 py-2 w-[100%] flex items-center gap-3 shadow-lg shadow-black/35 bg-dgreen">
                          <span class="material-symbols--smoke-free"></span>
                          <span class="text-[.5em] sm:text-[.7em] md:text-[.9em]">Area Bebas Asap Rokok</span>
                        </div>
                        <div class="px-5 py-2 w-[100%] flex items-center gap-3 shadow-lg shadow-black/35 bg-dgreen">
                          <span class="lucide--circle-parking"></span>
                          <span class="text-[.5em] sm:text-[.7em] md:text-[.9em]">Area Parkir</span>
                        </div>
                        <div class="px-5 py-2 w-[100%] flex items-center gap-3 shadow-lg shadow-black/35 bg-dgreen">
                          <span class="lucide--cctv"></span>
                          <span class="text-[.5em] sm:text-[.7em] md:text-[.9em]">CCTV</span>
                        </div>
                      </div>
                      <div class="flex flex-col gap-3">
                        <div class="px-5 py-2 w-[100%] flex items-center gap-3 shadow-lg shadow-black/35 bg-dgreen">
                          <span class="marketeq--water-tap"></span>
                          <span class="text-[.5em] sm:text-[.7em] md:text-[.9em]">Keran Air Siap Minum</span>
                        </div>
                        <div class="px-5 py-2 w-[100%] flex items-center gap-3 shadow-lg shadow-black/35 bg-dgreen">
                          <span class="material-symbols--wifi"></span>
                          <span class="text-[.5em] sm:text-[.7em] md:text-[.9em]">Free Wifi</span>
                        </div>
                        <div class="px-5 py-2 w-[100%] flex items-center gap-3 shadow-lg shadow-black/35 bg-dgreen">
                          <span class="ph--plugs"></span>
                          <span class="text-[.5em] sm:text-[.7em] md:text-[.9em]">Colokan Listrik</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Bagian Kanan -->
              <div class="basis-[50%] relative">
                <div class="w-fit pt-[5%] px-[9%]">
                  <div class="font-semibold">
                    <h1 class="text-[16px] sm:text-[25px] md:text-[35px] lg:text-[44px] xl:text-[55px]">
                      Taman
                      <span class="inline-block bg-white w-[20%] h-1"></span>
                    </h1>
                    <h1 class="text-[25px] sm:text-[40px] md:text-[55px] lg:text-[65px] xl:text-[75px] lg:-mt-8 -mt-3">
                      Sekartaji
                    </h1>
                  </div>
                  <div class="text-[15px] mt-3 pe-[5%] text-justify font-righteous w-[80%] h-[145px] custom-scrollbar overflow-y-scroll">
                    <p>
                    {!! $deskripsi !!}
                      {{-- Selamat datang di Taman Sekartaji, oase hijau di jantung Kota Kediri! Taman ini dirancang sebagai ruang terbuka yang menggabungkan keindahan alam dengan kenyamanan fasilitas modern, menjadikannya tempat yang sempurna untuk bersantai dan beraktivitas. Dikelilingi oleh pepohonan rindang dan berbagai jenis bunga yang mekar sepanjang tahun, Taman Sekartaji menawarkan udara segar dan suasana tenang yang ideal untuk melepas penat. --}}
                    </p>
                  </div>
                </div>
                <div class="information w-[83%] top-[55%] -ms-[8%] absolute h-[40%] bg-ijo px-[7%] py-[3.5%] shadow-lg shadow-black/20">
                  <h1 class="font-righteous text-[38px]">Detail Informasi</h1>
                  <div class="mt-[3%] w-[80%] flex flex-col gap-2 font-righteous h-[65%] overflow-hidden">
                    <div class="flex items-center justify-start">
                      <div class="basis-[140px] text-[.5em] sm:text-[.7em] md:text-[.9em] gap-3 flex items-center">
                        <span class="material-symbols-light--width-wide-outline"></span>
                        <span>Luas</span>
                      </div>
                      <span class="text-[.5em] sm:text-[.7em] md:text-[.9em]">: 7000 m2</span>
                    </div>
                    <div class="flex items-center justify-start">
                      <div class="basis-[140px] text-[.5em] sm:text-[.7em] md:text-[.9em] gap-3 flex items-center">
                        <span class="game-icons--inauguration"></span>
                        <span>Peresmian</span>
                      </div>
                      <span class="text-[.5em] sm:text-[.7em] md:text-[.9em]">: 26 September 2017</span>
                    </div>
                    <div class="flex items-center justify-start">
                      <div class="basis-[140px] text-[.5em] sm:text-[.7em] md:text-[.9em] gap-3 flex items-center">
                        <span class="hugeicons--manager"></span>
                        <span>Pengelola</span>
                      </div>
                      <span class="text-[.5em] sm:text-[.7em] md:text-[.9em]">: Pemerintahan Kota Kediri</span>
                    </div>
                    <div class="flex items-center justify-start">
                      <div class="basis-[140px] text-[.5em] sm:text-[.7em] md:text-[.9em] gap-3 flex items-center">
                        <span class="ic--outline-place"></span>
                        <span>Alamat</span>
                      </div>
                      <span class="text-[.5em] sm:text-[.7em] md:text-[.9em]">: Jl. Veteran, Mojoroto, Kediri</span>
                    </div>
                  </div>
                </div>
                <div class="absolute w-[20%] bg-white/25 bottom-[3%] right-[20%] backdrop-blur-md shadow-lg shadow-black/25 p-[2%] text-center text-xs flex justify-center flex-col gap-2">
                  <span>QR Code video SIBI bagi penyandang Tunarungu</span>
                  {{-- @dd($qrcode) --}}
                  <img src="{{ Storage::url($qrcode) }}" alt="" />

                </div>
              </div>
            </div>
          </section>

          <!-- Slide Kosong, Tambahkan Konten di Sini -->
          <section class="swiper-slide">
            <div class="flex justify-between w-screen h-screen font-poppins">
              <!-- Konten Slide Kedua -->
            </div>
          </section>

          <section class="swiper-slide">
            <div class="flex justify-between w-screen h-screen font-poppins">
              <!-- Konten Slide Ketiga -->
            </div>
          </section>
        </div>
      </div>

      <!-- Navigasi Kustom -->
      <div class="absolute w-full top-[50%] z-[99]">
        <div class="flex justify-between">
          <div class="custom-swiper-button-prev opacity-0 -translate-x-[50px] transition-all duration-[.5s] hover:-translate-x-[20px]">
            <button class="p-2">
              <img src="/public/img/assets/Group 79 (2).svg" class="-mt-[310px]" alt="" />
            </button>
          </div>
          <div class="custom-swiper-button-next opacity-100 translate-x-[50px] transition-all duration-[.5s] hover:translate-x-[20px]">
            <button class="p-2">
              <img src="/public/img/assets/Group 80.svg" class="-mt-[310px]" alt="" />
            </button>
          </div>
        </div>
      </div>
    </main>

    <!-- Script -->
    <script type="module" src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  </body>
</html>
