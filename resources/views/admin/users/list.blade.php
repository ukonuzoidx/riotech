@extends('admin.layouts.app')


@section('breadcrumbs')
    <nav>
        <!-- breadcrumb -->
        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="leading-normal text-sm">
                <a class="opacity-50 text-slate-700" href="javascript:;">Pages</a>
            </li>
            <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']"
                aria-current="page">All Users</li>
        </ol>
        <h6 class="mb-0 font-normal text-sm capitalize">All Users</h6>
    </nav>
@endsection
@section('content')
    <div class="flex flex-wrap -mx-3">



        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6>All users</h6>
                    <p>Here you can manage users.</p>
                </div>


                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                  
                                    <th
                                        class="px-6 py-3 font-normal text-sm text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Photo</th>

                                    <th
                                        class="px-6 py-3 pl-2 font-normal text-sm text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Name</th>
                                    <th
                                        class="px-6 py-3 pl-2 font-normal text-sm text-left uppercase bg-transparent border-b border-gray-200 shadow-none text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Email</th>
                                    <th
                                        class="px-6 py-3 font-normal text-sm text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Username</th>

                                    <th
                                        class="px-6 py-3 font-normal text-sm text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Creation Date</th>
                                    <th
                                        class="px-6 py-3 font-normal text-sm text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    
                                <tr>
                                    

                                    <td
                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <div class="flex px-4 py-1">
                                            <div class="flex flex-col justify-center">
                                                <img src="https://ui-avatars.com/api/?name={{ $user->name }}&background=4AA060&color=fff" width="32"
                                                    class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-soft-in-out text-size-sm h-9 w-9 rounded-xl"
                                                    alt="user1" />
                                            </div>
                                        </div>
                                    </td>

                                    <td
                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 font-semibold leading-tight text-size-xs">{{$user->name}}</p>
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 font-semibold leading-tight text-size-xs">{{ $user->email }}</p>
                                    </td>

                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 font-semibold leading-tight text-size-xs">{{ $user->username}}</p>
                                    </td>

                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 font-semibold leading-tight text-size-xs"> {{ $user->created_at->format('d M, Y') }}</p>
                                    </td>

                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 font-semibold leading-tight text-base">
                                            <a href="{{ route('admin.users.detail', $user->id) }}"><i class="fas fa-user-edit" aria-hidden="true"></i></a>
                                           
                                        </p>
                                    </td>
                                </tr>
                                @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
