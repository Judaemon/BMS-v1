<!DOCTYPE html>
<html x-data="data" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BMS</title>

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

        <!-- Scripts Testing-->
        @vite('resources/js/app.js')
        <script src="{{ asset('js/init-alpine.js') }}" ></script>

        @livewireStyles
    </head>
    <body class="antialiased">
        <div class="dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <nav class="bg-white border-gray-200 px-2 py-4 sm:px-4 rounded dark:bg-gray-900 top-0 right-0 w-full">
                <div class="container flex flex-wrap justify-between max-w-6xl items-center mx-auto">
            
                    <a href="https://flowbite.com/" class="flex items-center">
                        <img src="{{ URL::asset('images/mitacor_logo_text.png') }}" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo">
                        <span class="self-end text-sm font-poppins font-semibold whitespace-nowrap dark:text-white">BMS</span>
                    </a>
                  
                    <button 
                        type="button" 
                        @click="toggleGuestMenu"
                        @click.outside="closeGuestMenu"
                        aria-label="Menu"

                        class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    </button>

                    {{-- Mobile --}}
                    <div x-show="isGuestMenuOpen"  class="fixed top-14 w-full bg-cool-gray-800/50 h-full -m-2 md:hidden md:w-auto">
                        @if (Route::has('login'))
                            <ul class="flex flex-col rounded-lg p-2 space-y-2 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                                @auth
                                    <li>
                                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                                    </li>
                                @else
                                    <li class="justify-center text-white bg-cool-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-cool-gray-800/50 font-medium rounded-full text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-cool-gray-800/40 dark:focus:ring-gray-600">
                                        <a href="{{ route('login') }}" class="text-sm">Log in</a>
                                    </li>
            
                                    @if (Route::has('register'))
                                    <li class="justify-center bg-white text-white focus:ring-4 focus:outline-none focus:ring-cool-gray-800/50 font-medium rounded-full text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-cool-gray-800/40 dark:focus:ring-gray-600">
                                        <a href="{{ route('register') }}" class="text-sm hover:underline text-cool-gray-800">Register</a>
                                    </li>
                                    @endif
                                @endauth
                            </ul>
                        @endif
                    </div>

                    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                        @if (Route::has('login'))
                            <ul class="flex flex-col bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                                @auth
                                    <li>
                                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                                    </li>
                                @else
                                    <li class="text-white bg-cool-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-cool-gray-800/50 font-medium rounded-full text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-cool-gray-800/40 dark:focus:ring-gray-600 mr-2 mb-2">
                                        <a href="{{ route('login') }}" class="text-sm">Log in</a>
                                    </li>
            
                                    @if (Route::has('register'))
                                    <li class="text-white focus:ring-4 focus:outline-none focus:ring-cool-gray-800/50 font-medium rounded-full text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-cool-gray-800/40 dark:focus:ring-gray-600 mr-2 mb-2">
                                        <a href="{{ route('register') }}" class="text-sm hover:underline text-cool-gray-800">Register</a>
                                    </li>
                                    @endif
                                @endauth
                            </ul>
                        @endif
                    </div>
                </div>
            </nav>

            {{-- banner --}}
            <section class="flex flex-col justify-center bg-cool-gray-800/20 flex-grow items-center w-full max-w-screen-2xl mx-auto h-96 md:flex-row sm:px-6 lg:px-8">
                    <div class="p-4">
                        <h2 class="text-lg text-center font-poppins font-bold">How can we help you?</h2>
                        <h3 class="text-sm text-center ">"There is nothing more important than a good, safe, and secure home."</h3>
                    </div>
            </section>

            {{-- barangay desciption --}}
            <section class="max-w-screen-2xl py-6 bg-cool-gray-800 text-white ">
                <div class="flex flex-col mx-auto max-w-5xl md:flex-row sm:px-6 lg:px-8">
                    <div class="flex flex-col flex-none">
                        <img src="{{ URL::asset('images/mitacor_logo.png') }}" class="mr-3 h-40 self-center" alt="Barangay Logo">
                        <p class="w-full text-center text-sm">Barangay Logo</p>
                    </div>
                    <div class="flex p-4 flex-grow">
                        <div class="">
                            <h3 class="text-base">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim corporis animi ut ratione sit hic in necessitatibus fuga quia possimus? Odio et illo nihil inventore debitis cupiditate quibusdam omnis, est ducimus perferendis reiciendis numquam vero nulla architecto molestias deleniti voluptates quod quos nam consectetur. Non eius quos at dolores facilis!</h3>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="flex flex-col w-full max-w-6xl p-6 mx-auto bg-white md:flex-row sm:px-6 lg:px-8">
                <div class="w-2/5">
                    <h2 class="text-xl font-extrabold font-poppins pb-3">Barangay MITACOR Council 2020 - 2023</h2>
                    
                    <div class="py-3">
                        <p class="text-xs -mt-1">Barangay Captain</p>
                        <h3 class="text-lg font-medium">John Ray Judaya</h3>
                    </div>
                    
                    <div class="py-3">
                        <p class="text-xs -mt-1">Kagawads</p>
                        <h3 class="text-lg font-medium mb-0">Naruto Uzumaki</h3>
                        <h3 class="text-lg font-medium mb-0">Saitama</h3>
                        <h3 class="text-lg font-medium mb-0">Ken Kaneki</h3>
                        <h3 class="text-lg font-medium mb-0">Hachiman Hikigaya</h3>
                        <h3 class="text-lg font-medium mb-0">Itachi Uchiha</h3>
                        <h3 class="text-lg font-medium mb-0">Eren Yeager</h3>
                        <h3 class="text-lg font-medium mb-0">Kurisu Makise </h3>
                    </div>

                    <div class="py-3">
                        <p class="text-xs -mt-1">Secretary</p>
                        <h3 class="text-lg font-medium mb-0">Optimus Prime</h3>
                    </div>

                    <div class="py-3">
                        <p class="text-xs -mt-1">Treasurer</p>
                        <h3 class="text-lg font-medium mb-0">Lelouch Lamperouge</h3>
                    </div>
                </div>
                <div class="w-3/5">
                    <div class="mb-5">
                        <h2 class="text-xl font-extrabold font-poppins pb-1">VISION STATEMENT</h2>
                        <h3 class="text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam accusantium sunt laudantium, nesciunt ipsa tempora rem hic quos eligendi dignissimos ducimus tenetur ut, vero, commodi reprehenderit corporis sapiente. Consequatur, amet.</h3>    
                    </div>

                    <div class="mb-5">
                        <h2 class="text-xl font-extrabold font-poppins pb-1">MISSION STATEMENT</h2>
                        <h3 class="text-lg">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero quae ea rerum quis nostrum laboriosam vel distinctio quidem asperiores nemo consequatur, tenetur dignissimos excepturi officia perferendis pariatur aperiam, aspernatur repudiandae reiciendis. Consectetur nobis laudantium architecto?</h3>    
                    </div>

                    <div class="mb-5">
                        <h2 class="text-xl font-extrabold font-poppins pb-1">OUR PLEDGE</h2>
                        <h3 class="text-lg">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatibus quasi provident suscipit animi, iusto doloremque maiores repellat molestiae itaque, at cumque debitis consectetur. Ipsa iusto pariatur repellat hic nisi id, itaque unde, aliquam natus minus quae, quasi consequuntur sint? Voluptates quod aliquam voluptas laudantium? Adipisci dolorum facere laudantium nam earum!</h3>    
                    </div>
                </div>
            </section>

            <section class="bg-cool-gray-900 max-w-screen-2xl mx-auto text-white flex justify-center p-8 font-poppins text-lg">
                <p class="mr-2">Need help? Call our award-winning support team from 8am-5pm manila time at: </p>
                <span>
                    <a class="text-blue-400" href="Tel: +63 908 880 8914" target="_blank" rel="noopener">+63 908 880 8914</a>
                </span>
                
            </section>
        </div>

        <footer class="max-w-6xl mx-auto flex justify-between p-2">
            <div class="flex justify-center items-center">
                <p>© Copyright <strong><a href="https://mitacor.net"><span style="color: #6ecef1;">MITACOR</span></a></strong> | All Rights Reserved 2022</p>
            </div>

            <div class="p-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800">
                <ul class="flex flex-wrap items-center mt-3 text-sm text-gray-500 dark:text-gray-400 sm:mt-0">
                    <li>
                        <a href="https://www.facebook.com/MITACOR-104703534942655/" target="_blank">
                            <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/mitacor.net_ig/" target="_blank">
                            <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path d="M224,202.66A53.34,53.34,0,1,0,277.36,256,53.38,53.38,0,0,0,224,202.66Zm124.71-41a54,54,0,0,0-30.41-30.41c-21-8.29-71-6.43-94.3-6.43s-73.25-1.93-94.31,6.43a54,54,0,0,0-30.41,30.41c-8.28,21-6.43,71.05-6.43,94.33S91,329.26,99.32,350.33a54,54,0,0,0,30.41,30.41c21,8.29,71,6.43,94.31,6.43s73.24,1.93,94.3-6.43a54,54,0,0,0,30.41-30.41c8.35-21,6.43-71.05,6.43-94.33S357.1,182.74,348.75,161.67ZM224,338a82,82,0,1,1,82-82A81.9,81.9,0,0,1,224,338Zm85.38-148.3a19.14,19.14,0,1,1,19.13-19.14A19.1,19.1,0,0,1,309.42,189.74ZM400,32H48A48,48,0,0,0,0,80V432a48,48,0,0,0,48,48H400a48,48,0,0,0,48-48V80A48,48,0,0,0,400,32ZM382.88,322c-1.29,25.63-7.14,48.34-25.85,67s-41.4,24.63-67,25.85c-26.41,1.49-105.59,1.49-132,0-25.63-1.29-48.26-7.15-67-25.85s-24.63-41.42-25.85-67c-1.49-26.42-1.49-105.61,0-132,1.29-25.63,7.07-48.34,25.85-67s41.47-24.56,67-25.78c26.41-1.49,105.59-1.49,132,0,25.63,1.29,48.33,7.15,67,25.85s24.63,41.42,25.85,67.05C384.37,216.44,384.37,295.56,382.88,322Z"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/company/mitacor/" target="_blank">
                            <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/channel/UCbUa0fhL56GexGGK2mt80Qw" target="_blank">
                            <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path d="M186.8 202.1l95.2 54.1-95.2 54.1V202.1zM448 80v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48zm-42 176.3s0-59.6-7.6-88.2c-4.2-15.8-16.5-28.2-32.2-32.4C337.9 128 224 128 224 128s-113.9 0-142.2 7.7c-15.7 4.2-28 16.6-32.2 32.4-7.6 28.5-7.6 88.2-7.6 88.2s0 59.6 7.6 88.2c4.2 15.8 16.5 27.7 32.2 31.9C110.1 384 224 384 224 384s113.9 0 142.2-7.7c15.7-4.2 28-16.1 32.2-31.9 7.6-28.5 7.6-88.1 7.6-88.1z"/>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </footer>
        @livewireScripts
    </body>
</html>
