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
                @if (auth()->user()->airdrop_dex )
                 <div class="sn am jo az jp ft">
                <div x-data="{ modalOpen: false }">
                    <button class="btn ho xi ye" @click.prevent="modalOpen = true" aria-controls="basic-modal">Claim
                        Airdrop</button>
                    <!-- Modal backdrop -->
                    <div class="m w bg-slate-900 pu tx bz" x-show="modalOpen" x-transition:enter="wt wa wr"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="ba" x-transition:leave="wt wa ws"
                        x-transition:leave-start="ba" x-transition:leave-end="opacity-0" aria-hidden="true"
                        style="display: none;"></div>
                    <!-- Modal dialog -->
                    <div id="basic-modal" class="m w tx la flex items-center np justify-center vs jj" role="dialog"
                        aria-modal="true" x-show="modalOpen" x-transition:enter="wt wu wr"
                        x-transition:enter-start="opacity-0 u_" x-transition:enter-end="ba uj"
                        x-transition:leave="wt wu wr" x-transition:leave-start="ba uj"
                        x-transition:leave-end="opacity-0 u_" style="display: none;">
                        <div class="bg-white rounded bd lu up ou oe" @click.outside="modalOpen = false"
                            @keydown.escape.window="modalOpen = false">
                            <!-- Modal header -->
                            <div class="vc vo cs border-slate-200">
                                <div class="flex fe items-center">
                                    <div class="gh text-slate-800">Claim Airdrop</div>
                                    <button class="gq xv" @click="modalOpen = false">
                                        <div class="d">Close</div>
                                        <svg class="oo sl du">
                                            <path
                                                d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <!-- Modal content -->
                            <form action="{{ route('my.claim.airdrop') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="vc mc mf">
                                    <div class="text-sm">
                                        {{-- <div class="gp text-slate-800 ru">Transfer to this wallet</div> --}}
                                        <div class="fb">
                                            <p> 
                                                Submit the contract address in the space provided and wait for at most 24 hours to receive the airdrop(s)
                                            </p>

                                            <x-jet-input id="airdrop_dex" type="text" name="airdrop_dex" :value="old('airdrop_dex')"
                                                placeholder="Airdrop Dex" />
                                            {{-- image for verification --}}
                                           


                                        </div>
                                    </div>
                                </div>
                                <!-- Modal footer -->
                                <div class="vc vu">
                                    <div class="flex flex-wrap justify-end fc">
                                        <button class="r border-slate-200 hover--border-slate-300 g_"
                                            @click="modalOpen = false">Close</button>
                                        <button type="submit" class="r bg-green-700 text-white">Claim</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Add member button -->

            </div>

                    
                {{-- <a class="btn ho xi ye">
                    <svg class="oo sl du bf ub" viewBox="0 0 16 16">
                        <path
                            d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z">
                        </path>
                    </svg>
                    <span class=" trm nq">Claim Airdrop</span>
                </a> --}}
                @else
                <a class="btn ho xi ye" href="{{ route('claim.airdrop') }}">
                    <svg class="oo sl du bf ub" viewBox="0 0 16 16">
                        <path
                            d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z">
                        </path>
                    </svg>
                    <span class=" trm nq">Claim Airdrop</span>
                </a>
                    
                @endif

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
                            <div class="text-3xl font-bold yt">$ {{ getAmount(auth()->user()->total_deposit) }}</div>

                        </div>
                    </div>
                    <!-- Card footer -->
                    <div class="co border-slate-200">
                        <a class="block gn text-sm text-indigo-500 xh gp vn vu" href="#">
                            <div class="flex items-center justify-center">

                                <span>Claim</span>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
            <!-- Card 2-->
            <div class="tz _c tnu bg-white bd rounded-sm border border-slate-200">
                <div class="flex ak sh">
                    <!-- Card top -->
                    <div class="uw dz">

                        <!-- Image + name -->
                        <header>

                            <div class="gn">
                                <a class="inline-flex text-slate-800 xd" href="#0">
                                    <h2 class="gf gb justify-center gh">Total Airdrop</h2>
                                </a>
                            </div>

                        </header>
                        <!-- Bio -->
                        <div class="gn rb">
                            <div class="text-3xl font-bold yt">$ {{ getAmount(auth()->user()->total_deposit) }}</div>

                        </div>
                    </div>
                    <!-- Card footer -->
                    <div class="co border-slate-200">
                        <a class="block gn text-sm text-indigo-500 xh gp vn vu" href="#">
                            <div class="flex items-center justify-center">

                                <span>
                                    Claim
                                </span>
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
                            <div class="text-3xl font-bold yt">$ {{ getAmount(auth()->user()->total_deposit) }}</div>

                        </div>
                    </div>
                    <!-- Card footer -->
                    <div class="co border-slate-200">
                        <a class="block gn text-sm text-indigo-500 xh gp vn vu" href="#">
                            <div class="flex items-center justify-center">

                                <span>Get</span>
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
                        <a class="block gn text-sm text-indigo-500 xh gp vn vu" href="#">
                            <div class="flex items-center justify-center">

                                <span>View</span>
                            </div>
                        </a>
                    </div>

                </div>
            </div>

            {{-- referrals table --}}
            <div class="tz bg-white bd rounded-sm border border-slate-200">
                <header class="vc vu cs ch">
                    <h2 class="gh text-slate-800">Referrals</h2>
                </header>
                <div class="dk">

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

        {{-- <!-- Cards -->
        <div class="grid grid-cols-12 gap-6">




        </div> --}}

    </div>
</x-app-layout>
