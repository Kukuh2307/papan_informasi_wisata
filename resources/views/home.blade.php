<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Papan Informasi | Taman Sekartaji</title>

  <!-- Menggunakan Vite untuk mengelola CSS -->
  @vite('resources/css/app.css')

  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <!-- Font Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;700&display=swap" rel="stylesheet" />

  <!-- Font Righteous -->
  <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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

  <main 
    id="headers"
    data-barba="wrapper"
    class="g-dgreen w-full h-screen text-white bg-dgreen relative overflow-hidden"
  >
    <div class="swiper" data-barba="container" data-barba-namespace="page-b">
      <div class="swiper-wrapper">
        <div
          class="absolute z-[99] w-full -top-[5.2vw] hover:-top-[2.5vw] duration-[.5s] transition-all flex justify-center"
        >
          <a href="{{ url('/') }}" class="w-fit">
            <img
              src="{{asset('img/assets/Group 79 (6).svg')}}"
              class="w-[50vw]"
              alt=""
            />
          </a>
        </div>
        <section class="swiper-slide">
          <div class="w-screen h-screen font-poppins flex justify-between">
            <!-- Bagian Kiri -->
            <div class="basis-[50%] relative bg-grass overflow-hidden">
              <div
                  style="background-image: url('{{ Storage::url($img) }}')"
                  class="w-full h-[50%] z-[5] bg-center bg-no-repeat bg-cover"
              ></div>
              <!-- <div class="img-sekartaji w-full h-[50%] bg-center bg-no-repeat bg-cover"
                style="background-image: url('{{ Storage::url($img) }}');">
              </div> -->

              <div class="w-full relative h-[50%]">
                <div
                  class="fasilitas relative z-10 bg-contain bg-no-repeat overflow-hidden w-full h-[28%]"
                ></div>
                <div
                  class="bg-sekartaji w-full absolute h-[40%] start-0 bg-start bg-[length:100%_100%] bg-no-repeat top-0"
                ></div>
                <div
                  class="bg-sekartaji2 w-[45%] h-[30%] absolute bottom-[5%] bg-start bg-[length:100%_100%] bg-no-repeat right-[5%]"
                ></div>
                <!-- <div class="fasilitas relative z-50 bg-contain bg-no-repeat overflow-hidden w-full h-[28%]"
                  style="background-image: url('{{ asset('img/assets/fasilitas.svg') }}')"></div>
                <div
                  class="bg-sekartaji w-full absolute h-[40%] start-0 bg-start bg-[length:100%_100%] bg-no-repeat top-0"
                  style="background-image: url('{{ asset('img/assets/Group 42.svg') }}');">
                </div>
                <div
                  class="bg-sekartaji2 w-[45%] h-[30%] absolute bottom-[5%] bg-start bg-[length:100%_100%] bg-no-repeat right-[5%]"
                  style="background-image: url('{{ asset('img/assets/Group 43.svg') }}');">
                </div> -->

                <div class="relative -ms-[2vw] cursor-grab">
                  <div class="childs child-swiper h-[17vw]">
                    <div class="swiper-wrapper">
                    @foreach ($fasilitas as $item)
                      <div class="swiper-slide">
                        <div class="hover:bg-dgreen2 duration-[.3s] w-[12vw] h-[85%] inner-swiper bg-dgreen flex flex-col justify-between px-[1.4vw] py-[1.5vw] items-center">
                        <img src="{{ Storage::url($item['icon']) }}" alt="Icon" />
                        @if ($item['fasilitas'] == 'WIFI' || $item['fasilitas'] == 'CCTV')
                        <p class="text-center xl:text-[1.2vw] text-[1vw]">{{ $item['fasilitas'] }}</p>
                        @else
                        <p class="text-center xl:text-[1.2vw] text-[1vw]">{{ ucwords(strtolower($item['fasilitas']))
                        }}</p>
                        @endif
                        </div>
                      </div>
                    @endforeach
                    </div>
                  </div>

                  <div class="swiper-pagination"></div>
                  <!-- <div class="w-fit mt-[3%] mx-[8%] me-[13%] flex flex-wrap gap-3 font-righteous">
                    @foreach ($fasilitas as $item)
                    <div
                      class="px-5 py-2 w-[calc(50%-0.75rem)] flex items-center gap-3 shadow-lg shadow-black/35 bg-dgreen">
                      <img src="{{ Storage::url($item['icon']) }}" alt="Icon" />
                      @if ($item['fasilitas'] == 'WIFI' || $item['fasilitas'] == 'CCTV')
                      <span class="text-center xl:text-[1.2vw] text-[1vw]">{{ $item['fasilitas'] }}</span>
                      @else
                      <span class="text-[.5em] sm:text-[.7em] md:text-[.9em]">{{ ucwords(strtolower($item['fasilitas']))
                        }}</span>
                      @endif
                    </div>
                    @endforeach
                  </div> -->
                </div>
              </div>
            </div>

            <!-- Bagian Kanan -->
            <div class="basis-[50%] relative">
              <div class="flex w-full py-[5%] px-[9%] h-[53vh] items-center">
                <div class="w-fit">
                  <div class="fade-up font-semibold overflow-hidden">
                    <h1 class="text-[3.4vw]">
                      Taman
                      <span class="inline-block bg-white w-[20%] h-[.5vw]"></span>
                    </h1>
                    <h1 class="text-[5vw] -mt-[1.3vw]">
                      Sekartaji
                    </h1>
                  </div>
                  <div
                  class="text-[1vw] mt-[.8vw] pe-[5%] text-justify font-righteous w-[80%] h-[10vw] custom-scrollbar overflow-y-scroll">
                    <p>
                      {!! $deskripsi !!}
                    </p>
                  </div>
                </div>

              </div>
              <div class="information w-[83%] top-[55%] -ms-[8%] absolute bg-ijo px-[7%] pt-[3.5%] pb-[4%] shadow-lg shadow-black/20">
                <div class="relative">
                  <h1 class="font-righteous text-[2vw]">Detail Informasi</h1>
                  <div class="mt-[1.3vw] w-[100%] text-[1.2vw] font-righteous">
                    <div class="flex mb-[2%] justify-start items-center">
                      <span
                        class="material-symbols-light--width-wide-outline me-[2%]"
                      ></span>
                      <p class="w-[30%]">Luas</p>
                      <span class="w-full">: {{
                      number_format(floatval($detail_info['luas_wisata'] ?? 0), 0, ',', '.') }} m<sup>2</sup></span>
                    </div>
                    <div class="flex mb-[2%] justify-start items-center">
                      <span class="game-icons--inauguration me-[2%]"></span>
                      <p class="w-[30%]">Peresmian</p>
                      <span class="w-full">: {{ \Carbon\Carbon::parse($detail_info['tahun_peresmian'])->translatedFormat('d F Y') }}</span>
                    </div>
                    <div class="flex mb-[2%] justify-start items-center">
                      <span class="hugeicons--manager me-[2%]"></span>
                      <p class="w-[30%]">Pengelola</p>
                      <span class="w-full overflow-hidden"
                        >:  {{ $detail_info['pengelola'] }}</span
                      >
                    </div>
                    <div class="flex mb-[2%] justify-start items-center">
                      <span class="ic--outline-place me-[2%]"></span>
                      <p class="w-[30%]">Alamat</p>
                      <span class="w-full"
                        >: {{ $detail_info['lokasi'] }}</span
                      >
                    </div>
                  </div>

                  <!-- <div class="mt-[1.3vw] w-[100%] text-[1.2vw] font-righteous">
                    <div class="flex mb-[2%] justify-start items-center">
                      <div class="basis-[140px] gap-3 flex items-center">
                        <span class="material-symbols-light--width-wide-outline"></span>
                        <span>Luas</span>
                      </div>
                      <span class="text-[.5em] sm:text-[.7em] md:text-[.9em]">: {{
                        number_format(floatval($detail_info['luas_wisata'] ?? 0), 0, ',', '.') }} m<sup>2</sup></span>
                    </div>
                    <div class="flex items-center justify-start">
                      <div class="basis-[140px] text-[.5em] sm:text-[.7em] md:text-[.9em] gap-3 flex items-center">
                        <span class="game-icons--inauguration"></span>
                        <span>Peresmian</span>
                      </div>
                      <span class="text-[.5em] sm:text-[.7em] md:text-[.9em]">
                        : {{ \Carbon\Carbon::parse($detail_info['tahun_peresmian'])->translatedFormat('d F Y') }}
                      </span>
                    </div>
                    <div class="flex items-center justify-start">
                      <div class="basis-[140px] text-[.5em] sm:text-[.7em] md:text-[.9em] gap-3 flex items-center">
                        <span class="hugeicons--manager"></span>
                        <span>Pengelola</span>
                      </div>
                      <span class="text-[.5em] sm:text-[.7em] md:text-[.9em]">: {{ $detail_info['pengelola'] }}</span>
                    </div>
                    <div class="flex items-center justify-start">
                      <div class="basis-[140px] text-[.5em] sm:text-[.7em] md:text-[.9em] gap-3 flex items-center">
                        <span class="ic--outline-place"></span>
                        <span>Alamat</span>
                      </div>
                      <span class="text-[.5em] sm:text-[.7em] md:text-[.9em]">: {{ $detail_info['lokasi'] }}</span>
                    </div>
                  </div> -->

                  <div
                    class="absolute w-[35%] qr-code backdrop-blur-[1vw] -bottom-[35%] -right-[20%] shadow-lg px-[4%] pt-[10%] pb-[3%] text-center text-xs flex items-center flex-col gap-[1vw]"
                  >
                    <span class="text-[1vw] leading-[1.2vw]"
                      >QR Code video SIBI bagi penyandang Tunarungu</span
                    >
                    <!-- <img src="{{asset('img/assets/Group 65.svg')}}" alt="" /> -->
                    <div class="w-[8vw] h-[8vw]">

                      @php
                      // Generate QR Code in base64 format
                      try {
                      $image = base64_encode(QrCode::format('png')
                      ->size(300)
                      ->backgroundColor(217, 217, 217)
                      ->margin(2)
                      ->generate($qrcode));
                      } catch (\Exception $e) {
                      $image = null;
                      }
                      @endphp
  
                      @if ($image)
                      <img src="data:image/png;base64,{{ $image }}" alt="QR Code" class="" />
                      @else
                      <p class="text-[1vw] leading-[1.2vw]">Error generating QR code. Please try again later.</p>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div
                class="absolute w-[20%] bottom-[3%] right-[20%] p-[2%] text-center text-xs flex justify-center flex-col gap-2 jus"
                style="background-image: url('{{ asset('img/assets/containerQRCode.svg') }}'); background-size: contain; background-repeat: no-repeat; height: 19rem;">
                <p class="font-righteous text-[15px] leading-5 mb-3">
                  QR Code Video SIBI atau BISINDO bagi penyandang tunarungu
                </p>
                <div class="relative flex items-center justify-center w-[90%] h-24 mt-3">
                  @php
                  // Generate QR Code in base64 format
                  try {
                  $image = base64_encode(QrCode::format('png')
                  ->size(300)
                  ->backgroundColor(217, 217, 217)
                  ->margin(2)
                  ->generate($qrcode));
                  } catch (\Exception $e) {
                  $image = null;
                  }
                  @endphp

                  @if ($image)
                  <img src="data:image/png;base64,{{ $image }}" alt="QR Code" class="border-0 rounded-lg w-[90%]" />
                  @else
                  <p>Error generating QR code. Please try again later.</p>
                  @endif
                </div>
              </div> -->
            </div>
          </div>
        </section>

        <!-- Slide Kosong, Tambahkan Konten di Sini -->
        @foreach ($fasilitas as $item)
        <section class="swiper-slide">
          <div class="w-screen h-screen font-poppins flex justify-between">

            <!-- Bagian Kiri -->
            <div class="basis-[50%] relative">
              <div class="relative w-full h-[43%]">
                <!-- Image Bagian Kiri -->
                <div
                  style="
                    background-image: url({{Storage::url($item['image1'])}})
                  "
                  class="absolute bg-center bg-cover bg-no-repeat right-0 w-[85%] h-full img-sekartaji"
                ></div>
                <!-- Image Bagian Kiri -->
                <span
                  class="inline-block absolute w-[1vw] h-[5vw] bg-ylow -right-[1vw]"
                ></span>
              </div>
              <article
                class="w-[90%] flex flex-col gap-[1.5vw] items-end relative h-full mt-[1.8vw] text-end"
              >
                <span
                  class="inline-block absolute w-[.8vw] h-[8vw] bg-ylow -right-[5vw] top-[9vw]"
                ></span>
                <div>
                  <h1 class="text-[3.2vw] font-semibold w-[40vw] leading-[3.9vw]">
                    @if ($item['translate_fasilitas'] == 'WIFI' || $item['translate_fasilitas'] == 'CCTV')
                    {{ $item['translate_fasilitas'] }}
                    @else
                    {{ ucwords(strtolower($item['translate_fasilitas'])) }}
                    @endif
                  </h1>
                  <h2 class="font-righteous text-[1.5vw] mt-[.5vw]">
                    <span
                      class="inline-block bg-white w-[6vw] h-[.3vw]"
                    ></span>
                    Sekartaji Park
                  </h2>
                </div>
                <!-- Deskripi bagian Kiri -->
                <div
                  class="w-[60%] h-[13vw] font-righteous custom-scrollbar pe-[1vw] overflow-y-scroll text-justify text-[1vw] "
                >
                  <p>
                    {{ $item['bahasa_inggris'] }}
                  </p>
                  <!-- QR Code -->
                  <div
                    class="absolute w-[10vw] h-[15vw] left-[5vw] top-[7vw] qr-code bg-contain flex flex-col items-center justify-between pt-[2.7vw] pb-[.5vw]"
                  >
                    <p class="w-[80%] text-center text-[.8vw]">
                      QR Code video SIBI bagi penyandang Tunarungu
                    </p>
                    <div class="w-[6vw] h-[6vw]">
                      @php
                      // Generate QR Code in base64 format
                      try {
                      $image = base64_encode(QrCode::format('png')
                      ->size(300)
                      ->backgroundColor(217, 217, 217)
                      ->margin(2)
                      ->generate($item['bahasa_isyarat']));
                      } catch (\Exception $e) {
                      $image = null;
                      }
                      @endphp
  
                      @if ($image)
                      <img src="data:image/png;base64,{{ $image }}" alt="QR Code"
                        class="border-0 rounded-lg w-[90%]" />
                      @else
                      <p class="text-[.8vw] leading-[1.2vw] text-center">Error generating QR code. Please try again later.</p>
                      @endif
                    </div>
                    <!-- <img
                      src="/public/img/assets/Group 65.svg"
                      class="w-[78%]"
                      alt=""
                    /> -->
                  </div>
                  <!-- QR Code -->
                </div>
                <!-- Deskripi bagian Kiri -->
              </article>
            </div>
            <div class="bg-ijo basis-[50%] relative">
                <span
                  class="inline-block absolute w-[.8vw] h-[8vw] bg-ylow left-0 top-[13.5vw]"
                ></span>
                <article
                  class="w-[100%] flex flex-col gap-[1.5vw] items-start justify-center ps-[5vw] relative h-full"
                >
                  <div>
                    <h1 class="text-[3.2vw] font-semibold w-[40vw] leading-[3.9vw]">
                      @if ($item['fasilitas'] == 'WIFI' || $item['fasilitas'] == 'CCTV')
                      {{ $item['fasilitas'] }}
                      @else
                      {{ ucwords(strtolower($item['fasilitas'])) }}
                      @endif
                    </h1>
                    <h2 class="font-righteous text-[1.5vw] mt-[.5vw]">
                      Sekartaji Park
                      <span
                        class="inline-block bg-white w-[6vw] h-[.3vw]"
                      ></span>
                    </h2>
                  </div>
                  <!-- Deskripi bagian Kanan -->
                  <div class="relative">
                    <div
                      class="w-[60%] pe-[1vw] h-[13vw] custom-scrollbar overflow-y-scroll text-justify text-[1vw] font-righteous"
                    >
                      <p>
                        {!! $item['bahasa_indonesia'] !!}
                      </p>
                    </div>
                    <!-- QR Code -->
                    <div
                      class="absolute w-[10vw] h-[15vw] right-[5vw] -top-[2vw] qr-code bg-contain flex flex-col items-center justify-between pt-[2.7vw] pb-[.5vw]"
                    >
                      <p class="w-[80%] text-center text-[.8vw]">
                        QR Code video SIBI bagi penyandang Tunarungu
                      </p>
                      <div class="w-[6vw] h-[6vw]">
                        @php
                        // Generate QR Code in base64 format
                        try {
                        $image = base64_encode(QrCode::format('png')
                        ->size(300)
                        ->backgroundColor(217, 217, 217)
                        ->margin(2)
                        ->generate($item['bahasa_isyarat']));
                        } catch (\Exception $e) {
                        $image = null;
                        }
                        @endphp

                        @if ($image)
                        <img src="data:image/png;base64,{{ $image }}" alt="QR Code"
                          class="border-0 rounded-lg w-[90%]" />
                        @else
                        <p class="text-[.8vw] leading-[1.2vw] text-center">Error generating QR code. Please try again later.</p>
                        @endif
                      </div>
                      
                    </div>
                    <!-- QR Code -->
                  </div>
                  <!-- Deskripi bagian Kanan -->

                  <!-- Image Bagian Kanan -->
                  <div class="relative mt-[1vw] w-full h-[40%]">
                    <div
                      style="
                        background-image: url({{ Storage::url($item['image2']) }})
                      "
                      class="absolute bg-center bg-cover bg-no-repeat left-0 w-[80%] h-full img-sekartaji2"
                    ></div>
                  </div>
                  <!-- Image Bagian Kanan -->
                </article>
              </div>
            <div>
              <!-- <div class="relative flex flex-col items-center w-1/2 h-full gap-8 pb-5 img-content">
                <div class="relative flex justify-end w-full">
                  <span class="absolute bottom-0 z-20 w-3 h-32 bg-ylow -right-3"></span>
                  <img class="right-0 w-10/12" src="{{ Storage::url($item['image1']) }}" class="h-96" />
                </div>

                {{-- BAHASA INDONESIA --}}
                <article class="w-10/12 h-1/2">
                  <h1 class="text-6xl font-semibold text-right font-poppins">
                    @if ($item['fasilitas'] == 'WIFI' || $item['fasilitas'] == 'CCTV')
                    {{ $item['fasilitas'] }}
                    @else
                    {{ ucwords(strtolower($item['fasilitas'])) }}
                    @endif
                  </h1>
                  <div class="flex items-center justify-end w-full gap-6 mt-3">
                    <span class="w-1/5 h-[6px] rounded bg-white"></span>
                    <p class="text-2xl font-normal font-righteous">
                      Sekartaji Kediri
                    </p>
                  </div>
                  <div class="flex items-start justify-between gap-12 pb-6 mt-8">
                    <div class="flex flex-col items-center w-1/5 gap-5 px-1 pb-3 text-center border-0 rounded-md pt-14"
                      style="background-image: url('{{ asset('img/assets/containerQRCode.svg') }}'); background-size: contain; background-repeat: no-repeat;
                      height: 25rem;">
                      <p class="font-righteous text-[15px] leading-5 -mt-3">
                        QR Code Video SIBI atau BISINDO untuk penyandang tunarungu
                      </p>
                      <div class="w-[8vw] h-[8vw]">
                        @php
                        // Generate QR Code in base64 format
                        try {
                        $image = base64_encode(QrCode::format('png')
                        ->size(300)
                        ->backgroundColor(217, 217, 217)
                        ->margin(2)
                        ->generate($item['bahasa_isyarat']));
                        } catch (\Exception $e) {
                        $image = null;
                        }
                        @endphp

                        @if ($image)
                        <img src="data:image/png;base64,{{ $image }}" alt="QR Code"
                          class="border-0 rounded-lg w-[90%]" />
                        @else
                        <p>Error generating QR code. Please try again later.</p>
                        @endif
                      </div>
                    </div>
                    <div class="w-3/4 text-lg text-justify">
                      {!! $item['bahasa_indonesia'] !!}
                    </div>
                  </div>
                </article>
              </div> -->
              <!-- <div class="relative flex flex-col-reverse items-center w-1/2 h-full gap-8 img-content bg-ijo">
                <span class="absolute w-3 h-32 bg-ylow -left-3 bottom-[15%]"></span>
                <div class="relative w-10/12 h-full mt-10">
                  <img src="{{ Storage::url($item['image2']) }}" class="h-96" alt="" />
                </div>

                {{-- BAHASA INGGRIS --}}
                <article class="w-10/12 pt-10 h-1/2">
                  <h1 class="text-6xl font-semibold font-poppins">
                    @if ($item['translate_fasilitas'] == 'WIFI' || $item['translate_fasilitas'] == 'CCTV')
                    {{ $item['translate_fasilitas'] }}
                    @else
                    {{ ucwords(strtolower($item['translate_fasilitas'])) }}
                    @endif
                  </h1>
                  <div class="flex items-center justify-start w-full gap-6 mt-3">
                    <p class="text-2xl font-normal font-righteous">
                      Sekartaji Kediri
                    </p>
                    <span class="w-1/5 h-[6px] rounded bg-white"></span>
                  </div>
                  <div class="flex flex-row-reverse items-start justify-between gap-12 pb-6 mt-8">
                    <div class="flex flex-col items-center w-1/5 gap-5 px-1 pb-3 text-center border-0 rounded-md pt-14"
                      style="background-image: url('{{ asset('img/assets/containerQRCode.svg') }}'); background-size: contain; background-repeat: no-repeat;
                      height: 25rem;">
                      <p class="font-righteous text-[15px] leading-5 -mt-3">
                        QR Code Video SIBI atau BISINDO untuk penyandang tunarungu
                      </p>
                      <div class="relative flex items-center justify-center w-[90%] h-24">
                        @php
                        // Generate QR Code in base64 format
                        try {
                        $image = base64_encode(QrCode::format('png')
                        ->size(300)
                        ->backgroundColor(217, 217, 217)
                        ->margin(2)
                        ->generate($item['bahasa_isyarat']));
                        } catch (\Exception $e) {
                        $image = null;
                        }
                        @endphp

                        @if ($image)
                        <img src="data:image/png;base64,{{ $image }}" alt="QR Code"
                          class="border-0 rounded-lg w-[90%]" />
                        @else
                        <p>Error generating QR code. Please try again later.</p>
                        @endif
                      </div>
                    </div>

                    <p class="w-3/4 text-lg text-justify">
                      {{ $item['bahasa_inggris'] }}
                    </p>
                  </div>
                </article>
              </div> -->
            </div>
          </div>
        </section>
        @endforeach
      </div>
    </div>

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
          class="custom-swiper-button-next parent-next opacity-100 translate-x-[50px] transition-all duration-[.5s] hover:translate-x-[20px] z-[55]"
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

    <!-- <div class="absolute w-full top-[50%] z-[99]">
      <div class="flex justify-between">
        <div
          class="custom-swiper-button-prev opacity-0 -translate-x-[50px] transition-all duration-[.5s] hover:-translate-x-[20px]">
          <button class="p-2">
            <img src="{{ asset('img/assets/Group 79 (2).svg') }}" class="-mt-[310px]" alt="" />
          </button>
        </div>
        <div
          class="custom-swiper-button-next opacity-100 translate-x-[50px] transition-all duration-[.5s] hover:translate-x-[20px]">
          <button class="p-2">
            <img src="{{ asset('img/assets/Group 80.svg') }}" class="-mt-[310px]" alt="" />
          </button>
        </div>
      </div>
    </div> -->
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
  @Vite('resources/js/app.js')
  <!-- Kode Javascript -->
  <script type="module" src="{{ asset('js/app.js') }}"></script>
  <!-- swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  
</body>

</html>