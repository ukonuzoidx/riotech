<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Referral') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mt-8 text-2xl">
                        {{ __('Referral') }}
                    </div>
                    <div class="mt-6 text-gray-500">
                        {{ __('Your referral link is:') }}
                    </div>
                    <div class="mt-6 text-gray-500">
                        {{ route('register') }}?ref={{ Auth::user()->id }}
                    </div>
                    <div class="mt-6 text-gray-500">
                        {{ __('Your referral code is:') }}
                    </div>
                    <div class="mt-6 text-gray-500">
                        {{ Auth::user()->id }}
                    </div>
                    <div class="mt-6 text-gray-500">
                        {{ __('Your referral balance is:') }}
                    </div>
                    <div class="mt-6 text-gray-500">
                        {{ Auth::user()->referral_balance }}
                    </div>
                    <div class="mt-6 text-gray-500">
                        {{ __('Your referral earnings are:') }}
                    </div>
                    <div class="mt-6 text-gray-500">
                        {{ Auth::user()->referral_earnings }}
                    </div>
                    <div class="mt-6 text-gray-500">
                        {{ __('Your referral count is:') }}
                    </div>
                    <div class="mt-6 text-gray-500">
                        {{ Auth::user()->referral_count }}
                    </div>
                </div>
            </div>
        </div>
    </div>   --}}
    <div class="vs jj ttm vl ou uf na">

        <!-- Page header -->
        <div class="je jd jc ri qw">

            <!-- Left: Title -->
            <div class="ri _y">
                <h1 class="gu teu text-slate-800 font-bold"> Total Referral Balance:
                    ${{ getAmount(auth()->user()->total_referral) }}</h1>
            </div>



        </div>

        {{-- referral link --}}
        <div class="ii">
            <span>Referral Link: </span>
            <div class="y inline-flex" x-data="{ open: false }">
                <button class="inline-flex justify-center items-center kk" aria-haspopup="true"
                    @click.prevent="open = !open" :aria-expanded="open" aria-expanded="false">
                    <div class="flex items-center ld">
                        <span class="ld gp text-indigo-500 _e">
                            {{ route('register') }}?ref={{ Auth::user()->ref_code }}
                        </span>

                    </div>
                </button>

            </div>
        </div>




        <!-- Table -->
        <div class="bg-white">
            <div x-data="handleSelect">

                <!-- Table -->
                <div class="lf">
                    <table class="ux ou">
                        <!-- Table header -->
                        <thead class="go gv gq hp rounded-sm">
                            <tr>
                                <th class="dx lm">
                                    <div class="gh gt">Name</div>
                                </th>
                                <th class="dx lm">
                                    <div class="gh gt">Username</div>
                                </th>
                                <th class="dx lm">
                                    <div class="gh gt">Email</div>
                                </th>
                                <th class="dx lm">
                                    <div class="gh gt">Join Date</div>
                                </th>

                            </tr>
                        </thead>
                        <!-- Table body -->
                        <tbody class="text-sm gp le ln">
                            @foreach ($logs as $ref)
                                <!-- Row -->
                                <tr>
                                    <td class="dx lm zi">

                                        <div class="gd gt">
                                            {{ $ref->name }}
                                        </div>
                                    </td>
                                    <td class="dx lm">
                                        <div class="gd gt">
                                            {{ $ref->username }}
                                        </div>
                                    </td>
                                    <td class="dx lm">
                                        <div class="gd gt">
                                            {{ $ref->email }}
                                        </div>

                                    </td>
                                    <td class="dx lm">
                                        <div class="gt">
                                            {{ $ref->created_at->format('d M, Y') }}
                                        </div>
                                    </td>

                                </tr>
                                <!-- Row -->
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>



    </div>

</x-app-layout>
