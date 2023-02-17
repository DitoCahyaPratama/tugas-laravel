@if(Auth::check())
<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{asset('assets/')}}"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Ceyy Teacher</title>

    <meta name="description" content="" />
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon/favicon.ico')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/boxicons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />

    <!-- aos -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{asset('assets/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js')}} in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('assets/js/config.js')}}"></script>
    <style>
      .ok {
        width: 100vw;
      }
    </style>
    @livewireStyles
  </head>

  <body>
    <!-- Layout wrapper -->
   

        <!-- Menu -->

        @if(Auth::check('login'))
        <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
          <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
              <a href="/" class="app-brand-link">
                <span class="app-brand-logo demo">
                  <svg
                    width="25"
                    viewBox="0 0 25 42"
                    version="1.1"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                  >
                    <defs>
                      <path
                        d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                        id="path-1"
                      ></path>
                      <path
                        d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                        id="path-3"
                      ></path>
                      <path
                        d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                        id="path-4"
                      ></path>
                      <path
                        d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                        id="path-5"
                      ></path>
                    </defs>
                    <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                        <g id="Icon" transform="translate(27.000000, 15.000000)">
                          <g id="Mask" transform="translate(0.000000, 8.000000)">
                            <mask id="mask-2" fill="white">
                              <use xlink:href="#path-1"></use>
                            </mask>
                            <use fill="#696cff" xlink:href="#path-1"></use>
                            <g id="Path-3" mask="url(#mask-2)">
                              <use fill="#696cff" xlink:href="#path-3"></use>
                              <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                            </g>
                            <g id="Path-4" mask="url(#mask-2)">
                              <use fill="#696cff" xlink:href="#path-4"></use>
                              <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                            </g>
                          </g>
                          <g
                            id="Triangle"
                            transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) "
                          >
                            <use fill="#696cff" xlink:href="#path-5"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                          </g>
                        </g>
                      </g>
                    </g>
                  </svg>
                </span>
                <span class="app-brand-text demo menu-text fw-bolder ms-2">Ceyy</span>
              </a>

              <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                <i class="bx bx-chevron-left bx-sm align-middle"></i>
              </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
              
              <!-- Dashboard -->


              @if(Route::has('login'))
                    @Auth
                      @if(Auth::user()->utype==='ADM')
                        <li class="menu-item">
                          <a href="{{route('admin.dashboard')}}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="{{route('admin.kelas')}}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-box"></i>
                            <div data-i18n="Basic">Kelas</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="{{route('admin.subkelas')}}" class="menu-link">
                            <i class='bx bx-movie menu-icon' ></i>
                            <div data-i18n="Basic">Sub Kelas</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="{{route('admin.mapel')}}" class="menu-link">
                            <i class='bx bx-wallet-alt menu-icon' ></i>
                            <div data-i18n="Basic">Mata Pelajaran</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="{{route('admin.teacher')}}" class="menu-link">
                            <i class='bx bx-copy-alt menu-icon' ></i>
                            <div data-i18n="Basic">Guru</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="{{route('admin.jam')}}" class="menu-link">
                            <i class='bx bx-speaker menu-icon' ></i>
                            <div data-i18n="Basic">Jam</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="{{route('admin.jadwal')}}" class="menu-link">
                            <i class='bx bx-extension menu-icon' ></i>
                            <div data-i18n="Basic">Jadwal</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="{{route('admin.student')}}" class="menu-link">
                            <i class='bx bx-receipt menu-icon' ></i>
                            <div data-i18n="Basic">Murid</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="{{route('admin.preview')}}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-phone"></i>
                            <div data-i18n="Analytics">Review</div>
                          </a>
                        </li>
                      @elseif(Auth::user()->utype==='STD')
                        <li class="menu-item">
                          <a href="{{route('student.tugas')}}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-box"></i>
                            <div data-i18n="Basic">Tugas</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="{{route('student.preview')}}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-phone"></i>
                            <div data-i18n="Analytics">Review</div>
                          </a>
                        </li>
                      @elseif(Auth::user()->utype==='TEA')
                        <li class="menu-item">
                          <a href="{{route('teacher.materi')}}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-box"></i>
                            <div data-i18n="Basic">Materi</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="{{route('teacher.bab')}}" class="menu-link">
                            <i class='bx bx-wallet-alt menu-icon' ></i>
                            <div data-i18n="Basic">Bab</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="{{route('teacher.tugas')}}" class="menu-link">
                            <i class='bx bx-copy-alt menu-icon' ></i>
                            <div data-i18n="Basic">Tugas</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="{{route('teacher.preview')}}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-phone"></i>
                            <div data-i18n="Analytics">Review</div>
                          </a>
                        </li>
                      @else
                        <li class="menu-item">
                          <a href="{{route('materi')}}" class="menu-link">
                            <i class='bx bx-copy-alt menu-icon' ></i>
                            <div data-i18n="Basic">Materi</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="{{route('bab')}}" class="menu-link">
                            <i class='bx bx-wallet-alt menu-icon' ></i>
                            <div data-i18n="Basic">Bab</div>
                          </a>
                        </li>
                      @endif
                    @endif
              @endif

            </ul>
          </aside>
          <!-- / Menu -->

          <!-- Layout container -->
          <div class="layout-page">
            <!-- Navbar -->

            <nav
              class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
              id="layout-navbar"
            >
              <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                  <i class="bx bx-menu bx-sm"></i>
                </a>
              </div>

              <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                <!-- Search -->
                <div class="navbar-nav align-items-center">
                  <div class="nav-item d-flex align-items-center">
                    <!-- <i class="bx bx-search fs-4 lh-0"></i>
                    <input
                      type="text"
                      class="form-control border-0 shadow-none"
                      placeholder="Search..."
                      aria-label="Search..."
                    /> -->
                  </div>
                </div>
                <!-- /Search -->

                <ul class="navbar-nav flex-row align-items-center ms-auto">

                @if(Route::has('login'))
                    @Auth
                      @if(Auth::user()->utype==='ADM')
                          <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            @livewire('layouts.layouts-profile-component')
                                    <div class="flex-grow-1">
                                        <span class="fw-semibold d-block">{{Auth::user()->name}}</span>
                                        <small class="text-muted">Admin</small>
                                    </div>
                                    </div>
                                </a>
                                </li>
                                <li>
                                <div class="dropdown-divider"></div>
                                </li>
                                <!-- <li>
                                <a class="dropdown-item" href="#">
                                    <i class="bx bx-user me-2"></i>
                                    <span class="align-middle">My Profile</span>
                                </a>
                                </li>
                                <li>
                                <a class="dropdown-item" href="#">
                                    <i class="bx bx-cog me-2"></i>
                                    <span class="align-middle">Settings</span>
                                </a>
                                </li> -->
                                <li>
                                <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('input').submit();">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Keluar</span>
                                    </a>
                                </li>
                            </ul>
                          </li>
                        @elseif(Auth::user()->utype==='STD')
                          <li class="nav-item navbar-dropdown dropdown-user dropdown">
                              @livewire('layouts.layouts-profile-component')
                                <div class="flex-grow-1">
                                        <span class="fw-semibold d-block">{{Auth::user()->name}}</span>
                                        <small class="text-muted">Murid</small>
                                    </div>
                                    </div>
                                </a>
                                </li>
                                <li>
                                <div class="dropdown-divider"></div>
                                </li>
                                <!-- <li>
                                <a class="dropdown-item" href="#">
                                    <i class="bx bx-user me-2"></i>
                                    <span class="align-middle">My Profile</span>
                                </a>
                                </li>
                                <li>
                                <a class="dropdown-item" href="#">
                                    <i class="bx bx-cog me-2"></i>
                                    <span class="align-middle">Settings</span>
                                </a>
                                </li> -->
                                <li>
                                <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('input').submit();">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Keluar</span>
                                    </a>
                                </li>
                            </ul>
                          </li>
                        @elseif(Auth::user()->utype==='TEA')
                          <li class="nav-item navbar-dropdown dropdown-user dropdown">
                              @livewire('layouts.layouts-profile-component')
                                <div class="flex-grow-1">
                                        <span class="fw-semibold d-block">{{Auth::user()->name}}</span>
                                        <small class="text-muted">Guru</small>
                                    </div>
                                    </div>
                                </a>
                                </li>
                                <li>
                                <div class="dropdown-divider"></div>
                                </li>
                                <!-- <li>
                                <a class="dropdown-item" href="#">
                                    <i class="bx bx-user me-2"></i>
                                    <span class="align-middle">My Profile</span>
                                </a>
                                </li>
                                <li>
                                <a class="dropdown-item" href="#">
                                    <i class="bx bx-cog me-2"></i>
                                    <span class="align-middle">Settings</span>
                                </a>
                                </li> -->
                                <li>
                                <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('input').submit();">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Keluar</span>
                                    </a>
                                </li>
                            </ul>
                          </li>
                      @else
                          <li>
                              <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('input').submit();">
                                  <i class="bx bx-power-off me-2"></i>
                                  <span class="align-middle">Keluar</span>
                              </a>
                          </li>
                      @endif
                      <form action="{{route('logout')}}" method="POST" id="input">
                          @csrf
                      </form>
                    @else
                      <li class="nav-item lh-1 me-3">
                          <a href="{{route('login')}}">Masuk</a>
                      </li>
                      <li class="nav-item lh-1 me-3">
                          <a href="{{route('register')}}">Daftar</a>
                      </li>
                    @endif
                @endif

                  <!-- User -->
                  <!--/ User -->
                </ul>
              </div>
            </nav>

            <!-- / Navbar -->

            <!-- Content wrapper -->
              {{$slot}}
              <!-- / Content -->

              <!-- Footer -->
              <footer class="content-footer footer bg-footer-theme">
                <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                  <div class="mb-2 mb-md-0">
                    ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    , made with ❤️ by
                    <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ceyy</a>
                  </div>
                  <div>
                    <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                    <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                    <a
                      href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                      target="_blank"
                      class="footer-link me-4"
                      >Documentation</a
                    >

                    <a
                      href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                      target="_blank"
                      class="footer-link me-4"
                      >Support</a
                    >
                  </div>
                </div>
              </footer>
              <!-- / Footer -->

              <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
          </div>
          </div>
          <div class="layout-overlay layout-menu-toggle"></div>
        </div>

        @else
        <div class="layout-wrapper layout-content-navbar" >
          <div class="layout-container" style="width:100vw">
            <div class="">
              <!-- Navbar -->

              <nav
                class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                id="layout-navbar" 
              >
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                  <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                    <i class="bx bx-menu bx-sm"></i>
                  </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                  <!-- Search -->
                  <div class="navbar-nav align-items-center">
                    <div class="nav-item d-flex align-items-center">
                      <img src="{{asset('assets/img/okk.jpeg')}}" width="120">
                      <!-- <i class="bx bx-search fs-4 lh-0"></i>
                      <input
                        type="text"
                        class="form-control border-0 shadow-none"
                        placeholder="Search..."
                        aria-label="Search..."
                      /> -->
                    </div>
                  </div>
                  <!-- /Search -->

                  <ul class="navbar-nav flex-row align-items-center ms-auto">

                        <li class="nav-item lh-1 me-5">
                            <a href="{{route('home')}}">Home</a>
                        </li>
                        <li class="nav-item lh-1 me-5">
                            <a href="{{route('materi')}}">Materi</a>
                        </li>
                        <li class="nav-item lh-1 me-5">
                            <a href="{{route('bab')}}">Bab</a>
                        </li>
                        <li class="nav-item lh-1 me-2">
                            <a href="{{route('login')}}" class="btn btn-primary">Sign In</a>
                        </li>
                        <li class="nav-item lh-1 me-3">
                            <a href="{{route('register')}}" class="btn btn-primary">Sign Up</a>
                        </li>

                    <!-- User -->
                    <!--/ User -->
                  </ul>
                </div>
              </nav>

              <!-- / Navbar -->

              <!-- Content wrapper -->
                {{$slot}}
                <!-- / Content -->

                <!-- Footer -->
                <div class="container mt-5">
                  <div class="row">
                    <div class="col-6 col-md-2 mb-3">
                      <h5>Navbar</h5>
                      <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                      </ul>
                    </div>

                    <div class="col-6 col-md-2 mb-3">
                      <h5>Social Media</h5>
                      <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                      </ul>
                    </div>

                    <div class="col-6 col-md-2 mb-3">
                      <h5>Okk</h5>
                      <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                      </ul>
                    </div>

                    <div class="col-md-5 offset-md-1 mb-3">
                      <form>
                        <h5>Subscribe to our newsletter</h5>
                        <p>Monthly digest of what's new and exciting from us.</p>
                        <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                          <label for="newsletter1" class="visually-hidden">Email address</label>
                          <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                          <button class="btn btn-primary" type="button">Subscribe</button>
                        </div>
                      </form>
                    </div>
                  </div>

                  <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                    <p>&copy; 2023 Ceyy, Inc. All rights reserved.</p>
                    <ul class="list-unstyled d-flex">
                      <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
                      <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
                      <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
                    </ul>
                  </div>
                </footer>
              </div>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
              </div>
              <!-- Content wrapper -->
            </div>
          </div>
          <div class="layout-overlay layout-menu-toggle"></div>
        </div>
        @endif


      <!-- Overlay -->
      
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js')}} -->
    <script src="{{asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{asset('assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('assets/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js')}}"></script>

     <!-- aos -->
     <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
      <script>
        AOS.init();
      </script>
    @livewireScripts
  </body>
</html>



@else


  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8" />
      <title>Ceyy Teacher</title>
      <meta content="width=device-width, initial-scale=1.0" name="viewport" />
      <meta content="" name="keywords" />
      <meta content="" name="description" />

      <!-- Favicon -->
      <link href="img/favicon.ico" rel="icon" />

      <!-- Google Web Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com" />
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
      <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@600;700&display=swap"
        rel="stylesheet"
      />

      <!-- Icon Font Stylesheet -->
      <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
        rel="stylesheet"
      />
      <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
        rel="stylesheet"
      />

      <!-- Libraries Stylesheet -->
      <link href="{{asset('assets2/lib/animate/animate.min.css')}}" rel="stylesheet" />
      <link href="{{asset('assets2/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet" />

      <!-- Customized Bootstrap Stylesheet -->
      <link href="{{asset('assets2/css/bootstrap.min.css')}}" rel="stylesheet" />

      <!-- Template Stylesheet -->
      <link href="{{asset('assets2/css/style.css')}}" rel="stylesheet" />
      @livewireStyles
    </head>

    <body>
      <!-- Spinner Start -->
      <div
        id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
      >
        <div class="spinner-grow text-primary" role="status"></div>
      </div>
      <!-- Spinner End -->

      <!-- Topbar Start -->
      <div
        class="container-fluid bg-dark text-white-50 py-2 px-0 d-none d-lg-block"
      >
        <div class="row gx-0 align-items-center">
          <div class="col-lg-7 px-5 text-start">
            <div class="h-100 d-inline-flex align-items-center me-4">
              <small class="fa fa-phone-alt me-2"></small>
              <small>+012 345 6789</small>
            </div>
            <div class="h-100 d-inline-flex align-items-center me-4">
              <small class="far fa-envelope-open me-2"></small>
              <small>ceyy.teacher@gmail.com</small>
            </div>
            <div class="h-100 d-inline-flex align-items-center me-4">
              <small class="far fa-clock me-2"></small>
              <small>Mon - Fri : 09 AM - 09 PM</small>
            </div>
          </div>
          <div class="col-lg-5 px-5 text-end">
            <div class="h-100 d-inline-flex align-items-center">
              <a class="text-white-50 ms-4" href=""
                ><i class="fab fa-facebook-f"></i
              ></a>
              <a class="text-white-50 ms-4" href=""
                ><i class="fab fa-twitter"></i
              ></a>
              <a class="text-white-50 ms-4" href=""
                ><i class="fab fa-linkedin-in"></i
              ></a>
              <a class="text-white-50 ms-4" href=""
                ><i class="fab fa-instagram"></i
              ></a>
            </div>
          </div>
        </div>
      </div>
      <!-- Topbar End -->

      <!-- Navbar Start -->
      <nav
        class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5"
      >
        <a href="/" class="navbar-brand d-flex align-items-center">
          <h1 class="m-0">
            <img
              class="img-fluid me-3"
              src="{{asset('assets/img/okk.jpeg')}}"
              alt=""
              width="200"
            />
          </h1>
        </a>
        <button
          type="button"
          class="navbar-toggler"
          data-bs-toggle="collapse"
          data-bs-target="#navbarCollapse"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="navbar-nav mx-auto bg-light rounded pe-4 py-3 py-lg-0">
            <a href="/" class="nav-item nav-link active">Home</a>
            <a href="{{route('about')}}" class="nav-item nav-link">Tentang Kami</a>
            <a href="{{route('service')}}" class="nav-item nav-link">Service Kami</a>
            <div class="nav-item dropdown">
              <a
                href="#"
                class="nav-link dropdown-toggle"
                data-bs-toggle="dropdown"
                >Halaman</a
              >
              <div class="dropdown-menu bg-light border-0 m-0">
                <a href="{{route('materi')}}" class="dropdown-item">Materi</a>
                <a href="{{route('bab')}}" class="dropdown-item">Bab</a>
              </div>
            </div>
            <a href="{{route('contact')}}" class="nav-item nav-link">Review Kami</a>
          </div>
        </div>
        <a href="{{route('login')}}" class="btn btn-primary px-3 d-none d-lg-block me-3">Masuk</a>
        <a href="{{route('register')}}" class="btn btn-primary px-3 d-none d-lg-block">Daftar</a>
      </nav>
      <!-- Navbar End -->

      <!-- Carousel Start -->
      {{$slot}}
        <!-- Footer Start -->
        <div
        class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn"
        data-wow-delay="0.1s"
      >
        <div class="container py-5">
          <div class="row g-5">
            <div class="col-lg-3 col-md-6">
              <h1 class="text-white mb-4">
                <img
                  class="img-fluid me-3"
                  src="{{asset('assets/img/okk.jpeg')}}"
                  alt=""
                />
              </h1>
              <p>
                Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat
                ipsum et lorem et sit, sed stet lorem sit clita
              </p>
              <div class="d-flex pt-2">
                <a class="btn btn-square me-1" href=""
                  ><i class="fab fa-twitter"></i
                ></a>
                <a class="btn btn-square me-1" href=""
                  ><i class="fab fa-facebook-f"></i
                ></a>
                <a class="btn btn-square me-1" href=""
                  ><i class="fab fa-youtube"></i
                ></a>
                <a class="btn btn-square me-0" href=""
                  ><i class="fab fa-linkedin-in"></i
                ></a>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <h5 class="text-light mb-4">Address</h5>
              <p>
                <i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA
              </p>
              <p><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
              <p><i class="fa fa-envelope me-3"></i>info@example.com</p>
            </div>
            <div class="col-lg-3 col-md-6">
              <h5 class="text-light mb-4">Quick Links</h5>
              <a class="btn btn-link" href="">About Us</a>
              <a class="btn btn-link" href="">Contact Us</a>
              <a class="btn btn-link" href="">Our Services</a>
              <a class="btn btn-link" href="">Terms & Condition</a>
              <a class="btn btn-link" href="">Support</a>
            </div>
            <div class="col-lg-3 col-md-6">
              <h5 class="text-light mb-4">Newsletter</h5>
              <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
              <div class="position-relative mx-auto" style="max-width: 400px">
                <input
                  class="form-control bg-transparent w-100 py-3 ps-4 pe-5"
                  type="text"
                  placeholder="Your email"
                />
                <button
                  type="button"
                  class="btn btn-secondary py-2 position-absolute top-0 end-0 mt-2 me-2"
                >
                  SignUp
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid copyright">
          <div class="container">
            <div class="row">
              <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                &copy; <a href="#">Ceyy</a>, All Right Reserved.
              </div>
              <div class="col-md-6 text-center text-md-end">
                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                <br />Distributed By:
                <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer End -->

      <!-- Back to Top -->
      <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"
        ><i class="bi bi-arrow-up"></i
      ></a>

      <!-- JavaScript Libraries -->
      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
      <script src="{{asset('assets2/lib/wow/wow.min.js')}}"></script>
      <script src="{{asset('assets2/lib/easing/easing.min.js')}}"></script>
      <script src="{{asset('assets2/lib/waypoints/waypoints.min.js')}}"></script>
      <script src="{{asset('assets2/lib/owlcarousel/owl.carousel.min.js')}}"></script>
      <script src="{{asset('assets2/lib/counterup/counterup.min.js')}}"></script>

      <!-- Template Javascript -->
      <script src="{{asset('assets2/js/main.js')}}"></script>
      @livewireScripts
    </body>
  </html>




@endif

