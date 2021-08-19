<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <link rel="stylesheet" href="{{asset('front/styles/aos.css')}}">
    <link rel="stylesheet" href="{{asset('front/styles/rootStyles.css')}}">
    <link rel="stylesheet" href="{{asset('front/styles//styles.css')}}">
    <link rel="stylesheet" href="{{asset('front/styles/dropdown.css')}}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
  <style>
    .marquee {
      color: red;
      display: inline-block;
      white-space: nowrap;
      /*   animation: scrollLeft 38s linear infinite; */
      padding-left: 81%;
    }

    .marquee:hover {
      animation-play-state: paused
    }

    @keyframes scrollLeft {
      0% {
        transform: translateX(0%);
      }
      100% {
        transform: translateX(-100%)
      }
    }
  </style>
    @livewireStyles
</head>
<body >

    <header>
      <div class="container">
        <div class="row">
          <span class="marquee" style="animation: 15s linear 0s infinite normal none running scrollLeft;"> Сайт работает в тестовом режиме </span>
        </div>
      </div>
    <img src="/front/resources/header-bg.jpg" alt="Header-background-image">
    <div class="headerContent">

      <!-- NAVBAR -->
      <nav data-aos="fade-down" class="navbar">
        <a href="#">
          <img class="logotype" src="/front/resources/logotype.png" alt="Logotype">
        </a>
        <ul>
          <li><a href="/">Bosh sahifa</a></li>
          <li><a href="#">Mikroorganizmlar</a></li>
          <li><a href="#">Loyiha haqida</a></li>
          <li><a href="#">Hisobotlar</a></li>
        </ul>

        <div class='dropdown'>
          <div class='title'>UZ</div>

          <div class='menu'>
            <div class='option'>
              <a href="#">UZ</a>
            </div>
            <div class='option'>
              <a href="#">RU</a>
            </div>
            <div class='option'>
              <a href="#">EN</a>
            </div>
          </div>

        </div>

      </nav>

      <!-- MOBILE NAVBAR -->
      <nav class="mobileNav">
        <a href="#">
          <img class="logotype" src="/front/resources/logotype.png" alt="Logotype">
        </a>

        <div class="burger">
          <span class="burger"></span>
          <span class="burger"></span>
          <span class="burger"></span>
        </div>

        <ul>
          <li><a href="#" class="link">Bosh sahifa</a></li>
          <li><a href="#" class="link">Mikroorganizmlar</a></li>
          <li><a href="#" class="link">Loyiha haqida</a></li>
          <li><a href="#" class="link">Hisobotlar</a></li>
          <div class='menu2'>
            <div class='option2'>
              <a href="#" class="selected">UZ</a>
            </div>
            <div class='option2'>
              <a href="#">RU</a>
            </div>
            <div class='option2'>
              <a href="#">EN</a>
            </div>
          </div>
        </ul>
      </nav>

      <div class="headTitle">
        <h1>
          Mikroorganizmlar
          <br>
          <span>katologi</span>
        </h1>

        <input type="button" value="Batafsil">
      </div>

    </div>
  </header>

    <main>

    @yield('content')
    
    @isset($slot)
        {{ $slot }}
    @endisset

  </main>

<footer data-aos="fade-up">

    <div class="items">

      <div class="item">
        <h4>Loyiha haqida</h4>
        <span>O’zbekiston Respublikasi Fanlar akademiyasi Mikrobiologiya ilmiy tadqiqot
          instituti tomonidan O’zbekistonda mavjuda mikroorganizmlarning elektron
          katalogi</span>
      </div>

      <div class="item">
        <h4>Loyiha haritasi</h4>
        <ul>
          <li><a href="/">Bosh sahifa</a></li>
          <li><a href="#">Mikroorganizmlar</a></li>
          <li><a href="#">Loyiha haqida</a></li>
          <li><a href="#">Hisobotlar</a></li>
        </ul>
      </div>

      <div class="item">
        <h4>Bog’lanish</h4>
        <span>Toshkent, A. Qodiriy ko’chasi 7B <br> (998-71) 241-92-28, 241-45-21
          microorganisms.uz</span>
      </div>
    </div>

    <div class="footer">
      <span>O’zbekiston Respublikasi Fanlar akademiyasi Mikrobiologiya ilmiy tadqiqot instituti - 2021</span>
    </div>
  </footer>

  <script src="{{asset('front/script/aos.js')}}"></script>
  <script src="{{asset('front/script/script.js')}}"></script>

    @livewireScripts
    <script>
        var marquee = document.querySelector('.marquee');

        var marqueeLength = marquee.clientWidth;

        var marqueeTravelTime = Math.ceil( marqueeLength / 100 );

        marquee.style.animation = `scrollLeft ${marqueeTravelTime}s linear infinite`;

        marquee.addEventListener('mouseover', (e)=>{
            marquee.style['animation-play-state'] = 'paused';
        });

        marquee.addEventListener('mouseout', (e)=>{
            marquee.style['animation-play-state'] = 'running';
        })
    </script>
</body>
</html>
