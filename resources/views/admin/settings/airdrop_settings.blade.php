@extends('admin.layouts.app')

@section('breadcrumbs')
    <nav>
        <!-- breadcrumb -->
        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="leading-normal text-sm">
                <a class="opacity-50 text-slate-700" href="javascript:;">Pages</a>
            </li>
            <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']"
                aria-current="page">Airdrop Settings</li>
        </ol>
        <h6 class="mb-0 font-bold capitalize">Airdrop Settings</h6>
    </nav>
@endsection

{{-- @push('css')
    <link href="{{ asset('backend/assets/css/soft-ui-dashboard-tailwind.css') }}" rel="stylesheet" />
    
@endpush --}}

@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <div wire:id="OCVdJcoF8ZpVjCbJNN3Z">
            <div class="w-full px-6 mx-auto">
                <div class="relative flex items-center p-0 mt-6 overflow-hidden bg-center bg-cover min-h-75 rounded-2xl"
                    style="background-image: url({{ asset('backend/assets/img/curved-images/curved0.jpg') }}); background-position-y: 50%">
                    <span class="absolute inset-y-0 w-full h-full bg-center bg-cover bg-gradient-fuchsia opacity-60"></span>
                </div>
                <div
                    class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 -mt-16 overflow-hidden break-words border-0 shadow-blur rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200">
                    <div class="flex flex-wrap -mx-3">
                        <div class="flex-none w-auto max-w-full px-3">
                            <div
                                class="text-size-base ease-soft-in-out h-18.5 w-18.5 relative inline-flex items-center justify-center rounded-xl text-white transition-all duration-200">

                            </div>
                        </div>
                        <div class="flex-none w-auto max-w-full px-3 my-auto">
                            <div class="h-full">
                                <h5 class="mb-1">Airdrop Settings</h5>
                                {{-- <p class="mb-0 font-semibold leading-normal text-size-sm">CEO / Co-Founder</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap mt-6 -mx-3">
                <div class="w-full px-3 mb-6 e">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <h5 class="font-bold py-3"></h5>
                            <form method="POST" action="{{ route('admin.airdrop.update') }}">
                                @csrf
                                <div class="flex flex-wrap -mx-3">
                                    <div class="max-w-full px-3 w-1/2 lg:flex-none">
                                        <div class="flex flex-col h-full">
                                            <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">
                                                Airdrop Price

                                            </h6>
                                            <div class="mb-4">
                                                <input name="airdrop_price" type="text"
                                                    class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                                    placeholder="Price" id="airdrop-price" required=""
                                                    value="{{ $general->airdrop_price }}">
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <div class="flow-root">
                                    <button type="submit"
                                        class="float-right inline-block px-6 py-3 mt-6 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-size-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-dark-gray border-slate-700 bg-slate-700 hover:text-white">
                                        Save changes</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <script>
                function alertClose() {
                    document.getElementById("alert").style.display = "none";
                }
            </script>
        </div>

        <footer class="pt-4">
            <div class="w-full px-6 mx-auto">
                <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
                    <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                        <div class="leading-normal text-center text-size-sm text-slate-500 lg:text-left ">
                            ©
                            <script>
                                document.write(new Date().getFullYear() + ",");
                            </script>2023,
                            made with <i class="fa fa-heart" aria-hidden="true"></i> by
                            <a href="https://www.creative-tim.com" class="font-semibold text-slate-700"
                                target="_blank">Creative
                                Tim</a>
                            &amp; <a href="https://updivision.com" class="font-semibold text-slate-700"
                                target="_blank">UPDIVISION</a>
                            for a better web.
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
                        <ul class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com"
                                    class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-size-sm text-slate-500"
                                    target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://updivision.com"
                                    class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-size-sm text-slate-500"
                                    target="_blank">UPDIVISION</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation"
                                    class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-size-sm text-slate-500"
                                    target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://creative-tim.com/blog"
                                    class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-size-sm text-slate-500"
                                    target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license"
                                    class="block px-4 pt-0 pb-1 pr-0 font-normal transition-colors ease-soft-in-out text-size-sm text-slate-500"
                                    target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
