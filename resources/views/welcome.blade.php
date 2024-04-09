<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Climate Call</title>
        <link rel="icon" href="{{ asset('build/assets/logo (1).jpg')}}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased hover:cursor-default">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-center bg-dots-lighter bg-purple-400 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6  text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-white hover:text-green-400  focus:outline focus:outline-2 focus:rounded-sm focus:outline-green-400 p-2 bg-purple-400 rounded text-lg">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-white hover:text-green-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-green-400 p-2 bg-purple-400 rounded text-lg">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-white hover:text-green-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-green-400 p-2 bg-purple-400 rounded text-lg">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                {{-- Logo --}}
                <div class="w-full h-fit flex items-center justify-center">
                    <x-application-logo/>
                </div>
                
                <div class="-mt-14 w-full text-center text-5xl md:text-9xl text-white font-bold">
                    <p>Clim<span class="text-green-400">a</span>te C<span class="text-green-400">a</span>ll</p>
                </div>
            </div>

        </div>
        <div class="w-full h-fit bg-black px-3 py-20 md:px-20 md:py-32">
            <p class="text-5xl md:text-7xl text-white text-center">The starter's <span class="text-amethyst"> guide</span> for fighting <br> <span class="text-green-400"> Climate change.</span></p>
        </div>

        <div class="w-full p-10 md:p-20 md:grid grid-cols-2">
            <div class="w-full mb-7 md:mb-0 h-full flex items-center">
                <p class="text-5xl md:ml-32 border-b-2 border-celadon md:border-none">About</p>
            </div>
            <div>
                <p class="text-xl">Climate Call is all about getting people on the right track to fight climate change, by helping them to <span class="text-amethyst">access climatic data</span>, gain and share important  climate related information and give them basic knowledge on how to <span class="text-amethyst"> care for various plants.</span> <br><br> This app is version 2 of the Save Your Home weather app. 
                </p>
            </div>
        </div>

        <div class="w-full p-10 md:p-20 bg-green-500">
            <div class="w-full h-fit text-center text-5xl font-bold">
                <p class="text-white">KEY FEATURES</p>
            </div>

            <div class="mt-10 w-full h-fit md:grid grid-cols-3 gap-5">
                <div class="w-full h-[27rem] md:h-80 bg-white rounded-t-full md:rounded-tr-none md:rounded-l-full  p-4 pt-28 md:pt-4 md:pl-10 text-center md:text-right">
                    <p class="text-chryslerBlue text-4xl mb-4">Weather Data</p>
                    <p class="text-xl">You have the ability to search for any location of your choice and get real time data of the weather condition of that place and get a 4 days weather forecasts for that place.</p>
                    <div class="w-full h-fit flex items-center justify-end">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-20 h-20 mt-4 mr-14"><!--! Font Awesome Pro 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 224c0 53 43 96 96 96h47.2L290 202.5c17.6-14.1 42.6-14 60.2 .2s22.8 38.6 12.8 58.8L333.7 320H352h64c53 0 96-43 96-96s-43-96-96-96c-.5 0-1.1 0-1.6 0c1.1-5.2 1.6-10.5 1.6-16c0-44.2-35.8-80-80-80c-24.3 0-46.1 10.9-60.8 28C256.5 24.3 219.1 0 176 0C114.1 0 64 50.1 64 112c0 7.1 .7 14.1 1.9 20.8C27.6 145.4 0 181.5 0 224zm330.1 3.6c-5.8-4.7-14.2-4.7-20.1-.1l-160 128c-5.3 4.2-7.4 11.4-5.1 17.8s8.3 10.7 15.1 10.7h70.1L177.7 488.8c-3.4 6.7-1.6 14.9 4.3 19.6s14.2 4.7 20.1 .1l160-128c5.3-4.2 7.4-11.4 5.1-17.8s-8.3-10.7-15.1-10.7H281.9l52.4-104.8c3.4-6.7 1.6-14.9-4.2-19.6z"/></svg>
                    </div>
                </div>

                <div class="w-full h-100 md:h-80 bg-white p-4 md:pl-10 text-center">
                    <p class="text-chryslerBlue text-4xl mb-4">Chat Community</p>
                    <p class="text-xl">Share your thoughts and useful information on climate change. This gives you the ability to help others know more about climate issues and helps you to gain more knowledge.</p>
                    <div class="w-full h-fit flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-20 h-20 mt-4"><!--! Font Awesome Pro 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M208 352c114.9 0 208-78.8 208-176S322.9 0 208 0S0 78.8 0 176c0 38.6 14.7 74.3 39.6 103.4c-3.5 9.4-8.7 17.7-14.2 24.7c-4.8 6.2-9.7 11-13.3 14.3c-1.8 1.6-3.3 2.9-4.3 3.7c-.5 .4-.9 .7-1.1 .8l-.2 .2 0 0 0 0C1 327.2-1.4 334.4 .8 340.9S9.1 352 16 352c21.8 0 43.8-5.6 62.1-12.5c9.2-3.5 17.8-7.4 25.3-11.4C134.1 343.3 169.8 352 208 352zM448 176c0 112.3-99.1 196.9-216.5 207C255.8 457.4 336.4 512 432 512c38.2 0 73.9-8.7 104.7-23.9c7.5 4 16 7.9 25.2 11.4c18.3 6.9 40.3 12.5 62.1 12.5c6.9 0 13.1-4.5 15.2-11.1c2.1-6.6-.2-13.8-5.8-17.9l0 0 0 0-.2-.2c-.2-.2-.6-.4-1.1-.8c-1-.8-2.5-2-4.3-3.7c-3.6-3.3-8.5-8.1-13.3-14.3c-5.5-7-10.7-15.4-14.2-24.7c24.9-29 39.6-64.7 39.6-103.4c0-92.8-84.9-168.9-192.6-175.5c.4 5.1 .6 10.3 .6 15.5z"/></svg>
                    </div>
                </div>

                <div class="w-full h-[27rem] md:h-80 bg-white rounded-b-full md:rounded-bl-none md:rounded-r-full p-4 md:pr-10 text-center md:text-left">
                    <p class="text-chryslerBlue text-4xl mb-4">Plant Guide</p>
                    <p class="text-xl">Since plants are crucial in the climate war, Climate Call therefore provides a mini-book-like section that gives you the basic knowledge for caring for over 1000 species of plants.</p>
                    <div class="w-full h-fit flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-20 h-20 ml-14 mt-4"><!--! Font Awesome Pro 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M512 32c0 113.6-84.6 207.5-194.2 222c-7.1-53.4-30.6-101.6-65.3-139.3C290.8 46.3 364 0 448 0h32c17.7 0 32 14.3 32 32zM0 96C0 78.3 14.3 64 32 64H64c123.7 0 224 100.3 224 224v32V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V320C100.3 320 0 219.7 0 96z"/></svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-black w-full md:h-[40rem] p-10 md:p-20 md:grid grid-cols-2">
            <div class="col-span-2 h-fit pt-8 text-white text-5xl border-t-2 border-amethyst">
                <p class="">The Creator</p>
            </div>
            <div class="md:w-4/6 py-5 mt-8 h-full border-2 border-amethyst flex items-center justify-center">
                <img src="{{ asset('/client/img/image.png')}}" alt="the app creator" class="w-80 h-80">
            </div>
            <div class="w-full h-full text-white">
                <p class="text-teaGreen text-4xl font-bold mb-4 mt-7">M<span class="text-amethyst">'</span>mah Zombo</p>
                <p class="text-xl md:text-2xl">A 19 year old software developer at Korlie Limited, a software engineering student at Alx Africa and a born again christian.</p>
                <br>
                <p class="text-xl md:text-2xl">Her drive to solve one of UN'S SDGs led her on the journey of developing this web application.</p>
                <br>
                <p class="text-xl md:text-2xl">Connect with her on Twitter and Instagram @:</p>
                <br>
                <div class="w-full h-fit flex items-center justify-between">
                    <div class="w-fit px-4 h-fit py-2 text-center bg-white hover:bg-opacity-50  bg-opacity-20 rounded">
                        <p class="text-xl text-amethyst hover:text-black hover:cursor-pointer">zombo_mah</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full h-40 bg-amethyst p-10 md:px-20 md:py-10 text-center">
            <p class="mb-5 text-lg">Check out the application's code on Github <span class="w-fit px-2 md:px-3 py-1 h-fit bg-black text-amethyst rounded">@github</span> </p>
            <p>&copy;Copyright 2023. All rights reserved</p>
        </div>
    </body>
</html>
