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

                <a class="btn ho xi ye" href="{{ route('user.claim.airdrop') }}">
                    <svg class="oo sl du bf ub" viewBox="0 0 16 16">
                        <path
                            d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z">
                        </path>
                    </svg>
                    <span class=" trm nq">Claim Airdrop</span>
                </a>

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

            <div class="tz _c tns bg-white bd rounded-sm border border-slate-200">
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
                                {{ getAmount(auth()->user()->total_deposit) + getAmount(auth()->user()->total_airdrop) }}
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

            <!-- Card 3 -->
            <div class="tz _c tns bg-white bd rounded-sm border border-slate-200">
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
            <div class="tz _c tns bg-white bd rounded-sm border border-slate-200">
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

           


        </div>

        {{-- <!-- Cards -->
        <div class="grid grid-cols-12 gap-6">




        </div> --}}

    </div>
</x-app-layout>
