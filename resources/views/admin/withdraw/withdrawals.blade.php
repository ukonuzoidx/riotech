@extends('admin.layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            {{-- @if (request()->routeIs('admin.withdraw.log') || request()->routeIs('admin.withdraw.method') || request()->routeIs('admin.users.withdrawals') || request()->routeIs('admin.users.withdrawals.method')) --}}
            <div class="flex flex-wrap mt-6 -mx-3">

                <div class="w-full max-w-full px-3 mt-6 flex-0 lg:mt-0 lg:w-4/12">
                    <a href="{{ route('admin.withdraw.approved') }}">
                        <div class="rounded px-4" style="background-color: rgb(20, 83, 45);">
                            <div class="widget-two__content">
                                <h2 class="text-white">
                                    ${{ $withdrawal->where('status', 1)->where('is_airdrop', 0)->sum('amount') }}</h2>
                                <p class="text-white">@lang('Approved Withdrawals')</p>
                            </div>
                    </a>
                </div><!-- widget-two end -->
            </div>
            <div class="w-full max-w-full px-3 mt-6 flex-0 lg:mt-0 lg:w-4/12">
                <a href="{{ route('admin.withdraw.pending') }}">
                    <div class="rounded px-4 bg--6" style="background-color: rgb(202, 138, 4);">
                        <div class="widget-two__content">
                            <h2 class="text-white">
                                ${{ $withdrawal->where('status', 0)->where('is_airdrop', 0)->sum('amount') }}</h2>
                            <p class="text-white">@lang('Pending Withdrawals')</p>
                        </div>
                </a>
            </div><!-- widget-two end -->
        </div>
        <div class="w-full max-w-full px-3 mt-6 flex-0 lg:mt-0 lg:w-4/12">
            <a href="{{ route('admin.withdraw.rejected') }}">
                <div class="rounded px-4 bg--pink" style="background-color: rgb(189, 0, 0);">
                    <div class="widget-two__content">
                        <h2 class="text-white">${{ $withdrawal->where('status', 3)->where('is_airdrop', 0)->sum('amount') }}
                        </h2>
                        <p class="text-white">@lang('Rejected Withdrawals')</p>
                    </div>
            </a>
        </div><!-- widget-two end -->
    </div>
    </div>
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            {{-- @if (request()->routeIs('admin.withdraw.log') || request()->routeIs('admin.withdraw.method') || request()->routeIs('admin.users.withdrawals') || request()->routeIs('admin.users.withdrawals.method')) --}}
            <div class="flex flex-wrap mt-6 -mx-3">

                <div class="w-full max-w-full px-3 mt-6 flex-0 lg:mt-0 lg:w-4/12">
                    <a href="{{ route('admin.withdraw.approved') }}">
                        <div class="rounded px-4" style="background-color: rgb(20, 83, 45);">
                            <div class="widget-two__content">
                                <h4 class="text-white">Airdrop
                                    {{ $withdrawal->where('status', 1)->where('is_airdrop', 1)->sum('amount') }}</h4>
                                <p class="text-white">@lang('Approved Withdrawals')</p>
                            </div>
                    </a>
                </div><!-- widget-two end -->
            </div>
            <div class="w-full max-w-full px-3 mt-6 flex-0 lg:mt-0 lg:w-4/12">
                <a href="{{ route('admin.withdraw.pending') }}">
                    <div class="rounded px-4 bg--6" style="background-color: rgb(202, 138, 4);">
                        <div class="widget-two__content">
                            <h4 class="text-white">Airdrop
                                {{ $withdrawal->where('status', 0)->where('is_airdrop', 1)->sum('amount') }}</h4>
                            <p class="text-white">@lang('Pending Withdrawals')</p>
                        </div>
                </a>
            </div><!-- widget-two end -->
        </div>
        <div class="w-full max-w-full px-3 mt-6 flex-0 lg:mt-0 lg:w-4/12">
            <a href="{{ route('admin.withdraw.rejected') }}">
                <div class="rounded px-4 bg--pink" style="background-color: rgb(189, 0, 0);">
                    <div class="widget-two__content">
                        <h4 class="text-white">Airdrop
                            {{ $withdrawal->where('status', 3)->where('is_airdrop', 1)->sum('amount') }}</h4>
                        <p class="text-white">@lang('Rejected Withdrawals')</p>
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
                        @forelse($withdrawals as $withdraw)
                            <tr>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <div class="flex px-2">

                                        <div class="my-auto">
                                            <h6 class="mb-0 leading-normal text-sm">
                                                {{ showDateTime($withdraw->created_at) }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-normal text-sm">{{ $withdraw->trx }}</p>
                                </td>
                                @if (!request()->routeIs('admin.users.withdraws') && !request()->routeIs('admin.users.withdraws.method'))
                                    <td
                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <span class="font-semibold leading-tight text-xs">
                                            <a
                                                href="{{ route('admin.users.detail', $withdraw->user_id) }}">{{ $withdraw->user->username }}</a>
                                    </td>
                                    </span>
                                    </td>
                                @endif
                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <div class="flex items-center justify-center">
                                        <span class="mr-2 font-semibold leading-tight text-xs">
                                            {{ getAmount($withdraw->amount) }} {{ $withdraw->currency }}
                                        </span>
                                        <div>

                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <div class="flex items-center justify-center">
                                        {{-- <span class="mr-2 font-semibold leading-tight text-xs"></span> --}}
                                        @if ($withdraw->status == 0)
                                            <span class="bg-yellow-500 text-black px-2 py-1 rounded-sm">Pending</span>
                                        @elseif($withdraw->status == 1)
                                            <span class="bg-green-500 text-black px-2 py-1 rounded-sm">Completed</span>
                                        @else
                                            <span class="bg-red-500 text-black px-2 py-1 rounded-sm">Rejected</span>
                                        @endif

                                    </div>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <a href="{{ route('admin.withdraw.details', $withdraw->id) }}"
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

    @if (!request()->routeIs('admin.users.withdrawals') && !request()->routeIs('admin.users.withdrawals.method'))
        <form
            action="{{ route('admin.withdraw.search',$scope ??str_replace('admin.withdraw.','',request()->route()->getName())) }}"
            method="GET" class="form-inline float-sm-right bg--white">
            <div class="input-group has_append">
                <input type="text" name="search" class="form-control" placeholder="@lang('Withdrawal code/Username')"
                    value="{{ $search ?? '' }}">
                <div class="input-group-append">
                    <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
        <form
            action="{{ route('admin.withdraw.dateSearch',$scope ??str_replace('admin.withdraw.','',request()->route()->getName())) }}"
            method="GET" class="form-inline float-sm-right bg--white mr-0 mr-xl-2 mr-lg-0">
            <div class="input-group has_append">
                <input name="date" type="text" data-range="true" data-multiple-dates-separator=" - "
                    data-language="en" class="datepicker-here bg--white text--black form-control"
                    data-position='bottom right' placeholder="@lang('Min Date - Max date')" autocomplete="off"
                    value="{{ @$dateSearch }}" readonly>
                <input type="hidden" name="method" value="{{ @$method->id }}">
                <div class="input-group-append">
                    <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
    @endif
@endpush
@push('script')
    <script src="{{ asset('assets/admin/js/vendor/datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/datepicker.en.js') }}"></script>
    <script>
        'use strict';
        (function($) {
            if (!$('.datepicker-here').val()) {
                $('.datepicker-here').datepicker();
            }
        })(jQuery)
    </script>
@endpush
