@extends('admin.layoutsx.base')

@section('section')
    @auth('admin')
      
        
                @include('admin.layoutsx.navbars.auth.sidebar')
                <main class="ease-soft-in-out xl:ml-68 relative h-full max-h-screen rounded-xl transition-all duration-200">
{{-- 
</main>
                <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200"> --}}
                    @include('admin.layoutsx.navbars.auth.nav')
                    <div class="w-full px-6 py-6 mx-auto">
                       @yield('content')
                        @include('admin.layoutsx.footers.auth.footer')
                    </div>
                </main>
            

            {{-- @include('components.plugins.fixed-plugin') --}}
        
    @endauth

    @guest('admin')


        <div class="container sticky top-0 z-sticky">
            <div class="flex flex-wrap -mx-3">
                <div class="w-full max-w-full px-3 flex-0">
                    @include('admin.layoutsx.navbars.guest.nav')
                </div>
            </div>
        </div>
        @yield('content')

        {{-- @include('admin.layoutsx.footers.guest.footer') --}}

    @endguest
@endsection
