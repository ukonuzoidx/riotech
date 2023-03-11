@extends('admin.layoutsx.app')


@section('breadcrumbs')
    <nav>
        <!-- breadcrumb -->
        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="leading-normal text-sm">
                <a class="opacity-50 text-slate-700" href="javascript:;">Pages</a>
            </li>
            <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']"
                aria-current="page">All Users</li>
        </ol>
        <h6 class="mb-0 font-normal text-sm capitalize">All Users</h6>
    </nav>
@endsection



@section('content')
    <div class="my-4">
        <div class="flex flex-wrap mb-12 -mx-3">
            <div class="w-full max-w-full px-3 lg:flex-0 shrink-0 lg:w-3/12">
                <div
                    class="sticky flex flex-col min-w-0 break-words bg-white border-0 top-1/100 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                    <ul class="flex flex-col flex-wrap p-4 mb-0 list-none rounded-xl">
                        <li>
                            <a href="#profile"
                                class="block px-4 py-2 transition-colors rounded-lg ease-soft-in-out text-slate-500 hover:bg-gray-200">
                                <div class="inline-block mr-2 text-black fill-current h-4-em w-4-em stroke-none">
                                    <svg class="mb-1 text-dark" width="16px" height="16px" viewBox="0 0 40 40"
                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>spaceship</title>
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g transform="translate(-1720.000000, -592.000000)" fill="#FFFFFF"
                                                fill-rule="nonzero">
                                                <g transform="translate(1716.000000, 291.000000)">
                                                    <g transform="translate(4.000000, 301.000000)">
                                                        <path class="fill-slate-800"
                                                            d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z">
                                                        </path>
                                                        <path class="fill-slate-800"
                                                            d="M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z">
                                                        </path>
                                                        <path class="fill-slate-800"
                                                            d="M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z"
                                                            opacity="0.598539807"></path>
                                                        <path class="fill-slate-800"
                                                            d="M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z"
                                                            opacity="0.598539807"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <span class="leading-normal text-size-sm dark:text-white">Profile</span>
                            </a>
                        </li>
                        <li class="pt-2">
                            <a href="#basic-info"
                                class="block px-4 py-2 transition-colors rounded-lg ease-soft-in-out text-slate-500 hover:bg-gray-200">
                                <div class="inline-block mr-2 text-black fill-current h-4-em w-4-em stroke-none">
                                    <svg class="mb-1 text-dark" width="16px" height="16px" viewBox="0 0 40 44"
                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>document</title>
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF"
                                                fill-rule="nonzero">
                                                <g transform="translate(1716.000000, 291.000000)">
                                                    <g transform="translate(154.000000, 300.000000)">
                                                        <path class="fill-slate-800"
                                                            d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z"
                                                            opacity="0.603585379"></path>
                                                        <path class="fill-slate-800"
                                                            d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <span class="leading-normal text-size-sm dark:text-white">Basic Info</span>
                            </a>
                        </li>
                      
                 
                        <li class="pt-2">
                            <a href="#sessions"
                                class="block px-4 py-2 transition-colors rounded-lg ease-soft-in-out text-slate-500 hover:bg-gray-200">
                                <div class="inline-block mr-2 text-black fill-current h-4-em w-4-em stroke-none">
                                    <svg class="mb-1 text-dark" width="16px" height="16px" viewBox="0 0 40 40"
                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>settings</title>
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF"
                                                fill-rule="nonzero">
                                                <g transform="translate(1716.000000, 291.000000)">
                                                    <g transform="translate(304.000000, 151.000000)">
                                                        <polygon class="fill-slate-800" opacity="0.596981957"
                                                            points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                                                        </polygon>
                                                        <path class="fill-slate-800"
                                                            d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z"
                                                            opacity="0.596981957"></path>
                                                        <path class="fill-slate-800"
                                                            d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <span class="leading-normal text-size-sm dark:text-white">Deposit</span>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </div>
            <div class="w-full max-w-full px-3 lg:flex-0 shrink-0 lg:w-9/12">
                <div class="relative flex flex-col flex-auto min-w-0 p-4 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border"
                    id="profile">
                    <div class="flex flex-wrap items-center justify-center -mx-3">
                        <div class="w-4/12 max-w-full px-3 flex-0 sm:w-auto">
                            <div
                                class="w-19 h-19 text-size-base ease-soft-in-out relative inline-flex items-center justify-center rounded-xl text-white transition-all duration-200">
                                <img class="w-full shadow-soft-sm rounded-xl"
                                    src="{{ asset('backend') }}/assets/img/bruce-mars.jpg" alt="bruce">
                            </div>
                        </div>
                        <div class="w-8/12 max-w-full px-3 my-auto flex-0 sm:w-auto">
                            <div class="h-full">
                                <h5 class="mb-1 font-bold dark:text-white">{{ $user->name }}</h5>
                            </div>
                        </div>
                        <div class="flex max-w-full px-3 mt-4 sm:flex-0 shrink-0 sm:mt-0 sm:ml-auto sm:w-auto">
                            <label profile-visibility-toggle-label="" for="profile-visibility-toggle"
                                class="inline-block mb-0 ml-1 font-normal cursor-pointer text-size-sm text-slate-700 dark:text-white/80">
                                <small>Disable User</small>
                            </label>
                            <div class="min-h-6 ml-2 mb-0.5 block pl-12">
                                <input checked="" profile-visibility-toggle=""
                                    class="rounded-10 duration-250 ease-soft-in-out after:rounded-circle after:shadow-soft-2xl after:duration-250 checked:after:translate-x-5.3 h-5 mt-0.5 relative float-left -ml-12 w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-slate-800/95 checked:bg-slate-800/95 checked:bg-none checked:bg-right"
                                    type="checkbox">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative flex flex-col min-w-0 mt-6 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border"
                    id="basic-info">
                    <div class="p-6 mb-0 rounded-t-2xl">
                        <h5 class="dark:text-white">Basic Info</h5>
                    </div>
                    <div class="flex-auto p-6 pt-0">

                        <div class="flex flex-wrap -mx-3">
                            <div class="w-6/12 max-w-full px-3 flex-0">
                                <label class="mt-6 mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80"
                                    for="Email">Email</label>
                                <div class="relative flex flex-wrap items-stretch w-full rounded-lg">
                                    <input type="email" name="email" placeholder="example@email.com"
                                        value="{{ $user->email }}"
                                        class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-size-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                                </div>
                            </div>

                            <div class="w-6/12 max-w-full px-3 flex-0">
                                <label class="mt-6 mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80"
                                    for="Your location">Username</label>
                                <div class="relative flex flex-wrap items-stretch w-full rounded-lg">
                                    <input type="text" name="username" placeholder="Username"
                                        value="{{ $user->username }}"
                                        class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-size-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                                </div>
                            </div>
                            <div class="w-6/12 max-w-full px-3 flex-0">
                                <label class="mt-6 mb-2 ml-1 font-bold text-size-xs text-slate-700 dark:text-white/80"
                                    for="Phone Number">BUSD WALLET</label>
                                <div class="relative flex flex-wrap items-stretch w-full rounded-lg">
                                    <input type="text" name="busd_wallet" placeholder="Wallet"
                                        value="{{ $user->busd_wallet }}"
                                        class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-size-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                                </div>
                            </div>

                        </div>

                    </div>
                </div>


                <div class="relative flex flex-col min-w-0 mt-6 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border"
                    id="sessions">
                    <div class="p-6 pb-4 rounded-t-2xl">
                        <h5 class="dark:text-white">Deposit</h5>
                        <p class="leading-normal text-size-sm dark:text-white/60">.</p>
                    </div>
                    <div class="flex-auto p-6 pt-0">

                        <div class="flex items-center">
                            <div class="text-center w-5/100">
                                <i class="fas fa-desktop text-size-lg opacity-60" aria-hidden="true"></i>
                            </div>
                            <p class="my-auto ml-4 dark:text-white/60">Total Deposit</p>
                            <p
                                class="my-auto ml-auto mr-4 leading-normal text-size-sm text-slate-400 dark:text-white dark:opacity-80">
                                USD {{ getAmount($user->total_deposit) }}</p>

                            {{-- <a href="javascript:;" class="my-auto leading-normal text-size-sm group text-fuchsia-500">
                                See more
                                <i class="group-hover:translate-x-1.25 fas fa-arrow-right text-size-xs ease-bounce ml-1 leading-tight transition-all duration-200"
                                    aria-hidden="true"></i>
                            </a> --}}
                        </div>
                        <hr
                            class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-horizontal-dark dark:bg-gradient-horizontal-light">
                        <div class="flex items-center">
                            <div class="text-center w-5/100">
                                <i class="fas fa-desktop text-size-lg opacity-60" aria-hidden="true"></i>
                            </div>
                            <p class="my-auto ml-4 dark:text-white/60">Total Airdrop</p>
                            <p
                                class="my-auto ml-auto mr-4 leading-normal text-size-sm text-slate-400 dark:text-white dark:opacity-80">
                                USD {{ getAmount($user->total_airdrop) }}</p>

                            {{-- <a href="javascript:;" class="my-auto leading-normal text-size-sm group text-fuchsia-500">
                                See more
                                <i class="group-hover:translate-x-1.25 fas fa-arrow-right text-size-xs ease-bounce ml-1 leading-tight transition-all duration-200"
                                    aria-hidden="true"></i>
                            </a> --}}
                        </div>
                        <hr
                            class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-horizontal-dark dark:bg-gradient-horizontal-light">

                    </div>
                </div>
                <div class="relative flex flex-col min-w-0 mt-6 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border"
                    id="delete">
                    <div class="p-6 rounded-t-2xl">
                        <h5 class="dark:text-white">Delete Account</h5>
                        <p class="mb-0 leading-normal text-size-sm dark:text-white/60">Once you delete your account,
                            there is no going back. Please be certain.</p>
                    </div>
                    <div class="flex-auto p-6 pt-0 sm:flex">
                        <div class="flex items-center mb-6 sm:mb-0">
                            <div>
                                <div class="block pl-12 mb-0 min-h-6">
                                    <input
                                        class="rounded-10 duration-250 ease-soft-in-out after:rounded-circle after:shadow-soft-2xl after:duration-250 checked:after:translate-x-5.3 h-5-em mt-0.5-em relative float-left -ml-12 w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-slate-800/95 checked:bg-slate-800/95 checked:bg-none checked:bg-right"
                                        type="checkbox">
                                </div>
                            </div>
                        
                        </div>
                        <button type="button"
                            class="inline-block px-6 py-3 mb-0 ml-auto font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer active:opacity-85 leading-pro text-size-xs ease-soft-in tracking-tight-soft bg-150 bg-x-25 hover:scale-102 active:shadow-soft-xs hover:active:scale-102 border-slate-400 text-slate-400 hover:text-slate-400 hover:opacity-75 hover:shadow-none active:scale-100 active:border-slate-400 active:bg-slate-400 active:text-white hover:active:border-slate-400 hover:active:bg-transparent hover:active:text-slate-400 hover:active:opacity-75 hover:active:shadow-none">Deactivate</button>
                       <button type="button" class="inline-block px-6 py-3 m-0 ml-2 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-soft-in leading-pro tracking-tight-soft bg-gradient-to-tl from-red-600 to-rose-400 shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85">Delete account</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
