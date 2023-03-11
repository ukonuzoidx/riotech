    <nav
        class="absolute top-0 z-30 flex flex-wrap items-center justify-between w-full px-4 py-2 mt-6 mb-4 lg:flex-nowrap lg:justify-start
            {{ Request::is('static-sign-up') || Request::is('register')
                ? 'shadow-none'
                : 'shadow-soft-2xl rounded-blur bg-white/80 backdrop-blur-2xl backdrop-saturate-200' }}">

        <div class="container flex items-center justify-between py-0 flex-wrap-inherit">

            <a class="py-2.375 text-size-sm mr-4 ml-4 whitespace-nowrap font-bold lg:ml-0 
            
            {{ Request::is('static-sign-up') || Request::is('register') ? 'text-white' : 'text-slate-700' }}"
                href="{{ url('dashboard') }}"> Rioteco Admin </a>

            <div navbar-menu
                class="items-center flex-grow overflow-hidden transition-all duration-500 ease-soft lg-max:max-h-0 basis-full lg:flex lg:basis-auto">
                <ul class="flex flex-col pl-0 mx-auto mb-0 list-none lg:flex-row xl:ml-auto">

                    @if (auth()->guard('admin')->user())
                        <li>
                            <a class="flex items-center px-4 py-2 mr-2 font-normal transition-all lg-max:opacity-0 duration-250 ease-soft-in-out text-size-sm lg:px-2 
                            {{ Request::is('static-sign-up') || Request::is('register') ? 'text-white' : 'text-slate-700' }}"
                                aria-current="page" href="{{ url('dashboard') }}">
                                <i class="mr-1 fa fa-chart-pie opacity-60"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a class="block px-4 py-2 mr-2 font-normal transition-all lg-max:opacity-0 duration-250 ease-soft-in-out text-size-sm lg:px-2
                            {{ Request::is('static-sign-up') || Request::is('register') ? 'text-white' : 'text-slate-700' }}"
                                href="{{ url('profile') }}">
                                <i class="mr-1 fa fa-user opacity-60"></i>
                                Profile
                            </a>
                        </li>
                    @endif

                   

                </ul>
            
            </div>
        </div>
    </nav>
