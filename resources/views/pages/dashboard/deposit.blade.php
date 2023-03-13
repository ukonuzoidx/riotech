<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <div class="je jd jc rc">

            <!-- Left: Title -->
            <div class="ri _y">
                <h1 class="gu teu text-slate-800 font-bold">Deposit History</h1>
            </div>

            <!-- Right: Actions -->
            <div class="sn am jo az jp ft">
                <div x-data="{ modalOpen: false }">
                    <button class="btn ho xi ye" @click.prevent="modalOpen = true" aria-controls="basic-modal">Make
                        Deposit</button>
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
                                    <div class="gh text-slate-800">Make Deposit</div>
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
                            <form action="{{ route('user.my.deposit.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="vc mc mf">
                                    <div class="text-sm">
                                        <div class="gp text-slate-800 ru">Transfer to this wallet</div>
                                        <div class="fb">
                                            <p>
                                                <small>
                                                Copy this

                                                     Crypto Address: </small>
                                                <strong>0x713aF600Eb997Be4Eb81A52b8E407734D72a85C2
                                                </strong>. BUSD-BEP20
                                            </p>

                                            <x-jet-input id="amount" type="text" name="amount" :value="old('amount')"
                                                placeholder="Amount" required />

                                            <x-jet-input id="wallet_address" type="text" name="wallet_address" :value="old('wallet_address')"
                                                placeholder="Paste your wallet address for confirmation" required />
                                            {{-- image for verification --}}
                                            {{-- <div class="mt-4">
                                                <x-jet-label for="image" value="{{ __('Upload Payment Proof') }}" />
                                                <x-jet-input id="image" class="block mt-1 w-full" type="file"
                                                    name="image" accept="image/*" onchange="loadFile(event)"
                                                    :value="old('image')" required />


                                            </div> --}}



                                        </div>
                                    </div>
                                </div>
                                <!-- Modal footer -->
                                <div class="vc vu">
                                    <div class="flex flex-wrap justify-end fc">
                                        <button class="r border-slate-200 hover--border-slate-300 g_"
                                            @click="modalOpen = false">Close</button>
                                        <button type="submit" class="r bg-green-700 text-white">Deposit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Add member button -->

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
                                @foreach ($deposits as $deposit)
                                    <!-- Row -->
                                    <tr>
                                        <td class="dx lm ">

                                            <div class="gd gt">
                                                {{ $deposit->trx }}
                                            </div>
                                        </td>
                                        <td class="dx lm">
                                            <div class="gd gt">
                                                USD {{ getAmount($deposit->amount) }}
                                            </div>
                                        </td>
                                        <td class="dx lm">
                                            <div class="gd gt">
                                                {{-- check if status is zero onne or two --}}
                                                @if ($deposit->status == 0)
                                                    <span
                                                        class="bg-yellow-500 text-white px-2 py-1 rounded-sm">Pending</span>
                                                @elseif($deposit->status == 1)
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
                                                {{ $deposit->admin_feedback }}
                                            </div>
                                        </td>
                                        <td class="dx lm">
                                            <div class="gt">
                                                {{ $deposit->created_at->format('d M, Y') }}
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


@push('js')
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src)
            }
        };
    </script>
@endpush
