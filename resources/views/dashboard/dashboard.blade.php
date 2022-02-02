<!--
=========================================================
* Argon Dashboard 2 - v2.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <link
            rel="apple-touch-icon"
            sizes="76x76"
            href="assets/img/apple-icon.png"
        />
        <script src="https://unpkg.com/feather-icons"></script>
        <link rel="icon" type="image/png" href="assets/img/favicon.png" />
        <title>Kelontong | Dashboard</title>
        <!--     Fonts and icons     -->
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"
            rel="stylesheet"
        />
        <!-- Nucleo Icons -->
        <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script
            src="https://kit.fontawesome.com/42d5adcbca.js"
            crossorigin="anonymous"
        ></script>
        <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- CSS Files -->
        <link
            id="pagestyle"
            href="assets/css/argon-dashboard.css?v=2.0.0"
            rel="stylesheet"
        />
    </head>

    <body class="g-sidenav-show bg-gray-100">
        <div class="min-height-300 bg-primary position-absolute w-100"></div>

        <!-- Sidenav -->
        <aside
            class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4"
            id="sidenav-main"
        >
            <div class="sidenav-header">
                <a class="navbar-brand text-center" href="/">
                    <img
                        src="assets/img/snack-booth.png"
                        class="navbar-brand-img h-100"
                        alt="main_logo"
                    />
                    <span class="ms-1 font-weight-bold">Kelontong.ID</span>
                </a>
            </div>
            <hr class="horizontal dark mt-0" />
            <div
                class="collapse navbar-collapse w-auto"
                id="sidenav-collapse-main"
            >
            
            <!-- Navbar Content-->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="pages/dashboard.html">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
                            >
                                <i
                                    class="ni ni-tv-2 text-primary text-sm opacity-10"
                                ></i>
                            </div>
                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <main class="main-content position-relative border-radius-lg">
            <!-- Navbar -->
            <nav
                class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl"
                id="navbarBlur"
                data-scroll="false"
            >
                <div class="container-fluid py-1 px-3">
                    <nav aria-label="breadcrumb">
                        <ol
                            class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5"
                        >
                            <li class="breadcrumb-item text-sm">
                                <a
                                    style="opacity:0"
                                    class="opacity-5 text-white"
                                    href="javascript:;"
                                    ></a
                                >
                            </li>
                            <li
                                style="opacity:0"
                                class="breadcrumb-item text-sm text-white active"
                                aria-current="page"
                            >
                                Dashboard
                            </li>
                        </ol>
                        <h6 class="font-weight-bolder text-white mb-0" style="font-size: 23px">
                            Dashboard
                        </h6>
                    </nav>
                    <div
                        class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4"
                        id="navbar"
                    >
                        <div
                            class="ms-md-auto pe-md-3 d-flex align-items-center"
                        >
                        </div>
                        <ul class="navbar-nav justify-content-end">
                            <li class="nav-item d-flex align-items-center">
                                    <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-primary border-0">Logout</button>
                                    </form>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->

            <!-- Content -->
            <div class="container-fluid py-4">
                @yield('content')
            </div>
        </main>
        <!--   Core JS Files   -->
        <script src="assets/js/core/bootstrap.min.js"></script>
        <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="assets/js/argon-dashboard.min.js?v=2.0.0"></script>
    </body>
</html>
