@extends('admin.layoutsx.app')
@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 flex-0 lg:w-8/12">
            <div class="flex flex-wrap -mx-3">
                <div class="w-full max-w-full px-3 flex-0 lg:w-4/12">
                    <div data-tilt=""
                        class="after:bg-gradient-to-tl after:from-blue-600 after:to-cyan-400 after:opacity-85 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl after:z-1 relative flex h-full min-w-0 flex-col items-center break-words rounded-2xl border-0 bg-white bg-clip-border after:absolute after:top-0 after:left-0 after:block after:h-full after:w-full after:rounded-2xl after:bg-black/40 after:content-['']"
                        style="transform-style: preserve-3d; will-change: transform; transform: perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1);">
                        <div class="mb-7 absolute h-full w-full rounded-2xl"></div>
                        <div class="relative flex-auto p-6 text-center text-white z-2">
                            <h2
                                class="mt-2 mb-0 text-white transition-all duration-500 [transform:scale(.7)_translateZ(50px)]">
                                {{ $page_title }}</h2>
                            {{-- <h1 class="mb-0 text-white transition-all duration-500 [transform:scale(.7)_translateZ(50px)]">
                                $ {{ getAmount($withdrawal->amount) }}</h1> --}}

                        </div>
                    </div>
                </div>
                <div class="w-full max-w-full px-3 mt-6 flex-0 md:w-6/12 lg:mt-0 lg:w-4/12">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex">
                                <div>
                                    <div
                                        class="inline-block w-12 h-12 text-center text-black bg-center rounded-lg fill-current bg-gradient-to-tl from-gray-900 to-slate-800 dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 stroke-none">
                                        <i
                                            class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white opacity-100"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div>
                                        <p class="mb-0 font-semibold leading-normal capitalize text-sm dark:text-white/60">
                                            Transaction Number</p>
                                        <h5 class="mb-0 font-bold dark:text-white">{{ $withdrawal->trx }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="relative flex flex-col min-w-0 mt-6 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex">
                                <div>
                                    <div
                                        class="inline-block w-12 h-12 text-center text-black bg-center rounded-lg fill-current bg-gradient-to-tl from-gray-900 to-slate-800 dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 stroke-none">
                                        <i
                                            class="ni leading-none ni-planet text-lg relative top-3.5 text-white opacity-100"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div>
                                        <p class="mb-0 font-semibold leading-normal capitalize text-sm dark:text-white/60">
                                            Username</p>
                                        <h5 class="mb-0 font-bold dark:text-white">


                                            <span class="font-bold leading-normal text-sm text-lime-500">
                                                <a
                                                    href="{{ route('admin.users.detail', $withdrawal->user_id) }}">{{ @$withdrawal->user->username }}</a>

                                            </span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full max-w-full px-3 mt-6 flex-0 md:w-6/12 lg:mt-0 lg:w-4/12">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex">
                                <div>
                                    <div
                                        class="inline-block w-12 h-12 text-center text-black bg-center rounded-lg fill-current bg-gradient-to-tl from-gray-900 to-slate-800 dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 stroke-none">
                                        <i
                                            class="ni leading-none ni-world text-lg relative top-3.5 text-white opacity-100"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div>
                                        <p class="mb-0 font-semibold leading-normal capitalize text-sm dark:text-white/60">
                                            Status</p>
                                        <h5 class="mb-0 font-bold dark:text-white">
                                            @if ($withdrawal->status == 0)
                                                <span class="text-yellow-500 px-2 py-1 rounded-sm">Pending</span>
                                            @elseif($withdrawal->status == 1)
                                                <span class="text-green-500 px-2 py-1 rounded-sm">Completed</span>
                                            @else
                                                <span class="text-red-500 px-2 py-1 rounded-sm">Rejected</span>
                                            @endif

                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    @if ($withdrawal->status == 0)
        <div class="flex flex-wrap mt-6 -mx-3">
            <div class="w-full max-w-full px-3 mt-6 flex-0 lg:mt-0 lg:w-6/12">
                <div
                    class="relative flex flex-col min-w-0 overflow-hidden break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-4 pb-0">
                        <div class="flex items-center">
                            <div
                                class="inline-block w-12 h-12 text-center text-black bg-center rounded-lg fill-current bg-gradient-to-tl from-blue-600 to-cyan-400 stroke-none shadow-soft-2xl">
                                <i class="ni leading-none ni-calendar-grid-58 text-lg relative top-3.5 text-white"></i>
                            </div>
                            <div class="ml-4">
                                <p class="mb-0 font-semibold leading-normal capitalize text-sm">Approve withdrawal Tab</p>
                                {{-- <h5 class="mb-0 font-bold dark:text-white">480</h5> --}}
                            </div>

                        </div>
                    </div>
                    <div class="flex-auto p-4 mt-4">
                        <div>
                            <form action="{{ route('admin.withdraw.approve') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $withdrawal->id }}">
                                <div class="modal-body">
                                    <p>@lang('Are you sure to') <span class="font-weight-bold">@lang('approve')</span> <span
                                            class="font-weight-bold withdraw-amount text-green-700">
                                            {{ getAmount($withdrawal->amount) }} USD

                                        </span> @lang('withdrawal of')
                                        <span class="font-weight-bold withdraw-user">
                                            {{ $withdrawal->user->username }}
                                        </span>?
                                    </p>



                                </div>
                                <div class="modal-footer my-4">
                                    <button type="submit"
                                        class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-lime-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs">Approve</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <div class="w-full max-w-full px-3 mt-6 flex-0 lg:mt-0 lg:w-6/12">
                <div
                    class="relative flex flex-col min-w-0 overflow-hidden break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-4 pb-0">
                        <div class="flex items-center">
                            <div
                                class="inline-block w-12 h-12 text-center text-black bg-center rounded-lg fill-current bg-gradient-to-tl from-blue-600 to-cyan-400 stroke-none shadow-soft-2xl">
                                <i class="ni leading-none ni-calendar-grid-58 text-lg relative top-3.5 text-white"></i>
                            </div>
                            <div class="ml-4">
                                <p class="mb-0 font-semibold leading-normal capitalize text-sm">Reject withdrawal Tab</p>
                                {{-- <h5 class="mb-0 font-bold dark:text-white">480</h5> --}}
                            </div>

                        </div>
                    </div>
                    <div class="flex-auto p-4 mt-4">
                        <div>
                            <form action="{{ route('admin.withdraw.reject') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $withdrawal->id }}">

                                <div class="modal-body">
                                    <p>@lang('Are you sure to') <span class="font-weight-bold">@lang('reject')</span> <span
                                            class="font-weight-bold withdraw-amount text-green-700">
                                            {{ getAmount($withdrawal->amount) }} USD

                                        </span> @lang('withdrawal of')
                                        <span class="font-weight-bold withdraw-user">
                                            {{ $withdrawal->user->username }}
                                        </span>?
                                    </p>

                                    <div class="form-group">
                                        <label class="font-weight-bold mt-2">@lang('Reason for Rejection')</label>
                                        <textarea name="message" rows="5" placeholder="@lang('Reason for Rejection')" required
                                            class="focus:shadow-soft-primary-outline min-h-unset text-sm leading-5.6 ease-soft block h-auto w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none"></textarea>
                                        {{-- <textarea name="message" id="message" placeholder="@lang('Reason for Rejection')" class="form-control" rows="5"></textarea> --}}
                                    </div>

                                </div>
                                <div class="modal-footer my-4">
                                    <button type="submit"
                                        class="inline-block px-6 py-3 m-0 ml-2 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-soft-in leading-pro tracking-tight-soft bg-gradient-to-tl from-red-600 to-rose-400 shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85">Reject</button>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endif
@endsection

@push('script')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    {{-- <script>
        'use strict';
        (function($) {
            $('.approveBtn').on('click', function() {
                var modal = $('#approveModal');
                modal.find('input[name=id]').val($(this).data('id'));
                modal.find('.withdraw-amount').text($(this).data('amount'));
                modal.find('.withdraw-user').text($(this).data('username'));
                modal.modal('show');
            });

            $('.rejectBtn').on('click', function() {
                var modal = $('#rejectModal');
                modal.find('input[name=id]').val($(this).data('id'));
                modal.find('.withdraw-amount').text($(this).data('amount'));
                modal.find('.withdraw-user').text($(this).data('username'));
                modal.modal('show');
            });
        })(jQuery)
    </script> --}}
@endpush
