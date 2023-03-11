@extends('admin.layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">

            {{-- @if (request()->routeIs('admin.deposit.list') || request()->routeIs('admin.deposit.method') || request()->routeIs('admin.users.deposits') || request()->routeIs('admin.deposit.dateSearch') || request()->routeIs('admin.users.deposits.method')) --}}
            <div class="flex flex-wrap mt-6 -mx-3">

                <div class="w-full max-w-full px-3 mt-6 flex-0 lg:mt-0 lg:w-4/12">
                    <a href="{{ route('admin.deposit.approved') }}">
                        <div class="rounded px-4" style="background-color: rgb(20, 83, 45);">
                            <div class="widget-two__content">
                                <h2 class="text-white">${{ $deposit->where('status', 1)->sum('amount') }}</h2>
                                <p class="text-white">@lang('Successful Deposit')</p>
                            </div>
                    </a>
                </div><!-- widget-two end -->
            </div>
            <div class="w-full max-w-full px-3 mt-6 flex-0 lg:mt-0 lg:w-4/12">
                <a href="{{ route('admin.deposit.pending') }}">
                    <div class="rounded px-4 bg--6" style="background-color: rgb(202, 138, 4);">
                        <div class="widget-two__content">
                            <h2 class="text-white">${{ $deposit->where('status', 0)->sum('amount') }}</h2>
                            <p class="text-white">@lang('Pending Deposit')</p>
                        </div>
                </a>
            </div><!-- widget-two end -->
        </div>
        <div class="w-full max-w-full px-3 mt-6 flex-0 lg:mt-0 lg:w-4/12">
            <a href="{{ route('admin.deposit.rejected') }}">
                <div class="rounded px-4 bg--pink" style="background-color: rgb(189, 0, 0);">
                    <div class="widget-two__content">
                        <h2 class="text-white">${{ $deposit->where('status', 3)->sum('amount') }}</h2>
                        <p class="text-white">@lang('Rejected Deposit')</p>
                    </div>
            </a>
        </div><!-- widget-two end -->
    </div>
    </div>
    {{-- @endif --}}
    <div
        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <h6>{{ $page_title }}</h6>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
            <div class="p-0 overflow-x-auto">
                <table class="items-center justify-center w-full mb-0 align-top border-gray-200 text-slate-500">
                    <thead class="align-bottom">
                        <tr>
                            <th
                                class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Date</th>
                            <th
                                class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Transaction Number</th>
                            <th
                                class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Username</th>
                            <th
                                class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Amount</th>
                            <th
                                class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Status</th>
                            <th
                                class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($deposits as $deposit)
                            <tr>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <div class="flex px-2">

                                        <div class="my-auto">
                                            <h6 class="mb-0 leading-normal text-sm">
                                                {{ showDateTime($deposit->created_at) }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-normal text-sm">{{ $deposit->trx }}</p>
                                </td>
                                @if (!request()->routeIs('admin.users.deposits') && !request()->routeIs('admin.users.deposits.method'))
                                    <td
                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <span class="font-semibold leading-tight text-xs">
                                            <a
                                                href="{{ route('admin.users.detail', $deposit->user_id) }}">{{ $deposit->user->username }}</a>
                                    </td>
                                    </span>
                                    </td>
                                @endif
                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <div class="flex items-center justify-center">
                                        <span
                                            class="mr-2 font-semibold leading-tight text-xs">{{ getAmount($deposit->amount) }}</span>
                                        <div>

                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <div class="flex items-center justify-center">
                                        {{-- <span class="mr-2 font-semibold leading-tight text-xs"></span> --}}
                                        @if ($deposit->status == 0)
                                            <span class="bg-yellow-500 text-black px-2 py-1 rounded-sm">Pending</span>
                                        @elseif($deposit->status == 1)
                                            <span class="bg-green-500 text-black px-2 py-1 rounded-sm">Completed</span>
                                        @else
                                            <span class="bg-red-500 text-black px-2 py-1 rounded-sm">Rejected</span>
                                        @endif

                                    </div>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <a href="{{ route('admin.deposit.details', $deposit->id) }}"
                                        class="inline-block px-6 py-3 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none leading-pro text-xs ease-soft-in bg-150 tracking-tight-soft bg-x-25 text-slate-400">
                                        <i class="leading-tight fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-muted text-center" colspan="100%">{{ __($empty_message) }}</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection


@push('breadcrumb-plugins')
    {{-- @if (!request()->routeIs('admin.users.deposits') && !request()->routeIs('admin.users.deposits.method'))
        <form
            action="{{ route('admin.deposit.search',$scope ??str_replace('admin.deposit.','',request()->route()->getName())) }}"
            method="GET" class="form-inline float-sm-right bg--white mb-2">
            <div class="input-group has_append  ">
                <input type="text" name="search" class="form-control" placeholder="@lang('Deposit code/Username')"
                    value="{{ $search ?? '' }}">
                <div class="input-group-append">
                    <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>

        <form
            action="{{ route('admin.deposit.dateSearch',$scope ??str_replace('admin.deposit.','',request()->route()->getName())) }}"
            method="GET" class="form-inline float-sm-right bg--white mr-0 mr-xl-2 mr-lg-0">
            <div class="input-group has_append ">
                <input name="date" type="text" data-range="true" data-multiple-dates-separator=" - "
                    data-language="en" class="datepicker-here form-control bg-white text--black"
                    data-position='bottom right' placeholder="@lang('Min Date - Max date')" autocomplete="off" readonly
                    value="{{ @$dateSearch }}">
                <input type="hidden" name="method" value="{{ @$methodAlias }}">
                <div class="input-group-append">
                    <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
    @endif --}}
@endpush

@push('script-lib')
    <script src="{{ asset('assets/admin/js/vendor/datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/datepicker.en.js') }}"></script>
@endpush

@push('script')
    <script>
        'use strict';
        (function($) {
            if (!$('.datepicker-here').val()) {
                $('.datepicker-here').datepicker();
            }
        })(jQuery)
    </script>
@endpush
