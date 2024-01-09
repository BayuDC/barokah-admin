<!--

=========================================================
* Notus Tailwind JS - v1.1.0 based on Tailwind Starter Kit by Creative Tim
=========================================================

* Product Page: https://www.creative-tim.com/product/notus-js
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/notus-js/blob/main/LICENSE.md)

* Tailwind Starter Kit Page: https://www.creative-tim.com/learning-lab/tailwind-starter-kit/presentation

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#000000" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <link rel="stylesheet" href="/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" />
    @vite('resources/css/app.css')

    <title>@yield('title') - Toko Barokah</title>
</head>

<body>
    <noscript>You need to enable JavaScript to run this app.</noscript>
    <div id="root">
        <nav class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
            <div class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
                <a class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="/">
                    Toko Barokah
                </a>
                <button class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" type="button" onclick="toggleNavbar('example-collapse-sidebar')">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden" id="example-collapse-sidebar">
                    <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-200">
                        <div class="flex flex-wrap">
                            <div class="w-6/12">
                                <a class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="../../index.html">
                                    Toko Barokah
                                </a>
                            </div>
                            <div class="w-6/12 flex justify-end">
                                <button type="button" class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" onclick="toggleNavbar('example-collapse-sidebar')">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Divider -->
                    <hr class="my-4 md:min-w-full" />
                    <!-- Heading -->
                    <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                        Manajemen Toko
                    </h6>
                    <!-- Navigation -->

                    <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                        <li class="items-center">
                            <a href="/admin/products" class="text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500">
                                <i class="fas fa-fish mr-2 text-sm text-blueGray-300"></i>
                                Produk
                            </a>
                        </li>

                        <li class="items-center">
                            <a href="./tables.html" class="text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500">
                                <i class="fas fa-tags mr-2 text-sm text-blueGray-300"></i>
                                Kategori
                            </a>
                        </li>

                        <li class="items-center">
                            <a href="./tables.html" class="text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500">
                                <i class="fas fa-users mr-2 text-sm text-blueGray-300"></i>
                                Admin
                            </a>
                        </li>
                    </ul>

                    <!-- Divider -->
                    <hr class="my-4 md:min-w-full" />
                    <!-- Heading -->
                    <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                        Menu Pengguna
                    </h6>
                    <!-- Navigation -->

                    <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
                        <li class="items-center">
                            <a href="../auth/login.html" class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block">
                                <i class="fas fa-user-circle text-blueGray-300 mr-2 text-sm"></i>
                                Profil
                            </a>
                        </li>
                        <li class="items-center">
                            <a href="../auth/register.html" class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block">
                                <i class="fas fa-sign-out-alt text-blueGray-300 mr-2 text-sm"></i>
                                Keluar
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
        <div class="relative md:ml-64 bg-blueGray-50">
            <nav class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4">

                <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4 h-12">
                    <div class="text-white text-sm uppercase inline-block font-semibold" href="./index.html">
                        @yield('title')
                    </div>
                </div>
            </nav>
            <!-- Header -->
            <div class="relative bg-pink-600 md:pt-32 pb-32 pt-12">
                <div class="px-4 md:px-10 mx-auto w-full">
                    <div>
                        <div class="flex flex-wrap">
                            @yield('head')
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content -->
            <div class="px-4 md:px-10 mx-auto w-full -m-24">
                @yield('content')
                <footer class="block py-4 ">
                    <div class="container mx-auto px-4">
                        <hr class="mb-4 border-b-1 border-blueGray-200" />
                        <div class="flex flex-wrap items-center md:justify-between justify-center">
                            <div class="w-full md:w-4/12 px-4">
                                <div class="text-sm text-blueGray-500 font-semibold py-1 text-center md:text-left">
                                    Copyright © <span id="get-current-year"></span>
                                    <a href="https://www.creative-tim.com?ref=njs-dashboard" class="text-blueGray-500 hover:text-blueGray-700 text-sm font-semibold py-1">
                                        Creative Tim
                                    </a>
                                </div>
                            </div>
                            <div class="w-full md:w-8/12 px-4">
                                <ul class="flex flex-wrap list-none md:justify-end justify-center">
                                    <li>
                                        <a href="https://www.creative-tim.com?ref=njs-dashboard" class="text-blueGray-600 hover:text-blueGray-800 text-sm font-semibold block py-1 px-3">
                                            Creative Tim
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.creative-tim.com/presentation?ref=njs-dashboard" class="text-blueGray-600 hover:text-blueGray-800 text-sm font-semibold block py-1 px-3">
                                            About Us
                                        </a>
                                    </li>
                                    <li>
                                        <a href="http://blog.creative-tim.com?ref=njs-dashboard" class="text-blueGray-600 hover:text-blueGray-800 text-sm font-semibold block py-1 px-3">
                                            Blog
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://github.com/creativetimofficial/notus-js/blob/main/LICENSE.md?ref=njs-dashboard" class="text-blueGray-600 hover:text-blueGray-800 text-sm font-semibold block py-1 px-3">
                                            MIT License
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script type="text/javascript">
        /* Make dynamic date appear */
        (function() {
            if (document.getElementById("get-current-year")) {
                document.getElementById("get-current-year").innerHTML =
                    new Date().getFullYear();
            }
        })();
        /* Sidebar - Side navigation menu on mobile/responsive mode */
        function toggleNavbar(collapseID) {
            document.getElementById(collapseID).classList.toggle("hidden");
            document.getElementById(collapseID).classList.toggle("bg-white");
            document.getElementById(collapseID).classList.toggle("m-2");
            document.getElementById(collapseID).classList.toggle("py-3");
            document.getElementById(collapseID).classList.toggle("px-6");
        }
        /* Function for dropdowns */
        function openDropdown(event, dropdownID) {
            let element = event.target;
            while (element.nodeName !== "A") {
                element = element.parentNode;
            }
            Popper.createPopper(element, document.getElementById(dropdownID), {
                placement: "bottom-start"
            });
            document.getElementById(dropdownID).classList.toggle("hidden");
            document.getElementById(dropdownID).classList.toggle("block");
        }
    </script>
    @yield('script')
</body>

</html>