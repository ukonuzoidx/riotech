<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <div class="je jd jc rc">

            <!-- Left: Title -->
            <div class="ri _y">
                <h1 class="gu teu text-slate-800 font-bold">Withdraw History</h1>
            </div>

            <!-- Right: Actions -->
            <div class="sn am jo az jp ft">
                {{-- withdraw balance --}}
                <div x-data="{ modalOpen: false }">
                    <button class="btn ho xi ye" @click.prevent="modalOpen = true" aria-controls="basic-modal">
                        Withdraw Balance</button>
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
                                    <div class="gh text-slate-800">Withdraw Balance</div>
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
                            <form action="{{ route('user.my.withdraw.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="vc mc mf">
                                    <div class="text-sm">

                                        <div class="fb">

                                            <x-jet-input id="amount" type="text" name="amount"
                                                placeholder="Amount" />

                                        </div>
                                    </div>
                                </div>
                                <!-- Modal footer -->
                                <div class="vc vu">
                                    <div class="flex flex-wrap justify-end fc">
                                        <button class="r border-slate-200 hover--border-slate-300 g_"
                                            @click="modalOpen = false">Close</button>
                                        <button type="submit" class="r bg-green-700 text-white">Withdraw
                                            Balance</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Withdraw Airdrop -->
                <div x-data="{ modalOpen: false }">
                    <button class="btn ho xi ye" @click.prevent="modalOpen = true" aria-controls="basic-modal">
                        Withdraw Airdrop</button>
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
                                    <div class="gh text-slate-800">Withdraw Airdrop</div>
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
                            <form action="{{ route('user.my.withdraw.store.airdrop') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="vc mc mf">
                                    <div class="text-sm">

                                        <div class="fb">
                                            <input class="form-input w-full" id="amount" type="number"
                                                name="amount" placeholder="Amount" required>

                                            <select name="airdrop_currency" id=""
                                                class="form-input w-full a" required>
                                                <option value="">Select Airdrop</option>
                                                @foreach (auth()->user()->airdrop_sorted as $val)
                                                    <option value="{{ $val->airdrop_name }}">
                                                        {{ $val->airdrop_name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <input class="form-input w-full" id="wallet" type="text"
                                                name="withdraw_information" placeholder="Input your Wallet Address"
                                                required />
                                            <small>
                                                Make sure the wallet address is correct
                                            </small>

                                        </div>
                                    </div>
                                </div>
                                <!-- Modal footer -->
                                <div class="vc vu">
                                    <div class="flex flex-wrap justify-end fc">
                                        <button class="r border-slate-200 hover--border-slate-300 g_"
                                            @click="modalOpen = false">Close</button>
                                        <button type="submit" class="r bg-green-700 text-white">Withdraw
                                            Airdrop</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- Welcome banner -->
        {{-- <x-dashboard.welcome-banner /> --}}
        <div class="grid grid-cols-12 gap-6">



            {{-- referrals table --}}
            <div class="tz bg-white bd rounded-sm border border-slate-200">
                {{-- <header class="vc vu cs ch">
                    <h2 class="gh text-slate-800">Referrals</h2>
                </header> --}}
                <div class="dk">

                    <!-- Table -->
                    <div class="lf">
                        <table class="ux ou">
                            <!-- Table header -->
                            <thead class="go gv gq hp rounded-sm">
                                <tr>
                                    <th class="dx lm">
                                        <div class="gh gt">Transaction id</div>
                                    </th>
                                    <th class="dx lm">
                                        <div class="gh gt">Amount</div>
                                    </th>
                                    <th class="dx lm">
                                        <div class="gh gt">Status</div>
                                    </th>
                                    <th class="dx lm">
                                        <div class="gh gt">Admin Feedback</div>
                                    </th>
                                    <th class="dx lm">
                                        <div class="gh gt">Join Date</div>
                                    </th>

                                </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody class="text-sm gp le ln">
                                @foreach ($withdraws as $withdraw)
                                    <!-- Row -->
                                    <tr>
                                        <td class="dx lm ">

                                            <div class="gd gt">
                                                {{ $withdraw->trx }}
                                            </div>
                                        </td>
                                        <td class="dx lm">
                                            <div class="gd gt">
                                                {{ $withdraw->currency }} {{ getAmount($withdraw->amount) }}
                                            </div>
                                        </td>
                                        <td class="dx lm">
                                            <div class="gd gt">
                                                @if ($withdraw->status == 0)
                                                    <span
                                                        class="bg-yellow-500 text-white px-2 py-1 rounded-sm">Pending</span>
                                                @elseif($withdraw->status == 1)
                                                    <span
                                                        class="bg-green-500 text-white px-2 py-1 rounded-sm">Completed</span>
                                                @else
                                                    <span
                                                        class="bg-red-500 text-white px-2 py-1 rounded-sm">Rejected</span>
                                                @endif
                                            </div>

                                        </td>
                                        <td class="dx lm">
                                            <div class="gd gt">
                                                {{ $withdraw->admin_feedback }}
                                            </div>
                                        </td>
                                        <td class="dx lm">
                                            <div class="gt">
                                                {{ $withdraw->created_at->format('d M, Y') }}
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


    @push('js')
        <script>
            // from the amount calculate the charge
            $(document).ready(function() {
                // hide #fee and #total
                $('#amount').on('keyup', function() {
                    var amount = $(this).val();


                    var charge = Number(1) + (amount * 0.5);
                    var afterCharge = Number(amount) - charge;
                    var finalAmount = afterCharge * 0.007
                    // change #hide from none to block
                    $('#hide').css('display', 'block');
                    $('#fee').text(fee);
                    $('#total').val(total);
                });
            });
        </script>
    @endpush

</x-app-layout>
