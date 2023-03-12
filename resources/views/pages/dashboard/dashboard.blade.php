<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <div class="je jd jc rc">

            <!-- Left: Title -->
            <div class="ri _y">
                {{-- <h1 class="gu teu text-slate-800 font-bold">Acme Inc. ✨</h1> --}}
            </div>

            <!-- Right: Actions -->
            <div class="sn am jo az jp ft">

                <!-- Add member button -->
                {{-- 
                <a class="btn ho xi ye" href="{{ route('user.claim.airdrop') }}">
                    <svg class="oo sl du bf ub" viewBox="0 0 16 16">
                        <path
                            d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z">
                        </path>
                    </svg>
                    <span class=" trm nq">Claim Airdrop</span>
                </a> --}}

                {{-- @endif --}}

            </div>

        </div>

        <!-- Welcome banner -->
        {{-- <x-dashboard.welcome-banner /> --}}
        <div class="grid grid-cols-12 gap-6">
            <div class="flex ak tz bg-white bd rounded-sm border border-slate-200">
                <div class="vc vh">

                    <div class="q_ zm zp">
                        <!-- Left side -->
                        <div class="flex items-center ri qy">
                            <!-- Avatar -->
                            <div class="mr-4">
                                <img class="inline-flex rounded-full" src="{{ asset('images/user-36-01.jpg') }}"
                                    width="64" height="64" alt="User">
                            </div>
                            <!-- User info -->
                            <div>
                                <div class="ru">Hey <strong
                                        class="gp text-slate-800">{{ auth()->user()->name }}</strong> 👋, this is your
                                    current balance:</div>
                                <div class="text-3xl font-bold yt">$ {{ getAmount(auth()->user()->balance) }}</div>
                            </div>
                        </div>
                        <!-- Right side -->

                    </div>

                </div>
            </div>


            <!-- Cards -->


            <!-- Users cards -->
            <!-- Card 1 -->

            <div class="tz _c tnu bg-white bd rounded-sm border border-slate-200">
                <div class="flex ak sh">
                    <!-- Card top -->
                    <div class="uw dz">

                        <!-- Image + name -->
                        <header>

                            <div class="gn">
                                <a class="inline-flex text-slate-800 xd" href="#0">
                                    <h2 class="gf gb justify-center gh">Total Deposit</h2>
                                </a>
                            </div>

                        </header>
                        <!-- Bio -->
                        <div class="gn rb">
                            <div class="text-3xl font-bold yt">$
                                {{ getAmount(auth()->user()->total_deposit) }}
                            </div>

                        </div>
                    </div>
                    <!-- Card footer -->
                    <div class="co border-slate-200">
                        <a class="block gn text-sm text-indigo-500 xh gp vn vu" href="{{ route('user.my.deposit') }}">
                            <div class="flex items-center justify-center">

                                <span>Deposit</span>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
            <!-- Card 2 -->

            <div class="tz _c tnu bg-white bd rounded-sm border border-slate-200">
                <div class="flex ak sh">
                    <!-- Card top -->
                    <div class="uw dz">

                        <!-- Image + name -->
                        <header>

                            <div class="gn">
                                <a class="inline-flex text-slate-800 xd" href="#0">
                                    <h2 class="gf gb justify-center gh">Total Airdrop Received</h2>
                                </a>
                            </div>

                        </header>
                        <!-- Bio -->
                        <div class="gn rb">
                            <div class="text-3xl font-bold yt">
                                {{ getAmount(auth()->user()->total_airdrop) }}
                            </div>

                        </div>
                    </div>
                    <!-- Card footer -->
                    <div class="co border-slate-200">
                        <a class="block gn text-sm text-indigo-500 xh gp vn vu" href="#">
                            <div class="flex items-center justify-center">

                                <span>History</span>
                            </div>
                        </a>
                    </div>

                </div>
            </div>

            <!-- Card 3 -->
            <div class="tz _c tnu bg-white bd rounded-sm border border-slate-200">
                <div class="flex ak sh">
                    <!-- Card top -->
                    <div class="uw dz">

                        <!-- Image + name -->
                        <header>

                            <div class="gn">
                                <a class="inline-flex text-slate-800 xd" href="#0">
                                    <h2 class="gf gb justify-center gh">Total Withdraw</h2>
                                </a>
                            </div>

                        </header>
                        <!-- Bio -->
                        <div class="gn rb">
                            <div class="text-3xl font-bold yt">$ {{ getAmount(auth()->user()->total_withdraw) }}</div>

                        </div>
                    </div>
                    <!-- Card footer -->
                    <div class="co border-slate-200">
                        <a class="block gn text-sm text-indigo-500 xh gp vn vu" href="{{ route('user.my.withdraw') }}">
                            <div class="flex items-center justify-center">

                                <span>Withdraw</span>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
            <!-- Card 4 -->
            <div class="tz _c tnu bg-white bd rounded-sm border border-slate-200">
                <div class="flex ak sh">
                    <!-- Card top -->
                    <div class="uw dz">

                        <!-- Image + name -->
                        <header>

                            <div class="gn">
                                <a class="inline-flex text-slate-800 xd" href="#0">
                                    <h2 class="gf gb justify-center gh">Total Referrals</h2>
                                </a>
                            </div>

                        </header>
                        <!-- Bio -->
                        <div class="gn rb">
                            <div class="text-3xl font-bold yt"> {{ $total_ref }}</div>

                        </div>
                    </div>
                    <!-- Card footer -->
                    <div class="co border-slate-200">
                        <a class="block gn text-sm text-indigo-500 xh gp vn vu" href="{{ route('user.my.ref') }}">
                            <div class="flex items-center justify-center">

                                <span>View</span>
                            </div>
                        </a>
                    </div>

                </div>
            </div>


            {{-- Airdrop --}}
            <div class="flex ak tz bg-white bd rounded-sm border border-slate-200 ">
                <div x-data="handleSelect">

                    <!-- Table -->
                    <div class="lf">
                        <table class="ux ou">
                            <!-- Table header -->
                            <thead class="go gv gq hp rounded-sm">
                                <tr>
                                    <th class="dx lm">
                                        <div class="gh gt">Airdrop Name</div>
                                    </th>
                                    <th class="dx lm">
                                        <div class="gh gt">Airdrop Price</div>
                                    </th>
                                    <th class="dx lm">
                                        <div class="gh gt">Airdrop Wallet Token</div>
                                    </th>
                                    <th class="dx lm">
                                        <div class="gh gt">Claim</div>
                                    </th>
                                    <th class="dx lm">
                                        <div class="gh gt">Join Date</div>
                                    </th>

                                </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody class="text-sm gp le ln">
                                @foreach ($airdrops as $airdrop)
                                    <!-- Row -->
                                    <tr>
                                        <td class="dx lm zi">

                                            <div class="gd gt">
                                                {{ $airdrop->airdrop_name }}
                                            </div>
                                        </td>
                                        <td class="dx lm">
                                            <div class="gd gt">
                                                {{ $airdrop->airdrop_price }}
                                            </div>
                                        </td>
                                        <td class="dx lm">
                                            <div class="gd gt">
                                                {{ $airdrop->airdrop_wallet_token }}
                                            </div>

                                        </td>
                                        <td class="dx lm">
                                            <div class="gd gt">
                                                @if ($airdrop->airdrop_sorted == null)
                                                    <form method="POST"
                                                        action="{{ route('user.my.claim.airdrop', $airdrop->id) }}">
                                                        @csrf
                                                        <input type="hidden" name="id"
                                                            value="{{ $airdrop->id }}">
                                                        <button type="submit" href="" class="btn ho xi ye">
                                                            <span class="trm">Claim</span>
                                                        </button>
                                                    </form>
                                                @else
                                                    <p>
                                                        Airdrop Claimed
                                                    </p>
                                                @endif

                                            </div>

                                        </td>
                                        <td class="dx lm">
                                            <div class="gt">
                                                {{ $airdrop->created_at->format('d M, Y') }}
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




    </div>
</x-app-layout>
