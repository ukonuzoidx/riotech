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

@push('css')
    <style>
        /*Overrides for Tailwind CSS */

        /*Form fields*/
        .dataTables_wrapper select,
        .dataTables_wrapper .dataTables_filter input {
            color: #4a5568;
            /*text-gray-700*/
            padding-left: 1rem;
            /*pl-4*/
            padding-right: 1rem;
            /*pl-4*/
            padding-top: .5rem;
            /*pl-2*/
            padding-bottom: .5rem;
            /*pl-2*/
            line-height: 1.25;
            /*leading-tight*/
            border-width: 2px;
            /*border-2*/
            border-radius: .25rem;
            border-color: #edf2f7;
            /*border-gray-200*/
            background-color: #edf2f7;
            /*bg-gray-200*/
        }

        /*Row Hover*/
        table.dataTable.hover tbody tr:hover,
        table.dataTable.display tbody tr:hover {
            background-color: #ebf4ff;
            /*bg-indigo-100*/
        }

        /*Pagination Buttons*/
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            margin: 10px
                /*rounded*/
                border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Pagination Buttons - Current selected */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 500;
            /*font-bold*/
            border-radius: 1.25rem;
            /* padding: 10px; */
            /*rounded*/
            background: rgb(51 65 85) !important;

            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Add padding to bottom border */
        table.dataTable.no-footer {
            /* border-bottom: 1px solid #e2e8f0; */
            /*border-b-1 border-gray-300*/
            margin-top: 0.75em;
            margin-bottom: 0.75em;
        }

        /*Change colour of responsive icon*/
        table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
        table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
            background-color: #667eea !important;
            /*bg-indigo-500*/
        }
    </style>
@endpush

@section('content')
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
            <div class="relative flex flex-col min-w-0 break-words shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <h5 class="font-bold py-3"></h5>
                    <form method="POST" action="{{ route('admin.airdrop.store') }}">
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
                                            placeholder="Price" id="airdrop-price" required="" value="">
                                    </div>
                                    <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">
                                        Airdrop Token

                                    </h6>
                                    <div class="mb-4">
                                        <input name="airdrop_wallet_token" type="text"
                                            class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                            placeholder="Wallet Token" id="airdrop-token" required="" value="">
                                    </div>


                                </div>
                            </div>
                            <div class="max-w-full px-3 w-1/2 lg:flex-none">
                                <div class="flex flex-col h-full">
                                    <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">
                                        Airdrop Name
                                    </h6>
                                    <div class="mb-4">
                                        <input name="airdrop_name" type="text"
                                            class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                            placeholder="e.g RIO" id="airdrop-price" required="" value="">
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="flow-root">
                            <button type="submit"
                                class="float-right inline-block px-6 py-3 mt-6 mb-2 font-bold text-center text-white uppercase align-middle transition-all  border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-size-xs ease-soft-in tracking-tight-soft shadow-soft-md  hover:border-slate-700 hover:bg-slate-700 hover:text-white"
                                style="background-color: rgb(51 65 85  )">
                                Create Airdrop</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="w-full max-w-full">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="table-responsive p-4 m-4">


                <table id="example" class=" table-flush text-slate-500 stripe hover" style="width:100%; padding: 1em;">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-left">Airdrop Name</th>
                            <th class="text-left">Airdrop Wallet Token</th>
                            {{-- <th  class="text-left">Airdrop User Count</th> --}}
                            <th class="text-left">Airdrop Price</th>
                            <th class="text-left">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($airdrops as $airdrop)
                            <tr>
                                <td>{{ $airdrop->airdrop_name }}</td>
                                <td>{{ $airdrop->airdrop_wallet_token }}</td>
                                <td>{{ $airdrop->airdrop_price }}</td>
                                <td>{{ showDate($airdrop->created_at) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td>
                                    No Airdrop Set Yet
                                </td>
                            </tr>
                        @endforelse


                    </tbody>

                </table>


            </div>
        </div>
        <!--/Card-->


    </div>
    <div class="w-full max-w-full my-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="table-responsive p-4 m-4">
                <h3>
                    Airdrop Users
                </h3>


                <table id="example2" class=" table-flush text-slate-500 stripe hover" style="width:100%; padding: 1em;">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-left">Airdrop Name</th>
                            <th class="text-left">Airdrop Wallet Token</th>
                            {{-- <th  class="text-left">Airdrop User Count</th> --}}
                            <th class="text-left">Airdrop Price</th>
                            <th class="text-left">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($airdrops as $airdrop)
                            <tr>
                                <td>{{ $airdrop->airdrop_name }}</td>
                                <td>{{ $airdrop->airdrop_wallet_token }}</td>
                                <td>{{ $airdrop->airdrop_price }}</td>
                                <td>{{ showDate($airdrop->created_at) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td>
                                    No Airdrop Set Yet
                                </td>
                            </tr>
                        @endforelse


                    </tbody>

                </table>


            </div>
        </div>
        <!--/Card-->


    </div>
    <!--/container-->
@endsection

@push('script')
    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!--Datatables -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {

            var table = $('#example').DataTable({
                    responsive: true
                })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>
    <script>
        $(document).ready(function() {

            var table = $('#example2').DataTable({
                    responsive: true
                })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>
@endpush
